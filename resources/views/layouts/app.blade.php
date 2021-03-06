<!DOCTYPE html>
<html lang="zh" class="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>天美农业</title>

    <meta name="keywords" content="{{ $site->about->keywords }}">
    <meta name="description" content="{{ $slogan }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="icon" href="/images/logo.png">
    <link rel="shortcut icon" href="/images/logo.png">

    <link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/jquery.qtip.css') }}">
    <link rel="stylesheet" href="{{ url('/css/jquery.jScrollPane.css') }}">
    <link rel="stylesheet" href="{{ url('/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/supersized.css') }}">
    <link rel="stylesheet" href="{{ url('/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ url('/css/jquery.fancybox-buttons.css') }}">
    <link rel="stylesheet" href="{{ url('/css/base.css') }}">
    <link rel="stylesheet" href="{{ url('/css/page.css') }}">

    <link rel="stylesheet" media="screen and (max-width:550px)" href="{{ url('/css/responsive-0-550.css') }}">
    <link rel="stylesheet" media="screen and (min-width:480px) and (max-width:550px)"
          href="{{ url('/css/responsive-480-550.css') }}">
    <link rel="stylesheet" media="screen and (max-width:479px)" href="{{ url('/css/responsive-0-479.css') }}">
    <link rel="stylesheet" media="screen and (max-height:510px)" href="{{ url('/css/responsive-height-0-510.css') }}">

    <link rel="stylesheet" href="{{ url('/css/css.css') }}">
    <link rel="stylesheet" href="{{ url('/css/css(1).css') }}">
    <link rel="stylesheet" href="{{ url('/css/css(2).css') }}">

    <script>
        var config = {
            "about": {
                "title": "关于天美 - 天美农业",
                "keywords": "{{ $site->about->keywords }}",
                "description": "{{ $slogan }}"
            },
            "services": {
                "title": "产业链条 - 天美农业",
                "keywords": "{{ $site->services->keywords }}",
                "description": "{{ $slogan }}"
            },
            "portfolio": {
                "title": "时令产品 - 天美农业",
                "keywords": "{{ $site->portfolio->keywords }}",
                "description": "{{ $slogan }}"
            },
            "basement": {
                "title": "时令基地 - 天美农业",
                "keywords": "{{ $site->basement->keywords }}",
                "description": "{{ $slogan }}"
            },
            "blog": {
                "title": "新鲜生活 - 天美农业",
                "keywords": "{{ $site->blog->keywords }}",
                "description": "{{ $slogan }}"
            },
            "contact": {
                "title": "联系天美 - 天美农业",
                "keywords": "{{ $site->contact->keywords }}",
                "description": "{{ $slogan }}"
            }
        };
        var configDefault = {
            "title": "天美农业",
            "keywords": "{{ $site->about->keywords }}",
            "description": "{{ $slogan }}"
        };
        var mainURL = '/';
    </script>

    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/jquery-migrate.min.js') }}"></script>

    <style>
        .fancybox-margin {
            margin-right: 0px;
        }
    </style>

</head>

<body>

<div id="nostalgia">

    <!-- Navigation -->
    <div id="nostalgia-navigation" style="display: block;">

        <div id="nostalgia-navigation-menu" style="height: 300px;">

            <!-- Menu -->
            <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 146px; height: 250px; margin: 0px; overflow: hidden;">
                <ul style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; height: 750px; width: 146px;">
                    <li><a href="#!about">关于天美</a></li>
                    <li><a href="#!services">产业链条</a></li>
                    <li><a href="#!portfolio">时令产品</a></li>
                    <li><a href="#!basement">时令基地</a></li>
                    <li><a href="#!blog">新鲜生活</a></li>
                    <li><a href="#!contact">联系天美</a></li>
                </ul>
            </div>
            <!-- /Menu -->

            <a href="#" id="nostalgia-navigation-prev-button" class="" style="display: block;"></a>
            <a href="#" id="nostalgia-navigation-next-button" class="" style="display: block;"></a>
            <a href="#" class="audio-player music-pause-user music-off"></a>
            <a href="/#!main" id="nostalgia-navigation-close-button"></a>

        </div>

        <!-- Name box -->
        <div id="nostalgia-navigation-name-box">
            <span>天美农业</span>
        </div>
        <!-- /Name box -->

        <div id="nostalgia-navigation-click-here-box" style="display: none;"></div>

    </div>
    <!-- /Navigation -->

    <!-- Tab -->
    <div id="nostalgia-tab">

        <!-- Tab icon -->
        <div id="nostalgia-tab-icon"></div>
        <!-- /Tab icon -->

        <!-- Content -->
        <div id="nostalgia-tab-content">

            <form name="nostalgia-tab-content-menu" id="nostalgia-tab-content-menu" method="post" action="">

                <div>

                    <select id="nostalgia-tab-content-menu-select" name="nostalgia-tab-content-menu-select">
                        <option value="#!about">关于天美</option>
                        <option value="#!services">产业链条</option>
                        <option value="#!portfolio">时令产品</option>
                        <option value="#!basement">时令基地</option>
                        <option value="#!blog">新鲜生活</option>
                        <option value="#!contact">联系天美</option>
                        <option value="#!main">- 关闭 -</option>
                    </select>

                </div>

            </form>

            <!-- Scroll section -->
            <div id="nostalgia-tab-content-scroll">

                <div id="nostalgia-tab-content-page">

                    <div class="jspContainer">
                        <div class="jspPane">
                            <div id="nostalgia-tab-content-page">

                            </div>
                        </div>
                        <div class="jspVerticalBar">
                            <div class="jspCap jspCapTop"></div>
                            <div class="jspTrack">
                                <div class="jspDrag">
                                    <div class="jspDragTop"></div>
                                    <div class="jspDragBottom"></div>
                                </div>
                            </div>
                            <div class="jspCap jspCapBottom"></div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /Scroll section -->

            <!-- Footer -->
            <div id="nostalgia-tab-footer" class="clear-fix">

                <ul class="no-list social-list">
                    <li style="position:relative;">
                        <a class="social-wechat" href="#"><i class="fa fa-wechat fa-2x" style="color: #fff;"></i></a>
                        <div class="qrcode-wrapper">
                            <img src="{{ url('/images/qrcode.jpg') }}" alt="" class="qrcode">
                        </div>
                    </li>
                </ul>

                <div class="nostalgia-tab-footer-caption">

                    <span class="float-left"><a href="{{ url('/') }}">{{ $slogan }}</a></span>
                    <span class="float-right"><a href="{{ url('/') }}">{{ date('Y') }} &copy; 天美农业&nbsp;粤ICP备16034891</a></span>

                </div>

            </div>
            <!-- /Footer -->

        </div>
        <!-- /Content -->

    </div>
    <!-- /Tab -->

    <!-- Media control -->
    <div id="media-control" style="display: block;">

        <a href="#" id="nextslide"></a>
        <a href="#" id="prevslide"></a>
        <a href="#" class="audio-player music-pause-user music-off"></a>

    </div>
    <!-- /Media control -->

</div>

<!-- Preloader -->
<div id="start-preloader">
    <div>
        <ul class="no-list box-center"><li></li><li></li><li></li><li></li><li></li><li></li></ul>
        <p>加载图片中 ...</p>
    </div>
</div>
<!-- /Preloader -->

<!-- Background overlay -->
<div id="background-overlay">
    <div class="background-overlay-1"></div>
</div>
<!-- /Background overlay -->

<!-- Nostalgia hidden fileds -->
<div>
    <input type="hidden" id="nostalgiaRequest" name="nostalgiaRequest" value="">
    <input type="hidden" id="nostalgiaRequestType" name="nostalgiaRequestType" value="1">
</div>
<!-- Nostalgia hidden fileds -->

<!-- JPlayer -->
<div id="jPlayer" style="width: 0px; height: 0px;"><img id="jp_poster_0" style="width: 0px; height: 0px; display: none;">
    <audio id="jp_audio_0" preload="metadata" src="{{ url('/page/music.mp3') }}"></audio>
</div>
<!-- /JPlayer -->

<script src="{{ url('/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('/js/jquery.easing.js') }}"></script>
<script src="{{ url('/js/jquery.blockUI.js') }}"></script>
<script src="{{ url('/js/jquery.qtip.min.js') }}"></script>
<script src="{{ url('/js/jquery.ba-bqq.min.js') }}"></script>
<script src="{{ url('/js/jquery.jplayer.min.js') }}"></script>
<script src="{{ url('/js/jquery.mousewheel.min.js') }}"></script>
<script src="{{ url('/js/jquery.supersized.min.js') }}"></script>
<script src="{{ url('/js/jquery.jScrollPane.min.js') }}"></script>
<script src="{{ url('/js/jquery.supersized.shutter.min.js') }}"></script>
<script src="{{ url('/js/jquery.carouFredSel.packed.js') }}"></script>
<script src="{{ url('/js/jquery.fancybox.js') }}"></script>
<script src="{{ url('/js/jquery.fancybox-media.js') }}"></script>
<script src="{{ url('/js/jquery.fancybox-buttons.js') }}"></script>
<script src="{{ url('/js/script.js') }}"></script>
<script src="{{ url('/js/nostalgia.js') }}"></script>
<script>
    var slide = [
        {
            image: '{{ $site->about->background }}',
        },
        {
            image: '{{ $site->services->background }}',
        },
        {
            image: '{{ $site->portfolio->background }}',
        },
        {
            image: '{{ $site->blog->background }}',
        },
        {
            image: '{{ $site->contact->background }}',
        },
        {
            image: '{{ $site->basement->background }}',
        },
    ]
</script>
<script src="{{ url('/js/main.js') }}"></script>
<script src="{{ url('/js/contact-form.js') }}"></script>

</body>
</html>