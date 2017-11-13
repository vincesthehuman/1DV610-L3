<?php
class LoginView
{
  private static $login = 'LoginView::Login';
  private static $logout = 'LoginView::Logout';
  private static $name = 'LoginView::UserName';
  private static $password = 'LoginView::Password';
  private static $cookieName = 'LoginView::CookieName';
  private static $cookiePassword = 'LoginView::CookiePassword';
  private static $keep = 'LoginView::KeepMeLoggedIn';
  private static $messageId = 'LoginView::Message';
 

  /**
   * Create HTTP response
   *
   * Should be called after a login attempt has been determined
   *
   * @return  void BUT writes to standard output and cookies!
   */
  public function response($message){
    if($_SESSION['isLoggedIn']){
      return $this->generateLogoutButtonHTML($message);
    }else{
      return $this->generateLoginFormHTML($message);
    }
  }

  /**
  * Generate HTML code on the output buffer for the logout button
  * @param $message, String output message
  * @return  void, BUT writes to standard output!
  */
  private function generateLogoutButtonHTML($message){
    return '
      <form  method="post" >
        <p id="' . self::$messageId . '">' . $message . '</p>
        <input type="submit" name="' . self::$logout . '" value="logout"/>
      </form>
    ';
  }
    
    /**
    * Generate HTML code on the output buffer for the logout button
    * @param $message, String output message
    * @return  void, BUT writes to standard output!
    */
  private function generateLoginFormHTML($message){
    return '
      <form method="post" > 
        <fieldset>
          <legend>Login - enter Username and password</legend>
          <p id="' . self::$messageId . '">' . $message . '</p>
          
          <label for="' . self::$name . '">Username :</label>
          <input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $_SESSION[self::$name] . '" />

          <label for="' . self::$password . '">Password :</label>
          <input type="password" id="' . self::$password . '" name="' . self::$password . '" />

          <label for="' . self::$keep . '">Keep me logged in  :</label>
          <input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
          
          <input type="submit" name="' . self::$login . '" value="login" />
        </fieldset>
      </form>
    ';
  }

  public function renderLink(){
    return '<a href="?register">Register a new user</a>';
  }
    
  public function getRequestUserName(){
    return $_REQUEST[self::$name];
  }

  public function getRequestPassword(){
    return $_REQUEST[self::$password];
  }

  public function getRequestKeepMeLoggedIn(){
    return $_REQUEST[self::$keep];
  }
    
  public function getStaticLoginString(){
    return self::$login;
  }

  public function wrongNameOrPasswordMessage(){
    return;//return correct message that will dispaly in the login view
  }
  
}
