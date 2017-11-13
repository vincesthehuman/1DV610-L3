<?php
class LoginModel{
  private $notCorrectInputMessage;
  private static $username = 'username';
  private static $password = 'password';

  public function __construct(){
  }

  //Should call on not emptyCredentials (Checking if password or username is present)
  //Should call on cehckCredentials if notEmptyCredentials is true
  public function checkLoginCredentials($array){
    if($this->emptyCredentials($array)){
      return $this->notCorrectInputMessage;
    }else{
     return $this->checkCredentials($array);
    }
  }

  private function emptyCredentials($array){
    foreach ($array as $key => $value) {
      if (strlen($value) <= 0) {
        return $this->notCorrectInputMessage .= ucfirst($key) . ' is missing';
      }
    }
  }

  private function checkCredentials($array){
    $foo = '';
    if($array[self::$username] === 'Admin' && $array[self::$password] === 'Password'){
      $_SESSION['isLoggedIn'] = true;
      $foo .= 'Welcome';
    }else{
      $foo .= 'Wrong name or password';
    }
    return $foo;
  }

}
