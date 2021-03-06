<?php
@include_once "locale.inc.php";

$CONFIG['LOG_DIR'] = "../logs/";
$GLOBAL_PATH = "../";
$APP_PATH = "../com/";
$ENGINE_PATH = "../engines/";
$WEBROOT = "../public_html/";

error_reporting(E_ALL);
//set aplikasi yang digunakan
define('APPLICATION','application'); 
define('COORPORATE_APPS','coorporate_apps');
define('MOBILE_APPS','mobile');
define('WAP_APPS','wap_apps'); 
define('DASHBOARD_APPS','dashboard'); 
define('ADMIN_APPS','admin'); 

define('WIDGET_DOMAIN_WEB',APPLICATION."/widgets/");
define('WIDGET_DOMAIN_COORPORATE',COORPORATE_APPS."/widgets/");
define('WIDGET_DOMAIN_MOBILE',MOBILE_APPS."/widgets/");
define('WIDGET_DOMAIN_WAP',WAP_APPS."/widgets/"); //new
define('WIDGET_DOMAIN_DASHBOARD',DASHBOARD_APPS."/widgets/"); //new
define('WIDGET_DOMAIN_ADMIN',ADMIN_APPS."/widgets/"); //new

define('HELPER_DOMAIN_WEB',APPLICATION."/helper/");
define('HELPER_DOMAIN_COORPORATE',COORPORATE_APPS."/helper/");
define('HELPER_DOMAIN_MOBILE',MOBILE_APPS."/helper/");
define('HELPER_DOMAIN_WAP',WAP_APPS."/helper/"); //new
define('HELPER_DOMAIN_DASHBOARD',DASHBOARD_APPS."/helper/"); //new
define('HELPER_DOMAIN_ADMIN',ADMIN_APPS."/helper/"); //new

define('MODULES_DOMAIN_WEB',$APP_PATH.APPLICATION."/modules/");
define('MODULES_DOMAIN_COORPORATE',$APP_PATH.COORPORATE_APPS."/modules/");
define('MODULES_DOMAIN_MOBILE',$APP_PATH.MOBILE_APPS."/modules/");
define('MODULES_DOMAIN_WAP',$APP_PATH.WAP_APPS."/modules/"); //new
define('MODULES_DOMAIN_DASHBOARD',$APP_PATH.DASHBOARD_APPS."/modules/"); //new
define('MODULES_DOMAIN_ADMIN',$APP_PATH.ADMIN_APPS."/modules/"); //new

define('TEMPLATE_DOMAIN_WEB',APPLICATION."/web/");
define('TEMPLATE_DOMAIN_COORPORATE',APPLICATION."/coorporate/");
define('TEMPLATE_DOMAIN_MOBILE',APPLICATION."/mobile/");
define('TEMPLATE_DOMAIN_WAP',APPLICATION."/wap/"); //new
define('TEMPLATE_DOMAIN_DASHBOARD',APPLICATION."/dashboard/"); //new
define('TEMPLATE_DOMAIN_ADMIN',APPLICATION."/admin/"); //new

define('SCHEMA_DATA','code2book');
//set TRUE jika dalam local
$local = false;
$DEVELOPMENT_MODE = true;
$CONFIG['DEFAULT_MODULES'] = "goahead.php";
$CONFIG['DEFAULT_MODULES_ADMIN'] = "aspirationtravia.php";
$CONFIG['VIEW_ON']  = 1;
$CONFIG['DINAMIC_MODULE']  = "goahead";
$CONFIG['DINAMIC_MODULE_ELSE']  = "goahead";
$CONFIG['REGISTER_PAGE']  = "register";
$CONFIG['LOCAL_DEVELOPMENT'] = true;
$CONFIG['DELAYTIME'] = 0;
$CONFIG['MOP_TIME_TRACK'] = 100000;

if(preg_match("/117./i",$_SERVER['HTTP_HOST'])){
	$DOMAIN = "http://{$_SERVER['HTTP_HOST']}/story/public_html/";
}else{
	$DOMAIN = "http://{$_SERVER['HTTP_HOST']}/story/public_html/";
}
$CONFIG['BASE_DOMAIN_PATH'] = "http://{$_SERVER['HTTP_HOST']}/story/public_html/";
$DomainAdimin = "http://{$_SERVER['HTTP_HOST']}/story/";
$CONFIG['CLOSED_WEB'] = false;
$CONFIG['TEASER_DOMAIN'] =  "{$DOMAIN}";
$CONFIG['MAINTENANCE'] = false;
$CONFIG['BASE_DOMAIN'] = "{$DOMAIN}";
$CONFIG['DASHBOARD_DOMAIN'] = "{$DOMAIN}";
$CONFIG['COORPORATE_DOMAIN'] = "{$DOMAIN}coorporate_html/";
$CONFIG['WAP_DOMAIN'] =  "{$DOMAIN}wap_html/"; //new
$CONFIG['ADMIN_DOMAIN'] =  "{$DomainAdimin}admin_html/"; //new
$CONFIG['Postpaid_OnlineRegistration'] = "{$DOMAIN}Postpaid_OnlineRegistration/";
$CONFIG['Prepaid_Registrations'] = "{$DOMAIN}Prepaid_Registrations/";

$CONFIG['ASSETS_DOMAIN_WEB'] = $CONFIG['BASE_DOMAIN']."assets/";
$CONFIG['ASSETS_DOMAIN_COORPORATE'] = $CONFIG['COORPORATE_DOMAIN']."assets/";
$CONFIG['ASSETS_DOMAIN_WAP'] = $CONFIG['WAP_DOMAIN']."assets/"; //new
$CONFIG['ASSETS_DOMAIN_DASHBOARD'] = $CONFIG['DASHBOARD_DOMAIN']."assets/"; //new
$CONFIG['ASSETS_DOMAIN_ADMIN'] = $CONFIG['ADMIN_DOMAIN']."assets/"; //new

$CONFIG['PUBLIC_ASSET'] = "public_assets/";
$CONFIG['LOCAL_PUBLIC_ASSET'] = " /home/amild/public_html/staging/public_html/story/public_html/public_assets/";

if($CONFIG['LOCAL_DEVELOPMENT']) $CONFIG['LOGIN_PAGE']  = "{$DOMAIN}login/local";
else  $CONFIG['LOGIN_PAGE']  = "{$DOMAIN}landing";  

$CONFIG['UPLOAD_ASSET'] = "/home/amild/public_html/staging/public_html/story/public_html/public_assets/";
$CONFIG['UPLOAD_SOURCE_ASSET'] = "{$DOMAIN}assets/content/phase4/news/";

$CONFIG['MOBILE_SITE'] =  "{$DOMAIN}mobile_html/";
$CONFIG['ASSETS_DOMAIN_MOBILE'] = $CONFIG['MOBILE_SITE']."assets/"; //new

$CONFIG['SESSION_NAME'] = "social_a360";

$CONFIG['MODERATION'] = 0;


/* allow access page on unverified */
$CONFIG['access-unverified'] = array("home");


//SOCIAL MEDIA
//testing
$FB['appID'] = "181586055282513";
$FB['appSecret'] = "d22971d06613820427e4e44cdfe1d67b";

// $FB['appID'] = "341380259214774";
// $FB['appSecret'] = "63685e1fd7db81fc51a04de0e2034ceb";

$TWITTER['CONSUMER_KEY'] = 'CeAeKQ6W2flJaiR7m5D3uQ';
$TWITTER['CONSUMER_SECRET'] = 'QS7jBlukxkXhN1bUqFAh5K3Z1pz84Z9fGjgoeJ5mxu8';
$TWITTER['LOGIN_CALLBACK'] = $CONFIG['BASE_DOMAIN'].'?loginType=twitter';

$GPLUS['client_id'] = "990314435829.apps.googleusercontent.com";
$GPLUS['client_secret'] = "c6TzeOJkdOJxtzr_TGMxv5xN";
$GPLUS['developer_key'] = "AIzaSyAWZTca5Nth3LPhlzI9dJUsG2kZUMhFB7I";
$GPLUS['redirect_url'] = "{$DOMAIN}public_html/?loginType=google";

$VIKI['application_id'] ="4fd917c27e2e3f464ebee73fea5abab9f42607887a7f5d705361c4e1dec3fdd8";
$VIKI['application_secret'] = "f59f2126673bf7b629a2867d9dc02e6dcff1e9896fa1b25be6e9ba2eb4003bdb";
$VIKI['callback'] =  "http://viki.com";

/**
 * memcache setting
 */
 $CONFIG['memcache_host'] = "127.0.0.1";
 $CONFIG['memcache_port'] = 11211;


/**
 * GPlus Bot Configuration
 */
$GPLUSBOT['target_id'] = "111091089527727420853";
$GPLUSBOT['maxResults'] = 10;
$GPLUSBOT['bot_sleep_time'] = 60;

//$CONFIG['DATABASE_WEB'] = "marlboro_inorout_web";
$CONFIG['DATABASE_WEB'] = "gstory";
$CONFIG['DATABASE_ADMIN'] = "gstory";
$CONFIG['DATABASE_LOGS'] = "marlboro_inorout_logs";
$CONFIG['DATABASE_REPORTS'] = "marlboro_inorout_reports";
if($local){
        $CONFIG['DATABASE'][0]['HOST']          = "localhost";
        $CONFIG['DATABASE'][0]['USERNAME']      = "root";
        $CONFIG['DATABASE'][0]['PASSWORD']      = "";
        $CONFIG['DATABASE'][0]['DATABASE']      = "go_ahead_story";
		
	$CONFIG['DATABASE'][1]['HOST'] 		= "localhost";
	$CONFIG['DATABASE'][1]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][1]['PASSWORD'] 	= "";
	$CONFIG['DATABASE'][1]['DATABASE'] 	= "marlboro_inorout_admin";
}else{
        $CONFIG['DATABASE'][0]['HOST']          = "117.54.1.99";
        $CONFIG['DATABASE'][0]['USERNAME']      = "amild";
        $CONFIG['DATABASE'][0]['PASSWORD']      = "m1ldl1ght*";
        $CONFIG['DATABASE'][0]['DATABASE']      = "gstory";
		
		$CONFIG['DATABASE'][1]['HOST']          = "117.54.1.99";
        $CONFIG['DATABASE'][1]['USERNAME']      = "amild";
        $CONFIG['DATABASE'][1]['PASSWORD']      = "m1ldl1ght*";
        $CONFIG['DATABASE'][1]['DATABASE']      = "gstory"; 
		
		$CONFIG['DATABASE'][2]['HOST']          = "117.54.1.99";
        $CONFIG['DATABASE'][2]['USERNAME']      = "goaheadpeople";
        $CONFIG['DATABASE'][2]['PASSWORD']      = "0A=)N7*p,+fH*";
        $CONFIG['DATABASE'][2]['DATABASE']      = "goaheadpeople_db"; 
		 
}

$CONFIG['SERVICE_URL'] = "service/";
$CONFIG['salt'] = '12345678';
/* DATETIME SET */
$timeZone = 'Asia/Jakarta';
date_default_timezone_set($timeZone);


$SMAC_SECRET = sha1("harveyspecterssuits");
$SMAC_HASH = sha1("mikerosssuits");

$CONFIG['SERVICE_KEY'] = sha1("axis2012");


/**
 * Email settings
 */
$CONFIG['EMAIL_FROM_DEFAULT'] = "noreply-aexchange@amild.com";
$CONFIG['EMAIL_SMTP_HOST'] = "localhost";
$CONFIG['EMAIL_SMTP_PORT'] = 25;
$CONFIG['EMAIL_SMTP_USER'] = "";
$CONFIG['EMAIL_SMTP_PASSWORD'] = "";
$CONFIG['EMAIL_SMTP_SSL'] = 0;



/* MOP SETTING */
$CONFIG['BASE_MOP_URL'] = "https://staging-artcademy-amild.es-dm.com/";
$CONFIG['MOP_URL'] = "{$CONFIG['BASE_MOP_URL']}dm.mopid.webservice/centralwebservice.asmx";
$CONFIG['MOP_USER'] = "hosting\pmimopID";
$CONFIG['MOP_PWD'] = "Pm1jkd!";



?>
