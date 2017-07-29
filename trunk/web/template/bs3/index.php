<html lang=<?php echo $OJ_LANG ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="/favicon.png">
    <title>TUST Online Judge </title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Roboto+Slab:300,400,700"
          rel="stylesheet">

    <!-- Css Plugin -->
    <link rel="stylesheet" href="template/bs3/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/bs3/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/bs3/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="template/bs3/css/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="template/bs3/css/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="template/bs3/css/owlcarousel/owl.transitions.css">
    <link rel="stylesheet" href="template/bs3/css/slick.css">
    <link rel="stylesheet" href="template/bs3/css/slider-pro/css/slider-pro.min.css">
    <link rel="stylesheet" href="template/bs3/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="template/bs3/css/animate.css">
    <link rel="stylesheet" href="template/bs3/style.css">
    <script src="template/bs3/jquery.min.js"></script>

    <!-- View Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="main-container">
    <header class="kopa-header-01">
        <div class="container">
            <div class="top-header">
                <script src="include/index_profile.php?<?php echo rand(); ?>"></script>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                </ul>
            </div>
            <div class="bottom-header style-01">
                <div class="clearfix">
                    <div class="pull-left">
                        <h1 class="kopa-logo">
                            <a href="#">
                                <img src="/img/icon/logo.png" alt="">
                            </a>
                        </h1>
                    </div>
                    <div class="pull-right">
                        <nav class="kopa-main-menu style-01">
                            <ul>
                                <li>
                                    <a class='btn' href="<?php echo $OJ_HOME ?>"><i class="icon-home"></i>
                                        <?php echo $MSG_HOME ?></a>
                                </li>
                                <li>
                                    <a class='btn <?php if ($url == "problemset.php") echo "$ACTIVE"; ?>'
                                       href="problemset.php"><?php echo $MSG_PROBLEMS ?></a>
                                </li>
                                <li>
                                    <a class='btn <?php if ($url == "status.php") echo "$ACTIVE"; ?>'
                                       href="status.php"><?php echo $MSG_STATUS ?> </a>
                                </li>
                                <li>
                                    <a class='btn <?php if ($url == "ranklist.php") echo "$ACTIVE"; ?>'
                                       href="ranklist.php"><?php echo $MSG_RANKLIST ?></a>
                                </li>
                                <li>
                                    <a class='btn <?php if ($url == "contest.php") echo "$ACTIVE"; ?>'
                                       href="contest.php"><?php echo $MSG_CONTEST ?></a>
                                </li>
                                <li>
                                    <a class='btn <?php if ($url == (isset($OJ_FAQ_LINK) ? $OJ_FAQ_LINK : "faqs.php")) echo " $ACTIVE"; ?>'
                                       href="<?php echo isset($OJ_FAQ_LINK) ? $OJ_FAQ_LINK : "faqs.php" ?>"><?php echo "$MSG_FAQ" ?></a>
                                </li>
                            </ul>
                        </nav>
                        <div class="kopa-search">
                            <button type="button">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" placeholder="Search..." class="">
                        </div>
                        <div class="kopa-hamburger-menu">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="kopa-menu-scroll">
        <div class="kopa-close-menu-scroll">
            <span>close x</span>
        </div>
        <div class="top-menu-scroll">
            <div class="kopa-social-links style-03">
                <ul class="clearfix">
                    <li><span>Social</span></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>
                    <li><a href="#" class="fa fa-rss"></a></li>
                </ul>
            </div>
            <ul class="kopa-menu-click">
                <li><a href="index.html">
                        <?php echo "$MSG_HOME" ?>
                    </a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="single-shop.html">Single-shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="single-blog.html">Single-blog</a></li>
            </ul>
        </div>
        <form>
            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
            <input type="text" placeholder="Search courses">
        </form>
    </div>
    <div id="main-content">
        <section class="kopa-area-nospace">
            <div class="widget kopa-widget-slider">
                <div class="widget-content module-slider-01">
                    <div class="container">
                        <img src="/images/main-slider/1.png" alt="">
                        <div class="content">
                            <h2>天津科技大学</h2>
                            <h2 class="small">Online Judge</h2>
                            <p>Education is learning what you didn't even know you didn't know.</p>
                            <a href="problemset.php" class="button-01">Start A Course</a>
                            <a href="http://celitea.cn" target="_blank" class="button-01">加入我们</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="kopa-area-nospace">
            <div class="container">
                <div class="widget kopa-widget-advanced_search">
                    <div class="widget-content module-advanced_search-01">
                        <div class="custom-bg-0"></div>
                        <div class="custom-bg">
                            <form>
                                <p class="arrow-select">
                                    <select name="course-length">
                                        <option value="*">Course Length</option>
                                        <option value="1">Course Length 1</option>
                                        <option value="2">Course Length 2</option>
                                        <option value="3">Course Length 3</option>
                                        <option value="4">Course Length 4</option>
                                        <option value="5">Course Length 5</option>
                                    </select>
                                </p>
                                <p class="arrow-select">
                                    <select name="study-level">
                                        <option value="*">Study Level</option>
                                        <option value="1">Study Level 1</option>
                                        <option value="2">Study Level 2</option>
                                        <option value="3">Study Level 3</option>
                                        <option value="4">Study Level 4</option>
                                        <option value="5">Study Level 5</option>
                                    </select>
                                </p>
                                <p><input type="text" placeholder="Keywords..."></p>
                                <p>
                                    <button type="submit" class="button-01">Search Course</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="kopa-area kopa-area-01">
            <div class="container">
                <div class="widget kopa-widget-features">
                    <header class="widget-header style-01">
                        <img src="/img/icon/icon-header-1.png" alt="">
                        <h3 class="widget-title">AwESOME Features</h3>
                        <h4>We offer Students for better Learning</h4>
                    </header>
                    <div class="widget-content module-features-01">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <article class="entry-item">
                                    <div class="custom">
                                        <div class="entry-thumb">
                                            <img src="/img/icon/ICPCLogo.png" alt="">
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <a href="https://icpc.baylor.edu/">国际大学生程序设计竞赛</a>
                                            </h4>
                                            <p>由美国电脑协会（ACM）主办的，一项旨在展示大学生创新能力、团队精神和在压力下编写程序、
                                                分析和解决问题能力的年度竞赛。</p>
                                            <a href="https://icpc.baylor.edu/" class="button-01">view detail</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <article class="entry-item">
                                    <div class="entry-thumb">
                                        <img src="/img/icon/indexl-logo.png" alt="">
                                    </div>
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            <a href="http://dasai.lanqiao.cn/">蓝桥杯大赛</a>
                                        </h4>
                                        <p>Lorem ipsum dolors item amet coti adipisicing elt, sed do eimd at.</p>
                                        <a href="http://dasai.lanqiao.cn/" class="button-01">view detail</a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <article class="entry-item">
                                    <div class="entry-thumb">
                                        <img src="/img/icon/4.png" alt="">
                                    </div>
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            <a href="#">Practical Classes</a>
                                        </h4>
                                        <p>Lorem ipsum dolors item amet coti adipisicing elt, sed do eimd at.</p>
                                        <a href="#" class="button-01">view detail</a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <article class="entry-item">
                                    <div class="entry-thumb">
                                        <img src="/img/icon/5.png" alt="">
                                    </div>
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            <a href="#">Validate Certificate</a>
                                        </h4>
                                        <p>Lorem ipsum dolors item amet coti adipisicing elt, sed do eimd at.</p>
                                        <a href="#" class="button-01">view detail</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="kopa-area kopa-area-04 white-text-style">
            <div class="container">
                <div class="widget kopa-widget-facts">
                    <div class="widget-content module-facts-01">
                        <div class="row">
                            <div class="kopa-md-5">
                                <div class="facts-detail">
                                    <i class="ti-book"></i>
                                    <div class="detail">
                                        <span class="intergers">763</span>
                                        <p>Courses</p>
                                    </div>
                                </div>
                            </div>
                            <div class="kopa-md-5">
                                <div class="facts-detail">
                                    <i class="ti-user"></i>
                                    <div class="detail">
                                        <p>
                                            <span class="intergers"><?php echo $num_of_reges;?></span>
                                        </p>
                                        <p>Courses</p>
                                    </div>
                                </div>
                            </div>
                            <div class="kopa-md-5">
                                <div class="facts-detail">
                                    <i class="ti-id-badge"></i>
                                    <div class="detail">
                                        <span class="intergers">251</span>
                                        <p>teachers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="kopa-md-5">
                                <div class="facts-detail">
                                    <i class="ti-filter"></i>
                                    <div class="detail">
                                        <span class="intergers">2571</span>
                                        <p>Quiz & Test</p>
                                    </div>
                                </div>
                            </div>
                            <div class="kopa-md-5">
                                <div class="facts-detail">
                                    <i class="ti-cup"></i>
                                    <div class="detail">
                                        <span class="intergers">7412</span>
                                        <p>Graduates</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="kopa-footer style-01">
            <div class="container">
          <span class="text-muted">如有任何问题，请联系管理员 :<a href="mailto:<?php echo $OJ_ADMIN ?>">admin</a>.
              </p>All Copyright Reserved 2016-<?php echo date("Y"); ?> 本网站由计算机精英协会维护
          </span>
            </div>
        </footer>
    </div>

    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.sliderPro.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.js"></script>
    <script src="js/viewportchecker.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
