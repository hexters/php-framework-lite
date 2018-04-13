<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class uploadController extends Controller {
    
    public function index () {
      $this->view('layouts/header', [ 'title' => 'Upload File' ]);
      $this->view('tugas/upload/index');
      $this->view('layouts/footer');
    }

    public function store () {
      $file = $this->file('files');
      move_uploaded_file($file['tmp_name'], $this->storage_path('/public/' . md5(uniqid()) . $file['ext']));
      $this->redirect('/upload');
    }

  }
  