 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu');
 ?>
 <div class="container" style="margin-top: 20px;">
 	
 	<h1>Customer Payment</h1>
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
     	<br>
 	<?php echo form_open_multipart('Admin/payment_customer')?>
 	<input type="hidden" class="form-control" name="entered_by" value="<?php echo $this->session->userdata('username');?>" placeholder="<?php echo $this->session->userdata('username');?>">
 	<div class="row">
         	<div class="col-md-4">
 			<div class="form-group">
 			      <label>Customer ID & Name</label>
 			      <select name="customer_id" class="form-control">
 			          <?php foreach ($customers as $customer){ $customer_date=date_create($customer->customer_date); ?>
                        <option value="<?php echo $customer->customer_id;?>"><?php echo $customer->customer_id." ".$customer->customer_name." &nbsp; &nbsp; &nbsp; &nbsp;(".date_format($customer_date,"d-M-Y").")";?></option>
                        <?php }?>
                    </select>
 		        <?php echo form_error('customer_id');?>
 			</div> 
 		</div>
 		<div class="col-md-4">
 		 <div class="form-group">
                <label>Date</label>
                <input  name="date" type="date"  id="form_date" class="form-control">
                <?php echo form_error('date');?>
        </div>
        <?php echo form_error('customer_id');?>
 		</div>
 		<div class="col-md-2">
 		  <div class="form-group">
            <label for="sel1">Payment Type</label>
              <select class="form-control"  name="p_type"> 
                <option value="credit">credit</option> 
                <option value="Debit">Debit</option>
              </select>
        </div>
        <?php echo form_error('p_type');?>
      </div>
      <div class="col-md-2">
 		  <div class="form-group">
            <label for="sel1">Rupess</label>
             <input type="text" class="form-control" name="rupess" placeholder="0.00">
              
        </div> 
      </div>
      
 		<div class="col-md-12">
 		    <div class="form-group">
              <label>Description</label>
              <textarea class="form-control rounded-0" name="p_c_Description" id="p_c_Description" rows="3"></textarea>
            </div>
 		  <?php echo form_error('p_c_Description');?>
 		</div>
 	   
 			      
 			 
 	</div>
 <div class="row">
 		<div class="col-md-6">
 			<?php echo form_submit(['class'=>'btn btn-primary',
 				'type'=>'submit',
 				'value'=>'Submit'
 			]); ?>
 			<?php echo form_reset(['class'=>'btn btn-light',
 				'type'=>'reset',
 				'value'=>'reset'
 			]); ?>
 		</div>

 	</div>


 	<?php echo form_close(); ?>
 
 	
 
	</div> 
 	<?php $this->load->view('index/footer'); ?>


