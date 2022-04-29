/**
 * Created by ThemeVan.
 * SimpleKey Jquery functions.
 */
jQuery(function () { 
  /*Loading HomePage*/
  //var MobileDetect_loading = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
  if(isLoad==1){
    jQuery('body').jpreLoader({
		loaderVPos: '50%'
	});
  } 
});
 
jQuery(document).ready(function(){
	
  function initPrimaryNavi(){
	   /*Fix the primary navi when scrolling*/
	   jQuery("#primary-menu").sticky({topSpacing:0});
	   
       /*Sub menu*/
	   menulink=jQuery('#primary-menu-container li');
	   menulink.each(function(){
			jQuery(this).mouseover(function(){
			 jQuery(this).children('ul.sub-menu').show();
			 jQuery(this).children('ul.sub-menu li a').animate({paddingLeft:'18px'},'fast','linear');
			});
			jQuery(this).mouseout(function(){
			 jQuery(this).children('ul.sub-menu').hide();
			 jQuery(this).children('ul.sub-menu li a').animate({paddingLeft:'15px'},'fast','linear');
			});
	   });
	   
	   /*Mobile menu*/
	   /*jQuery('#mobile-menu').click(function(){
		 var menulist=jQuery(this).children('ul#menulist');
		 if(menulist.css('display')=='none'){
			menulist.show();
			menulist.html(jQuery('#primary-menu-container ul').html());
		 }else{
			menulist.hide();
		 }
	   });
	   jQuery('#mobile-menu li a').click(function(){
	        jQuery('ul#menulist').hide();
	   });*/
	   /*Mobile menu*/
	   /*jQuery('#mobileMenu').html(jQuery('#primary-menu-container').html());
	   jQuery('#mobileMenu').mobileMenu({
				defaultText: 'Navigate to...',
				className: 'select-menu',
				subMenuDash: '&nbsp;&nbsp;'
	   });
	   jQuery(".select-menu").each(function(){  
			jQuery(this).wrap('<div class="css3-selectbox">');
	   });
	   jQuery('#primary-menu-container li').each(function() {
			var i=1;
			if(jQuery(this).hasClass('none')) {
			  jQuery(this).remove();
			}
		});*/
	   
   }initPrimaryNavi();
   
   /*Init Portfolio block*/
   jQuery('.overlay').hide();
   function initPortfolioBlocks(){
       var MobileDetect = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
	   if(MobileDetect) {
	      jQuery(window).load(function(){
	           jQuery('.portfolio-item').fadeIn();
	      });
	      jQuery('.portfolio-item').click(function(){
	           var permalink=jQuery(this).find('.info').attr('href');
	           jQuery(this).attr('href',permalink);
	           location.href=permalink;
	      });
	   }else{
		   /*Show Portfolios detail*/
		   function portfolioHoverIn(){
			   jQuery(this).children('.overlay').fadeIn(200);
			   jQuery(this).children('.tools').fadeIn(200);
		   }
		   /*Hide Portfolios detail*/
		   function portfolioHoverOut(){
			   jQuery(this).children('.overlay').fadeOut();
			   jQuery(this).children('.tools').fadeOut();
		   }
	           jQuery('.portfolio-item').hoverIntent({
				 sensitivity: 2,
				 interval: 20,
				 over: portfolioHoverIn,
				 timeout: 0,
				 out: portfolioHoverOut
		   });
	   }
	   
	   //init isotope
	   jQuery('.portfolios').isotope({ 
          itemSelector: '.portfolio-item',
		  animationEngine: 'css'
	   });
	   jQuery('#filter a').click(function(){
		  var selector = jQuery(this).attr('data-filter');
		  jQuery('.portfolios').isotope({ 
		    filter: selector
		  });
		  jQuery(this).parent().attr('class','filter_current');
		  jQuery(this).parent().siblings().removeAttr('class');
		  return false;
		});
		
		//Set Portfolio Height on Mobile
		if(MobileDetect) {
		var portfolioWidth=jQuery('.portfolio-item').width();
		jQuery('.portfolio-item').css('height',portfolioWidth+'px')
		}
		
		//Ajax load content
		if(MobileDetect) {
			//do something for mobile
			/*V!11052013*/
			jQuery('.portfolio-item').each(function(){
				var myhref = jQuery(this).attr('data-urlnoajax');
				jQuery(this).find('a.overlay').attr('href', myhref );
				jQuery(this).find('a.overlay').removeClass('ajax');
				jQuery(this).find('.tools span .zoomin').css({'display':'none'})
			});
		}else{
			jQuery('.portfolio-item a.ajax').add('.zoomin').click(function(){
			 var url=jQuery(this).parent().attr('data-url');
			 if(url!==''){
				//jQuery("body").getNiceScroll().hide();
				portfolioTop = jQuery(this).parent().offset().top;
				jQuery("#ajax-load").slideDown();
				ajaxload('#ajax-content',url,'#portfolio-single');
				//Load effects
				//jQuery('.flexslider').flexslider();
			 }
			});
		}
			jQuery("#ajax-load #close").click(function(){
				jQuery('html,body').animate({scrollTop:portfolioTop-100},'slow');
				jQuery("#ajax-load").slideUp();
				jQuery('#ajax-content').html('');
				//jQuery("body").getNiceScroll().show();
			});
		
   }initPortfolioBlocks();
   
   /*Init Team block*/
   function initTeamBlocks(){
	   /*Show Portfolio's detail*/
	   function TeamHoverIn(){
		   jQuery(this).children('.overlay').fadeIn();
	   }
	   /*Hide Portfolio's detail*/
	   function TeamHoverOut(){
		   jQuery(this).children('.overlay').fadeOut();
	   }
	   jQuery('.member .avatar').hoverIntent({
			 sensitivity: 2,
			 interval: 100,
			 over: TeamHoverIn,
			 timeout: 0,
			 out: TeamHoverOut
	   })
   }initTeamBlocks();
	
   function initPageScroll(){
	   /*Smooth Scroll to section*/
	   jQuery.localScroll({
		target:'body',
		offset: {left: 0, top: -65}
	   });
	   
	 //Detecting page scroll and set the navigation link active status
	jQuery(window).scroll(function() {

        /*/ Fix scrolling in Chrome
        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
        if (window.location.hash && isChrome) {
            setTimeout(function () {
                var hash = window.location.hash;
                window.location.hash = "";
                window.location.hash = hash;
            }, 300);
        }*/

		var currentNode = null;
		jQuery('.page-area').each(function(){
			var currentId = jQuery(this).attr('id');	
			if(jQuery(window).scrollTop() >= jQuery('#'+currentId).offset().top - 79)
			{
				currentNode = currentId;
			}
		});
		jQuery('#primary-menu li').removeClass('current-menu-item').find('a[href="#'+currentNode+'"]').parent().addClass('current-menu-item');
	});
	   
	 
   }initPageScroll();
   
   /*Flex slider*/
   /*jQuery('.flexslider').flexslider();*/
   
   /*Display the slider background on mobile & tablet*/
   jQuery(window).load(function() {
	   if(jQuery(window).width() <= 1024 && jQuery(window).width() >= 768) {
		 replaceSliderBg('data-ipad');
	   }
	   if(jQuery(window).width() <= 640) {
		 replaceSliderBg('data-mobile');
	   }
   });
   
   function replaceSliderBg(data){
     jQuery('.slide_bg').each(function() {
         var newSrc=jQuery(this).children('img').attr(data);
	     if(newSrc!==''){
           jQuery(this).children('img').attr('src',newSrc);
	     }
     });
   }
   
   /*Lightbox*/
   jQuery('a.lightbox').colorbox({
	  maxWidth:"98%"
   });
   jQuery('.attachment a').colorbox({
	  maxWidth:"98%"
   });
   jQuery('.gallery-icon a').colorbox({
	  maxWidth:"98%"
   });
   
   /*Lazyload*/
   if (navigator.platform == "iPad") return;
   jQuery("img").lazyload({
       effect:"fadeIn",
       placeholder: pixel
   });
   
   /*Placeholder for IE*/
   jQuery("input, textarea").placeholder();
   
   /*Display back to top button*/
	jQuery(window).scroll(function(){
	  if(jQuery(document).scrollTop()==0){
		  jQuery('#backtoTop').hide();
	  }else{
	      jQuery('#backtoTop').show();
	  }
	});
	/*Back to Top*/
	jQuery('#backtoTop').click(function(){
		jQuery('html,body').animate({scrollTop:0},'slow');
		return false;

	});
   
   /*Ajax load*/
   function ajaxload(id,url,object) { 
	jQuery(id).addClass("loader"); 
	jQuery.ajax({ 
		type: "get", 
		url: url, 
		cache: false, 
		error: function() {(id).html('Loading error!');}, 
		success: function(data) { 
			jQuery(id).removeClass("loader"); 
            jQuery("body").css({"overflow":"hidden"});
			jQuery("#ajax-load").css({"overflow":"auto"});
			//jQuerycontent=jQuery(data).find(object).html();
			//jQuery(id).append(jQuerycontent);
			
			//alert(data);
			jQuery('#ajax-content').html(data);
			
			jQuery('.attachment a').colorbox({maxWidth:"98%"});
            jQuery('#ajax-content .gallery-icon a').colorbox({ maxWidth:"98%"});
            jQuery('#ajax-content a.lightbox').colorbox({ maxWidth:"98%"});
		}
	}); 
   }
})