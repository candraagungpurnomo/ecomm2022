<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() { 
        parent::__construct(); 

         // Load google oauth library 
        $this->load->library('google'); 
        // Load facebook oauth library 
        //$this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('user'); 
        $this->load->model('konsumen_model');
    } 

	public function index()
	{
		$validation = $this->form_validation;
        $validation->set_rules($this->konsumen_model->rulesLogin());
		if($this->form_validation->run() == FALSE){
            $data['googleAuthURL'] = $this->google->createAuthUrl();
			//$data['fbAuthURL'] =  $this->facebook->login_url(); 
			$this->load->view('form_login',$data);
		} else {
			$valid_user = $this->konsumen_model->check_credential();
			if($valid_user == FALSE){
				$this->session->set_flashdata('error','Username atau Password salah');
				$this->load->view('form_login');
			} else {
				// if the username and password is a match
				$this->session->set_userdata('id', $valid_user->kd_konsumen);
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('group', $valid_user->group);
				switch($valid_user->group){
					case 1 : //admin
								redirect('admin/produk'); 
								break;
					case 2 : //member
								redirect(base_url());
								break;
					default: break; 
				}
			}
		}
    }
    
    public function g_login(){ 
                 
        if(isset($_GET['code'])){ 
             
            // Otentikasi pengguna dengan google
			$client = $this->google;
			$client->authenticate($_GET['code']);
			# ambil profilenya
			$gp = new Google_Service_Plus($client);
            $gpInfo = $gp->people->get("me"); 

            // Get user info from google 
            $gpInfo = $this->google->getUserInfo(); 

             
            // // Preparing data for database insertion 
            // $userData['oauth_provider'] = 'google'; 
            // $userData['oauth_uid']         = $gpInfo['id']; 
            // $_firstname                 = $gpInfo['given_name']; 
            // $_lastname                  = $gpInfo['family_name']; 
            // $userData['nm_konsumen']        = $_firstname.' '.$_lastname; 
            // $userData['username']        = $_firstname; 
            // $userData['email']             = $gpInfo['email'];
            // $userData['foto']         = !empty($gpInfo['picture'])?$gpInfo['picture']:''; 
            // $userData['group']    = 2;

             
            // Insert or update user data to the database 
            $userID = $this->user->checkUser($userData); 
              
             
            // Store the user profile info into session 
            //-//$this->session->set_userdata('userData', $userData); 
            $this->session->set_userdata('id', $userID);
			$this->session->set_userdata('username', $userData['username']);
			$this->session->set_userdata('group', $userData['group']);
			redirect(base_url()); 
        }  
         
        // // Google authentication url 
        // $data['loginURL'] = $this->google->createAuthUrl();
         
        // // Load google login view 
        // $this->load->view('user_authentication/index',$data); 
    } 

	public function fb_login(){ 
        $userData = array(); 
         
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
 
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $_firstname              = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $_lastname               = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['nm_konsumen']        = $_firstname.' '.$_lastname; 
            $userData['username']        = $_firstname; 
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['foto']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            $userData['group']    = 2;
             
            // Insert or update user data to the database 
            $userID = $this->user->checkUser($userData); 
             
            // Check user data insert or update status 
            if(!empty($userID)){ 
                $data['userData'] = $userData; 
                 
                // Store the user profile info into session 
                //-//$this->session->set_userdata('userData', $userData); 
                $this->session->set_userdata('id', $userID);
				$this->session->set_userdata('username', $userData['username']);
				$this->session->set_userdata('group', $userData['group']);
				redirect(base_url()); 
            }else{ 
			   $data['userData'] = array(); 
			   redirect('login'); 
            } 
             
            // Facebook logout URL 
            //$data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            //$data['authURL'] =  $this->facebook->login_url(); 
        } 
         
        // Load login/profile view 
        // $this->load->view('user_authentication/index',$data); 
    }


	public function logout()

	{

		$this->session->sess_destroy();

		redirect('login');

	}

}