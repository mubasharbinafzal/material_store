 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu'); 
 ?>
 <div class="container" style="margin-top: 20px;">
 	
 	<h1>Gatepass Number</h1>
 	<br>

 	<?php echo form_open_multipart('Admin/entered_stock')?>
 	<div class="row">
         	<div class="col-md-4">
 			<div class="form-group">
 			      <label>Select Gatepass Number</label>
 			      <select name="gate_pass" class="form-control">
 			          <?php foreach ($get_gatepass_verify_or_not as $gatepass_number){ ?>
 			          			<?php if ($gatepass_number->gatepass  == "") {?>
                        <option value="<?php echo $gatepass_number->gate_pass_no;?>"><?php echo $gatepass_number->gate_pass_no;?></option>

                    			<?php }else{?>
                    				   <option value="<?php echo $gatepass_number->gate_pass_no;?>"><?php echo $gatepass_number->gate_pass_no;?>  &nbsp;&nbsp;&nbsp;&nbsp;
                    				  Verified  </option>
                    			<?php }?>
                        <?php }?>
                    </select>
 		        <?php echo form_error('gate_pass');?>
 			</div> 
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


