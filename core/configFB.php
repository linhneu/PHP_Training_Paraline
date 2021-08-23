<?php
require_once('./core/Facebook/autoload.php'); 

define('APP_ID','892782478034133');
define('APP_SECRET', 'cb73d06cfd63ce1ccd71bf8564305fae');
define('API_VERSION', 'v2.7');
define('FB_BASE_URL', 'http://localhost:81/PHP-training-Paraline/index.php?controller=user');
define('BASE_URL', 'http://localhost:81/PHP-training-Paraline/index.php?controller=user');


if(!session_id()){
    session_start();
  }
  // Call Facebook API
  $fb = new Facebook\Facebook([
  'app_id' => APP_ID,
  'app_secret' => APP_SECRET,
  'default_graph_version' => API_VERSION,
  ]);
  
  // Get redirect login helper
  $fb_helper = $fb->getRedirectLoginHelper();
  
  // Try to get access token
  try {
    if(isset($_SESSION['facebook_access_token']))
    {$accessToken = $_SESSION['facebook_access_token'];}
  else
    {$accessToken = $fb_helper->getAccessToken();}
  } catch(FacebookResponseException $e) {
     echo 'Facebook API Error: ' . $e->getMessage();
      exit;
  } catch(FacebookSDKException $e) {
    echo 'Facebook SDK Error: ' . $e->getMessage();
      exit;
  }