<?php

/*  Super Simple Random String Generator by Aaron Toomey  */


if(php_sapi_name() === 'cli'){
  define('NL',PHP_EOL);
}else{
  define('NL','<br/>');
}

function generateRandomString($len = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $len; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


(isset($_REQUEST['len']) && is_numeric($_REQUEST['len'])) ? $length = (int)$_REQUEST['len'] : $length = 8;

if(isset($_REQUEST['len']) && !is_numeric($_REQUEST['len'])){
  echo 'Error with length given, using default of: 8'.NL;
}

if(isset($_REQUEST['multi'])){
  if(is_numeric($_REQUEST['multi'])){
    $max = (int)$_REQUEST['multi'];
    for($i=0;$i<$max;$i++){
      echo NL === '<br/>' ? '<p style="margin-top:20px;text-align:center;">'.generateRandomString($length).'</p>' : generateRandomString($length).NL;
    }
  }else{
    echo NL === '<br/>' ? '<p>Multi value given not a number</p><p style="margin-top:20px;text-align:center;">'.generateRandomString($length).'</p>' : 'Multi value given not a number'.NL.generateRandomString($length).NL;
  }
}else{
  echo NL === '<br/>' ? '<p style="margin-top:20px;text-align:center;">'.generateRandomString($length).'</p>' : generateRandomString($length).NL;
}

if(!isset($_REQUEST['len']) || !isset($_REQUEST['multi'])){
  echo NL === '<br/>' ? '<p style="text-align:left;fontsize:12px;">Incase you didn\'t know this script accepts two variables:<br/><b>len</b> (int) to set the length of the generated string<br/><b>multi</b> (int) set number to output multiple strings</p>' : 'Incase you didn\'t know this script accepts two variables:'.NL.'len (int) -> to set the length of the generated string'.NL.'multi (int) -> set number to output multiple strings'.NL. generateRandomString($length).NL;
}
?>
