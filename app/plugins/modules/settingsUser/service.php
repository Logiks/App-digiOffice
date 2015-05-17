<?php
if(!defined('ROOT')) exit('No direct script access allowed');
loadModuleLib('profileUser','api');

if(isset($_REQUEST["action"])) {
	switch($_REQUEST["action"]) {
		case "get-user-profile":
			$profile = getUser();
			printServiceMsg($profile);
		break;
		case "update-user-info":
			updatLgksUser();
		break;
		case "save-info":
			echo uploadUserImage();
		break;		
		case "change-password":			
			$sql = _db()->_selectQ('lgks_users',"COUNT(*) AS 'count'",["userid" => $_SESSION['SESS_USER_ID'], "pwd" => md5($_POST['password'])]);
			$res = _dbQuery($sql,true);
			$rec = _dbFetch($res);
			_dbFree($res);
			if($rec['count'] != 0) {
				$sql = _db()->_updateQ('lgks_users',['pwd' => md5($_POST['password'])],["userid" => $_SESSION['SESS_USER_ID']]);
				$res = _dbQuery($sql,true);
				_dbFree($res);
				if($res) {
					echo '<p class="green">Successfully changed your password. Please logout and then login</p>';
				} else {
					echo '<p class="red">An error occurred when trying to change your password</p>';
				}
			} else {
				echo '<p class="red">Passwords do not match</p>';
			}
		break;
		case "default":
			printServiceErrorMsg("Sorry, Action Not Found");
		break;
	}
} else {
	printServiceErrorMsg("Sorry, Action Not Found");
}

function uploadUserImage(){
	$arr = [
		'avatar' => $_POST['avatar']
	];
	///return APPROOT.APPS_USERDATA_FOLDER.'slotManager/';
	if(isset($_FILES['avatarField'])) {
		$file     		  = $_FILES['avatarField'];
		$name     		  = $file['name'];
		$ext     		  = substr($name,strrpos($name,'.')+1);
		$name  	  		  = substr($name,0,strrpos($name,'.')) ."_". md5(time());
		$location 		  = APPS_USERDATA_FOLDER . 'profile_photos/' . $name .".". $ext;
		$storage_location = APPROOT . $location;
		$arr['avatar'] 	  = $location;
		if(!move_uploaded_file($file['tmp_name'],$storage_location)){
			return "An error occured when trying to upload the image thus avatar not saved!";
		}
	}
	$sql = _db()->_updateQ('addressbook_tbl',$arr,['loginid' => $_SESSION['SESS_USER_ID']]);
	$res = _dbQuery($sql);
	_dbFree($res);
	if($res) {
		return "ok";
	} else {
		return "An error occurred when trying to update the avatar";
	}
}

function getUser(){
	$userid  = $_SESSION["SESS_USER_ID"];
	$profile = getProfileInfo($userid);
	
	$sql = _db()->_selectQ('lgks_users','',["userid" => $_SESSION['SESS_USER_ID']]);
	$res = _dbQuery($sql,true);
	$rec = _dbFetch($res);
	_dbFree($res);
	
	$rec['avatar'] = $profile['avatar'];
	
	return $rec;
}

function updatLgksUser(){
	$arr = [
		'name' 	  => '',
		'email'   => '',
		'mobile'  => '',
		'address' => '',
		'region'  => '',
		'country' => '',
		'zipcode' => ''
	];
	
	$arr2 = [
		'full_name' => trim($_POST['name']),
		'email1' => trim($_POST['email']),
		'mobile' => trim($_POST['mobile']),
		'address' => '',
		'city' => trim($_POST['region']),
		'country' => '',
		'zipcode' => ''
	];	
	
	foreach($arr as $k => $v) {
		if(isset($_POST[$k]) && strlen($_POST[$k]) > 0) {
			$arr[$k] = trim($_POST[$k]);
		}
		if(isset($arr2[$k])){
			$arr2[$k] = trim($_POST[$k]);
		}
	}
		
	$arr['doe']   = date('Y-m-d H:i:s');
	$arr2['dtoe'] = date('Y-m-d H:i:s');	
	
	$sql = _db()->_updateQ('lgks_users',$arr,['userid' => $_SESSION["SESS_USER_ID"]]);
	$sql2 = _db()->_updateQ('addressbook_tbl',$arr2,['loginid' => $_SESSION["SESS_USER_ID"]]);
	$res = _dbQuery($sql,true);
	$res2 = _dbQuery($sql2);
	_dbFree($res);
	_dbFree($res2);
	if($res) {
		if($res2){
			echo "<div><b>Profile Save Successfull</b></div><div style='color:blue;text-align:left'>Please Reload Page.</div>";
		} else {
			echo "<div><b>Profile Saved Successfull</b></div><div style='color:blue;text-align:left'>Error in saving to information.</div>";
		}
	} else {
		echo "<div><b>Profile Save Error</b></div>";
	}
}

?>