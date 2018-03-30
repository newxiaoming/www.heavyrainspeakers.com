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

        <title>咨询服务 </title>
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

        <div class="g-layout advisory-services">
            <!-- 顶栏 start public/topbar -->
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
<!-- 顶栏 end -->

            <div class="g-body">
                <!-- 背景 start public/banner -->
<div class="g-banner is-ceil"></div>
<div class="g-banner is-floor"></div>
<!-- 背景 end -->

                <div class="g-center">
                    <!-- 咨询服务 start -->
                    <div class="g-container" tpl="main"></div>
                    <script id="tpl-main" type="text/html">
                        <h2 class="advisory-services__title">{{ title }}</h2>
                        <h3 class="advisory-services__subtitle">{{@ subtitle }}</h3>
                        <div class="advisory-services__list">
                            <ul>                               
                                {{each item}}
<!-- 单个策划 start item/advisory-services__item -->
<li>
    <a href="#">
        <div class="advisory-services__item" style="background-image: url({{ $value.bg }})">
            <h4>{{ $value.title }}</h4>
            <p>{{@ $value.subtitle }}</p>
        </div>
    </a>
</li>
<!-- 单个策划 end -->
{{/each}}    
                            </ul>
                        </div>
                    </script>
                    <script>
                        i18next.init({
                            lng: window.$lang,
                            debug: window.$debug,
                            returnObjects: true,
                            resources: {
                                cn: {
                                    main: {
                                        title: '业务分类',
                                        subtitle: '致力于为中国合作伙伴连接全球最先进的思想，<br>使每场交流都能与行业最顶尖的专家互动，以获得洞见。',
                                        item: [
                                            {
                                                title: '国际演讲嘉宾经纪服务',
                                                subtitle: '根据会议主办方演讲议题、会议日期、预算等要求，<br>提供该领域内的国际级演讲嘉宾',
                                                bg: '/Public/static/assets/advisory-services-item1.jpg',
                                            },
                                            {
                                                title: '策划及统筹国际级会议',
                                                subtitle: '根据会议主题方向、会议规模等信息，<br>提供专业领域嘉宾推荐及演讲议题建议，策划 会议方案及统筹方案',
                                                bg: '/Public/static/assets/advisory-services-item2.jpg',
                                            },
                                            {
                                                title: '国际交流合作资源对接',
                                                subtitle: '根据客户需求，对接国外优质资源，<br>促进双方合作，推进项目落地，创造共同价值',
                                                bg: '/Public/static/assets/advisory-services-item3.jpg',
                                            },
                                        ],
                                    },
                                },
                                en: {
                                    main: {
                                        title: '业务分类',
                                        subtitle: '致力于为中国合作伙伴连接全球最先进的思想，<br>使每场交流都能与行业最顶尖的专家互动，以获得洞见。',
                                        item: [
                                            {
                                                title: 'International Speakers Provider',
                                                subtitle: 'According to the theme, topic, date, budget and other requirements, provide world- class professional speakers.',
                                                bg: '/Public/static/assets/advisory-services-item.jpg',
                                            },
                                            {
                                                title: 'Planning and coordinating conferences',
                                                subtitle: 'According to the direction of the theme, the size of the conference and other information, to provide speech topics, planning and coordinating programs.',
                                                bg: '/Public/static/assets/advisory-services-item.jpg',
                                            },
                                            {
                                                title: 'International resources exchanging and cooperating',
                                                subtitle: 'According to client-requirements, recommending high-quality resources, promoting the cooperative relationship between the two parties and creating common values.',
                                                bg: '/Public/static/assets/advisory-services-item.jpg',
                                            },
                                        ],
                                    },
                                },
                            },
                        }, function ( err, t ) {
                            document.querySelector('[tpl="main"]').innerHTML = template('tpl-main', {
                                title: t('main:title'),
                                subtitle: t('main:subtitle'),
                                item: t('main:item'),
                            });
                        });
                    </script>
                    <!-- 咨询服务 end -->
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