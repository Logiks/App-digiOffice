var frame=null;
$(function() {
	initUI("body");
	$("body").append("<iframe id='targetFrame007' name='targetFrame007' style='display:none;visibility: hidden;'></iframe>");
	initUILinks();
	
	$(document).keydown(function(e) {
			if(e.keyCode==27 && $("#navBar").is(":visible")) {
				top.toggleNavPanel();
			} else if(e.keyCode==27 && $("#helpPanel").is(":visible")) {
				top.toggleHelpPanel();
			} else if(e.keyCode==112) {
				e.preventDefault();
				top.toggleHelpPanel();
			} else if(e.keyCode==113) {
				top.toggleNavPanel();
			} else if(e.keyCode==114) {
				e.preventDefault();
				top.$("#searchBox input").focus();
			}
			//console.log(e);
		});
});
function initUILinks() {
	$("body").delegate("a.docpopup[href]","click",function(e) {
		e.preventDefault();
		title=$(this).text();
		frame=parent.lgksOverlayFrame($(this).attr("href")+"&popup=true",title);
	});
	$("body").delegate("a.email[href]","click",function(e) {
		e.preventDefault();
		href=$(this).attr("href");
		if(href==null || href.length<=0) return;
		if(typeof $.mailform=="function") {
			href=href.replace("email:","");
			href=href.replace("mailto:","");
			$.mailform(href,"","");
		} else {
			$("#targetFrame007").attr("src",href);
		}
	});
	$("body").delegate("a.mobile[href],a.phone[href],a.telephone[href]","click",function(e) {
		e.preventDefault();
		href=$(this).attr("href");
		if(href==null || href.length<=0) return;
		if(!isNaN(href) && href.length>9 && href.length>15) {
			if(typeof $.smsform=="function") {
				href=href.replace("tel:","");
				$.smsform(href,"");
			} else {
				$("#targetFrame007").attr("src",href);
			}	
		}
	});
	$("body").delegate(".userProfile[rel]","click",function() {
			rel=$(this).attr("rel");
			title=$(this).text();
			lx=_link("modules")+"&mod=profileUser&popup=true&refid="+rel;
			lgksOverlayFrame(lx,"Profile : "+title);
		});
	$("body").delegate(".dataLink[rel]","click",function(e) {
			e.preventDefault();
			rel=$(this).attr("rel");
			title=$(this).text();
			lx=getServiceCMD("dataLinks")+"&action=gotoLink&popup=true&dl="+rel;
			lgksOverlayFrame(lx,"Preview :: "+title.toTitle());
		});
}
function initUI(ui) {
	$(".buttonset").buttonset();
	if(typeof ghosttext=="function") $(".ghosttext").ghosttext();

	$("button:not(.nostyle)",ui).button();
	$("select:not(.nostyle)",ui).addClass("ui-widget-header ui-corner-all");
	$(".datepicker",ui).datepicker();
	$("slider",ui).slider();
	$("draggable",ui).draggable();
		
	$("accordion",ui).accordion({
			fillSpace: true
		});

	$(".tabs",ui).tabs();
}
function activateClickMenu(div,multi) {
	if(multi==null) multi=false;
	$(div).delegate("a","click",function(e) {
		e.preventDefault();
		var r=$(this).attr("href");

		$("#sidebarmenu li.current").addClass("open");
		$("#sidebarmenu li.current").removeClass("current");
		
		if($(this).attr("rel")!=null && !multi) {
			$(this).parent("li").addClass("current");
			$("#sidebarmenu li.current").addClass("open");
			$("#workspace").tabs('select', $(this).attr("rel"));
		} else if(r!=null && r.length>0 && r!="#" && r!="##") {
			$(this).parent("li").addClass("current");
			$("#sidebarmenu li.current").addClass("open");
			openLink(this);
			rel=$($("#workspace .ui-tabs-nav").children()[$("#workspace").tabs('option', 'selected')]).
				find("a").attr("href");
			$(this).attr("rel",rel);
			$("#workspace .ui-tabs-nav>li:last>a").click(function() {
				$("#sidebarmenu li.current").removeClass("current");
				rel=$(this).parent().find("a").attr("href");
				$("#sidebarmenu a[rel="+rel+"]").parent("li").addClass("current");
			});
		} else return false;
	});
}
function mailDiv(divBox,subject,emailto) {
	div=divBox.clone();
	div.find("script").detach();
	div.find(".noprint").detach();
	$.mailform(emailto,subject,div.html());
}
//Extra Enviroment Functions
function openMailPad(mailto,subject,body,attach) {
	if(typeof $.mailform == "function") {
		$.mailform(mailto,subject,body);
	} else {
		if(body.length>500) {
			win = window.open("mailto:"+mailto+"?subject="+subject+"&body="+body,"Email Window");
			if (win && win.open &&!win.closed) win.close();
		} else {
			src=_link("modules&mod=mailpad");
			if(mailto!=null && mailto.length>0) src+="&mailto="+mailto;
			if(subject!=null && subject.length>0) src+="&subject="+subject;
			if(body!=null && body.length>0) src+="&body="+escape(body);
			if(attach!=null && attach.length>0) src+="&attach="+attach;
			//alert(src);
			openInNewTab("MailPad", src);
		}
	}
}
