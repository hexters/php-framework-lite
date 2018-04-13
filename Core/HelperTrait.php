<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once __DIR__ . '/../app/Config/appConfig.php';
 trait HelperTrait {

  public function req($name) {
    if(!empty($_REQUEST[$name])) {
      $type = $_SERVER['REQUEST_METHOD'] === 'POST' ? INPUT_POST : INPUT_GET;
      return trim($_REQUEST[$name]);
    }
  }

  public function file ($file) {
    if(!empty($_FILES[$file])){
      $_FILES[$file]['ext'] = '.' . explode('.', $_FILES[$file]['name'])[1];
      return $_FILES[$file];
    }
  }

  public function base_url($path){
    $app = new appConfig();
    return rtrim($app->baseUrl, '/') . '/' . ltrim($path, '/');
  }

  public function redirect($path){
    echo '<meta http-equiv="refresh" content="0; url=' . $this->base_url($path) . '" />';
  }

  public function storage_path($path = '') {
    return __DIR__ . '/../Storage' . '/' . ltrim($path);
  }
  public function public_path($path) {
    return __DIR__ . '/../public' . '/' . ltrim($path);
  }

 }
 

