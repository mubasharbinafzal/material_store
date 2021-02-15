<?php 
 	$this->load->view('index/header');
 ?>
	<br>
<div class="container">
<div class="row">
<?= anchor('admin/welcome','Back',['class' => 'btn btn-lg btn-primary']) ?>

</div>
</div>
<div class="container" style="margin-top: 20px;">
	<h1>Edit Customer Payment Activity</h1>
	<br>
	<?php if($msg = $this->session->flashdata('msg')):?>
 <?php   $msg_class= $this->session->flashdata('msg_class'); ?> 
    <div class="row">
      <div class="col-lg-6">
        <div class="alert <?php echo $msg_class; ?>">
          <?php echo $msg; ?>
        </div>
      </div>
      <div class="col-lg-6"></div>
    </div>
    <?php endif; ?>
		<?php // print_r($edit_customers_payment_activity); 
		echo form_open('admin/update_customer_payment_activity/'.
				$edit_customers_payment_activity[0]->main_invoice_id)
		?>
 		<input type="hidden" name="main_invoice_id" value="<?php echo $edit_customers_payment_activity[0]->main_invoice_id ?>">
		<div class="row">
	    	<div class="col-md-4">
 			<div class="form-group">
 			      <label>Customer ID,Name & CDate</label>
 			      <select name="customer_id" class="form-control">
 			      	<?php $customer_date=date_create($edit_customers_payment_activity[0]->customer_date);?>
 			      		<option value="<?php echo $edit_customers_payment_activity[0]->customer_id;?>"><?php echo $edit_customers_payment_activity[0]->customer_id." ".$edit_customers_payment_activity[0]->customer_name." &nbsp; &nbsp; &nbsp; &nbsp;(".date_format($customer_date,"d-M-Y").")";?></option>
 			          <?php foreach ($customers as $customer){ $customer_date=date_create($customer->customer_date); ?>
                        <option value="<?php echo $customer->customer_id;?>">
                        	<?php echo $customer->customer_id." ".$customer->customer_name." &nbsp; &nbsp; &nbsp; &nbsp;(".date_format($customer_date,"d-M-Y").")";?></option>
                        <?php }?>
                    </select> 
 			</div> 
 		</div>
 				<div class="col-md-4">
 		 <div class="form-group">
                <label>Date</label>
                <input  name="main_invoice_date" type="date"  id="main_invoice_date" class="form-control" value="<?php echo $edit_customers_payment_activity[0]->main_invoice_date; ?>">
            
        </div>
        <?php echo form_error('customer_id');?>
 		</div>
 		 <div class="col-md-2">
 		  <div class="form-group">
            <label for="sel1">Debit</label>
                  <input type="text" class="form-control" name="main_i_debit" value="<?php echo $edit_customers_payment_activity[0]->main_i_debit?>"> 
              
        </div>
        <?php echo form_error('rupess');?>
      </div>
       <div class="col-md-2">
 		  <div class="form-group">
            <label for="sel1">Credit</label>
             <input type="text" class="form-control" name="main_i_credit" value="<?php echo $edit_customers_payment_activity[0]->main_i_credit?>">
              
        </div>
        <?php echo form_error('rupess');?>
      </div>
       		<div class="col-md-12">
 		    <div class="form-group">
              <label>Description</label>
              <textarea class="form-control rounded-0" name="main_i_description" id="p_c_Description" rows="3"><?php echo $edit_customers_payment_activity[0]->main_i_description;?></textarea>
            </div>
 	 
 		</div>
 		 
 		   
 		   
 	
 	
		</div>
		 <?php echo form_submit(['class'=>'btn btn-primary',
									'type'=>'submit',
								    'value'=>'Submit'
							]); ?>
		 <?php echo form_reset(['class'=>'btn btn-light',
				'type'=>'reset',
			'value'=>'reset'
		]); ?>


	</div>


<?php 
 	$this->load->view('index/footer');
 ?>


