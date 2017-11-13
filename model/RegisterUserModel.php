<?php

class RegisterUserModel{
  private $notCorrectInputMessage;
  private static $name = 'RegisterView::UserName';
  private static $password = 'RegisterView::Password';
  private static $passwordRepeat = 'RegisterView::PasswordRepeat';
  private static $minimumNameLength = 3;
  private static $minimumPasswordLength = 6;

  public function __construct(){
  }

  public function innit($array){
    $this->checkNameLength($array);
    $this->checkPasswordLength($array);
    if(strpos($array[self::$name], '<') !== false){
      $this->notCorrectInputMessage .= 'Username contains invalid characters.';
      $_SESSION[self::$name] = strip_tags($array[self::$name]);
    }
    return $this->notCorrectInputMessage;
  }

  private function checkNameLength($array){
    if(strlen($array[self::$name]) < self::$minimumNameLength){
      $this->notCorrectInputMessage .= 'Username has too few characters, at least 3 characters.' . '<br>';
    }
  }

  private function checkPasswordLength($array){
    if (strlen($array[self::$password]) < self::$minimumPasswordLength) {
      $this->notCorrectInputMessage .= 'Password has too few characters, at least ' . self::$minimumPasswordLength . ' characters. <br>';
    }
  }

}
