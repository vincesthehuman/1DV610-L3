<?php
require_once('view/LoginView.php');
require_once('model/LoginModel.php');

class LoginController{
  private $message;
  private static $username = 'username';
  private static $password = 'password';
  
  public function __construct(){
    $this->loginView = new LoginView();
    $this->loginModel = new LoginModel();
  }

  public function innit(){
    if ($this->loginAttempt()){
      $_SESSION['LoginView::UserName'] = $this->loginView->getRequestUserName();
      $this->message = $this->loginModel->checkLoginCredentials($this->getLoginRequest());
    }
    return $this->loginView->response($this->message);
  }

  //Checks if the request contains the static name for loginview
  private function loginAttempt(){
    return array_key_exists($this->loginView->getStaticLoginString(), $_REQUEST);
  }

  private function getLoginRequest(){
    return $array = array(
    self::$username => $this->loginView->getRequestUserName(),
    self::$password => $this->loginView->getRequestPassword()
    ); //'keepLoggedIn' => $this->loginView->getRequestKeepMeLoggedIn()
  }
  
}
