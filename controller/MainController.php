<?php
require_once('view/UrlView.php');
require_once('view/LayoutView.php');
require_once('RegisterController.php');
require_once('LoginController.php');

class MainController{
  public function __construct(){
    $this->urlView = new UrlView();
    $this->layoutView = new LayoutView();
    $this->registerController = new RegisterController();
    $this->loginController = new LoginController();
    }

  public function init(){
    $this->layoutView->render($this->contentToRender());
  }

  private function contentToRender()
  {
    switch ($this->urlView->getUrl()) {
      case 'register':
        return $this->registerController->innit();
      break;
      default:
        return $this->loginController->innit();
      break;
    }
  }
  
}
