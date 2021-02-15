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
	<h1>Edit stock</h1>
	
		<?php echo form_open('admin/update_article/'.$stock->stock_no)?>

		<!-- <?php echo form_hidden('stock_no',$stock->stock_no); ?> -->
		<div class="row">
	 
 		<div class="col-md-4">
 			<div class="form-group">
 			      <label>Section</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Section',
 					'name' => 'section',
 					'value'=> set_value('section',$stock->section)
 				]);
 				?>

 				<?php echo form_error('section');?>
 			</div>
 		</div>
 		
 		
 		<div class="col-md-4">
 			<div class="form-group">
 			      <label>Thickness</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Thickness',
 					'name' => 'thickness',
 					'value'=> set_value('thickness',$stock->thickness)
 				]);
 				?>

 				<?php echo form_error('thickness');?>
 			</div>
 		</div>
 		<div class="col-md-4">
 			<div class="form-group">
 			      <label>Color</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Color',
 					'name' => 'color',
 					'value'=> set_value('color',$stock->color)
 				]);
 				?>

 				<?php echo form_error('color');?>
 			</div>
 		</div>
 		<div class="col-md-4">
 			<div class="form-group">
 			      <label>Size</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Size',
 					'name' => 'sizein_ft',
 					'value'=> set_value('sizein_ft',$stock->sizein_ft)
 				]);
 				?>

 				<?php echo form_error('sizein_ft');?>
 			</div>
 		</div>
 		<div class="col-md-4">
 			<div class="form-group">
 			      <label>Qty</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Qty',
 					'name' => 'qty',
 					'value'=> set_value('qty',$stock->qty)
 				]);
 				?>

 				<?php echo form_error('qty');?>
 			</div>
 		</div>
 		<div class="col-md-4">
 		    	<div class="form-group">
 			      <label>Discount</label>
 		 		<?php 
 				echo form_input(['class'=>'form-control', 
 				'type'=>'text',
 					'placeholder'=>'Discount', 
 					'name' => 'discount', 
 					'value'=> set_value('rate',$stock->rate)
 		 		]);
 		  		?> 

 		 		<?php echo form_error('discount');?> 
 			</div>
 		</div>
 		<!--<div class="col-md-4">-->
 		<!--	<div class="form-group">-->
 		<!--	      <label>Percentage</label>-->
 				<?php  /*
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Percentage',
 					'name' => 'percentage',
 					'value'=> set_value('percentage',$stock->percentage)
 				]);
 			*/	?>

 				<?php //echo form_error('percentage');?>
 		<!--	</div>-->
 		<!--</div>-->
 		
 		<div class="col-md-4">
 		    <div class="form-group">
 			      <label>Price</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'one FT Amount',
 					'name' => 'net_amount',
 					'value'=> set_value('net_amount',$stock->net_amount)
 				]);
 				?>

 				<?php echo form_error('net_amount');?>
 			</div>
 		</div>
 	 <div class="col-md-4">
 			<div class="form-group">
 			      <label>Date (mm-dd-yyyy)</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Date',
 					'type' => 'date',
 					'name' => 'date',
 					'value'=> set_value('date',$stock->date)
 				]);
 				?>

 				<?php echo form_error('date');?>
 			</div>
 		</div>	
 		<div class="col-md-4">
 			<div class="form-group">
 			      <label>Gate Pass No</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Gate Pass No',
 					'name' => 'gate_pass_no',
 					'value'=> set_value('gate_pass_no',$stock->gate_pass_no)
 				]);
 				?>

 				<?php echo form_error('gate_pass_no');?>
 			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="form-group">
 			      <label>Remarks</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Remarks',
 					'name' => 'remarks',
 					'value'=> set_value('remarks',$stock->remarks)
 				]);
 				?>

 				<?php echo form_error('remarks');?>
 			</div>
 		</div>	
 		<!--<div class="col-md-4">-->
 		<!--	<div class="form-group">-->
 		<!--	      <label>Delivered By</label>-->
 		 		<?php  
 		 	//	echo form_input(['class'=>'form-control', 
 	 	//		'type'=>'text',-->
 	 	//		'placeholder'=>'Delivered By',-->
 	 	//		'name' => 'delivered_by',-->
 		 	//		'value'=> set_value('delivered_by',$stock->delivered_by) 
 		    //		]); 
 	 		?> 

 		<!--		<?php echo form_error('delivered_by');?>-->
 		<!--	</div>-->
 		<!--</div>-->
 		
 		<!--<div class="col-md-4">-->
 		<!--	<div class="form-group">-->
 		<!--	      <label>Entered By</label>-->
 		 		<?php  
 		 	//	echo form_input(['class'=>'form-control', 
 	 	//		'type'=>'text', 
 		 	//		'placeholder'=>'Entered By', 
 		 	//		'name' => 'entered_by', 
 		 	//		'value'=> set_value('entered_by',$stock->entered_by) 
 		 	//	]);-->
 		 		?> 

 	 		<?php  // echo form_error('entered_by');?> 
 		<!--	</div>-->
 		<!--</div>-->
 		
 		
 	<!--	<div class="col-md-4">-->
 	<!--		<div class="form-group">-->
 	<!--		      <label>Customer ID</label>-->
 	<!--		      <select name="customer_id" class="form-control">-->
 			          <?php // foreach ($customers as $customer){
 			          //  if ($stock->customer_id == $customer->customer_id ){
 			          ?>
  <!--                      <option value="<?php// echo $customer->customer_id;?>"><?php// echo $customer->customer_id." ".$customer->customer_name;?></option>-->
                        
                      <?php // }} ?>
  <!--                  </select>-->
 			<?php // echo form_error('customer_id');?>
 
 	
 	<!--</div>-->
 	<!--</div>-->
 	
 	
 	
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


