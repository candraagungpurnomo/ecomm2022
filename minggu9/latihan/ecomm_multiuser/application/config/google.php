<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '42591419565-fidpbbmurmbcrkpa909c9m5aifjf1rbf.apps.googleusercontent.com';
$config['google']['client_secret']    = 'xpmkIYNnBzpVnA2uVByUgc66';
$config['google']['redirect_uri']     = 'http://riyankencana.educationhosts.cloud/index.php/login/g_login';
$config['google']['application_name'] = 'Login to Kampung Anggrek';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();

?>