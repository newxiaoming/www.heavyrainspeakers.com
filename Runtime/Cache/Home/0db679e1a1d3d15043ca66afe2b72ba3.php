<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <!-- 公共描述 start public/head -->
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta http-equiv="Cache-Control" content="no-transform">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no,address=no,email=no">

<!-- 公共描述 end -->
<!-- 公共样式 start -->
<script src="/Public/static/assets/lodash.js?t=1511228427927"></script>
<script src="/Public/static/assets/i18next.min.js?t=1511228427927"></script>
<script src="/Public/static/assets/modernizr.min.js?t=1511228427927"></script>
<script src="/Public/static/assets/template-web.js?t=1511228427927"></script>
<script src="/Public/static/assets/micro-storage.min.js?t=1511228427927"></script>
<link rel="stylesheet" href="/Public/static/assets/swiper.min.css?t=1511228427927">
<link rel="stylesheet" href="/Public/static/css/main.css?t=1511228427927">
<!-- 公共样式 end -->

        <title> 首页 </title>
        <meta name="keywords" content="keywords">
        <meta name="description" content="description">
    </head>
    <body>
        <script>
(function () {
    var store = microStorage('HEAVYRAIN');
    var lang = store('language');
    window.$lang = lang ? lang : /zh/i.test(navigator.language) ? 'cn' : 'en';
    store('language', window.$lang);
})();
</script>

<script>window.$debug = true</script>
<script>document.body.classList.add('lang-' + window.$lang)</script>

        <div class="g-layout index">
            <!-- 顶栏 start public/topbar -->
<div class="g-topbar" tpl="topbar"></div>
<script id="tpl-topbar" type="text/html">
    <nav class="topbar">
        <div class="g-center">
            <div class="topbar-logo">
                <a href="/">
                    <h1>HEAVYRAIN | SPEAKERS™</h1>
                </a>
            </div>
            <div class="topbar-menu">
                <select name="language" id="language">
                    <option value="en" {{ lang == 'en' ? 'selected' : '' }}>EN</option>
                    <option value="cn" {{ lang == 'cn' ? 'selected' : '' }}>CN</option>
                </select>
                <ul>
                    {{each buttons}}
                        <li>
                            <a href="{{ $value.link }}">
                                <span>{{ $value.text }}</span>
                            </a>
                        </li>
                    {{/each}}
                </ul>
            </div>
        </div>
    </nav>
</script>
<script>
    i18next.init({
        lng: window.$lang,
        debug: window.$debug,
        returnObjects: true,
        resources: {
            en: {
                topbar: {
                    buttons: [
                        'OUR SPEAKERS',
                        'ADVISORY SERVICES',
                        'CASE',
                        'NEWS',
                        'ABOUT US',
                        'EN',
                    ],
                },
            },
            cn: {
                topbar: {
                    buttons: [
                        '演讲嘉宾',
                        '服务分类',
                        '成功案例',
                        '新闻',
                        '关于我们',
                        'CN',
                    ],
                },
            },
        },
    }, function ( err, t ) {
        var links = [
        '/index.php?s=/Home/Article/lists/category/speakers.html', // 演讲嘉宾
        '/index.php?s=/Home/Article/lists/category/advisoryservices.html', // 服务分类
        '/index.php?s=/Home/Article/lists/category/case.html', // 成功案例
        '/index.php?s=/Home/Article/lists/category/news.html', // 新闻
        '/index.php?s=/Home/index/about.html', // 关于我们
            '#',
        ];
        document.querySelector('[tpl="topbar"]').innerHTML = template('tpl-topbar', {
            buttons: _.map(t('topbar:buttons'), function ( text, index ) {
                var link = links[index];
                return {
                    text : text,
                    link : link,
                };
            }),
            lang: window.$lang,
        });

        document.querySelector('.topbar .topbar-menu ul li:last-child a').addEventListener('click', function ( event ) {
            event.preventDefault();
        }, false);
    });
    document.querySelector('#language').addEventListener('change', function () {
        if (this.value === window.$lang) {
            return;
        }
        var store = microStorage('HEAVYRAIN');
        store('language', this.value);
        window.location.reload();
    }, false);
</script>
<!-- 顶栏 end -->

            <div class="g-body">
                <!-- 背景 start public/banner -->
<div class="g-banner is-ceil"></div>
<div class="g-banner is-floor"></div>
<!-- 背景 end -->

                <div class="g-center">
                    <!-- 首页 start -->
                    <div class="g-container" tpl="main"></div>
                    <script id="tpl-main" type="text/html">
                        <div class="index-banner">
                            <div class="index-banner-list">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        
                                        {{each item}}
                                           <div class="swiper-slide">
                                                <div class="index-banner-list__item">
                                                    <img src="{{ $value.path }}" alt="">
                                                    <h4>{{ $value.title }}</h4>
                                                    <p>{{ $value.sildertext }}</p>
                                                    <span>{{ $value.content }}</span>
                                                </div>
                                            </div> 
                                        {{/each}}
                                        
                                    </div>
                                </div>
                            </div>
                            <em class="index-banner__shape"></em>
                        </div>
                        <div class="index-speaker-list">
                            <div class="g-shape1"></div>
                            <div class="g-tab">{{ sections[0] }}</div>
                            <div class="speaker-list">
                                <div class="g-container">
                                    <div class="speaker-list__list">
                                        <ul>
                                            {{each speakers}}    
                                            <!-- 单个嘉宾 start item/speaker-item -->
                                                <li>
                                                    <a href="/index.php?s=/Home/Article/detail/id/{{ $value.id }}.html">
                                                        <div class="speaker-list__item">
                                                            <div class="speaker-list__avatar">
                                                                <img src="{{ $value.path }}" alt="" width="360" height="360">
                                                            </div>
                                                            
                                                            <div class="speaker-list__popup">
                                                                <h4>{{ $value.title }}</h4>
                                                                <p>{{ $value.text }}</p>
                                                                <i>{{ detail }}</i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- 单个嘉宾 end -->
                                            {{/each}}

                                            
                                            <li class="index-speaker-list__more">
                                                <a href="/index.php?s=/Home/Article/lists/category/speakers.html">
                                                    <p>{{ more }}</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="index-case-list">
                            <div class="g-shape2"></div>
                            <div class="g-tab">{{ sections[1] }}</div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    {{each cases}}
                                        <div class="swiper-slide">
                                            <!-- 单个案例 start index/case -->
                                            <a href="http://heavyrain.test/index.php?s=/Home/Article/detail/id/{{ $value.id }}.html" title="">
                                                <div class="index-case-list__item">
                                                    <img src="{{ $value.path }}" alt="" width="600" height="400">
                                                    <h4>{{ $value.title }}</h4>
                                                    <p>{{ $value.description }}</p>
                                                    
                                                </div>
                                            </a>
                                            <!-- 单个案例 end -->

                                        </div>  
                                    {{/each}} 
                                </div>
                            </div>
                        </div>
                        <div class="index-video-list">
                            <div class="g-shape3"></div>
                            <div class="g-tab">{{ sections[2] }}</div>
                            <div class="index-video-list__center">
                                <ul>
                                    <?php $__CATE__ = D('Category')->getChildrenId(43);$__LIST__ = D('Document')->page(!empty($_GET["p"])?$_GET["p"]:1,8)->lists($__CATE__, '`level` DESC,`id` DESC', 1,true); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><!-- 单个视频 start index/video -->
                                        
                                        <li>
                                            <div class="index-video-list__item" data-role="video">
                                                <img src="<?php echo (get_cover($article["cover_id"],'path')); ?>" alt="">
                                                <!-- <iframe height=156 width=277 src='<?php echo ($article["videourl"]); ?>' frameborder=0 'allowfullscreen'></iframe> -->
                                                <iframe height=156 width=277 data-src='<?php echo (get_link($article["link_id"],"url")); ?>' frameborder=0 'allowfullscreen' allowfullscreen="true" webkitallowfullscreen="true" autoplay="true" style="display: none"></iframe>
                                            </div>
                                        </li>
                                        <!-- 单个视频 end --><?php endforeach; endif; else: echo "" ;endif; ?>
                                    

                                    
                                </ul>
                            </div>
                        </div>
                    </script>
                    <script>
                        i18next.init({
                            lng: window.$lang,
                            debug: window.$debug,
                            returnObjects: true,
                            resources: {
                                en: {
                                    main: {
                                        sections: ['SPEAKERS', 'CASE', 'VIDEO'],
                                        more: 'MORE',
                                        item: [

                                            <?php
 foreach ($addons_info as $key=>$value){ echo "{title: ' " . $value['title_en'] . "', path: '" . $value['path'] . "',sildertext:' " . addslashes($value['sildertext_en']). "', content:''},"; } ?>
                                            
                                        ],
                                        detail: 'detail',
                                        speakers: [
                                            <?php
 foreach ($speakers as $key=>$value){ echo "{title: ' " . $value['title_en'] . "', path: '" . get_cover($value['cover_id'],'path') . "',text:' " . $value['honor_en']. "', id: '" . $value['id'] . "'},"; } ?>
                                        ],
                                        cases: [
                                            <?php
 foreach ($cases as $key=>$value){ echo "{title: ' " . $value['title'] . "', path: '" . get_cover($value['cover_id'],'path') . "',text:' " . $value['description']. "', id: '" . $value['id'] . "'},"; } ?>
                                        ]
                                    },
                                },
                                cn: {
                                    main: {
                                        sections: ['演讲嘉宾', '成功案例', '视频'],
                                        more: '更多嘉宾',
                                        item: [
                                            <?php
 foreach ($addons_info as $key=>$value){ echo "{title: ' " . $value['title'] . "', path: '" . $value['path'] . "',sildertext:' " . addslashes($value['sildertext']). "', content:''},"; } ?>
                                        ],
                                        detail:'详情',
                                        speakers: [
                                            <?php
 foreach ($speakers as $key=>$value){ echo "{title: ' " . $value['title'] . "', path: '" . get_cover($value['cover_id'],'path') . "',text:' " . $value['honor_cn']. "', id: '" . $value['id'] . "'},"; } ?>
                                        ],
                                        cases: [
                                            <?php
 foreach ($cases as $key=>$value){ echo "{title: ' " . $value['title'] . "', path: '" . get_cover($value['cover_id'],'path') . "',text:' " . $value['description']. "', id: '" . $value['id'] . "'},"; } ?>
                                        ]
                                    },
                                },
                            },
                        }, function ( err, t ) {
                            document.querySelector('[tpl="main"]').innerHTML = template('tpl-main', {
                                sections: t('main:sections'),
                                more: t('main:more'),
                                item: t('main:item'),
                                speakers: t('main:speakers'),
                                detail: t('main:detail'),
                                cases: t('main:cases'),
                            });
                        });
                    </script>
                    <!-- 首页 end -->
                </div>
            </div>
            <!-- 页脚 start public/footer -->
<!-- 底部 -->
<div class="g-footer" tpl="footer"></div>
<script id="tpl-footer" type="text/html">
    <footer class="footer">
        <div class="footer-contact">
            <div class="g-center">
                <h3>{{ title }}</h3>
                <p>{{@ desc }}</p>
                <a href="{{ href }}">{{ button }}</a>
            </div>
        </div>
        <div class="footer-copyright">© 2017 HeavyRain Inc</div>
    </footer>
</script>
<script>
    i18next.init({
        lng: window.$lang,
        debug: window.$debug,
        resources: {
            en: {
                footer: {
                    title: 'About Us',
                    desc: 'Listen, learn, and change. Heavyrain, connect to the great minds.<br>International Speakers Provider<br>Planning and coordinating conferences<br>International resources exchanging and cooperating<br>Let\'s make a change!',
                    button: 'CONTACT US',
                    href: '/index.php?s=/Home/index/about'
                },
            },
            cn: {
                footer: {
                    title: '关于我们',
                    desc: '暴雨倾盆——慢听风吹雨声声，入耳观心<br>国际演讲嘉宾经纪服务<br>策划及统筹国际级会议<br>国际交流合作资源对接<br>思想触发改变!',
                    button: '联系我们',
                    href: '/index.php?s=/Home/index/about'
                },
            },
        },
    }, function ( err, t ) {
        document.querySelector('[tpl="footer"]').innerHTML = template('tpl-footer', {
            title: t('footer:title'),
            desc: t('footer:desc'),
            button: t('footer:button'),
            href: t('footer:href')
        });
    });
</script>
<!-- /底部 -->
<!-- 页脚 end -->
<!-- 公共脚本 start -->
<script src="/Public/static/assets/axios.min.js?t=1511228427927"></script>
<script src="/Public/static/assets/swiper.min.js?t=1511228427927"></script>
<script src="/Public/static/js/main.js?t=1511228427927"></script>
<!-- 公共脚本 end -->

        </div>
    </body>
</html>