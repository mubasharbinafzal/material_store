<?php
ob_start();
    class Logout extends CI_Controller{
    public function __construct()
    {   
        parent::__construct();
        
    }
      public function index(){
      $this->session->unset_userdata('id');
      return redirect('Auth');
    }
}