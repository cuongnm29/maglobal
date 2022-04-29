/**
 * Created by ThemeVan.
 * Common Shortcode scripts.
 */
 
jQuery(document).ready(function($){
	 
	 //Toggle block
     jQuery('.toggle .toggle_title').toggle(
	    function(){
	         if(jQuery(this).children('span').attr('class')=='off'){
			   jQuery(this).next().slideDown();
			   jQuery(this).children('span').attr('class','on');
			 }else{
			   jQuery(this).next().slideUp();
			   jQuery(this).children('span').attr('class','off');
			 }
		},
		function(){
		     if(jQuery(this).children('span').attr('class')=='off'){
			   jQuery(this).next().slideDown();
			   jQuery(this).children('span').attr('class','on');
			 }else{
			   jQuery(this).next().slideUp();
			   jQuery(this).children('span').attr('class','off');
			 }
		}
	 );
	 
	 //Tabs
	 jQuery('.tab_box').each(function(){
	     var tabTitle = ".tab_items ul li";
		 var tabContent = '.tab_content .tab';
		 jQuery(this).find(tabTitle + ":first").addClass("cur");
		 jQuery(this).find(tabContent).not(":first").hide();
		 jQuery(tabTitle).unbind("click").bind("click", function(){
			 jQuery(this).siblings("li").removeClass("cur").end().addClass("cur");
			 var index = jQuery(tabTitle).index( jQuery(this) );
			 jQuery(tabContent).eq(index).siblings(tabContent).hide().end().fadeIn("slow");
		 });
	 })
	
})