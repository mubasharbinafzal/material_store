<?php 
class admin_model extends CI_model{
		
	public function add_stock($data){
	    $this->db->insert('stock',$data); // ("table name","data")
	    $last_record = $this->db->order_by('stock_no',"desc")->limit(1)->get('stock')->row();   // get last record of stock table and insert into main stock 
	    return $this->db->insert('main_stock',$last_record);
	}
	public function getallcustomer(){
	    $q = $this->db->select()->from('customer')->get();
	    return $q->result();
	}
	public function add_customer($data){
	    return $this->db->insert('customer',$data); // ("table name","data")
    }
    public function stock_List(){
            	$q="SELECT * FROM  customer";
                   $q = $this->db->query($q);
				return $q->result();
	}
    public function delete_stock($stock_no){
		return $this->db->delete('stock',['stock_no'=> $stock_no]);
	}  
	public function delete_customer($id){
		return $this->db->delete('customer',['customer_id'=> $id]);
	}
    public function num_rows(){
      $q = $this->db->select()
                ->from('stock') 
                ->get();
        return $q->num_rows();
    }
    public function find_stock($stock_no){
    	$q= $this->db->select()
    			->where('stock_no',$stock_no)
    			->get('stock');
    			return $q->row();
    }
    public function find_customer($id){
    	$q= $this->db->select()
    			->where('customer_id',$id)
    			->get('customer');
    			return $q->row();
    }
    public function update_article($stock_no ,Array $data){

       return $this->db->where('stock_no',$stock_no)
                       -> update('stock',$data);
    }
    public function update_customer($id ,Array $data){

       return $this->db->where('customer_id',$id)-> update('customer',$data);
            

    }
    public function find_invoice($invoice_id){
    $q ="SELECT * FROM invoice,customer,stock,main_invoice 
     where  invoice.customer_id = customer.customer_id AND stock.stock_no = invoice.invoice_stock_no AND main_invoice.customer_id = customer.customer_id  AND  main_invoice.main_invoice_id = ".$invoice_id." AND 	invoice.main_invoice_id = ".$invoice_id." ORDER BY  invoice.invoice_id  DESC" ;
     $q = $this->db->query($q);
     return $q->result();

    }    
     public function print_invoice($invoice_id){
     
     $q ="SELECT * FROM invoice,customer,stock,main_invoice 
          where  invoice.customer_id = customer.customer_id AND stock.stock_no = invoice.invoice_stock_no AND main_invoice.customer_id = customer.customer_id  AND  main_invoice.main_invoice_id = ".$invoice_id." AND 	invoice.main_invoice_id = ".$invoice_id." ORDER BY  invoice.invoice_id  ASC" ;
     $q = $this->db->query($q);
     return $q->result();
    }
 
    public function get_customers(){
        $q= "select * from customer order by customer_id DESC";
      	$q = $this->db->query($q);
    			return $q->result();
    }
    public function get_invoice_customers($main_invoice_id){
        $q= "select * from customer,main_invoice where customer.customer_id = main_invoice.customer_id AND main_invoice.main_invoice_id = ".$main_invoice_id;
      	$q = $this->db->query($q);
    			return $q->result();
    }
     public function get_invoice_customer_id($main_invoice_id){
        $q= "select customer.customer_id from customer,main_invoice where customer.customer_id = main_invoice.customer_id AND main_invoice.main_invoice_id = ".$main_invoice_id;
        $q = $this->db->query($q);
          $q =$q->result_array();
         return $customer_id = $q[0]['customer_id'];
    }
    public function generate_invoice(){
        $q= "select * from customer,main_invoice where customer.customer_id = main_invoice.customer_id AND main_invoice.main_i_credit_debit= 0   order by main_invoice_id DESC";
      	$q = $this->db->query($q);
    	return $q->result();
    }
    public function get_remaing_stock(){
     	$q= "select * from stock where active = 1 order by stock_no DESC";
     	 $q = $this->db->query($q);
    			return $q->result();
    } 
    public function get_remaing_stock_ajax(){
      $q= "select * from stock where active = 1 order by stock_no DESC";
       $q = $this->db->query($q);
          return $q->result_array();
    }
     public function get_remaing_stock_id(){
      $q= "select * from stock where active = 1 order by stock_no";
       $q = $this->db->query($q);
          return $q->result();
    } 
    public function get_expire_stock(){
     	$q= "select * from stock where active = 0 order by stock_no DESC";
     	$q = $this->db->query($q);
    	return $q->result();
    }
    public function get_stock($stock_no){
     	$q= "select rem_qty,sizein_ft  from stock where stock_no = $stock_no";
     	$q = $this->db->query($q);
    	return $q->result();
    }
    public function add_invoice($post){
        $customer_id            = $post['customer_id'];
        $stock_no               = $post['stock_no'];
        $pre_stock_no           = $post['stock_no'];
        $qty                    = $post['qty'];
        $invoice_qty            = $post['qty'];
        $sizein_ft              = $post['sizein_ft'];
        $invoice_sizein_ft      = $post['sizein_ft'];
        $invoice_discount       = $post['invoice_discount'];
        $invoice_writer         = $post['invoice_writer'];
        $main_invoice_id         = $post['main_invoice_id'];
        /*get stock value */
        $q= "select * from stock where stock_no=$stock_no";  // get update qty
        $q = $this->db->query($q);
    	$qty_db = $q->result();
    	$section_db = $qty_db[0]->section;
    	$thickness_db = $qty_db[0]->thickness;
    	$color_db = $qty_db[0]->color;
    	$sizein_ft_db = $qty_db[0]->sizein_ft;
    	$net_amount = $qty_db[0]->net_amount;
    	  //invoice price
        $invoice_price = $net_amount*$invoice_sizein_ft*$invoice_qty;
          /* discount of percentage*/
            
              $percent = $invoice_price*$invoice_discount;
              $percent = $percent/100;
              $invoice_price = $invoice_price-$percent;
             
            /* discount of percentage*/
    	if ($sizein_ft_db == $sizein_ft){
    	    $update_qty = $qty_db[0]->rem_qty - $qty;
    	  
    	    if($update_qty  ==  0){
    	        $q= "UPDATE stock SET active='0',rem_qty=0 where stock_no=$stock_no";
    	        $q = $this->db->query($q);
    	    }else if ($update_qty > 0  &&  $sizein_ft_db == $sizein_ft){
     	        $q= "UPDATE stock SET active='1', rem_qty=$update_qty where stock_no=$stock_no";
    	        $q = $this->db->query($q);
    	    }else{
    	            die("Database in Error");
    	   }
            /*ADD INVOICE*/
        $q= "insert into invoice (invoice_stock_no,customer_id,ft_invoice,invoice_qty,remaining_invoice_ft,invoice_price,invoice_discount,invoice_writer,main_invoice_id)
                                    VALUES($stock_no, $customer_id,$invoice_sizein_ft,$qty,'0','$invoice_price','$invoice_discount','$invoice_writer','$main_invoice_id')";
        $q = $this->db->query($q);
        /*ADD INVOICE*/
    	}else{
    	    $q= "select * from stock where stock_no = $stock_no";  // get update qty
            $q = $this->db->query($q);
            $q= $q->result();
            $section_db = $q[0]->section;
    	    $thickness_db = $q[0]->thickness;
    	    $color_db = $q[0]->color;
    	    $sizein_ft_db = $q[0]->sizein_ft; 
    	    $rate = $q[0]->rate; 
    	    $rem_qty = $q[0]->rem_qty;
    	    $remarks = $q[0]->remarks;
    	    $date = $q[0]->date;
    	    $gate_pass_no = $q[0]->gate_pass_no;
    	    $entered_by = $q[0]->entered_by;
    	    $net_amount = $qty_db[0]->net_amount;
    	    $discount = $qty_db[0]->discount;
    	    
    	  //invoice price
            $invoice_price = $net_amount*$invoice_sizein_ft*$invoice_qty;
            /* discount of percentage*/
            
              $percent = $invoice_price*$invoice_discount;
              $percent = $percent/100;
              $invoice_price = $invoice_price-$percent;
             
            /* discount of percentage*/
    	    if($sizein_ft_db == $sizein_ft){
    	        $new_rem_qty = $rem_qty + 1;
    	         /*ADD INVOICE*/
                    $q= "insert into invoice (invoice_stock_no,customer_id,ft_invoice,invoice_qty,remaining_invoice_ft,invoice_price,invoice_discount,invoice_writer,main_invoice_id)VALUES($stock_no, $customer_id,$invoice_sizein_ft,$qty,'0',$invoice_price,$invoice_discount,'$invoice_writer','$main_invoice_id')";
                    $q = $this->db->query($q);
                    /*ADD INVOICE*/
    	         if($new_rem_qty  ==  0){
                $q= "UPDATE stock SET  active='0',rem_qty=$new_rem_qty where section=$section_db && thickness=$thickness_db && color='$color_db' && gate_pass_no = '$gate_pass_no'";
    	        $q = $this->db->query($q);
    	         }else{
    	                $q= "UPDATE stock SET active='1',rem_qty=$new_rem_qty where section=$section_db && thickness=$thickness_db && color='$color_db' && gate_pass_no = '$gate_pass_no'";
    	        $q = $this->db->query($q);
    	         }
            }else{
                    $new_size_in_ft    = $sizein_ft_db - $sizein_ft;
                    $new_rem_qty        = $rem_qty - $qty;
                        /*ADD INVOICE*/
                        $q= "insert into invoice (invoice_stock_no,customer_id,ft_invoice,invoice_qty,remaining_invoice_ft,invoice_price,invoice_discount,invoice_writer,main_invoice_id)VALUES($stock_no, $customer_id,$invoice_sizein_ft,$qty, $new_size_in_ft,$invoice_price,$invoice_discount,'$invoice_writer','$main_invoice_id')";
                        $q = $this->db->query($q);
                        /*ADD INVOICE*/
                     if($new_rem_qty  ==  0){
                    $q= "UPDATE stock SET active='0', rem_qty=$new_rem_qty where stock_no = $stock_no";  
                    $q = $this->db->query($q);
                     }else{
                         $q= "UPDATE stock SET active='1', rem_qty=$new_rem_qty where stock_no = $stock_no";  
                    $q = $this->db->query($q);
                     }
                    //search
                    $q= "select * from stock where section='$section_db' && thickness='$thickness_db' && color='$color_db' && sizein_ft ='$new_size_in_ft' && gate_pass_no = '$gate_pass_no'";  // get update qty   
                    $q = $this->db->query($q);
                    $q= $q->result();
                    $stock_no = $q[0]->stock_no;
    	              $rem_qty = $q[0]->rem_qty;
    	              $new_rem_qty = $rem_qty + $qty; 
                    if(!empty($q[0]) && empty($q[1])){
                            $q= "UPDATE stock SET active='1', rem_qty=$new_rem_qty where stock_no = $stock_no";
        	                $q = $this->db->query($q);
                    }else{
                     $q ="INSERT INTO `stock`(`section`, `thickness`, `color`, `sizein_ft`, `rem_qty`, `active` ,`pre_stock_no`,`date`,`gate_pass_no`,`entered_by`,`remarks`,`net_amount`,`rate`,`discount`)
                        VALUES ('$section_db','$thickness_db','$color_db','$new_size_in_ft','$qty','1','$pre_stock_no','$date','$gate_pass_no','$entered_by','$remarks','$net_amount','$rate','$discount')";
                     $q = $this->db->query($q);
                }
            }
        }
    }
    public function delete_invoice_stock($invoice_id){
 
    	$q ="select * from stock,invoice where stock.stock_no = invoice.invoice_stock_no AND invoice.invoice_id = ".$invoice_id;
    	$q = $this->db->query($q);
    	$q = $q->result();
    	$stock_no   = $q[0]->stock_no;
        $section_db = $q[0]->section;
	    $thickness_db = $q[0]->thickness;
	    $color_db = $q[0]->color;
	    $sizein_ft_db = $q[0]->sizein_ft; 
	    $rem_qty = $q[0]->rem_qty;
	    $pre_stock_no = $q[0]->pre_stock_no;
	    $invoice_stock_no =$q[0]->invoice_stock_no; 
	    $invoice_qty =$q[0]->invoice_qty; 
	    $gate_pass_no = $q[0]->gate_pass_no;
    	$invoice_ft =$q[0]->ft_invoice;
    	$remaining_invoice_ft = $q[0]->remaining_invoice_ft;
    	
    	if ($remaining_invoice_ft == 0){
    	        $previous_qty = $invoice_qty + $rem_qty;
    	        $q= "UPDATE stock SET active='1',rem_qty = ".$previous_qty." where stock_no = ".$invoice_stock_no;
    	        $q = $this->db->query($q);
    	      
    	  
    	}else{
    	        $previous_ft = $invoice_ft + $remaining_invoice_ft;
    	        if ($previous_ft == $sizein_ft_db){
    	            // update rem qty
        	             $previous_qty = $rem_qty + $invoice_qty;
        	               $q= "UPDATE stock SET active='1',rem_qty = ".$previous_qty." where stock_no = ".$stock_no;
                   	       $q = $this->db->query($q);
                   	// active 0 
                   	        $q ="select * from stock,invoice where section = '".$section_db."' and thickness = '".$thickness_db."' and 	color  =  '".$color_db."' and stock.sizein_ft = invoice.remaining_invoice_ft AND invoice.invoice_id = '".$invoice_id."' AND gate_pass_no = '".$gate_pass_no."'";
                        	$q = $this->db->query($q);
                        	$q = $q->result();
                        
                        	
                            if(!empty($q[0]) AND empty($q[1])){
                                $stock_no   = $q[0]->stock_no;
                                $pre_stock_no = $q[0]->pre_stock_no;
                                $rem_qty = $q[0]->rem_qty;
                                $previous_qty = $rem_qty-$invoice_qty;
                                if ($previous_qty == 0){
                                	   $q= "UPDATE stock SET active='0',rem_qty = ".$previous_qty." where stock_no = ".$stock_no;
                           	            $q = $this->db->query($q);
                                }else{
                            	        $q= "UPDATE stock SET active='1',rem_qty = ".$previous_qty." where stock_no = ".$stock_no;
                           	            $q = $this->db->query($q);
                                }
        	                }else{
        	                     die("more than one record");
        	                }
            	  }else{
        	            die("item has been sealed");
        	        }
        	           
    	    }
    	    // item for delete 
    	      $this->db->delete('invoice',['invoice_id'=> $invoice_id]);  // delete 

}
    public function stock_detail($stock_no){
        $q ="SELECT * FROM  stock_detail,stock  where stock.stock_no = stock_detail.stock_no AND stock_detail.stock_no = ".$stock_no;
    	$q = $this->db->query($q); 
    	return $q->result();
    }
    public function generate_invoice_add($data){
        
         return $this->db->insert('main_invoice',$data); // ("table name","data")   
    }
    public function add_balance($post){
         $q= "UPDATE main_invoice SET main_i_debit =".$post['main_i_total_payment'].", main_i_credit = 0 where main_invoice_id = ".$post['main_invoice_id'];
         $q = $this->db->query($q); 
    }
    public function getlaststockentry(){
        $q ="SELECT * FROM stock ORDER BY stock_no DESC LIMIT 1";
        $q = $this->db->query($q); 
    	return $q->result();
    }
    public function generate_customer_ledger($post){
         $customer_id= $post['customer_id'];
         $to_date=$post['to_date'];
         $from_date =$post['from_date'];
         $q ="select * from customer,main_invoice where customer.customer_id = main_invoice.customer_id AND main_invoice.customer_id = ".$customer_id." AND  main_invoice_date   BETWEEN '".$to_date."' AND '".$from_date."' ORDER BY main_invoice.main_invoice_date asc";
         $q = $this->db->query($q); 
    	 return $q->result();
    }
    public function generate_customer_ledger_balance_farword($post){
        
         $customer_id= $post['customer_id'];
         $to_date=$post['to_date'];
         $from_date =$post['from_date'];
         $q ="select * from customer,main_invoice where customer.customer_id = main_invoice.customer_id AND main_invoice.customer_id = ".$customer_id." AND  main_invoice_date  NOT BETWEEN '".$to_date."' AND '".$from_date."'";
         $q = $this->db->query($q); 
    	 return $q->result();
    }
    public function getcustomer_id($main_invoice_id){
       $q ="select customer_id from main_invoice where main_invoice_id = '".$main_invoice_id."'";
        $q = $this->db->query($q); 
        $result = $q->result();   
    	$id = $result[0]->customer_id;
    	return $id;
        
    }
    public function get_remaining_balance($customer_id){
         $q ="select * from customer,main_invoice where customer.customer_id = main_invoice.customer_id AND main_invoice.customer_id = '".$customer_id."'" ;
         $q = $this->db->query($q); 
    	 return $q->result();
    }
    public function payment_customer($post){
        $customer_id= $post['customer_id'];
        $date= $post['date'];
        $p_type= $post['p_type'];
        $rupess= $post['rupess'];
        $p_c_Description= $post['p_c_Description'];
        $entered_by  = $post['entered_by'];
        
        if ($p_type =="credit"){
            $q="insert into main_invoice (main_i_description,main_invoice_name,main_invoice_date,main_i_credit, customer_id,main_i_credit_debit)
                    VALUES ('$p_c_Description','$entered_by','$date', '$rupess',  '$customer_id','1')";
        }else{
            $q="insert into main_invoice (main_i_description,main_invoice_name,main_invoice_date,main_i_debit,customer_id,main_i_credit_debit)
         VALUES ('$p_c_Description','$entered_by','$date', '$rupess',  '$customer_id','1')";
        }
        $q = $this->db->query($q); 
      }
       public function payment_stock($post){
        $date= $post['date'];
        $p_type= $post['p_type'];
        $rupess= $post['rupess'];
        $s_l_description= $post['s_l_description'];
        if ($p_type =="credit"){
            $q="insert into stock_ledger (s_l_description,s_l_date,s_l_credit) 
                            VALUES ('$s_l_description','$date', '$rupess')";
        }else{
            $q="insert into stock_ledger (s_l_description,s_l_date,s_l_debit) 
                                VALUES ('$s_l_description','$date', '$rupess')";
        }
        $q = $this->db->query($q); 
      }
      public function entered_stock($gate_pass){
          $q="select * from stock where pre_stock_no = 0 AND gate_pass_no = '".$gate_pass."'ORDER BY  stock_no ASC";
          $q = $this->db->query($q); 
    	  return $q->result();
      }
      public function added_stock(){
          $q="select * from stock where pre_stock_no = 0";
          $q = $this->db->query($q); 
        return $q->result();
      }
       public function get_gatepass(){
          $q="select DISTINCT gate_pass_no from stock";
          $q = $this->db->query($q); 
    	  return $q->result();
      }
       public function get_gatepass_verify_or_not(){
          $q="select DISTINCT stock.gate_pass_no, stock_ledger.gatepass from stock LEFT JOIN  stock_ledger ON stock_ledger.gatepass =  stock.gate_pass_no";
          $q = $this->db->query($q); 
        return $q->result();
      }
       public function get_gatepass_report(){
          $q="select DISTINCT gatepass, s_l_date from stock_ledger";
          $q = $this->db->query($q); 
    	  return $q->result();
      }
      public function report_stock($post){
             $to_date=$post['to_date'];
             $from_date =$post['from_date'];
             $q ="select * from stock where pre_stock_no = 0 AND  date BETWEEN '".$to_date."' AND '".$from_date."'";
             $q = $this->db->query($q); 
        	 return $q->result();
      }
       public function generate_stock_ledger($post){
         $to_date=$post['to_date'];
         $from_date =$post['from_date'];
         $q ="select * from stock_ledger where s_l_date BETWEEN '".$to_date."' AND '".$from_date."'ORDER BY s_l_date ASC";
         $q = $this->db->query($q); 
    	 return $q->result();
    }
     public function generate_stock_ledger_balance_forword ($post){
         $to_date=$post['to_date'];
         $from_date =$post['from_date'];
         $q ="select * from stock_ledger where s_l_date NOT BETWEEN '".$to_date."' AND '".$from_date."'ORDER BY s_l_date ASC";
         $q = $this->db->query($q); 
    	 return $q->result();
    }
    public function verify_stock($data){
            $date=$data['date'];
            $gate_pass_no = $data['gate_pass_no']; 
            $percent_amount = $data['percent_amount']; 
    	    $q = "insert into stock_ledger (s_l_date,gatepass,s_l_credit)VALUES('$date','$gate_pass_no','$percent_amount')";
            $q = $this->db->query($q);
    }
    public function checkgatepass($gatepass){
            $q="select gatepass from stock_ledger where gatepass = '".$gatepass."'";
            $q = $this->db->query($q); 
    	    return $q->result();
            
    }
     public function invoice_report($post){
             $to_date=$post['to_date'];
             $from_date =$post['from_date'];
             $q ="select * from main_invoice where main_i_credit_debit = 0 AND  main_invoice_date  BETWEEN '".$to_date."' AND '".$from_date."'";
             $q = $this->db->query($q); 
        	 return $q->result();
      }
      public function  customer_payment_activity(){
        $q ="select * from main_invoice";
        $q = $this->db->query($q); 
        return $q->result();
      
      }
       public function  stock_payment_activity(){
              $q ="select * from stock_ledger";
              $q = $this->db->query($q); 
              return $q->result();
            
            }
        public function  edit_customer_payment_activity($main_invoice_id){
        $q ="select * from main_invoice INNER JOIN  customer on main_invoice.main_invoice_id = ".$main_invoice_id." AND customer.customer_id = main_invoice.customer_id";
        $q = $this->db->query($q); 
        return $q->result();
      
      }
      public function update_customer_payment_activity($post){
        $main_invoice_id = $post['main_invoice_id'];
  return $this->db->where('main_invoice_id',$main_invoice_id)-> update('main_invoice',$post);
   
}
public function  edit_stock_payment_activity($main_stock_id){
        $q ="select * from stock_ledger where s_l_id = ".$main_stock_id;
        $q = $this->db->query($q); 
        return $q->result();
      
      }
public function update_stock_payment_activity($post){
        $main_stock_id = $post['s_l_id'];
  return $this->db->where('s_l_id',$main_stock_id)-> update('stock_ledger',$post);
   
}

public function  customer_sold_items(){
    $q ="select * from invoice,stock, main_invoice where invoice.invoice_stock_no = stock.stock_no AND invoice.main_invoice_id = main_invoice.main_invoice_id AND main_invoice.customer_id = invoice.customer_id ORDER BY invoice.invoice_id ASC";
        $q = $this->db->query($q); 
        return $q->result();
}

public function get_last_invoice_entry(){
    $q ="SELECT invoice_id,invoice_discount FROM invoice ORDER BY invoice_id DESC LIMIT 1";
        $q = $this->db->query($q); 
      return $q->result_array();
}

}
?>