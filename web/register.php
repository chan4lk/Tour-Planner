<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Register</title>
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
                <li><a href="hotels.php">Hotel</a></li>
                <li class="active"><a href="register.php">Register</a></li>
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
      <div id="content">
    <div class="container">
          <div class="row" style="background-image:url('img/flight3.png')">
        <article class="span6">
              <h3>Login</h3>
              <div class="inner-1">
            <form id="contact-form">
                  <fieldset>
                <div>
                    <label class="name">
                    <input type="text" placeholder="Username">
                    <br> </label>
                    </div>
                <div>
                    <label class="name">
                    <input type="text" placeholder="Password">
                    <br> </label>
                    </div>
                
                <div class="buttons-wrapper"><input type="submit" value="Login" class="mybtn"></div>
              </fieldset>
                </form>
               
          </div>
            </article>
            
            
            <article class="span6">
              <h3>Register</h3>
              <div class="inner-1">
            <form id="contact-form">
                  <fieldset>
                <div>
                    <label class="name">
                    <input type="text" placeholder="First Name">
                    <br> </label>
                    </div>
                <div>
                    <label class="name">
                    <input type="text" placeholder="Last Name">
                    <br> </label>
                    </div>
				<div>
                    <label class="name">
                    <input type="text" placeholder="Email">
                    <br> </label>
                    </div>
                    
                    <br>
                <label class="name">You are Register as ...</label><br>

				<select>
				  <option>Traveller</option>
				  <option>Service Provider</option>
				</select>
                    
				<div>
                    <label class="name">
                    <input type="text" placeholder="Password">
                    <br> </label>
                    </div>
                <div>
                    <label class="name">
                    <input type="text" placeholder="Confirm Password">
                    <br> </label>
                    </div>
                    
                
                
                
                <div class="buttons-wrapper"> <input type="reset" value="Clear" class="mybtn">&nbsp;&nbsp;<input type="submit" value="Submit" class="mybtn"></div>
              </fieldset>
                </form>
          </div>
            </article>

              </div>
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
</body>
</html>