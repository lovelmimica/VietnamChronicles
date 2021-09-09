<!DOCTYPE html>
<html class="html" data-wf-page="5e10e53b6a42a4383b554b78" data-wf-site="5e10e53b6a42a44939554b71">
<head>
  <?php wp_head() ?>
  <meta charset="utf-8">
  <title><?php if( is_front_page() ) echo "Vietnam Chronicles"; else wp_title() ?></title>
  <?php if( is_single() ) echo "<meta name='single' content='true' >" ?>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Droid Sans:400,700","Changa One:400,400italic","Droid Serif:400,400italic,700,700italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='icon' href='<?php echo get_site_url() ?>/wp-content/themes/vietnam_chronicles/images/vnc-favicon.svg' type='image/x-icon' />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117802328-4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-117802328-4');
  </script>

</head>
<body id='page-top' class="body">
  <section class="header_wrapper">
  <a class='header__mobile-logo-wrapper' href="<?php echo get_site_url() ?>/">
        <img class='header__mobile-logo' src="<?php echo get_site_url() ?>/wp-content/uploads/2020/04/logo.png" />
        </a>
    <div class="header">
      <div class="header_item header_item-menu_icon">
          <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
      </div>
      <a href="<?php echo get_site_url() ?>/" class="header_item header_item-logo">
          <img src="<?php echo get_site_url() ?>/wp-content/uploads/2020/04/logo.png" />
        </a>
      <nav role="navigation" class="header_item header_item-nav_links">
          <a class="link-header w-nav-link expandable-item-countries">COUNTRIES &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
          <a href="<?php echo get_site_url() ?>/category/our-journeys/" class="link-header w-nav-link">OUR JOURNEYS</a>
          <a href="<?php echo get_site_url() ?>/postcards/" class="link-header w-nav-link">POSTCARDS</a>
          <a href="<?php echo get_site_url() ?>/about/" class="link-header w-nav-link">ABOUT</a>
          <a href="<?php echo get_site_url() ?>/work-with-us/" class="link-header w-nav-link">WORK WITH US</a>
          <a href="<?php echo get_site_url() ?>/contact/" class="link-header w-nav-link">CONTACT</a>
        </nav>
        <div class="header_item header_item-sm_icons">
          <a href="https://www.facebook.com/vietnamchronicles/" class="link-sm link-header w-embed"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
          <a href="https://www.instagram.com/vietnamchronicles/" class="link-sm link-header w-embed"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
        </div>
        <form name="email-form-3" id="search_form" data-name="Email Form 3" class="header_item header_item-search_form" method="GET" action="<?php echo get_site_url() ?>/search-results/">
              <input type="text" class="search-posts search-box w-input" maxlength="256" name="query" data-name="Email 2" placeholder="Search..." id="email-2" required="">
              <div class="div-block-41">
                <div class="search-icon w-embed"><i class="fa fa-search fa-lg" aria-hidden="true"></i></div>
              </div>
        </form>
    </div>
    <div class="mobile-navigation-menu hidden">
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/">HOME</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/">VIETNAM </a><span class="expand-mobile-menu expand-mobile-menu-vietnam"><i class="fa fa-caret-down" aria-hidden="true"></i></span></span>
      <span class="menu-item menu-subitem hidden w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-culture/" ><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;</i>VIETNAM CULTURE</a></span>
      <span class="menu-item menu-subitem hidden w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/"  ><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;VIETNAM DESTINATIONS</a> <span class="expand-mobile-menu expand-mobile-menu-vietnam-dest"><i class="fa fa-caret-down" aria-hidden="true"></i></span></span>
      <span class="menu-item menu-subsubitem hidden w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/north-vietnam/" ><i class="fa fa-angle-double-right" aria-hidden="true"></i><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;NORTH VIETNAM</a></span>
      <span class="menu-item menu-subsubitem hidden w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/central-vietnam/" ><i class="fa fa-angle-double-right" aria-hidden="true"></i><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;NORTH VIETNAM</a></span>
      <span class="menu-item menu-subsubitem hidden w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/south-vietnam/" ><i class="fa fa-angle-double-right" aria-hidden="true"></i><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;NORTH VIETNAM</a></span>
      <span class="menu-item menu-subitem hidden w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-living/" ><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;LIVING IN VIETNAM</a></span>
      <span class="menu-item menu-subitem hidden w3-animate-left"><a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-travel-tips/" ><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;VIETNAM TRAVEL TIPS</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/category/laos/">LAOS</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/category/cambodia/">CAMBODIA</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/category/our-journeys/">OUR JOURNEYS</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/postcards/">POSTCARDS</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/about/">ABOUT</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/work-with-us/">WORK WITH US</a></span>
      <span class="menu-item w3-animate-left"><a href="<?php echo get_site_url() ?>/contact/">CONTACT</a></span>
    </div>
  </section>

  <div class='navigation-submenu'>
    <div class="navigation-submenu-countries w3-animate-top">  
      <a href="<?php echo get_site_url() ?>/category/vietnam/" class="submenu-item link-header expandable-item-vietnam">VIETNAM &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
      <a href="<?php echo get_site_url() ?>/category/laos/" class="submenu-item link-header">LAOS</a>
      <a href="<?php echo get_site_url() ?>/category/cambodia/" class="submenu-item link-header">CAMBODIA</a>
    </div>
    <div class="navigation-submenu-vietnam w3-animate-top">
      <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-culture/" class="submenu-item link-header">VIETNAM CULTURE</a>
      <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/" class="submenu-item link-header expandable-item-destinations">VIETNAM DESTINATIONS &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
      <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-living/" class="submenu-item link-header">LIVING IN VIETNAM</a>
      <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-travel-tips/" class="submenu-item link-header">VIETNAM TRAVEL TIPS</a>
    </div>
    <div class="navigation-subsubmenu-destinations w3-animate-left">
      <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/north-vietnam/" class="submenu-item link-header">NORTH VIETNAM</a>
      <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/central-vietnam/" class="submenu-item link-header">CENTRAL VIETNAM</a>
      <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/south-vietnam/" class="submenu-item link-header">SOUTH VIETNAM</a>
    </div>
  </div>
  
 