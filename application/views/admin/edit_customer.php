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
	<h1>Edit</h1>
	
		<?php echo form_open('admin/update_customer/'.$customer->customer_id)?>

		<!-- <?php echo form_hidden('customer_id',$customer->customer_id); ?> -->
		<div class="row">
	  
         		<div class="col-md-6">
 			<div class="form-group">
 			      <label>Name</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Name',
 					'name' => 'customer_name',
 					'value'=> set_value('customer_name',$customer->customer_name)
 				]);
 				?>

 				<?php echo form_error('customer_name');?>
 			</div>
 		</div>
 		
 		
 		<div class="col-md-6">
 			<div class="form-group">
 			      <label>City</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'City',
 					'name' => 'customer_city',
 					'value'=> set_value('customer_city',$customer->customer_city)
 				]);
 				?>

 				<?php echo form_error('customer_city');?>
 			</div>
 		</div>
 		<div class="col-md-6">
 			<div class="form-group">
 			      <label>Phone</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Phone',
 					'name' => 'customer_phone',
 					'value'=> set_value('customer_phone',$customer->customer_phone)
 				]);
 				?>

 				<?php echo form_error('customer_phone');?>
 			</div>
 		</div>
 		<div class="col-md-6">
 			<div class="form-group">
 			      <label>Date</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Data',
 					'type' => 'date',
 					'name' => 'customer_date',
 					'value'=> set_value('customer_date',$customer->customer_date)
 				]);
 				?>

 				<?php echo form_error('customer_date');?>
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


