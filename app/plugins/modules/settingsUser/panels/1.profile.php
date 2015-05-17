<?php
if(!defined('ROOT')) exit('No direct script access allowed');
loadHelpers("countries");
?>
<div class="setting-profile">
	<div class="por-sec">
		<div class="por-sec-img">
			<div class='avatarLoading ajaxloading5'><img name="avatar" id="avatar" src=""/></div>
			<div id="btnEditBtn"><i class="fa fa-pencil"></i></div>
			<div class="socialBars" style="display: none">
				<ul>
					<li><a href="#"><i class="fa fa-facebook fb"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter tw"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram insta"></i></a></li>
					<li><a href="#"><i class="fa fa-paperclip upload"></i>
						<form id="frmUpload" method="post">
							<input type="file" name="avatarField" id="avatarField">
						</form>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="por-sec-pro">
			<h3>Account Details </h3>
			<div id="accountHolder">
				<form id="frmProfile" autocomplete="off" method="post" action="<?php echo _service('settingsUser'); ?>&action=update-user-info" target="targetForm">
					<div class="author">
						<label for="name">Full Name:</label>
						<input type="text" name="name" class='textfield' id="name">
					</div>
					<div class="author">
						<label for="email">E-Mail :</label>
						<input type="text" name="email" class='emailfield' id="email">
					</div>
					<div class="author">
						<label for="mobile">Mobile :</label>
						<input type="text" name="mobile" class='phonefield' id="mobile">
					</div>
					<div class="author">
						<label for="address">Address :</label>
						<textarea name="address" id="address"></textarea>
					</div>
					<div class="author">
						<label for="region">City / Region :</label>
						<input type="text" name="region" id="region">
					</div>
					<div class="author">
						<label for="country">Country :</label>
						<select name="country" name="country" id="country">
							<?=getCountrySelector($data["country"])?>
						</select>
					</div>
					<div class="author">
						<label for="zipcode">ZipCode :</label>
						<input type="text" name="zipcode" id="zipcode">
					</div>					
					<div class="portfolio-button">
						<input type="submit" class="btn" value="Save">
					</div>
				</form>
			</div>
			<iframe id="targetForm" name="targetForm" width="100%" height="200px" frameborder="0" align="center"></iframe>
		</div>
		<div class="clear"></div>
	</div><!--por-sec-->
</div>
<script>
	$(function(){
		getUserProfile();
		var sb = $("div.socialBars",".por-sec-img");
		/*$(".por-sec-img").hover(function(){
sb.stop(true,true).delay(100).slideDown(300);
}, function(){
sb.stop(true,true).delay(100).slideUp(300);
});*/
		$("#btnEditBtn i").click(function(){
			if(sb.is(":visible")) {
				sb.slideUp(300);
			} else {
				sb.slideDown(300);
			}
		});
		
		$("#avatarField").change(function(){
			var val = $(this).val(), ext = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
			
			if((ext == 'png' || ext == 'jpeg' || ext == 'jpg' || ext == 'gif')) {
				var lx=getServiceCMD("settingsUser")+"&action=save-info";
				
				$('#frmUpload').ajaxSubmit({
					url : lx,
					type : 'POST',
					success : function(data) {
						if(data == 'ok') {
							window.location.reload();
						} else {
							lgksAlert(data);
						}
						$(this).val('');
					}
				});
			} else {
				lgksAlert('Only png, jpg, jpeg, gif type of images are allowed!');
				$(this).val('');
			}
		});
		
		sb.delegate("i","click",function(){
			var avatar = $("#avatar")
			var th = $(this);
			if(th.hasClass('fb')) {
				lgksPrompt("Your Facebook id please","Facebook Avatar",null,function(txt) {
					if(txt!=null && txt.length>0) {
						var lx=getServiceCMD("avatar")+"&method=facebook&authorid="+txt;
						avatar.attr("src",lx);
						saveUserInfo("avatar=facebook@"+encodeURIComponent(txt));
					}
				});
			} else if(th.hasClass('tw')) {
				lgksPrompt("Your Twitter handle please","Twitter Avatar",null,function(txt) {
					if(txt!=null && txt.length>0) {
						if(txt.substr(0,1)=="@") txt=txt.substr(1);
						var lx=getServiceCMD("avatar")+"&method=twitter&authorid="+txt;
						avatar.attr("src",lx);
						saveUserInfo("avatar=twitter@"+encodeURIComponent(txt));
					}
				});
			} else if(th.hasClass('insta')) {
				lgksPrompt("Your Instagram handle please","Instagram Avatar",null,function(txt) {
					if(txt!=null && txt.length>0) {
						var lx=getServiceCMD("avatar")+"&method=instagram&authorid="+txt;
						avatar.attr("src",lx);
						saveUserInfo("avatar=instagram@"+encodeURIComponent(txt));
					}
				});
			} else if(th.hasClass('upload')) {
				//var lx = getServiceCMD('settingsUser');
			}
		});
	});
	function getUserProfile(){
		var l = getServiceCMD('settingsUser') + "&action=get-user-profile";
		processAJAXQuery(l,function(data){
			try {
				var json = $.parseJSON(data);
				if(json.Data != null) {
					json = json.Data;
					$.each(json, function(i,v){
						var input = $('input[name="'+ i +'"]',"#frmProfile"),
							select = $('select[name="'+ i +'"]',"#frmProfile"),
							textarea = $('textarea[name="'+ i +'"]',"#frmProfile");						
						
						if(input.length > 0) {
							input.val(v);
						}
						
						if(select.length > 0) {
							select.val(v);
						}
						
						if(textarea.length > 0) {
							textarea.val(v);
						}
					});
					$("#avatar",".por-sec-img").attr('src',json['avatar']);
				}
			} catch (e) {
				console.error(e.message);
			}
		});
	}
	
	function saveUserInfo(q,toShow,callBack) {
		if(typeof q=="object") q=q.join("&");
		var lx=getServiceCMD("settingsUser")+"&action=save-info";
		processAJAXPostQuery(lx,q,function(txt) {
			if(txt != 'ok'){
				lgksAlert(txt);
			} else {
				if(toShow!=null) toShow.css("opacity",1);
				if(callBack!=null) callBack();
			}
		});
	}
	
</script>