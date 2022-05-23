<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

set_include_path(APPPATH . 'third_party/' . PATH_SEPARATOR . get_include_path());
require_once APPPATH . 'third_party/Google/autoload.php';
require_once APPPATH . 'third_party/Google/Client.php';
// require_once APPPATH . 'third_party/Google/Auth/OAuth2.php';

class Google extends Google_Client {
	function __construct() {
		parent::__construct(); 
		$this->setAuthConfigFile(APPPATH . 'client_secret.json');
		$this->setRedirectUri("http://localhost/E-COMERCEE/Kampung_Anggrek/index.php/login/g_login");
		$this->setScopes(array(
		"https://www.googleapis.com/auth/plus.login",
		"https://www.googleapis.com/auth/userinfo.email",
		"https://www.googleapis.com/auth/userinfo.profile",
		"https://www.googleapis.com/auth/plus.me",
		)); 
	}
}