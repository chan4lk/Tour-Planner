<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Tour Planner</title>
	<meta charset="utf-8">
	<link rel="icon" href="#" type="image/x-icon">
	<link rel="shortcut icon" href="#" type="image/x-icon">
	<link rel="icon" type="image/ico" href="img/favicon.ico">
	<meta name="Tour planner Android app" content="Plan your dream tour">
	<meta name="Viento" content="Tharaka Nilupul">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/kwicks-slider.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/my_style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/css"  type="text/css">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	  
	<script type="text/javascript" src="js/touchTouch.jquery.js"></script>
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script><script src="./About_files/jquery.preloader.js"></script>

	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();    }	
		 
     jQuery('.magnifier').touchTouch();			
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 
				
	</script>

	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
  <![endif]-->
	</head>

	<!-- Add this element exactly where you want the Rating-Widget to appear -->

<!--
    You can add more Rating-Widgets in your site,
    just pick some new rating-widget-unique-id (must be positive integer).
    For example (rating-widget-unique-id = 38):
    <div class="rw-ui-container rw-urid-38"></div>
-->


	<body>
<div class="spinner"></div>
<!--============================== header =================================-->
<header>
      <div class="container clearfix">
    <div class="row">
          <div class="span12">
        <div class="navbar navbar_">
              <div class="container">
            <h1 class="brand brand_"><a href="#"><img alt="" src="img/logo2.png"> </a></h1>
            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
                  <ul class="nav sf-menu sf-js-enabled">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">App</a></li>
                <li class="active"><a href="hotels.php">Hotel</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </header>
<div class="bg-content"> 
      
      <!--============================== content =================================-->
    <div class="container">
          <div class="row">
        <article class="span12">
              <h3>Services</h3>
            </article>
        <div class="clear"></div>
        <ul class="thumbnails thumbnails-1 list-services">
        
<?php for($i=0;$i<6;$i++){ ?>          
  <li class="span4">
            <div class="thumbnail thumbnail-1"> 
	            <div>
	            <img  src="img/hotels/2.jpe" alt=""></div>
            <div style="width:260px; height:20px; background:#000; padding:10px; margin-top:-160px;position:absolute; opacity:0.8; color:#01aaed">HILTON HOTEL</div>
                  <section> <a href="#" class="link-1">Click to Bit </a>
                <div class="rw-ui-container rw-urid-1"></div>
              </section>
                </div>
          </li>
      <?php } ?>
   
         </ul>
         
      </div>
        </div>
  </div>


<!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
    <ul class="list-social pull-right">
          <li><a class="icon-1" href="#"></a></li>
          <li><a class="icon-2" href="#"></a></li>
          <li><a class="icon-3" href="#"></a></li>
          <li><a class="icon-4" href="#"></a></li>
        </ul>
    <div class="privacy pull-left">© 2013 <a href="#" target="_blank" rel="nofollow"> Team Viento </a> All Rights Reserved  </div>
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>

<!-- Add this element exactly where you want the Rating-Widget to appear -->


<!--
    You can add more Rating-Widgets in your site,
    just pick some new rating-widget-unique-id (must be positive integer).
    For example (rating-widget-unique-id = 38):
    <div class="rw-ui-container rw-urid-38"></div>
-->

<!-- Add this javascript code immediately before the </body> tag -->
<div class="rw-js-container">
    <script type="text/javascript">
        // Async Rating-Widget initialization.
        function RW_Async_Init(){
            RW.init({
                uid: "FBF53B1332A75A1B577A7F7586B03567",
                huid: "131059",
                options: {
                    size: "medium",
                    theme: "star_oxygen1"
                }
            });
            RW.render();
        }

        // Append Rating-Widget JavaScript library.
        if (typeof(RW) == "undefined"){
            (function(){
                var rw = document.createElement("script"),
                    d = new Date(), ck = "Y" + d.getFullYear() + "M" + d.getMonth() + "D" + d.getDate();
                rw.type = "text/javascript"; rw.async = true;
                rw.src = "http://js.rating-widget.com/external.min.js?ck=" + ck;
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(rw, s);
            })();
        }

    </script>
</div>


</body>
</html>