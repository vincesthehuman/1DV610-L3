<?php
require_once('DateTimeView.php');
require_once('UrlView.php');

class LayoutView{
  private $dateTimeView;
  private $urlView;

  public function __construct(){
    $this->dateTimeView = new DateTimeView();
    $this->urlView = new UrlView();
  }

  public function render($contentToRender){
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderLink() . '
          ' . $this->renderIsLoggedIn() . '
          <div class="container">
            ' . $contentToRender . '
            ' . $this->dateTimeView->show() . '
          </div>
        </body>
      </html>
    ';
  }

  private function renderLink(){
    switch ($this->urlView->getUrl()) {
      case 'register':
        return $this->renderLoginLink();
        break;

      default:
        return $this->renderRegisterLink();
        break;
    }
  }

  private function renderIsLoggedIn(){
    if ($_SESSION['isLoggedIn']) {
      return '<h2>Logged in</h2>';
    }else{
      return '<h2>Not logged in</h2>';
    }
  }

  private function renderLoginLink(){
    return '<a href="?">Back to login</a>';
  }

  private function renderRegisterLink(){
    return '<a href="?register">Register a new user</a>';
  }

}
