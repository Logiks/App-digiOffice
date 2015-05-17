$(function() {
	//alert(window.screen.width+" "+window.screen.height);
	//768 1024
	
	$("body.home footer").detach();
	
	window.addEventListener("orientationchange", function() {
		if(updateOrientation()=="landscape") {
			window.location.reload();
		}
	}, false);
	updateOrientation();
	
	//$("#workspace").tabs().find( ".ui-tabs-nav" ).sortable({ axis: "x" }).disableSelection();
	//$("#workspace .ui-tabs-nav li").css("height","25px !important");
	//$("#workspace .ui-tabs-nav").hide();
	
	$("#workspace").delegate(".ui-tabs-nav a","dblclick",function(e) {
		nx=$(this).closest("li").index();
		rel=$(this).parent().find("a").attr("href");
		if(nx>0) {
			$("#sidebarmenu a[rel="+rel+"]").parent().removeClass("current");
			$("#sidebarmenu a[rel="+rel+"]").parent().removeClass("open");
			$("#sidebarmenu a[rel="+rel+"]").removeAttr("rel");
			closeTab(nx);
		}
	});
});
function updateOrientation() {
	if(window.orientation==null) return false;
	if(window.orientation==90 || window.orientation==-90) {
		$("body.home .orientationMsg").detach();
		$("body.home footer,body.home #wrapper").show();
		return "landscape";
	} else {
		$("body.home footer,body.home #wrapper").hide();
		$("body.home").append("<div class='orientationMsg ui-widget-content ui-state-default'>Sorry, <i>Potrait</i> mode is not supported. Please rotate the device to use <i>Landscape</i> mode.</div>");
		return "potrait";
	}
}