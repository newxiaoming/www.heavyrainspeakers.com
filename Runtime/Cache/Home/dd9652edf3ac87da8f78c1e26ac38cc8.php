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

        <title> 关于我们 </title>
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

        <div class="g-layout about">
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
                        '咨询服务',
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
            '/advisory-services.html', // 咨询服务
            '/index.php?s=/Home/Article/lists/category/case.html', // 成功案例
            '/index.php?s=/Home/Article/lists/category/news.html', // 新闻
            '/index.php?s=/Home/Article/lists/category/about.html', // 关于我们
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
                    <!-- 关于 start -->
                    <div class="g-container" tpl="main"></div>
                    <script id="tpl-main" type="text/html">
                        <h2 class="about__title">{{ title }}</h2>
                        <div class="about__section">
                            <ul>
                                {{each sections}}
                                    <li>
                                        <div class="about__section-item">
                                            <h4>{{ $value[0] }}</h4>
                                            <p>{{ $value[1] }}</p>
                                        </div>
                                    </li>
                                {{/each}}
                            </ul>
                        </div>
                        <div class="about__gallery">
                            <h3 class="about__gallery-title">{{ intro }}</h3>
                            <ul>
                                {{each galleries}}
                                    <li>
                                        <div class="about__gallery-item">
                                            <img src="{{ $value[0] }}" alt="{{ $value[1] }}" width="360" height="360">
                                            <h4>{{ $value[1] }}</h4>
                                            <p>{{ $value[2] }}</p>
                                        </div>
                                    </li>
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
                                en: {
                                    main: {
                                        title: 'ABOUT US',
                                        sections: [
                                            [
                                                '',
                                                'The Heavy Rain Speakers is a premium speakers bureau serving business and sophisticated cultural audiences worldwide. We represent some of the world\'s most prominent leaders and personalities in a wide range of fields: business and economics, politics and public life, science and technology, entertainment and the arts. ','Every organization and every institution is always organizing an event to innovate, educate, motivate or simply wow their audiences so we are fortunate to be in the position to engage these valued individuals to speak, conduct workshops, moderate events, attend panel discussions, advise clients and attend board meetings.',
                                            ],
                                            [
                                                '',
                                                'Every organization and every institution is always organizing an event to innovate, educate, motivate or simply wow their audiences so we are fortunate to be in the position to engage these valued individuals to speak, conduct workshops, moderate events, attend panel discussions, advise clients and attend board meetings.',
                                            ],
                                            [
                                                '',
                                                'Our clients are always engaging speakers to address the topics that affect the performance of their organizations and institutions and are always appreciative of the unique insights and achievements of our speakers. Our clients are major corporations, non-profit organizations, PR agencies and public or private institutions who look to Global Speakers Bureau to make their events memorable and successful by providing the most relevant speaker.',
                                            ],
                                            [
                                                '',
                                                'Pull the switch and contact our consultants to see how we can assist you with speakers for your next event.'
                                            ]
                                        ],
                                        intro: '团队简介',
                                        galleries: [
                                            <?php if(is_array($founders)): $i = 0; $__LIST__ = $founders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$founder): $mod = ($i % 2 );++$i;?>["<?php echo (get_cover($founder["cover_id"],'path')); ?>",'<?php echo ($founder["title"]); ?>','<?php echo ($founder["title"]); ?>']<?php endforeach; endif; else: echo "" ;endif; ?>
                                        ],
                                    },
                                },
                                cn: {
                                    main: {
                                        title: '关于我们',
                                        sections: [
                                            
                                            [
                                                '我们是谁',
                                                '连接全球顶级思想者与中国发展的专业经纪机构，暴雨倾盆作为专业的名人演讲经纪机构，致力于为渴求顶尖思想和研究成果的中国学界和企业提供高质量的演讲嘉宾和顶级顾问。代理多位全球知名经济学家、商界领袖、科学家、企业家、投资人及畅销书作家的来华演讲业务，合作嘉宾研究范围涵盖科技、资本、创新、金融、人工智能、大数据、教育、健康医疗等领域。专业团队同时也为政府、企业、各大媒体、商学院提供高端论坛操作及国际商务服务。',
                                            ],
                                            [
                                                '我们的使命与愿景',
                                                '暴雨倾盆致力于提升中国与世界级思想的连接效率，使每场交流都能与行业最顶尖的专家互动，让国际顶尖思想助力推动中国梦更快更好的实现。多位名人演讲家，包括前国家领导人、诺贝尔奖得主、全球顶尖企业家、科技大拿、全球畅销书作者等均通过我们的专业运作成功站上中国舞台，演讲主题涵盖国际政治与经济、金融资本、科技创新和商业人文等范畴，用前沿思想与中国精英对话。',
                                            ],
                                        ],
                                        intro: '团队简介',
                                        galleries: [
                                        <?php if(is_array($founders)): $i = 0; $__LIST__ = $founders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$founder): $mod = ($i % 2 );++$i;?>["<?php echo (get_cover($founder["cover_id"],'path')); ?>",'<?php echo ($founder["title"]); ?>','<?php echo ($founder["description"]); ?>']<?php endforeach; endif; else: echo "" ;endif; ?>
                                        ],
                                    },
                                },
                            },
                        }, function ( err, t ) {
                            document.querySelector('[tpl="main"]').innerHTML = template('tpl-main', {
                                title: t('main:title'),
                                sections: t('main:sections'),
                                intro: t('main:intro'),
                                galleries: t('main:galleries'),
                            });
                        });
                    </script>
                    <!-- 关于 end -->
                </div>
            </div>
            <!-- 页脚 start public/footer -->
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
                    desc: 'We connect you with the top authorities and social change agents at the<br>forefront of today\'s most pressing issues and tomorrow\'s trends.',
                    button: 'CONTACT US',
                    href: '/about.html'
                },
            },
            cn: {
                footer: {
                    title: '关于我们',
                    desc: '通过名人经纪的方式将签约的名人演讲家（包含前国家领导人、诺贝尔奖获得者、全球顶尖<br>企业家、全球畅销书作者等）集合在一起，为了特定的商业或公益活动<br>演讲或参予相关活动的经纪机构。',
                    button: '联系我们',
                    href: '/about.html'
                },
            },
        },
    }, function ( err, t ) {
        document.querySelector('[tpl="footer"]').innerHTML = template('tpl-footer', {
            title: t('footer:title'),
            desc: t('footer:desc'),
            button: t('footer:button'),
        });
    });
</script>
<!-- 页脚 end -->
<!-- 公共脚本 start -->
<script src="/Public/static/assets/axios.min.js?t=1511228427927"></script>
<script src="/Public/static/assets/swiper.min.js?t=1511228427927"></script>
<script src="/Public/static/js/main.js?t=1511228427927"></script>
<!-- 公共脚本 end -->

        </div>
    </body>
</html>