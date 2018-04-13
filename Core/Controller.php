<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Controller {
    
    use HelperTrait;

    public function view($view, $data = []) {
      extract($data);
      require_once __DIR__ . '/../app/Views/' . $view . '.php';
    }

  }
  