<?php

namespace Ponponumi\UrlTool;

class Domain{
  public static function hostGet(string $url,$port=true){
    // URLからホストを取得する
    $parse_url = parse_url($url);

    $host = $url;

    if(array_key_exists("host",$parse_url)){
      // ホストがあれば
      $host = $parse_url["host"];

      if($port){
        if(array_key_exists("port",$parse_url)){
          // ポートがあれば
          $host .= ":" . $parse_url["port"];
        }
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
      $internal_host = self::httpHostGet();
    }

    if($internal_host === $url_host){
      // 内部リンクであれば
      return true;
    }else{
      // 外部リンクであれば
      return false;
    }
  }

  public static function externalLinkCheck(string $url,string $internal_link=""){
    // 外部リンクかどうかを判定する
    // 外部リンクならtrue、内部リンクならfalseを返す
    $result = self::internalLinkCheck($url,$internal_link);
    return !$result;
  }

  public static function httpHostGet(){
    // HTTPホストを取得する
    return $_SERVER["HTTP_HOST"];
  }

  public static function sslCheck(){
    // SSLかどうか確認する
    $result = false;

    if(array_key_exists('HTTPS',$_SERVER)){
      if($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1){
        $result = true;
      }
    }

    return $result;
  }

  public static function topPageUrlGet(){
    // トップページのURLを取得する
    $url = "";
    $ssl = self::sslCheck();

    if($ssl){
      $url = "https://";
    }else{
      $url = "http://";
    }

    $host = self::httpHostGet();

    $url .= $host;
    $url .= '/';

    return $url;
  }
}
