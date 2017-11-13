<?php
require_once('view/LoginView.php');

class ViewController{
  private $LoginView;

  public function __construct(){
    $this->LoginView = new LoginView();
  }
  
}
