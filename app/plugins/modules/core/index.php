<?php
if(!defined('ROOT')) exit('No direct script access allowed');

if(!function_exists("setupUser")) {
	function getUIDForHash($hash,$type='id') {
		$sql=_db()->_selectQ("addressbook_tbl","$type","md5(id)='{$hash}'");
		$res=_dbQuery($sql);
		$data=_dbData($res);
		_dbFree($res);
		if(count($data)>0) {
			return $data[0][$type];
		}
		return false;
	}
	function getUserHash() {
		if(!isset($_SESSION['SESS_USER_HASH'])) {
			setupUser();
		}
		return $_SESSION['SESS_USER_HASH'];
	}
	function getMyInfo() {
		if(!isset($_SESSION['UINFO'])) {
			setupUser();
		}
		return $_SESSION['UINFO'];
	}
	function setupUser() {
		$cols="md5(id) as refid,full_name,type,tags,dob,email1,email2,mobile,gender,organization,org_category,department,country,zipcode,avatar,loginid";
		$sql=_db()->_selectQ("addressbook_tbl",$cols,"loginid='{$_SESSION['SESS_USER_ID']}'");
		$res=_dbQuery($sql);
		$data=_dbData($res);
		_dbFree($res);
		if(count($data)<=0) {
			$uinfo=getMyUserInfo();
			if(count($uinfo)<=0) {
				exit("User Information Missing");
			}
			$uData=array(
					"full_name"=>$uinfo['name'],
					"type"=>"users",
					"tags"=>"",
					"dob"=>$uinfo['dob'],
					"gender"=>$uinfo['gender'],
					"email1"=>$uinfo['email'],
					"email2"=>"",
					"mobile"=>$uinfo['mobile'],
					"address"=>$uinfo['address'],
					"state"=>$uinfo['region'],
					"country"=>$uinfo['country'],
					"zipcode"=>$uinfo['zipcode'],
					"organization"=>"",
					"org_category"=>"",
					"department"=>"",
					"designation"=>"",
					"loginid"=>$_SESSION['SESS_USER_ID'],
				);
			if($uinfo['avatar_type']=="photoid") {
				$uData['avatar']=$uinfo['avatar'];
			} else {
				$uData['avatar']=$uinfo['avatar_type']."@".$uinfo['avatar'];
			}
			$sql=_db()->_insertQ1("addressbook_tbl",$uData);
			$res=_dbQuery($sql);
			if($res) {
				$mid=_db()->insert_id();
				$uData['refid']=md5($mid);
			} else {
				trigger_ForbiddenError("User Information Failed To Create, Try again later.");
			}
		} else {
			$uData=$data[0];
		}
		if(strlen($uData['avatar'])>0) {
			if(strpos($uData['avatar'], "@")>1) {
				$avatar=explode("@", $uData['avatar']);
				$avatar1=$avatar[0];
				$avatar2=implode("@", array_splice($avatar, 1));
				$uData['avatar']=_service("avatar")."&method={$avatar1}&authorid={$avatar2}";
			} else {
				if(file_exists(APPROOT.$uData['avatar'])) {
					$uData['avatar']=WEBAPPROOT.$uData['avatar'];
				} else {
					$uData['avatar']=loadMedia($uData['avatar']);
				}
			}
		} else {
			$uData['avatar']=loadMedia("images/user.png");
		}
		$_SESSION['SESS_USER_HASH']=$uData['refid'];
		$_SESSION['UINFO']=$uData;
	}
	function dateMath($d1,$d2,$func) {
		$d1=strtotime($d1);
		$d2=strtotime($d2);
		if(strlen($d1)==0) $d1=strtotime(date('Y/m/d'));
		if(strlen($d2)==0) $d2=strtotime(date('Y/m/d'));
		
		$d=date('d-m-Y');
		if($func=="plus") {
			$d=$d1+$d2;
		}
		elseif($func=="minus") {
			$d=$d1-$d2;
		}
		//$d = ($d/abs($d))*date("d", $d);
		$d = ($d/86400);
		return $d;
	}
	function dateDiff($dt1) {
		$d1=strtotime($dt1);
		$d2=time();
		if(strlen($d1)>0) {
			$d=$d2-$d1;
			$d = floor($d/86400);
			return $d;
		}
		return 0;
	}
	function dateWarn($dt1,$defaultWarn=false) {
		$d1=strtotime($dt1);
		$d2=time();
		$dt1=_pDate($dt1);
		$warnPeriod=-1*((int)getConfig("DATE_WARN_PERIOD"));
		if(strlen($d1)>0) {
			$d=$d2-$d1;
			$d = floor($d/86400);
			if($d>0) {
				return "<span class='dateFailed'>$dt1</span>";
			} elseif($d>$warnPeriod) {
				return "<span class='dateWarn'>$dt1</span>";
			} else {
				return "<span class='datePlain'>$dt1</span>";
			}
		}
		if($defaultWarn) {
			return "<span class='dateWarn'>$dt1</span>";
		}
		return "";
	}
	function getDLSource($src,$refid) {
		return "{$src}:".md5($refid);
	}
	function archiveDBTable($src,$dateCol="dtoc") {
		$sql1="FROM {$src} WHERE $dateCol<DATE_SUB(NOW(),INTERVAL 90 DAY)";
		$sql2="INSERT INTO archieves_{$src} SELECT *";
		_dbQuery("$sql2 $sql1");
		_dbQuery("DELETE $sql1");
	}
	if(!defined("SERVICE_ROOT")) {
		if(!isset($_REQUEST['page']) || $_REQUEST['page']=="home" || current(explode("/", $_REQUEST['page']))=="home") {
			setupUser();
		} else {
			getMyInfo();
		}
	}
}
?>
