<?php
//include ('./core/configFB.php');
class UserController extends BaseController
{
	private $userModel;
	public function __construct()
	{
		$this->loadModel('UserModel');
		$this->userModel = new UserModel;
	}
	public function index()
	{
		require_once('./core/configFB.php');

		$permissions = ['email']; //optional

		if (isset($accessToken)) {
			if (!isset($_SESSION['facebook_access_token'])) {
				//get short-lived access token
				$_SESSION['facebook_access_token'] = (string) $accessToken;

				//OAuth 2.0 client handler
				$oAuth2Client = $fb->getOAuth2Client();

				//Exchanges a short-lived access token for a long-lived one
				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
				$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

				//setting default access token to be used in script
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}

			//redirect the user to the index page if it has $_GET['code']
			if (isset($_GET['code'])) {
				header('Location:index.php?controller=user');
			}

			try {
				$fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
				$fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');

				$fb_user = $fb_response->getGraphUser();
				$picture = $fb_response_picture->getGraphUser();

				$_SESSION['fb_user_id'] = $fb_user->getProperty('id');
				$_SESSION['fb_user_name'] = $fb_user->getProperty('name');
				$_SESSION['fb_user_email'] = $fb_user->getProperty('email');
				$_SESSION['fb_user_pic'] = $picture['url'];
				$data = [
					'name' => $_SESSION['fb_user_name'],
					'email' => $_SESSION['fb_user_email'],
					'facebook_id' => $_SESSION['fb_user_id'],
					'avatar' => $_SESSION['fb_user_pic'],
					//'upd_datetime' => $upd_datetime,
					'status' => 1,
				];
				if(!isset($_SESSION['fb_user_name'])) {
				$this->userModel->insertUser($data);
				// 	//move_uploaded_file($picture['url']); 
				}
			} catch (FacebookResponseException $e) {
				echo 'Facebook API Error: ' . $e->getMessage();
				session_destroy();
				// redirecting user back to app login page
				header("Location: ./");
				exit;
			} catch (FacebookSDKException $e) {
				echo 'Facebook SDK Error: ' . $e->getMessage();
				exit;
			}
		} 
			$fb_login_url = $fb_helper->getLoginUrl(FB_BASE_URL, $permissions); 
			$this->view('frontend.users.index',
			['fb_login_url' => $fb_login_url,]
		);
		
	}
	public function logout()
	{
		session_unset();
		session_destroy();
		header('location:index.php?controller=user');
	}
}
