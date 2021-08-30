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

		$permissions = ['email'];

		if (isset($accessToken)) {
			if (!isset($_SESSION['facebook_access_token'])) {
				$_SESSION['facebook_access_token'] = (string) $accessToken;

				$oAuth2Client = $fb->getOAuth2Client();

				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
				$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}

			if (isset($_GET['code'])) {
				header('Location:index.php?controller=user');
			}

			try {
				$fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
				$fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');

				$fb_user = $fb_response->getGraphUser();
				$picture = $fb_response_picture->getGraphUser();
				$infoUser = [
					'fb_user_id' => $fb_user->getField('id'),
					'fb_user_name' => $fb_user->getField('name'),
					'fb_user_email' => $fb_user->getField('email'),
					'fb_user_pic' => $picture['url']
				];
				$_SESSION['user'] = $infoUser;
				$data = [
					'name' => $_SESSION['user']['fb_user_name'],
					'email' => $_SESSION['user']['fb_user_email'],
					'facebook_id' => $_SESSION['user']['fb_user_id'],
					'avatar' => $_SESSION['user']['fb_user_pic'],
					'status' => 1,
				];
				if (!isset($_SESSION['user']['fb_user_id'])) {
					$this->userModel->insertUser($data);
				}
			} catch (Facebook\Exceptions\FacebookResponseException $e) {
				echo 'Facebook API Error: ' . $e->getMessage();
				session_destroy();
				header("Location: ./");
				exit;
			} catch (Facebook\Exceptions\FacebookSDKException $e) {
				echo 'Facebook SDK Error: ' . $e->getMessage();
				exit;
			}
		}
		$fb_login_url = $fb_helper->getLoginUrl(FB_BASE_URL, $permissions);
		$this->view(
			'frontend.users.index',
			['fb_login_url' => $fb_login_url,]
		);
	}
	public function logout()
	{
		//session_destroy();
		unset($_SESSION['facebook_access_token']);
		unset($_SESSION['user']['fb_user_id']);
		header('location:index.php?controller=user');
	}
}
