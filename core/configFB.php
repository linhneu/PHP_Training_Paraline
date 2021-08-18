<?php
require_once('./core/autoload.php'); 

define('APP_ID','361145988958077');
define('APP_SECRET', 'fa948ca2d92929ecb6f3ceef4594220c');
define('API_VERSION', 'v2.5');
define('FB_BASE_URL', 'http://localhost:81/PHP-training-Paraline/index.php?controller=user');


if(!session_id()){
    session_start();
  }
  // Call Facebook API
  $fb = new Facebook([
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