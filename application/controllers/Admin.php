<?php 
ob_start();
class Admin extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('id')){
      return redirect('auth');
    }
  } 
  public function welcome(){
     redirect('admin/generate_invoice');
    $config =[
      'base_url' => base_url('Admin/welcome'),
      'per_page' => 50,
      'total_rows' => $this->Admin_model->num_rows(),
      'full_tag_open' => "<ul class='pagination'>",
      'full_tag_close' => "</ul>",
      
            'next_tag_open' => "<li class='page-item'>", // <a class="page-link"></a> add class in jquery 
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
          $list =$this->Admin_model->stock_List($config['per_page'],$this->uri->segment(3));
          $this->load->view('admin/dashbord',['list' => $list]);
        }
        public function add_stock(){
          if($this->form_validation->run('stock_validation')){
            $post   =   $this->input->post();
            $post['qty'] = $post['rem_qty'];
            $post['total_size'] = $post['sizein_ft'];
            $post['rate'] = $post['net_amount']; 
           /* stock_ledger table */
           
            /* discount of percentage*/
            $actual_amount=$post['total_size']*$post['qty']*$post['rate'];
              $decimal = $post['discount']/100;
              $actual_amount = $actual_amount*$decimal;
            /* discount of percentage*/
             $percent_amount = $actual_amount;
             
             /* stock_ledger */
            if($this->Admin_model->add_stock($post,$percent_amount)){
              $this->session->set_flashdata('msg',"Record Added successfully");
              $this->session->set_flashdata('msg_class',"alert-success");
              $post='';
               return redirect('admin/add_stock');
            }else{
              $this->session->set_flashdata('msg',"Not added please try again !!");
              $this->session->set_flashdata('msg_class',"alert-danger");
            }
          }else{
            $last_stock_entry  = $this->Admin_model->getlaststockentry();
           $customers = $this->Admin_model->getallcustomer();
           $data = $this->Admin_model->get_remaing_stock();
           $this->load->view('admin/add_stock',['customers'=>$customers , 'last_stock_entry'=>$last_stock_entry,'stock'=>$data]);
         }
       }
       public function add_customer(){
        if($this->form_validation->run('customer_validate')){
          $post   =  $this->input->post();
            if($this->Admin_model->add_customer($post)){ // admin is a model name
              $this->session->set_flashdata('msg',"Record Added successfully");
              $this->session->set_flashdata('msg_class',"alert-success");
              $post='';
              return redirect('admin/add_customer');
            }else{
              $this->session->set_flashdata('msg',"Not added please try again !!");
              $this->session->set_flashdata('msg_class',"alert-danger");
            }
       
          }else{
                $data = $this->Admin_model->get_customers();
                $this->load->view('admin/add_customer',['customers'=>$data]); 
         }
       }
       public function edit_stock($stock){
        $data = $this->Admin_model->find_stock($stock);
        $customers = $this->Admin_model->getallcustomer();
        $this->load->view('admin/edit_stock',['stock'=>$data ,'customers'=>$customers] );
      }
      public function edit_customer($id){
       $data = $this->Admin_model->find_customer($id);
        $this->load->view('admin/edit_customer',['customer'=>$data]);
      }
      public function update_article($id){
        $data = $this->input->post();
        
        $data['rem_qty']=$data['qty'];
        $data['total_size'] = $data['sizein_ft'];
        $data['rate'] = $data['net_amount']; 
        if($this->Admin_model->update_article($id,$data)){
          $this->session->set_flashdata('msg',"Edit successfully");
          $this->session->set_flashdata('msg_class',"alert-success");
          //redirect to view article
          $gate_pass_no=$data['gate_pass_no'];
          $stock_data=$this->Admin_model->entered_stock($gate_pass_no); 
          $this->load->view('admin/view_enter_stock',['stock_data'=>$stock_data]);
        }else{
          $this->session->set_flashdata('msg',"Not Edit please try again !!");
          $this->session->set_flashdata('msg_class',"alert-danger");
        }  
        
        }
          public function verify_stock(){
            $data = $this->input->post();
            $this->Admin_model->verify_stock($data); 
            $gatepass_numbers= $this->Admin_model->get_gatepass(); 
            $this->load->view('admin/enter_stock',['gatepass_numbers'=>$gatepass_numbers]);
          }
    public function update_customer($id){
        $data = $this->input->post();
        if($this->Admin_model->update_customer($id,$data)){
          $this->session->set_flashdata('msg',"Edit successfully");
          $this->session->set_flashdata('msg_class',"alert-success");
        }else{
          $this->session->set_flashdata('msg',"Not Edit please try again !!");
          $this->session->set_flashdata('msg_class',"alert-danger");
        }  
        return redirect('Admin/add_customer');
    }
   

    public function del_customer(){
        $id = $this->input->post('customer_id');
        if ($this->Admin_model->delete_customer($id)){
          $this->session->set_flashdata('msg',"Delete successfully");
          $this->session->set_flashdata('msg_class',"alert-success");
          return redirect('Admin/add_customer');
        }else{
          $this->session->set_flashdata('msg',"please try again !!");
          $this->session->set_flashdata('msg_class',"alert-danger");
          return redirect('Admin/add_customer');
        }
    }
      
    public function view_invoice($main_invoice_id){
        $customer_id = "";
        $data = $this->Admin_model->print_invoice($main_invoice_id);
        $customer_id = $this->Admin_model->getcustomer_id($main_invoice_id); 
        $get_remaining_balance = $this->Admin_model->get_remaining_balance($customer_id);
        $this->load->view('admin/view_invoice',['main_invoice_id'=>$main_invoice_id,'invoices'=>$data , 'get_remaining_balance' => $get_remaining_balance,]);
    }
    public function view_remaing_stock(){
      $data = $this->Admin_model->get_remaing_stock();
      $this->load->view('admin/view_remaing_stock',['stock'=>$data]);
    }public function view_expire_stock(){
      $data = $this->Admin_model->get_expire_stock();
      $this->load->view('admin/view_expire_stock',['stock'=>$data]);
    }
    public function add_invoice($main_invoice_id){ 
        $customer_id = "";
        $customer_id = $this->Admin_model->getcustomer_id($main_invoice_id); 
        $get_remaining_balance = $this->Admin_model->get_remaining_balance($customer_id);
        $customer = $this->Admin_model->get_invoice_customers($main_invoice_id);
        $stock = $this->Admin_model->get_remaing_stock_id();
        $invoices = $this->Admin_model->find_invoice($main_invoice_id);
        $get_last_invoice_entry = $this->Admin_model->get_last_invoice_entry();

        $this->load->view('admin/add_invoice',[
                          'get_remaining_balance' => $get_remaining_balance, 
                          'customer'=>$customer,
                          'stock' => $stock,
                          'customer_id' => $customer_id,
                          'invoices' => $invoices,
                          'main_invoice_id' => $main_invoice_id,
                          'get_last_invoice_entry' => $get_last_invoice_entry
                        ]);
    }
    public function selected_items($main_invoice_id){ 
      $invoices = $this->Admin_model->find_invoice($main_invoice_id); 
      $customer_id = $this->Admin_model->get_invoice_customer_id($main_invoice_id); 
      $get_remaining_balance = $this->Admin_model->get_remaining_balance($customer_id);
      $this->load->view('admin/view_selected_invoice_items',
        [
        'invoices' => $invoices, 
        'main_invoice_id' => $main_invoice_id,
        'get_remaining_balance' => $get_remaining_balance 
       ]
     );
    }
    public function get_invoice_remaining_stock(){
        $stock = $this->Admin_model->get_remaing_stock_ajax();
        $result = array();
        $i = 0;
        foreach ($stock as $key => $value){
          $result['data'][] = array(
      
            $value['stock_no'],
            $value['section'],
            $value['thickness'],
            $value['color'],
            $value['sizein_ft'],
            $value['rem_qty']
          );
        }
        
        echo json_encode($result); 
    }
    public function add_invoice_items(){
        $post = array();
        $customer_id = $this->input->post('customer_id');
        $invoice_writer = $this->input->post('invoice_writer');
        $main_invoice_id = $this->input->post('main_invoice_id');
        $stock_no = $this->input->post('stock_no');
        $sizein_ft = $this->input->post('sizein_ft');
        $qty = $this->input->post('qty');
        $invoice_discount = $this->input->post('invoice_discount'); 

        $post['customer_id'] = $customer_id;
        $post['invoice_writer'] = $invoice_writer;
        $post['main_invoice_id'] = $main_invoice_id;
        $post['stock_no'] = $stock_no;
        $post['sizein_ft'] = $sizein_ft;
        $post['qty'] = $qty;
        $post['invoice_discount'] = $invoice_discount; 
        //print_r($post);
        $this->Admin_model->add_invoice($post);
        echo json_encode(true);
    }
    public function get_qty(){
        $stock_no = $this->input->post('stock_no');
        $get_stock   =    $this->Admin_model->get_stock($stock_no);
        echo json_encode($get_stock);
    }
    public function delete_invoice_stock(){
        $invoice_id = $this->input->post('invoice_id');
        $customer_id = $this->input->post('customer_id');
        $main_invoice_id = $this->input->post('main_invoice_id');
        $msg = $this->Admin_model->delete_invoice_stock($invoice_id);
        echo $msg;
         redirect('Admin/add_invoice/'.$main_invoice_id);
        
    }
    public function  stock_detail($stock_no){
        $data = $this->Admin_model->stock_detail($stock_no);
        $this->load->view('admin/view_detail_stock',['stock_detail'=>$data]);
    } 
    public function  generate_invoice(){
         if($this->form_validation->run('generate_invoice')){
             $post   =   $this->input->post();
             $this->Admin_model->generate_invoice_add($post);
             $customers = $this->Admin_model->get_customers();
             $data = $this->Admin_model->generate_invoice();
             $this->load->view('admin/generate_invoice',['generate_invoices'=>$data ,'customers'=>$customers]);
         }else{
             $customers = $this->Admin_model->get_customers();
             $data = $this->Admin_model->generate_invoice();
             $this->load->view('admin/generate_invoice',['generate_invoices'=>$data ,'customers'=>$customers]);
         }
    }
    public function  add_balance(){
        $post   =  $this->input->post();
        $data = $this->Admin_model->add_balance($post);
        redirect('Admin/view_invoice/'.$post['main_invoice_id']);
    }
    public function  generate_ledger(){
         if($this->form_validation->run('generate_ledger')){
            $post   =   $this->input->post();
            $customer_ledger = $this->Admin_model->generate_customer_ledger($post);
            $balance_farword = $this->Admin_model->generate_customer_ledger_balance_farword($post);

              $total_balance_farword =0 ;
                
            foreach ($balance_farword as $data)
             {
              if ($post['to_date'] > $data->main_invoice_date){
                $main_i_credit = $data->main_i_credit;
                $main_i_debit = $data->main_i_debit;
                $main_invoice_date = $data->main_invoice_date;
                if ($main_i_debit != 0 ){
                    $total_balance_farword += $main_i_debit;
                }else{
                   $total_balance_farword -= $main_i_credit;
              }
            }
            }
            $this->load->view('admin/view_generate_ledger',['customer_ledger'=>$customer_ledger,'invoice_date'=>$post,'total_balance_farword'=>$total_balance_farword]);
         }else{
             $customers = $this->Admin_model->get_customers();
             $this->load->view('admin/generate_ledger',['customers'=>$customers]);
             
         }
    }
    public function  payment_customer(){ 
        if($this->form_validation->run('payment_customer')){
            $post = $this->input->post();
            $this->Admin_model->payment_customer($post);
            $this->session->set_flashdata('msg',"Add Successfully");
          $this->session->set_flashdata('msg_class',"alert-success");
          $post="";
           redirect('Admin/payment_customer');
        } else{
           $customers = $this->Admin_model->get_customers();
            $this->load->view('admin/payment_customer',['customers'=>$customers]);
        }
    }
    public function payment_stock(){ 
        if($this->form_validation->run('payment_stock')){
            $post = $this->input->post();
            $this->Admin_model->payment_stock($post);
            $this->session->set_flashdata('msg',"Add Successfully");
          $this->session->set_flashdata('msg_class',"alert-success");
          $post="";
           redirect('Admin/payment_stock');
        } else{
            $this->load->view('admin/payment_stock');
        }
    }
    public function entered_stock(){
         if($this->form_validation->run('entered_stock')){
             $post = $this->input->post();
             $gate_pass = $post['gate_pass'];
             $stock_data=$this->Admin_model->entered_stock($gate_pass); 
             $gatepass_exist=$this->Admin_model->checkgatepass($gate_pass); 
             $this->load->view('admin/view_enter_stock',['stock_data'=>$stock_data,'gatepass_exist'=>$gatepass_exist]);
          }else{
            
             $get_gatepass_verify_or_not= $this->Admin_model->get_gatepass_verify_or_not(); 
               $this->load->view('admin/enter_stock',['get_gatepass_verify_or_not'=>$get_gatepass_verify_or_not]);
         }
       
    }
    public function report_stock(){
         if($this->form_validation->run('report_stock')){
            $post  =  $this->input->post(); 
            $report_stock = $this->Admin_model->report_stock($post);
            $gatepass_numbers= $this->Admin_model->get_gatepass_report(); 
            $this->load->view('admin/view_report_stock',
              ['report_stock'=>$report_stock ,'gatepass_numbers'=>$gatepass_numbers]);
         }else{
             $this->load->view('admin/report_stock');
             
         }
    }
     public function  ledger_stock(){
         if($this->form_validation->run('ledger_stock')){
            $post   =   $this->input->post();
            $ledger_stock = $this->Admin_model->generate_stock_ledger($post); 
            $ledger_stock_balance_forword = $this->Admin_model->generate_stock_ledger_balance_forword($post); 
            $gatepass_numbers= $this->Admin_model->get_gatepass(); 
            $this->load->view('admin/view_stock_ledger',['ledger_stock'=> $ledger_stock,'gatepass_numbers'=>$gatepass_numbers ,'stock_date'=>$post ,'ledger_stock_balance_forword'=>$ledger_stock_balance_forword]);
         }else{
             $this->load->view('admin/stock_ledger');
             
         }
    }
    public function  invoice_report(){
        if($this->form_validation->run('invoice_report')){
            $post  =  $this->input->post(); 
            $invoice_report = $this->Admin_model->invoice_report($post);
            $gatepass_numbers= $this->Admin_model->get_gatepass(); 
            $this->load->view('admin/view_invoice_report',['invoice_report'=>$invoice_report]);
         }else{
             $this->load->view('admin/invoice_report');
             
         }
    
    }
     public function customer_payment_activity(){
      $customer_payment_activity = 
      $this->Admin_model->customer_payment_activity();
      $this->load->view('admin/customer_payment_activity',
       ['customers_payment_activity'=>$customer_payment_activity]);
    }
    public function stock_payment_activity(){
      $stock_payment_activity = 
      $this->Admin_model->stock_payment_activity();
      $this->load->view('admin/stock_payment_activity',
       ['stock_payment_activity'=>$stock_payment_activity]);
    }
    public function edit_customer_payment_activity($main_invoice_id){
      $edit_customer_payment_activity = $this->Admin_model->edit_customer_payment_activity($main_invoice_id);
      $customers = $this->Admin_model->getallcustomer();
      $this->load->view('admin/edit_customer_payment_activity',
       ['edit_customers_payment_activity'=>$edit_customer_payment_activity,'customers'=>$customers ]);
    }

 public function edit_stock_payment_activity($main_stock_id){
      $edit_stock_payment_activity = $this->Admin_model->edit_stock_payment_activity($main_stock_id);
      $this->load->view('admin/edit_stock_payment_activity',
       ['edit_stock_payment_activity'=>$edit_stock_payment_activity ]);
    }
    public function update_customer_payment_activity($main_invoice_id){
    $data = $this->input->post();
     
     if (!empty($data) && ($data['main_i_credit'] == 0 || $data['main_i_debit'] == 0)){
            $this->Admin_model->update_customer_payment_activity($data);
             $customer_payment_activity = 
      $this->Admin_model->customer_payment_activity();
      $this->load->view('admin/customer_payment_activity',
       ['customers_payment_activity'=>$customer_payment_activity]);
     }else{
        $this->session->set_flashdata('msg',"Credit and Debit both of one must be zero !!");
        $this->session->set_flashdata('msg_class',"alert-danger");
        $edit_customer_payment_activity = $this->Admin_model->edit_customer_payment_activity($main_invoice_id);
      $customers = $this->Admin_model->getallcustomer();
      $this->load->view('admin/edit_customer_payment_activity',
       ['edit_customers_payment_activity'=>$edit_customer_payment_activity,'customers'=>$customers ]);

     }
    
    }

public function update_stock_payment_activity($main_stock_id){
    $data = $this->input->post(); 
     if (!empty($data) && ($data['s_l_credit'] == 0 || $data['s_l_debit'] == 0)){
            $this->Admin_model->update_stock_payment_activity($data);
             $stock_payment_activity =   $this->Admin_model->stock_payment_activity();
      $this->load->view('admin/stock_payment_activity',['stock_payment_activity'=>$stock_payment_activity]);
     }else{
        $this->session->set_flashdata('msg',"Credit and Debit both of one must be zero !!");
        $this->session->set_flashdata('msg_class',"alert-danger");
        $edit_stock_payment_activity = $this->Admin_model->edit_stock_payment_activity($main_stock_id);
      $this->load->view('admin/edit_stock_payment_activity',
       ['edit_stock_payment_activity'=>$edit_stock_payment_activity]);
     }
    
    }

    public function customer_sold_items(){
        $customers_invoice = $this->Admin_model->customer_sold_items();
        $this->load->view('admin/view_customer_sold_items',
       ['customers_invoice'=>$customers_invoice]); 
    }
    public function added_stock(){
      $stock_data=$this->Admin_model->added_stock(); 
      $this->load->view('admin/added_stock',['stock_data'=>$stock_data]);
    }

    
 
}
 ?>