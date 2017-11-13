<?php

class UrlView{
  public function getUrl(){
    return key($_GET);
  }
}
