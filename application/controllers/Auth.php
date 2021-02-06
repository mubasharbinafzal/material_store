<?php
ob_start();
    class Auth extends CI_Controller{
    public function __construct()
    {   
        parent::__construct();
         if($this->session->userdata('id')){
            return redirect('Admin/welcome');
      }
    }
	public function index(){ 
        $this->form_validation->set_rules('uname','User name','required|alpha');
        $this->form_validation->set_rules('pass','Password','required|max_length[12]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
         if($this->form_validation->run()){
           	$uname = $this->input->post('uname');
           	$pass = $this->input->post('pass');
            $login_id = $this->Login_model->isvalidate($uname,$pass);
            
           	if ($login_id){
           		    $this->session->set_userdata('id',$login_id);
           	     $this->session->set_userdata('username',$uname);
          
           	 	return redirect('Admin/generate_invoice');
           	}else{
           			$this->session->set_flashdata('login_failed',"Invalid username/password");
           			return redirect('Auth');
           	}
         }else{
         		$this->load->view('auth/login');
         }
     }
     public function register(){
     // $this->load->view('Auth/register');
     }
     public function sendemail(){
         $this->form_validation->set_rules('username','User name','required|alpha');
         $this->form_validation->set_rules('password','Password','required|max_length[12]');
         $this->form_validation->set_rules('firstname','First Name','required|alpha');
         $this->form_validation->set_rules('lastname','Last Name','required|alpha');
         $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
         $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if($this->form_validation->run()){
             $data = $this->input->post();
           if($this->Login_model->register_user($data)){
            $this->session->set_flashdata('msg',"User added successfully");
             $this->session->set_flashdata('msg_class',"alert-success");
              return redirect('auth/register');
            }else{
              $this->session->set_flashdata('msg',"Article not added please try again !!");
             $this->session->set_flashdata('msg_class',"alert-danger");
              return redirect('auth/register');
           }
          // $this->email->form(set_value('email'),set_value('firstname'));
          // $this->email->to("mubasharbinafzal@gmail.com");
          // $this->email->Subject("Registration");
          // $this->email->message("Thank you for Registration");
          // $this->email->set_newline("\r\n");
          // $this->email->send();
          // if ($this->email->send()){
          //   show_error($this->email->print_debugger());
          // }else{
          //     echo"Your e-mail has been sent!";
          // }

         }else{
            $this->load->view('auth/register');
         }

     }
}
?>