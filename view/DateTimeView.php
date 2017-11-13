<?php

class DateTimeView{
  public function show(){
    //Returns a date with following format "Wednesday, the 20th of September 2017, The time is 17:13:29"
    return '<p>' . date('l\, \t\h\e\ jS \o\f F Y, \T\h\e \t\i\m\e \i\s H:i:s') . '</p>';
  }
}
