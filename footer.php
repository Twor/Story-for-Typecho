<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
<!-- end #body -->

<footer id="footer" role="contentinfo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
                <?php _e('Using <a target="_blank" href="http://www.typecho.org">Typecho</a> & <a target="_blank" href="https://github.com/txperl/Story-for-Typecho">Story</a>'); ?>.
            </div>
        </div>
    </div>
</footer>
<script src="<?php $this->options->themeUrl('assert/js/darkmode.js'); ?>"></script>
<script>
    // Plugin Initialization
    var options = {
        light: "<?php $this->options->themeUrl('assert/css/main.css'); ?>",
        dark: "<?php $this->options->themeUrl('assert/css/dark.css'); ?>",
        startAt: "21:00",
        endAt: "06:00",
        checkSystemScheme: true,
        saveOnToggle: true
    }
    var DarkMode = new DarkMode(options)

    // Function for `mode-toggler` button
    var ModeToggler = document.getElementById('mode-toggler')
    changeTogglerText()
    ModeToggler.onclick = function() {
        DarkMode.toggleMode()
        changeTogglerText()
    }

    // Changes `mode-toggler` text on mode changing
    function changeTogglerText() {
        var currentMode = DarkMode.getMode()
        ModeToggler.innerHTML = currentMode === 'light' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>'
    }
</script>

<script src="https://lib.baomitu.com/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php $this->options->themeUrl('assert/js/prism.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assert/js/zoom-vanilla.min.js'); ?>"></script>
<script>
    <?php if ($this->options->isAutoNav) : ?>
        var b = document.getElementsByClassName('b');
        var w = document.getElementsByClassName('w');
        var menupgMargin = (b.length + w.length) * 28;
        var srhboxMargin = (b.length + w.length + 3) * 28;
        var menusrhWidth = (b.length + w.length - 1) * 28;
        document.getElementById('menu-page').style['margin-left'] = menupgMargin + 'px';
        document.getElementById('search-box').style['margin-left'] = srhboxMargin + 'px';
        document.getElementById('me-link').style['margin-left'] = menupgMargin + 'px';
        document.getElementById('menu-search').style['width'] = menusrhWidth + 'px';
        if (menusrhWidth < 140) {
            document.getElementById('menu-search').setAttribute('placeholder', 'Search~');
        }
    <?php endif; ?>

    $(document).ready(function() {
        if (window.location.hash != '') {
            var i = window.location.hash.indexOf('#comment');
            var ii = window.location.hash.indexOf('#respond-post');
            if (i != -1 || ii != -1) {
                document.getElementById('btn-comments').innerText = 'hide comments';
                document.getElementById('comments').style.display = 'block';
                footerPosition();
            }
        }
    });

    function isMenu() {
        if (document.getElementById('menu-1').style.display == 'inline') {
            $('#search-box').fadeOut(200);
            $('#me-link').fadeOut(200);
            $('#menu-page').fadeOut(200);
            $('#menu-1').fadeOut(500);
            $('#menu-2').fadeOut(400);
            $('#menu-3').fadeOut(300);
            $('#mode-toggler').fadeOut(300);
        } else {
            $('#menu-1').fadeIn(150);
            $('#menu-2').fadeIn(150);
            $('#menu-3').fadeIn(150);
            $('#mode-toggler').fadeIn(150);
        }
    }

    function isMenu1() {
        if (document.getElementById('menu-page').style.display == 'block') {
            $('#menu-page').fadeOut(300);
        } else {
            $('#menu-page').fadeIn(300);
            $('#search-box').fadeOut(300);
            $('#me-link').fadeOut(300)
        }
    }

    function isMenu2() {
        if (document.getElementById('me-link').style.display == 'block') {
            $('#me-link').fadeOut(300);
        } else {
            $('#me-link').fadeIn(300);
            $('#search-box').fadeOut(300);
            $('#menu-page').fadeOut(300)
        }
    }

    function navTree(c = 'none') {
        if (document.getElementById('torTree')) {
            if ($("#torTree").attr('style') == 'display: none;') {
                $("#torTree").fadeIn(300);
                $("#torTree").css('display', 'inline-block');
            } else {
                $("#torTree").fadeOut(300);
            }
        }
    }

    function isMenu3() {
        if (document.getElementById('search-box').style.display == 'block') {
            $('#search-box').fadeOut(300);
        } else {
            $('#search-box').fadeIn(300);
            $('#menu-page').fadeOut(300);
            $('#me-link').fadeOut(300);
        }
    }

    function isComments() {
        if (document.getElementById('btn-comments').innerText == 'show comments') {
            document.getElementById('btn-comments').innerText = 'hide comments';
            document.getElementById('comments').style.display = 'block';
        } else {
            document.getElementById('btn-comments').innerText = 'show comments';
            document.getElementById('comments').style.display = 'none';
        }
        footerPosition();
    }

    function Search404() {
        $('#menu-1').fadeIn(150);
        $('#menu-2').fadeIn(150);
        $('#menu-3').fadeIn(150);
        $('#search-box').fadeIn(300);
    }

    function goBack() {
        window.history.back();
    }

    function footerPosition() {
        $("footer").removeClass("fixed-bottom");
        var contentHeight = document.body.scrollHeight,
            winHeight = window.innerHeight;
        if (document.getElementsByClassName("post-content")[0]) {
            var winImgNum = document.getElementsByClassName("post-content")[0].getElementsByTagName("img").length;
        } else {
            var winImgNum = 0;
        }
        if (!(contentHeight > winHeight) && winImgNum == 0) {
            $("footer").addClass("fixed-bottom");
        }
    }
    footerPosition();
    $(window).resize(footerPosition);

    function goToComment() {
        document.getElementById('btn-comments').innerText = 'hide comments';
        document.getElementById('comments').style.display = 'block';
        window.location.hash = "#postFun";
    }

    <?php if ($this->is('post')) : ?>
        <?php $postConfig = post_config($this, $this->options->isTorTree); ?>
        <?php if ($postConfig['isTorTree']) : ?>
            navTree('auto');
        <?php endif; ?>

        var $navs = $('.torList'),
            $sections = $('.torAn'),
            $window = $(window),
            navLength = $navs.length - 1;

        $window.on('scroll', function() {
            var scrollTop = $window.scrollTop(),
                len = navLength;

            for (; len > -1; len--) {
                var that = $sections.eq(len);
                if (scrollTop >= (that.offset().top - 100)) {
                    $navs.removeClass('on').eq(len).addClass('on');
                    break;
                }
                $navs.removeClass('on');
            }
        });
    <?php endif; ?>
</script>

<?php $this->footer(); ?>
</body>

</html>