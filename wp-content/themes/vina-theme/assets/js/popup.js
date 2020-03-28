/*|-----------------------------------------------------------------------------
 *| Global Variable Initilization 
 *|----------------------------------------------------------------------------- 
 */
var formget = {"delay": "8"};
var formget_box_visible = !1;
var par_tabKey = '';
var par_tabtext = '';
var par_height = '';
var par_tabPosition = '';
var par_textColor = '';
var par_borderColor = '';
var par_fontSize = '';
var par_tabBackground = '';
var par_netWidth = '';
var par_netHeight = '';
var par_tabbed = '';
var iframe_width = '';
var tab_stat ='';
var xmlhttp;
var isMobile = false;

var heightBackup='';
var format='';
var secureUrl='https://www.formget.com/app/';

/*|-----------------------------------------------------------------------------
 *| Function to check window width on initialization
 *|----------------------------------------------------------------------------- 
 */
if (window.innerWidth <= 600) { isMobile = true; }


// form loader
 function img_loader(bgColor){
 	document.getElementById("brand_logo").insertAdjacentHTML('beforebegin', "<div id='fg-loader' class='fg_preloader'><div class='preloader-container'><span class='animated-preloader' style='background:#"+bgColor+"'></span></div></div>");
 }

/*|-----------------------------------------------------------------------------
 *| Function for Right Side formget slider
 *|----------------------------------------------------------------------------- 
 *| This function executes when right side sliding form is selected on embedding 
 *| page
 */
 function frameload(){
 if(tab_stat == 1){
 var c = document.getElementById("formget_box");
  c.style.visibility = "visible";
    }

if(par_tabPosition=='bottom' && tab_stat == 1)
 c.setAttribute('class', 'formget-animated formget-bounce-in-up');
 if(par_tabPosition=='left' && tab_stat == 1)
 c.setAttribute('class', 'formget-animated bounceInLeft');
if(par_tabPosition=='right' && tab_stat == 1)
c.setAttribute('class', 'formget-animated bounceInRight');

 if(document.getElementById("fg-loader") != null){  
 document.getElementById("fg-loader").style.display = "none";
 }
}
 
function formget_slider_tab_right(tab_d,iframe_width,par_tabKey,bgColor) {
    var c = document.getElementById("formget_box");
	/*	var ifcAttr =   c .getAttribute('ifc');
        if(ifcAttr==null || ifcAttr==false){
			img_loader(bgColor);
	}*/
    if (!1 == formget_box_visible) {
        c.style.right = "0px";
        c.setAttribute('class', 'formget-css-anim_right');
        setTimeout(function() {
            480 < window.innerWidth;
			PopupRight(tab_d,iframe_width,par_tabKey);
        }, 500);
        formget_box_visible = !0;
    } else {
        c.style.right = "-" + (parseInt(par_netWidth) + 15) + "px";
        formget_box_visible = !1;
    }
}

/*|-----------------------------------------------------------------------------
 *| Function for Left Side formget slider
 *|----------------------------------------------------------------------------- 
 *| This function exectes when Left side sliding form is selected on embedding
 *| page
 */
function formget_slider_tab_left(tab_d,iframe_width,par_tabKey,bgColor) {
    var c = document.getElementById("formget_box");
		 var ifcAttr =   c .getAttribute('ifc');
        if(ifcAttr==null){
			img_loader(bgColor);
	}
    if (!1 == formget_box_visible) {
        c.style.left = "0px";
        c.setAttribute('class', 'formget-css-anim_left');
        setTimeout(function() {
            480 < window.innerWidth;
			PopupLeft(tab_d,iframe_width,par_tabKey);
        }, 500);
        formget_box_visible = !0;
    } else {
        c.style.left = "-" + (parseInt(par_netWidth) + 15) + "px";
        formget_box_visible = !1;
    }
}


/*|-----------------------------------------------------------------------------
 *| Function for Bottom formget slider
 *|----------------------------------------------------------------------------- 
 *| This function exectes when bottom sliding form is selected on embedding page
 */
function formget_slider_tab_bottom(tab_d,iframe_width,par_tabKey,bgColor) {
    var c = document.getElementById("formget_box");
		 var ifcAttr =   c .getAttribute('ifc');
        if(ifcAttr==null){
			img_loader(bgColor);
	}
    if (!1 == formget_box_visible) {
        c.style.bottom = "0px";
        c.setAttribute('class', 'formget-css-anim_bottom');
        setTimeout(function() {
            480 < window.innerWidth;
			 PopupBottom(tab_d,iframe_width,par_tabKey);
        }, 500);
        formget_box_visible = !0;
    } else {
        c.style.bottom = "-" + (par_height - 37) + "px";
        formget_box_visible = !1;
    }
}


function PopupBottom(tab_d,iframe_width,par_tabKey){
     var c = document.getElementById("formget_box");
     var ifcAttr =   c .getAttribute('ifc');
        if(ifcAttr==null){
       c.setAttribute("ifc", true);
    var makediv = document.getElementById("brand_logo");
    var makeIframe="<iframe onload='frameload()' height='100%' allowTransparency='true' frameborder='0' scrolling='yes' width='100%' style='border:none' src='" + secureUrl + tab_d + "?w=" + (iframe_width + 65) + "'>Your Contact </iframe>";
    makediv.insertAdjacentHTML('beforebegin', makeIframe);
	brand_footer_logo(par_tabKey, secureUrl);
	//document.getElementById("fg-loader").style.display='none';
             }
}
function PopupLeft(tab_d,iframe_width,par_tabKey){
     var c = document.getElementById("formget_box");
     var ifcAttr =   c .getAttribute('ifc');
        if(ifcAttr==null){
       c.setAttribute("ifc", true);
    var makediv = document.getElementById("brand_logo");
    var makeIframe="<iframe onload='frameload()' height='100%' allowTransparency='true' frameborder='0' scrolling='yes' width='100%' style='border:none;overflow-x:hidden;' src='" + secureUrl + tab_d + "?w=" + (iframe_width + 28) + "'>Your Contact </iframe>";
    makediv.insertAdjacentHTML('beforebegin', makeIframe);
	brand_footer_logo(par_tabKey, secureUrl);
	//document.getElementById("fg-loader").style.display='none';
             }
}

function PopupRight(tab_d,iframe_width,par_tabKey){
     var c = document.getElementById("formget_box");
     var ifcAttr =   c .getAttribute('ifc');
        if(ifcAttr==null){
       c.setAttribute("ifc", true);
    var makediv = document.getElementById("brand_logo");
    var makeIframe="<iframe onload='frameload()' height='100%' allowTransparency='true' frameborder='0' scrolling='yes' width='100%' style='border:none;overflow-x:hidden;' src='" + secureUrl + tab_d + "?w=" + (iframe_width + 22) + "'>Your Contact </iframe>";
        makediv.insertAdjacentHTML('beforebegin', makeIframe);
		brand_footer_logo(par_tabKey, secureUrl);
		//document.getElementById("fg-loader").style.display='none';
             }
}


/*|-----------------------------------------------------------------------------
 *|  Init function creates elements and initalize attributes inside 'formget_box'
 *|----------------------------------------------------------------------------- 
 *|  This function calls animate_formget which creates every element inside
 *|  'formget_box'
 */
function init(par_tabPosition, par_getHeight, par_netWidth, tab_d, iframe_width, par_tabKey) {
    setTimeout(function(){animate_formget(par_tabPosition, par_getHeight, par_netWidth, tab_d, iframe_width, par_tabKey);}, 500 * formget.delay);
    //  Hack to make iframe to scroll in Apple Devices
    if (/iPhone|iPod|iPad/i.test(navigator.userAgent)) {
        var wrapperId = "formget-wrapper_" + par_tabPosition;
        document.getElementById(wrapperId).style["webkit" + 'OverflowScrolling'] = "touch";
        document.getElementById(wrapperId).style.overflowY = "scroll";
    }
}

function animate_formget(par_tabPosition, par_getHeight, par_netWidth, tab_d, iframe_width, par_tabKey) {
    var c = document.getElementById("formget_box");
    var b = document.getElementById("formget-header_" + par_tabPosition);
    var wrapper_r = document.getElementById("formget-wrapper_" + par_tabPosition);
    var inc_width = par_netWidth + 50;
    var l_r_par_height = 0;
    tab_open_close(par_tabKey, secureUrl);
	
    if(par_tabPosition != "bottom"){
        if( window.innerHeight < parseInt(par_height) ){
            l_r_par_height = 80;
            par_getHeight = 10;
            format = '%';
        }else{ 
            l_r_par_height = parseInt(par_height);
            format = 'px';
        }
    }else{
        if (!(parseInt(par_height) > window.innerHeight)) {
            l_r_par_height = parseInt(par_height);
        }
    }
    
    if (par_tabPosition == 'right') {
       // c.style.visibility = "visible";
        c.style.width = (inc_width + 5) + 'px';
        c.style.height = l_r_par_height + format;
        wrapper_r.style.width = ((inc_width - 59)) + 'px';
        b.style.width = '20px';
		if(tab_stat == 0 || tab_stat == ''){
			480 < window.innerWidth;
			PopupRight(tab_d,iframe_width,par_tabKey);
			c.setAttribute("ifc", false);
			c.style.visibility = "visible";
            c.style.right = "-" + (parseInt(par_netWidth) + 15) + "px";
			c.setAttribute('class', 'formget-animated bounceInRight');
		}else{
			c.style.right = "0px";
		    c.setAttribute('class', 'formget-css-anim_right');
            setTimeout(function() {
            480 < window.innerWidth;
			PopupRight(tab_d,iframe_width,par_tabKey);
            }, 500);
		    formget_box_visible = !0;
		}
        c.style.top = par_getHeight + format;
        tab_alignment();
      //  c.setAttribute('class', 'formget-animated bounceInRight');
    }
    else if (par_tabPosition == 'left') {
       // c.style.visibility = "visible";
        c.style.width = (inc_width + 5) + 'px';
        c.style.height = l_r_par_height + format;
        wrapper_r.style.width = ((inc_width - 54)) + 'px';
        b.style.width = '20px';
		if(tab_stat == 0 || tab_stat == ''){
			c.style.visibility = "visible";
           c.style.left = "-" + (parseInt(par_netWidth) + 15) + "px";
		   c.setAttribute('class', 'formget-animated bounceInLeft');
		} 
		else{
			c.style.left = "0px";
			c.setAttribute('class', 'formget-css-anim_left');
		    setTimeout(function() {
            480 < window.innerWidth;
			  PopupLeft(tab_d,iframe_width,par_tabKey);
            }, 500);
		    formget_box_visible = !0;
		}
        c.style.top = par_getHeight + format;
        tab_alignment();
       // c.setAttribute('class', 'formget-animated bounceInLeft');
    }
    else if (par_tabPosition == 'bottom') {
     //   c.style.visibility = "visible";
        if( window.innerWidth > 400 ){ c.style.width = (inc_width + 10) + 'px'; }
        else{ c.style.width = '90%'; c.style.right = '15px'; }
        if( window.innerHeight < parseInt(par_height) ){
            if( (80 / 100) * window.innerHeight >= 650 )
                par_height = par_getHeight = 650;
            else
                par_height = par_getHeight = ( 80 / 100 ) * window.innerHeight;
        }
        else{ 
            if(par_height >= 650 ){ par_height = par_getHeight = 650; }
            else { par_getHeight = par_height; }
        }
        c.style.height = par_getHeight + 'px';
		if(tab_stat == 0 || tab_stat == ''){
		 c.style.visibility = "visible";
          c.style.bottom = "-" + (par_getHeight - 37) + 'px';
		  c.setAttribute('class', 'formget-animated formget-bounce-in-up');
		}
		else{
		  c.style.bottom = "0px";
		  c.setAttribute('class', 'formget-css-anim_bottom');
          setTimeout(function() {
            480 < window.innerWidth;
			 PopupBottom(tab_d,iframe_width,par_tabKey);
           }, 500);
		  formget_box_visible = !0;
		}
        wrapper_r.style.height = (par_getHeight - 32) + 'px';
        //c.setAttribute('class', 'formget-animated formget-bounce-in-up');
    }
}

/*|-----------------------------------------------------------------------------
 *| This is first function which is called at embedding script on webpage
 *|----------------------------------------------------------------------------- 
 *| This function exectes when embedding form on webpage. It do all the initilization
 *| of global variables.
 */
function buildTabbed() {
// to store this reference into new var
var ele = this;
 loadajax(secureUrl + "custom/tab_server", "123", false, function(){
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    formget_site_base_url = secureUrl;
    //  This gets all the options from embed script for form and create form
    //  This is second function called implicitely from embed script      
    ele.initializeOption = function(params) {
        par_tabKey = params['tabKey'];
        par_tabtext = params['tabtext'];
        par_height = params['height'];
        par_tabPosition = params['tabPosition'];
        par_textColor = params['textColor'];
        par_borderColor = params['tabBackground'];
        par_fontSize = params['fontSize'];
        par_tabBackground = params['tabBackground'];
        par_netWidth = params['width'];
        par_tabbed = params['tabbed'];
        
        heightBackup = par_height;
        /* 'tabbed' is explicitily send when customer ask for header and footer in sliding form */
        if (par_tabbed == '1') {
            //  The below calculation is done to make form of 350px including outer frame and toggle button
            par_netWidth = par_netWidth - 50;
            iframe_width = (par_netWidth - 80);
            tab_d = 'forms/view/' + par_tabKey + '/d';
        } else {
		 // change 			
            par_netWidth = par_netWidth - 50;
            iframe_width = (par_netWidth - 80);
            tab_d = 'embed/form/' + par_tabKey + '/s';
        }

        /* Creating div('#formget_box') for sliding form and setting attribute */
        var body = document.getElementsByTagName('body')[0];
        var slide_div = document.createElement('div');
        slide_div.setAttribute('id', 'formget_box');
        slide_div.setAttribute('data-class', 'fg_slide_' + par_tabPosition);
        window_height = window.innerHeight;
        par_netHeight = (window_height - par_height) / 2;

        /* Below conditions generate form inside '#formget_box' div created above  */
        if (par_tabPosition === 'right') {
            slide_div.innerHTML = "<div id='formget-header_right' class='formget-header_right' onclick='formget_slider_tab_right(tab_d,iframe_width,par_tabKey,par_tabBackground)'><span class='formget-header-title_right'><img src='" + formget_site_base_url + "code/contact_tab?c=" + par_tabtext + "&t_color=" + par_textColor + "&b_color=" + par_borderColor + "&f_size=" + par_fontSize + "&t_pos=" + par_tabPosition + "' alt='form'  /><p class='chat-right'><img src='" + formget_site_base_url + "app_data/dashboard-embed/images/chat-icon.png' alt='chat-icon' ></p></span></div><div id='formget-wrapper_right' class='formget-wrapper_right'><span class='form-slide-close' onclick='formget_slider_tab_right(tab_d,iframe_width,par_tabKey);' ontouchstart='formget_slider_tab_right(tab_d,iframe_width,par_tabKey);'></span><span id='brand_logo'></span></div>";
            body.appendChild(slide_div);
            tab_background_color(par_tabBackground, par_tabPosition);
            init(par_tabPosition, par_netHeight, par_netWidth, tab_d, iframe_width, par_tabKey);
        }
        else if (par_tabPosition === 'left') {
            slide_div.innerHTML = "<div id='formget-header_left' class='formget-header_left' onclick='formget_slider_tab_left(tab_d,iframe_width,par_tabKey,par_tabBackground)'><span class='formget-header-title_left'><img src='" + formget_site_base_url + "code/contact_tab?c=" + par_tabtext + "&t_color=" + par_textColor + "&b_color=" + par_borderColor + "&f_size=" + par_fontSize + "&t_pos=" + par_tabPosition + "' alt='form'  /><p class='chat-left'><img src='" + formget_site_base_url + "app_data/dashboard-embed/images/chat-icon.png' alt='chat-icon' ></p></span></div><div id='formget-wrapper_left' class='formget-wrapper_left'><span class='form-slide-close' onclick='formget_slider_tab_left(tab_d,iframe_width,par_tabKey);' ontouchstart='formget_slider_tab_left(tab_d,iframe_width,par_tabKey);'></span><span id='brand_logo'></span></div>";
            body.appendChild(slide_div);
            tab_background_color(par_tabBackground, par_tabPosition);
            init(par_tabPosition, par_netHeight, par_netWidth, tab_d, iframe_width, par_tabKey);
        }
        else if (par_tabPosition === 'bottom') {
            slide_div.innerHTML = "<div id='formget-header_bottom' class='formget-header_bottom' onclick='formget_slider_tab_bottom(tab_d,iframe_width,par_tabKey,par_tabBackground);'><span class='formget-header-title_bottom'><img src='" + formget_site_base_url + "code/contact_tab?c=" + par_tabtext + "&t_color=" + par_textColor + "&b_color=" + par_borderColor + "&f_size=" + par_fontSize + "&t_pos=" + par_tabPosition + "' alt='form'  /><p class='chat-bottom'><img src='" + formget_site_base_url + "app_data/dashboard-embed/images/chat-icon.png' alt='chat-icon' ></p></span></div><div id='formget-wrapper_bottom' class='formget-wrapper_bottom'><span id='brand_logo'></span></div>";
            body.appendChild(slide_div);
            tab_background_color(par_tabBackground, par_tabPosition);
            if (parseInt(par_height) > window.innerHeight && window.innerHeight < 600 ) {
                par_height = (80 / 100) * window.innerHeight;
            }
            init(par_tabPosition, par_height, par_netWidth, tab_d, iframe_width, par_tabKey);
        }
    },
            //  This function includes style.css in head section of embedded script webpage 
            //  This is Third function called implicitely from embed script
            ele.loadContent = function() {
                var head = document.getElementsByTagName('head')[0];
                var link = document.createElement('link');
                link.setAttribute("rel", "stylesheet");
                link.setAttribute("href", secureUrl + 'app_data/new-widget/style.css');
                link.setAttribute("type", "text/css");
                head.appendChild(link);
            },
			ele.buildHtml = function(){}
			}
	 });
}

/*|-----------------------------------------------------------------------------
 *| Function sets background color for Toogle button (Form sliding Button)
 *|----------------------------------------------------------------------------- 
 *| Called from inside of tabposition condition in 'initializeOption' function
 */
function tab_background_color(par_tabBackground, par_tabPosition) {
    var b = document.getElementById("formget-header_" + par_tabPosition + "");
    b.style.backgroundColor = "#" + par_tabBackground;
	(function(){
    if (window.addEventListener){
        window.addEventListener("resize", callOnResize,false);
    } else if (window.attachEvent){
        window.attachEvent("resize", callOnResize,false);
    }
})();
}


/*|-----------------------------------------------------------------------------
 *| Functions to fetch from color theme from database via ajax  
 *|----------------------------------------------------------------------------- 
 *| This function fetches color for background of sliding form to fill backgound
 *| color between sliding form frame and iframe.
 */
function loadajax(url, fid, asyn, func){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = func;
    xmlhttp.open("POST", url, asyn);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("fid=" + fid);
}

function brand_footer_logo(fid, form_url) {
    loadajax(form_url + "custom/new_tabbed_brand_retrieve", fid, true,function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("brand_logo").innerHTML = xmlhttp.responseText;
        }
    });
}

function tab_open_close(fid, form_url) {
	loadajax(form_url + "custom/new_tabbed_open_close", fid, false,function()
    {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		  tab_stat = xmlhttp.responseText.trim();
		  }
		
    });
}

/*|-----------------------------------------------------------------------------
 *| Function for creating Tab Title (Toggle button text)  
 *|----------------------------------------------------------------------------- 
 *| This function creates title for Toggle Button(Form Sliding Button)
 */
function tab_alignment() {
    var box_inner = parseInt(document.getElementById('formget_box').style.height);
    var left_rigth_header = document.getElementById('formget-header_' + par_tabPosition);
    if (box_inner > 600) { box_inner = 600; }
    var newImg = new Image();
    newImg.src = secureUrl + 'code/contact_tab?c=' + par_tabtext + '&t_color=ffffff&b_color=17B86F&f_size=16&t_pos=left';
    newImg.onload = function() {
        var height_diff = 0;
        var tab_height = newImg.height;
        tab_height = parseInt(tab_height);
        if (format == '%') { height_diff = 50; }
        else{ height_diff = (box_inner - tab_height) / 2; }
        left_rigth_header.style.marginTop = height_diff + format;
    };
}

/*|-----------------------------------------------------------------------------
 *| Function Trigger on window resize  
 *|----------------------------------------------------------------------------- 
 *| This function checks for height, width and window size and then arrange
 *| and resize form accordingly.
 */
function callOnResize(){ 
	if(par_tabPosition == 'bottom'){
            var box = document.getElementById('formget_box');
            var wrapper = document.getElementById('formget-wrapper_bottom');
            if( window.innerWidth <= 400 ){
                box.style.width='90%';
                box.style.right='10px';
                if(parseInt(heightBackup) >= window.innerHeight){
                    wrapper.style.height = (((90/100) * window.innerHeight) - 40) + "px"; 
                    box.style.height = ((90/100) * window.innerHeight) + "px";
                    par_height = (((90/100) * window.innerHeight));
                    if(box.style.bottom != '0px'){ box.style.bottom = (-(((90/100) * window.innerHeight) - 38)) + "px"; }
                    else{ box.style.bottom = '0px'; }
                }else{
                    par_height = heightBackup;
                    wrapper.style.height = (par_height - 40) + "px"; 
                    box.style.height = par_height + "px";
                    if(box.style.bottom != '0px'){ box.style.bottom = (-(par_height - 38)) + "px"; }
                    else{ box.style.bottom = '0px'; }
                }
            }else{
                box.style.width='350px';
                if (parseInt(heightBackup) >= window.innerHeight) {
                    if( ((80 / 100) * window.innerHeight) >= 650 )
                        par_height = 650;
                    else
                        par_height = (80 / 100) * window.innerHeight;
                    box.style.height = par_height + "px";
                    wrapper.style.height = (par_height - 32) + "px";
                    if(box.style.bottom != '0px')
                        box.style.bottom = (-(par_height - 38)) + "px";
                    else
                        box.style.bottom = '0px';
                }else{
                    if(heightBackup >= 650)
                        par_height = 650;
                    else
                        par_height = heightBackup;
                    box.style.height = par_height + "px";
                    wrapper.style.height = (par_height - 32) + "px";
                    if(box.style.bottom != '0px')
                        box.style.bottom = (-(par_height - 38)) + "px";
                    else
                        box.style.bottom = '0px';
                }
            }
    }else{
            var box_inner = document.getElementById('formget_box').clientHeight;
            var left_rigth_header = document.getElementById('formget-header_' + par_tabPosition);
            switch(window.innerHeight <= heightBackup){
                case true:
                    document.getElementById('formget_box').style.top='0%';
                    if( (80 / 100) * window.innerHeight >= 650 )
                        document.getElementById('formget_box').style.height='650px';
                    else
                        document.getElementById('formget_box').style.height='80%';
                    break;
                case false:
                    document.getElementById('formget_box').style.height=heightBackup+'px';
                    document.getElementById('formget_box').style.top=((window.innerHeight - par_height) / 2) +'px';
                    break;
            }
            box_inner=document.getElementById('formget_box').clientHeight;
            var height_diff = 0;
            var tab_height = left_rigth_header.clientHeight;
            tab_height = parseInt(tab_height);
            if (tab_height < box_inner) {   height_diff = (box_inner - tab_height) / 2; }
            left_rigth_header.style.marginTop = height_diff + 'px';
    }
}