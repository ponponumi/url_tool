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

  public static function internalLinkCheck(string $url,string $internal_link=""){
    // 内部リンクかどうかを判定する
    // 内部リンクならtrue、外部リンクならfalseを返す
    $url_host = self::hostGet($url);

    if($internal_link !== ""){
      // 内部のURLがあれば
      $internal_host = self::hostGet($internal_link);
    }else{
      // 内部のURLがなければ
      $internal_host = $_SERVER["HTTP_HOST"];
    }

    if($internal_host === $url_host){
      // 内部リンクであれば
      return true;
    }else{
      // 外部リンクであれば
      return false;
    }
  }
}
