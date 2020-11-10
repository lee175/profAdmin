<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- Mirrored from lmpixels.com/demo/leven-html-new/full-width-light/portfolio-4-columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 22:17:39 GMT -->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leven - Resume / CV / vCard Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="Leven - Resume / CV / vCard Template" />
  <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, portfolio" />
  <meta name="author" content="lmpixels" />
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="css/normalize.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="css/main.css" type="text/css">

  <script src="js/modernizr.custom.js"></script>
  <style>
    .students-picture {
      position: absolute;
      display: block;
      top: 25px;
      left: -60px;
      width: 150px;
      height: 150px
    }

    .students-picture img {
      display: inline-block;
      border-radius: 150px;
    }

    .students-text p {
      margin-left: 50px;
      font-style: italic
    }

    .students-author-info {
      margin-left: 50px;
      /* margin-top: 15px */
    }

    .students-author {
      font-size: 1.5em
    }

    .students-firm {
      margin: 0;
      font-size: 1.2em;
      color: #bbb
    }
  </style>
</head>

<body class="page">

  <div class="lm-animated-bg"></div>

  <!-- Loading animation -->
  <div class="preloader">
    <div class="preloader-animation">
      <div class="preloader-spinner">
      </div>
    </div>
  </div>
  <!-- /Loading animation -->
  <div class="header-content clearfix lmpixels-navbar">

    <div class="text-logo">
      <a href="index-2.html">
        <div class="logo-symbol">A</div>
        <div class="logo-text">Atul <span>Srivastava</span></div>
      </a>
    </div>

    <div class="site-nav mobile-menu-hide">
      <ul class="leven-classic-menu site-main-menu">
        <li class="menu-item">
          <a href="index.html">Home</a>
        </li>

        <li class="menu-item">
          <a href="resume.php">Professional Experience</a>
        </li>

        <li class="menu-item">
          <a href="publications.php">Publications</a>
        </li>

        <li class="menu-item">
          <a href="research.php">Research</a>
        </li>

        <li class="menu-item current-menu-item">
          <a href="students.php">Students</a>
        </li>

        <li class="menu-item">
          <a href="awards.php">Awards</a>
        </li>

        <li class="menu-item">
          <a href="blog.html">Gallary</a>
          <ul class="sub-menu">
            <li class="menu-item">
              <a href="blog.html">Blog</a>
            </li>
            <li class="menu-item">
              <a href="portfolio.html">Gallary</a>
            </li>
          </ul>
        </li>

        <li class="menu-item">
          <a href="contact.html">Contact</a>
        </li>
      </ul>
    </div>

    <a class="menu-toggle mobile-visible">
      <i class="fa fa-bars"></i>
    </a>
  </div><!-- Scroll To Top Button -->
  <div class="lmpixels-scroll-to-top"><i class="lnr lnr-chevron-up"></i></div>
  <!-- /Scroll To Top Button -->

  <div class="page-scroll">
    <div id="page_container" class="page-container bg-move-effect" data-animation="transition-flip-in-right">

      <!-- Header -->
      <!-- <header id="site_header" class="header"> -->
      <div class="header-content clearfix">

        <div class="text-logo">
          <a href="index-2.html">
            <div class="logo-symbol">A</div>
            <div class="logo-text">Atul <span>Srivastava</span></div>
          </a>
        </div>

        <div class="site-nav mobile-menu-hide">
          <ul class="leven-classic-menu site-main-menu">
            <li class="menu-item">
              <a href="index.html">Home</a>
            </li>

            <li class="menu-item">
              <a href="resume.php">Professional Experience</a>
            </li>

            <li class="menu-item">
              <a href="publications.php">Publications</a>
            </li>

            <li class="menu-item">
              <a href="research.php">Research</a>
            </li>

            <li class="menu-item current-menu-item">
              <a href="students.php">Students</a>
            </li>

            <li class="menu-item">
              <a href="awards.php">Awards</a>
            </li>

            <li class="menu-item">
              <a href="blog.html">Gallary</a>
              <ul class="sub-menu">
                <li class="menu-item">
                  <a href="blog.html">Blog</a>
                </li>
                <li class="menu-item">
                  <a href="portfolio.html">Gallary</a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="contact.html">Contact</a>
            </li>
          </ul>
        </div>

        <a class="menu-toggle mobile-visible">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <!-- </header> -->
      <!-- /Header -->

      <div id="main" class="site-main">
        <div id="main-content" class="single-page-content">
          <div id="primary" class="content-area">
            <div class="p-50"></div>

            <!-- <div class="page-title">
                <h1>Portfolio</h1>
              </div> -->

            <div id="content" class="page-content site-content single-post" role="main">

              <div class="row">
                <div class=" col-xs-12 col-sm-12 ">
                  <!-- Portfolio Content -->
                  <div id="portfolio_content_q" class="portfolio-content">

                    <ul class="portfolio-filters">
                      <li class="active">
                        <a class="filter btn btn-sm btn-link" id="button_post">Post Doctoral Fellows</a>
                      </li>
                      <li>
                        <a class="filter btn btn-sm btn-link" id="button_phd">Ph.D</a>
                      </li>

                      <li>
                        <a class="filter btn btn-sm btn-link" id="button_mtech">M.Tech</a>
                      </li>
                    </ul>
                    <hr>
                    <!-- Insert data based on category selected -->
                    <div class="row" id="data">
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <footer class="site-footer clearfix">
            <div class="footer-social">
              <ul class="footer-social-links">
                <li>
                  <a href="">Department Of Civil Engineering, IIT Bombay</a>
                </li>
              </ul>
            </div>
          </footer>

        </div>
      </div>

      <script src="js/jquery-2.1.3.min.js"></script>

      <!-- Custom JS scripts -->
      <script src="ajax.js"></script>
      <script src="students.js"></script>

      <script type="text/javascript">
        $(() => {
          $('#button_post').trigger('click');
        });
      </script>
      <!-- Custom JS scripts -->

      <script src="js/imagesloaded.pkgd.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src='js/jquery.shuffle.min.js'></script>
      <script src='js/masonry.pkgd.min.js'></script>
      <script src='js/owl.carousel.min.js'></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrDf32aQTCVENBhFJbMBKOUTiUAABtC2o"></script>
      <script src="js/jquery.googlemap.js"></script>
      <script src="js/validator.js"></script>
      <script src="js/main.js"></script>
</body>

<!-- Mirrored from lmpixels.com/demo/leven-html-new/full-width-light/portfolio-4-columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 22:17:39 GMT -->

</html>