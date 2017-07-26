<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="en-US"> <!--<![endif]-->
<head>
     <!--Meta Tags-->
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--Title-->
	<title>A Exchange</title>
    <!--Stylesheets-->
    <link rel="stylesheet" href="css/superfish.css" type="text/css"  media="all" />
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="all" />
    <link type="text/css" href="css/jqueryui/jquery.ui.datepicker.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<link rel="stylesheet" href="js/player/mediaelementplayer.min.css" />
    <link rel="stylesheet" href="css/a360.css" type="text/css"  media="all" />
    <link rel="stylesheet" href="css/a360_feb.css" type="text/css"  media="all" />
    <link rel="stylesheet" href="css/responsive.css" type="text/css"  media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css"  media="all" />
    <link rel="stylesheet" href="css/colours/red.css" type="text/css"  media="all" />
    <link rel="stylesheet" href="css/icon.css" type="text/css"  media="all" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <!--JavaScript-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script>
    <script type='text/javascript' src='js/jquery.prettyPhoto.js'></script>
    <script type="text/javascript" src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="js/jquery.simplyCountable.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/player/mediaelement-and-player.min.js"></script>
	<script type="text/javascript" src="js/customform.js"></script>
	<script type="text/javascript" src="js/pixastic.jquery.js"></script>
	<script type="text/javascript" src="js/pixastic.custom.js"></script>
	<script type="text/javascript" src="js/jquery.effect.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <!--[if (gte IE 6)&(lte IE 8)]>
        <script type="text/javascript" src="js/selectivizr-min.js"></script>
    <![endif]-->
    <!--[if IE 7]>
    <script type="text/javascript">
       $(function() {
           var zIndexNumber = 1000;
           // Put your target element(s) in the selector below!
           $("#top,#main-menu-wrapper,#right_menu").each(function() {
                   $(this).css('zIndex', zIndexNumber);
                   zIndexNumber -= 10;
           });
        });
    
    </script>
    <![endif]-->
</head>
<?php  if($_GET['menu']=='dj-booth'){ ?>
	<body id="djPage">
<?php }else if($_GET['menu']=='dj-booth-article'){ ?>
	<body id="djPage">
<?php }else{  ?>
	<body>
<?php } ?>
<div id="mainContainer">
	<div id="body" class="wrapper">
        <?php include('header.php'); ?>
		<?php 
        if($_GET['menu']=='about'){
            include("about.php");
        }else if($_GET['menu']=='music'){ 
            include("music.php");
        }else if($_GET['menu']=='fashion'){ 
            include("fashion.php");
        }else if($_GET['menu']=='visual-art'){ 
            include("visual-art.php");
        }else if($_GET['menu']=='photography'){ 
            include("photography.php");
        }else if($_GET['menu']=='post'){ 
            include("post.php");
        }else if($_GET['menu']=='news'){ 
            include("news.php");
        }else if($_GET['menu']=='article'){ 
            include("article.php");
        }else if($_GET['menu']=='event'){ 
            include("event.php");
        }else if($_GET['menu']=='myprofile'){ 
            include("myprofile.php");
        }else if($_GET['menu']=='myband'){ 
            include("myband.php");
        }else if($_GET['menu']=='mygallery'){ 
            include("mygallery.php");
        }else if($_GET['menu']=='myfriends'){ 
            include("myfriends.php");
        }else if($_GET['menu']=='friends'){ 
            include("friends.php");
        }else if($_GET['menu']=='dj-booth'){ 
            include("dj-booth.php");
        }else if($_GET['menu']=='dj-booth-article'){ 
            include("dj-booth-article.php");
        }else if($_GET['menu']=='search'){ 
            include("search.php");
        }else if($_GET['menu']=='inbox'){ 
            include("inbox.php");
        }else{ 
            include("home.php");
        }?>
	</div><!-- END .wrapper -->
    <?php include('footer.php'); ?>
    <?php include('popup_post.php'); ?>
    <div class="turntable"></div>
	<div class="headphone"></div>
</div>
</body>
</html>