<?php
 
 $this->load->view('index/header');?>
    <br>
<?php 
   $get_remaining_credit = 0 ;
      
  foreach ($get_remaining_balance as $data)
   {

      $main_i_credit = $data->main_i_credit;
      $main_i_debit = $data->main_i_debit;
      $main_invoice_date = $data->main_invoice_date;
      if ($main_i_debit != 0 ){
          $get_remaining_credit += $main_i_debit;
      }else{
         $get_remaining_credit -= $main_i_credit;
    }
  }
?>
    <div class="container-fluid">
                <div class="row">
                      <div class="col-md-7">
                          <div class="row">
                            <div class="col-md-12">
                                <?php echo form_open_multipart('Admin/add_invoice/'.$main_invoice_id 
                                ,'id="invoice_form"')?>
                                <form action="#" id="invoice_form">
                              <input type="hidden" name="customer_id" value="<?php echo $customer[0]->customer_id ;?>">
                              <input type="hidden" class="form-control" name="invoice_writer" value="<?php echo $this->session->userdata('username');?>">
                              <input type="hidden" class="form-control" name="main_invoice_id" value="<?php echo $main_invoice_id;?>">
                              <h1 class="text-center">ADD <b><?php echo $customer[0]->customer_id." ".$customer[0]->customer_name; ?></b> s Invoice</h1>
                            <div class="form-group">
                                <label>ADD Stock ID</label>
                                <select name="stock_no" id="items_id" class="form-control" required>
                                    <option value="">ADD Stock ID</option>
                                    <?php foreach ($stock as $items){?>
                                        <option value="<?php echo $items->stock_no;?>">
                                            <?php echo $items->stock_no;?>
                                        </option>
                                        <?php }?>
                                </select>
                             <?php echo form_error('stock_no');?>
                            
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <select name="sizein_ft" id="sizein_ft" class="form-control">
                                    <option value="">Size</option>
                                </select>

                                <?php echo form_error('qty');?>
                            </div>
                            <div class="form-group">
                                <label>ADD Qty</label>
                                <select name="qty" id="qty" class="form-control">
                                    <option value="">ADD Qty</option>
                                </select>

                                <?php echo form_error('qty');?>
                            </div>
                            <div class="form-group">
                                <label>Discount</label>

                                <input name="invoice_discount" id="invoice_discount" class="form-control" placeholder="Discount" value="<?php  echo $get_last_invoice_entry[0]['invoice_discount'] ?>" required>
                                 <?php echo form_error('invoice_discount');?>
                            </div>
                 	<?php echo form_submit(['class'=>'btn btn-primary',
         				'type'=>'submit',
         				'value'=>'Submit',
                'id' => 'submitBtn'
                
         			]); ?>
                        <?php echo form_reset(['class'=>'btn btn-light',
         				'type'=>'reset',
         				'value'=>'reset'
         			]); ?>
         			 <?php echo form_close(); ?>
         		    </div>
                     </div>
                     <div class="row" id="display_invoice_items">
                
                      </div>
                </div>
                    <div class="col-md-5"> 
                            <div class="container" id="table-info">
                                <table class="table table-responsive" id="stock_remaining_ajax">
                                    <thead>
                                        <tr>
                                            <th scope="col">stock ID</th>
                                            <th scope="col">Section</th>
                                            <th scope="col">Gage</th>
                                            <th scope="col">color</th>
                                            <th scope="col">Size</th> 
                                            <th scope="col">R Qty</th>
                                       
                                        </tr>
                                    </thead>
                                                   
                                </table>
                                   
                            </div>
                    </div>
                </div>
                <br>
 
    <?php $this->load->view('index/footer'); ?>
