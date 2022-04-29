<html lang="en-gb" dir="ltr" class="csstransforms csstransforms3d csstransitions">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Welcome to Ma-Global</title>
    <script src="{{ asset('js/front-end/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/front-end/jquery-noconflict.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/front-end/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/front-end/caption.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(window).on('load', function() {
        new JCaption('img.caption');
    });
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- css main -->
    <link href="{{ asset('css/front-end/ma-global.css')}}" rel="stylesheet" type="text/css">

    <!-- js/front-end -->
    <!--[if lt IE 9]>
	<script src="/templates/vg_simplekeyjs/front-end/html5.js/front-end" type="text/javascript"></script>
	<![endif]-->
    <script type="text/javascript" src="{{ asset('js/front-end/jpreloader.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/front-end/jquery.placeholder.js')}}"></script>
    <script type="text/javascript">
    var isLoad = 1; //1 - Enable preloading; 0 - Disable preloading
    var isMobile = 0;
    //alert( navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/) );
    //alert(navigator.userAgent);
    </script>

    <!-- css more -->
    <link rel="stylesheet" href="{{ asset('css/front-end/shortcodes.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/front-end/flexslider.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/front-end/colorbox.css')}}" type="text/css" media="all">

    <!-- fonts -->
    <link href="{{ asset('css/front-end/fonts.css?family=league+gothic&amp;subset=latin,latin-ext')}}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('css/front-end/fonts.css?family=infinity&amp;subset=latin,latin-ext')}}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('css/front-end/fonts.css?family=nexa+lightregular&amp;subset=latin,latin-ext')}}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front-end/fonts.css?family=nexa+boldregular&amp;subset=latin,latin-ext')}}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front-end/media-queries.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/front-end/joomla.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/front-end/js_composer.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/front-end/ bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/front-end/bootstrap-lightbox.min.css')}}" type="text/css" rel="stylesheet">
    <style type="text/css">
    .vg-firstTitle {
        font: 160px/140px 'league_gothic';
    }

    .vg-secondTitle {
        font: 72px/60px 'infinity';
    }

    .vg-thirdTitle {
        font: 100px/80px 'league_gothic';
    }

    .vg-fourthTitle {
        font: 36px/30px 'infinity';
    }

    #vg-main-body h1,
    #vg-main-body-ajax h1,
    #vg-main-body-component h1 {
        font-family: 'nexa_boldregular';
    }

    #vg-main-body h2,
    #vg-main-body-ajax h2,
    #vg-main-body-component h2 {
        font-family: 'nexa_lightregular';
    }

    #primary-menu-container li.current-menu-item a {
        color: #f26c4f;
    }

    h1#site-logo a {
        background-image: url(/templates/vg_simplekey/images/logo.png);
    }

    @media only screen and (-Webkit-min-device-pixel-ratio: 1.5),
    only screen and (-moz-min-device-pixel-ratio: 1.5),
    only screen and (-o-min-device-pixel-ratio: 3/2),
    only screen and (min-device-pixel-ratio: 1.5) {
        h1#site-logo a {
            background-image: url(/templates/vg_simplekey/images/logo@2x.png);
            background-size: auto 69px;
        }
    }

    @media only screen and (max-width: 480px) {
        h1#site-logo {
            display: none;
        }
    }

    @-moz-document url-prefix() {
        #featured .slide_bg {
            margin-top: 0px;
        }
    }
    </style>
</head>

<body class="home  hide-component">

    <div id="ajax-load">
        <div id="close">X</div>
        <div id="ajax-content"></div>
    </div>
    <header id="top">
        @include('partials/frontend/menu')

    </header>
    <div id="container">
        @yield('content')
    </div>
    @include('partials.frontend.footer')

</body>

</html>