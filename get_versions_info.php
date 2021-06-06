<?php
// Facebook ==> 284882215
// whatsapp ==> 284882215
// snapchat ==> 447188370

if($argc < 2){
    die("usage:\nphp ". basename(__FILE__)."  id \nexample : php " .  basename(__FILE__) . " 284882215 // FaceBook\n" );
}

$url = "https://tools.lancely.tech/apple/app-version/US/" . $argv[1];
$pattern = "/appVersion:(.*)\}\],\s?/s" ;
$allDataAsJson = Null ;
if(preg_match($pattern,  file_get_contents($url) , $matches) and (!empty($matches[1]))){
    $patterns = [  '/\s/',  '/:([\w\$]+),/'  ,  '/:([\w\$]+)\}/' , '/\{(\w+):/', '/,(\w+):/'];
    $replacement = [ '' , ':"$1",' , ':"$1"}'  , '{"$1":' , ',"$1":'];
    $allDataAsJson = '{"data" : ' .preg_replace( $patterns, $replacement, trim($matches[1]) ) . "}" ;
}
var_dump($allDataAsJson);
