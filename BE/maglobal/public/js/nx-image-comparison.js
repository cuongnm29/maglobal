"use strict";
/**
* Library : Next Image Comparison 
* Package Name : nx-image-comparison 1 
* Version : 1.0.0 
* @release Date: 01-02-2019
*
* @Author: ThemeDev
* @URL: themedev.net
*/


/**
* Function Name : nx_image_comparison_start() 
* Package Name : nx-image-comparison 1  
* Version : 1.0.0 
* @params: idParam - 
* @return: image comparison
*
* @Author: ThemeDev
* @URL: themedev.net
*/
function nx_image_comparison(className) {
  var nx_class, toalCom;
  nx_class = document.querySelectorAll("."+className);
  for (toalCom = 0; toalCom < nx_class.length; toalCom++) {
    if(!nx_class[toalCom]){
		return false;
	}
	nx_compareImages(nx_class[toalCom]);
	
  }
  
  function nx_compareImages(img) {
	var imageName = img.querySelector('.nx-after-image');
	var imageNameBefore = img.querySelector('.nx-before-image');
	if(!imageName){
		return false;
	}
	var control, imageName, clicked = 0, nx_w, nx_h;
		
		// get next style
		var getStyle = img.getAttribute('nx-style-vertical');
		if(!getStyle){
			getStyle = 'no';
		}

		nx_w = imageName.offsetWidth;
		nx_h = imageName.offsetHeight; 

		img.style.height = nx_h + "px";
		img.style.width = nx_w + "px";
		img.style.position = "relative";
		
		
		// get defult left
		var getDefaultData = img.getAttribute('nx-default-position');
		if(!getDefaultData){
			if(getStyle == 'yes'){
				getDefaultData = (nx_h / 2);
			}else{
				getDefaultData = (nx_w / 2);
			}
		}
		
		
		control = document.createElement("div");
		
		if(getStyle == 'yes'){
			control.setAttribute("class", "nx-img-control-slider nx-vertical-style");
		}else{
			control.setAttribute("class", "nx-img-control-slider nx-horizontal-style");
		}
		
		if(getStyle == 'yes'){
			control.style.top = getDefaultData + "px";
			control.style.left = (nx_w / 2) - (control.offsetHeight / 2) + "px";
		}else{
			control.style.top = (nx_h / 2) - (control.offsetHeight / 2) + "px";
			control.style.left = getDefaultData + "px";
		}
		
		if(imageNameBefore){
			
			if(getStyle == 'yes'){
				imageNameBefore.style.clip = 'rect(0px, '+nx_w+'px, '+getDefaultData+'px, 0px)';
			}else{
				imageNameBefore.style.clip = 'rect(0px, '+getDefaultData+'px, '+nx_h+'px, 0px)';
			}
		}
		if(getStyle == 'yes'){
			imageName.style.clip = 'rect(0px, '+nx_w+'px, '+nx_h+'px, 0px)';
		}else{
			imageName.style.clip = 'rect(0px, '+nx_w+'px, '+nx_h+'px, 0px)';
		}
		// get before class
		var getBeforeClass = img.getAttribute('nx-control-before-class');
		if(!getBeforeClass){
			getBeforeClass = 'default ';
		}
		var createBerofeSpan = document.createElement('span');
		createBerofeSpan.setAttribute('class', 'nx-icon-before '+getBeforeClass);
		control.appendChild(createBerofeSpan);
		// get after class
		var getAfterClass = img.getAttribute('nx-control-after-class');
		if(!getAfterClass){
			getAfterClass = 'default ';
		}
		var createAfterSpan = document.createElement('span');
		createAfterSpan.setAttribute('class', 'nx-icon-after '+getAfterClass);
		control.appendChild(createAfterSpan);
		
		img.appendChild(control);
		
		// after text
		var getBeforeText = img.getAttribute('nx-before-text');
		if(getBeforeText){
			
			var beforeClass = img.getAttribute("nx-before-text-class");
			if(!beforeClass){
				beforeClass = '';
			}
			var createBeforeTextSpan = document.createElement('span');
			createBeforeTextSpan.setAttribute('class', 'nx-before-text '+beforeClass);
			createBeforeTextSpan.innerHTML = getBeforeText;
			img.appendChild(createBeforeTextSpan);
		}
		// after text
		var getAfterText = img.getAttribute('nx-after-text');
		if(getAfterText){
			
			var afterClass = img.getAttribute("nx-after-text-class");
			if(!afterClass){
				afterClass = '';
			}
			
			var createAfterTextSpan = document.createElement('span');
			createAfterTextSpan.setAttribute('class', 'nx-after-text '+afterClass);
			createAfterTextSpan.innerHTML = getAfterText;
			img.appendChild(createAfterTextSpan);
		}
		
		
		control.addEventListener("mousedown", nx_slideReady);
		window.addEventListener("mouseup", nx_slideFinish);
		
		control.addEventListener("touchstart", nx_slideReady);
		window.addEventListener("touchstop", nx_slideFinish);
		
		function nx_slideReady(e) {
		  e.preventDefault();
		  clicked = 1;
		 window.addEventListener("mousemove", nx_slideMove);
		 window.addEventListener("touchmove", nx_slideMove);
		}
		
		function nx_slideFinish() {
		  clicked = 0;
		}
		
		function nx_slideMove(e) {
		  event.preventDefault();
		  var pos;
		  if (clicked == 0) return false;
		  pos = nx_getCursorPos(e)
		  if (pos < 0) pos = 0;
		  if(getStyle == 'yes'){
			  if (pos > nx_h) pos = nx_h;
		  }else{
			if (pos > nx_w) pos = nx_w;
		  }
		  nx_slide(pos);
		}
		
		function nx_getCursorPos(e) {
		  event.preventDefault();
		  var a, nx_class = 0;
		  e = e || window.event;
		  a = img.getBoundingClientRect();
		  if(getStyle == 'yes'){
			  nx_class = e.pageY - a.top;
			  nx_class = nx_class - window.pageYOffset;
		  }else{
			  nx_class = e.pageX - a.left;
			  nx_class = nx_class - window.pageXOffset;
		  }
		  
		  
		  return nx_class;
		}
		
		function nx_slide(nx_class) {
		  if(imageNameBefore){
			if(getStyle == 'yes'){
				imageNameBefore.style.clip = 'rect(0px, '+nx_w+'px, '+nx_class+'px, 0px)';
			}else{
				imageNameBefore.style.clip = 'rect(0px, '+nx_class+'px, '+nx_h+'px, 0px)';
			}
		  }
		  if(getStyle == 'yes'){
			 imageName.style.clip = 'rect('+nx_class+'px, '+nx_w+'px, '+nx_h+'px, 0px)';
			 control.style.top = nx_class + "px"; 
		  }else{
			  imageName.style.clip = 'rect(0px, '+nx_w+'px, '+nx_h+'px, '+nx_class+'px)';
			  control.style.left = nx_class + "px";
		  }
		  
		}
		
  }
}
