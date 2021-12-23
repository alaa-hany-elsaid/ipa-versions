<?php
function getIpaVersionsWithId( $id ){
    $url = "https://tools.lancely.tech/apple/app-version/US/" . $id;
    $pattern = "/appVersion:(.*)\}\],\s?/s" ;
    $allDataAsJson = Null ;
    if(preg_match($pattern,  file_get_contents($url) , $matches) and (!empty($matches[1]))){
        $patterns = [  '/\s/',  '/:([\w\$]+),/'  ,  '/:([\w\$]+)\}/' , '/\{(\w+):/', '/,(\w+):/'];
        $replacement = [ '' , ':"$1",' , ':"$1"}'  , '{"$1":' , ',"$1":'];
        $allDataAsJson = '{"data" : ' .preg_replace( $patterns, $replacement, trim($matches[1]) ) . "}" ;
    }    
    
    return json_decode( $allDataAsJson  , true);
}
    
