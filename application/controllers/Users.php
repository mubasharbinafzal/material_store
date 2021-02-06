<?php 
 class Users extends CI_Controller {
     
     public function index(){

     	  $config =[
            'base_url' => base_url('users/index'),
            'per_page' => 2,
            'total_rows' => $this->users_model->num_rows(),

            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
           
            'next_tag_open' => "<li class='page-item'>",  
            'next_tag_close' => "</li>",

            'first_tag_open' => "<li class='page-item'>",
            'first_tag_close' => "</li>",

            'last_tag_open' => "<li class='page-item'>",
            'last_tag_close' => "</li>",

            'prev_tag_open' => "<li class='page-item'>",
            'prev_tag_close' => "</li>",

            'num_tag_open' => "<li class='page-item'>",
            'num_tag_close' => "</li>",
            'anchor_class' => 'class="page-link" ',

            'cur_tag_open' => "<li class='page-item'><a class='active' href='#'>",
            'cur_tag_close' => "</a></li>",
        ];
      $this->pagination->initialize($config);
      $articles =$this->users_model->articleList($config['per_page'],$this->uri->segment(3));
         $this->load->view('Users/homepage',['articles' => $articles]);
     }
     
     
 }

?>