<?php
require_once('view/RegisterView.php');
require_once('model/RegisterUserModel.php');

class RegisterController{
  private $message;
  private static $name = 'RegisterView::UserName';
  private static $password = 'RegisterView::Password';
  private static $passwordRepeat = 'RegisterView::PasswordRepeat';
  
  public function __construct(){
    $this->registerView = new RegisterView();
    $this->registerModel = new registerUserModel();
  }

  public function innit(){
    if($this->registrationAttempt()){
      $_SESSION['RegisterView::UserName'] = $this->registerView->getRegisterUserName();
      $this->message = $this->registerModel->innit($this->getRegisterRequest());
    }
    return $this->registerView->response($this->message);
  }

  private function registrationAttempt(){
    return array_key_exists('RegisterView::Register', $_REQUEST);
  }

  private function getRegisterRequest(){
    return $array = array(
    self::$name => $this->registerView->getRegisterUserName(),
    self::$password => $this->registerView->getRegisterPassword(),
    self::$passwordRepeat => $this->registerView->getRgisterRepeatPassword()
    );
  }
  
}
