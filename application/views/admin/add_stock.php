 <?php
 $this->load->view('index/header'); ?>
 <br>
 
 <div class="container" style="margin-top: 0px;">
 	<h1>Add stock</h1>
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
     	<?php //  print_r($last_stock_entry); \
     	if (empty($last_stock_entry)){
     	    $last_stock_entry[0]->section =
     	$last_stock_entry[0]->thickness=
     	$last_stock_entry[0]->color =
     	$last_stock_entry[0]->discount = 
     	$last_stock_entry[0]->net_amount = 
     	$last_stock_entry[0]->date  = 
     	$last_stock_entry[0]->gate_pass_no = 
     	$last_stock_entry[0]->remarks = 0 ;
     	}
     	
     	?>
 	<?php  echo form_open_multipart('Admin/add_stock')?>
 	<div class="row">
 	     		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Section</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
             					'type'=>'text',
             					'placeholder'=>'Section',
             					'name' => 'section',
             					'id' =>'add_section',
             					'value'=>  $last_stock_entry[0]->section
 				]);
 				?>

 				<?php echo form_error('section');?>
 			</div>
 		</div> 
 		
 		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Thickness</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Thickness',
 					'name' => 'thickness',
 					'value'=> $last_stock_entry[0]->thickness
 				]);
 				?>

 				<?php echo form_error('thickness');?>
 			</div>
 		</div>
 		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Color</label>
 				<?php 
 				echo form_input([
 				    'class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Color',
 					'name' => 'color',
 					'value'=> $last_stock_entry[0]->color
 				]);
 				?>

 				<?php echo form_error('color');?>
 			</div>
 		</div>
 		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Size</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Total size',
 					'name' => 'sizein_ft',
 					'value'=> ""
 				]);
 				?>

 				<?php echo form_error('sizein_ft');?>
 			</div>
 		</div>
 
 		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Qty</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Qty',
 					'name' => 'rem_qty',
 					'value'=> ""
 				]);
 				?> 
 				<?php echo form_error('rem_qty');?>
 			</div>
 		</div>
 		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Discount</label>
 		 		<?php 
 				echo form_input(['class'=>'form-control', 
 				'type'=>'text',
 					'placeholder'=>'Discount', 
 					'name' => 'discount', 
 					'value'=> $last_stock_entry[0]->discount
 		 		]);
 		  		?> 

 		 		<?php echo form_error('discount');?> 
 			</div>
 		</div>
 	 
 		
 		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Price</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'one FT Amount',
 					'name' => 'net_amount',
 					'value'=> $last_stock_entry[0]->net_amount
 				]);
 				?>

 				<?php echo form_error('net_amount');?>
 			</div>
 		</div>
 	
 		
 		<div class="col-md-2">
 			<div class="form-group">
 			      <label>Gate Pass No</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Gate Pass No',
 					'name' => 'gate_pass_no',
 					'value'=> $last_stock_entry[0]->gate_pass_no
 				]);
 				?>

 				<?php echo form_error('gate_pass_no');?>
 			</div>
 		</div>
 		 <div class="col-md-3">
 			<div class="form-group">
 			      <label>Date (mm-dd-yyyy)</label>
 			     
 				<?php
 				echo form_input(['class'=>'form-control',
 					'type' => 'date',
 					'placeholder'=>'Date',
 				    'name' => 'date',
 				    'value'=> $last_stock_entry[0]->date 
 				]);
 				?>

 				<?php echo form_error('date');?>
 			</div>
 		</div>	
 	
 		<div class="col-md-5">
 			<div class="form-group">
 			      <label>Remarks</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Remarks',
 					'name' => 'remarks',
 					'value'=> $last_stock_entry[0]->remarks
 				]);
 				?>

 				<?php //echo form_error('remarks');?>
 			</div>
 		</div>	
 	
 		
 		<div class="col-md-4">
 			<div class="form-group">
 			      <input type="hidden" class="form-control" name="entered_by" value="<?php echo $this->session->userdata('username');?>" placeholder="<?php echo $this->session->userdata('username');?>">
 			</div>
 		</div>
 		<div class="col-md-4">
 			<div class="form-group">
 			      
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'hidden',
 					'placeholder'=>'Active',
 					'name' => 'active',
 					'value'=> "1"
 				]);
 				?>
 
 			</div>
 		</div>
 		
 		<!--	<div class="col-md-4">-->
 		<!--	<div class="form-group">-->
 		<!--	      <label>Customer ID & Name</label>-->
 		<!--	      <select name="customer_id" class="form-control">-->
 		<!--	          <?php foreach ($customers as $customer){?>-->
   <!--                     <option value="<?php echo $customer->customer_id;?>"><?php echo $customer->customer_id." ".$customer->customer_name;?></option>-->
   <!--                     <?php }?>-->
   <!--                 </select>-->
 		
 		

 		<!--		<?php echo form_error('customer_id');?>-->
 		<!--	</div> -->
 		<!--</div>-->
 		
 	</div>





 	<div class="row">
 		<div class="col-md-6">
 			<?php echo form_submit(['class'=>'btn btn-primary',
 				'type'=>'submit',
 				'value'=>'Submit'
 			]); ?>
 			<?php  echo form_reset(['class'=>'btn btn-light',
 			 	'type'=>'hidden',
 				'value'=>'reset'
 			]); 
 			?>
 		</div>

 	</div>


 	<?php echo form_close(); ?>
 	
 	
   <?php foreach ($stock as $data)
    {
          $stock_no = $data->stock_no;
          $section = $data->section;
          $thickness = $data->thickness;
          $color = $data->color;
          $rate = $data->rate;
          $discount = $data->discount;
          $net_amount = $data->net_amount;
          $remarks = $data->remarks;
          $date_c   = $data->date;
          $sizein_ft = $data->sizein_ft;
          $qty = $data->qty;
          $rem_qty = $data->rem_qty;
          $gate_pass_no = $data->gate_pass_no;
          $entered_by = $data->entered_by;
    }
  ?>
 
  	<h1 class="text-center">Remaining Stock </h1>
 <div class="container">
      
<table class="table table-responsive" id="stock_table">
  <thead>
    <tr>
      <th scope="col">stock ID</th>
      <th scope="col">Section</th>
      <th scope="col">Thickness</th>
      <th scope="col">color</th>
        <th scope="col">Total Size</th>
        <th scope="col">Remaining Qty</th>
      <th scope="col">Discount</th>
      <th scope="col">Amount</th>
          <th scope="col">Gate Pass No</th> 
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
         <?php foreach ($stock as $data)
    {
          $stock_no = $data->stock_no;
          $section = $data->section;
          $thickness = $data->thickness;
          $color = $data->color;
          $rate = $data->rate;
          $discount = $data->discount;
          $net_amount = $data->net_amount;
            $rem_qty = $data->rem_qty;
          $date_c   = $data->date;
          $sizein_ft = $data->sizein_ft;
          $qty = $data->qty;
          $entered_by = $data->entered_by;
           $gate_pass_no = $data->gate_pass_no;

?>
    <tr>
      <td><?php echo $stock_no;?></td>
      <td><?php echo $section;?></td>
      <td><?php echo $thickness;?></td>
      <td><?php echo $color;?></td>
      <td><?php echo $sizein_ft;?></td>
      <td><?php echo $rem_qty;?></td>
      <td><?php echo $discount;?></td>
      <td><?php echo $net_amount;?></td>
       <td><?php echo $gate_pass_no;?></td>
      <td><?=  anchor("admin/edit_stock/{$stock_no}",'Edit',['class'=>'btn btn-primary']);  ?></td>
  </tr>
  <?php
    }
  ?>
  </tbody>
</table>
</div>
 	<?php $this->load->view('index/footer'); ?>