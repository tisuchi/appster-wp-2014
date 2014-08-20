$(document).ready(function(){

	
	$(function() {
		$("#et-sidemenu").treeview({
			collapsed: true,
			animated: 70,
			control:"#sidetreecontrol",
			persist: "location"
		});
	});
	

	
	$(".et-sections > div").waypoint(function(){
		var cur = $(this).data("sidemenu");
		$("#et-sidemenu span").removeClass("active");
		$("#et-sidemenu").find("a[data-sidemenu='" + cur + "']").parent("span").addClass("active");
	}, { offset: 100 });
	
	
	




	
	$("#et-sidemenu > li").click(function(){
		$("#et-sidemenu > li > span").css("background","#2A4451");
		$("#et-sidemenu > li > ul").hide();
		$(this).children("ul").show();
		$(this).children("span").css("background","#66C1F0");
	});
	
	
	
});

