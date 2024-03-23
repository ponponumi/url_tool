<?php

namespace Ponponumi\UrlTool;

class Domain{
  public static function hostGet(string $url,$port=true){
    // URLからホストを取得する
    $parse_url = parse_url($url);

    $host = $parse_url["host"];

    if($port){
      if(array_key_exists("port",$parse_url)){
        // ポートがあれば
        $host .= ":" . $parse_url["port"];
      }
    }

    return $host;
  }
}
