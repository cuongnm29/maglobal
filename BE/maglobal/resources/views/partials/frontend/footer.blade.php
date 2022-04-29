<footer id="footer">
    <div class="wrapper">
        <!-- footer left -->
        <div class="footer-l">
            <div class="custom">
                <div>Copyright 2013 Simple<strong>Key</strong> All right reserved <br /> Designed by <a
                        href="http://www.themevan.com" target="_blank" title="Premium WordPress Themes">ThemeVan.</a>
                    Joomla version by <a href="http://www.themeforest.net/user/htmgarcia">htmgarcia</a></div>
            </div>
        </div>
        <!-- /footer left -->
        <!-- footer right -->
        <div class="footer-r">


            <ul class="menu">
                <li class="item-130"><a href="/index.php/module-positions">Module Positions</a></li>
                <li class="item-131"><a href="#section-shortcodes">Shortcodes</a></li>
                <li class="item-132"><a href="#">Buy Me</a></li>
                <li class="item-133"><a href="/index.php/blog">Blog</a></li>
            </ul>
        </div>
        <!-- /footer right -->
    </div>
</footer>
<div id="backtoTop"></div>
<script type="text/javascript" src="{{ asset('js/front-end/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/retina.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.hoverIntent.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.localscroll.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.scrollTo.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.lazyload.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.flexslider-min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.colorbox.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.mobilemenu.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/jquery.simplekey.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/front-end/bootstrap-lightbox.min.js')}}"></script>
<script type="text/javascript">
var pixel = "functions/images/pixel.gif";
var loadimg = "functions/images/loader2.gif";

/*mobile menu*/
jQuery(document).ready(function($) {
    $('#mobileMenu').html($('#primary-menu-container').html());
    $('#mobileMenu').mobileMenu({
        defaultText: 'NAVIGATE TO...',
        className: 'select-menu',
        subMenuDash: '&nbsp;&nbsp;'
    });
    $(".select-menu").each(function() {
        $(this).wrap('<div class="css3-selectbox">');
    });
    $('#primary-menu-container li').each(function() {
        var i = 1;
        if ($(this).hasClass('none')) {
            $(this).remove();
        }
    });
});
</script>
