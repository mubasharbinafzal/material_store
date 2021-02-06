 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu');
 ?>
 <div class="container" style="margin-top: 20px;">
 	
 	<h1>Customer Info</h1>
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
 	<?php echo form_open_multipart('Admin/add_customer')?>
 	<div class="row">
 	     		<div class="col-md-6">
 			<div class="form-group">
 			      <label>Name</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Name',
 					'name' => 'customer_name',
 					'value'=> set_value('customer_name')
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
 					'value'=> set_value('customer_city')
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
 					'value'=> set_value('customer_phone')
 				]);
 				?>

 				<?php echo form_error('customer_phone');?>
 			</div>
 		</div>
 		<div class="col-md-6">
 			<div class="form-group">
 			      <label>Data</label>
 				<?php 
 				echo form_input(['class'=>'form-control',
 					'type'=>'text',
 					'placeholder'=>'Date',
 					 'type'=>'date',
 					'name' => 'customer_date',
 					'value'=> set_value('customer_date')
 				]);
 				?>

 				<?php echo form_error('customer_date');?>
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
 	<br><br>
 	<table id="customer_table" class="table" style="width:100%">
        <thead>
            <tr>
                      <th >ID</th>
                      <th>Name</th>
                      <th>City</th>
                      <th>Phone</th>
                      <th>Date</th>
                      <th>Edit</th> 

            </tr>
        </thead>
        <tbody>
                <?php if(count($customers)):
          $count = $this->uri->segment(3);
     ?>
 
    <?php foreach ($customers as $customer):  ?>
            <tr>
                <td><?php echo $customer->customer_id;?></td>
                <td><?php echo $customer->customer_name;?></td>
                <td><?php echo $customer->customer_city;?></td>
                <td><?php echo $customer->customer_phone;?></td>
                <td><?php echo $customer->customer_date;?></td>
                <td><?=  anchor("admin/edit_customer/{$customer->customer_id}",'Edit',['class'=>'btn btn-primary']);  ?></td> 
            </tr>
               <?php endforeach; ?>
   <?php else: ?>
    <tr>
      <td colspan="3">Not data avalible</td>
    </tr>
   <?php endif; ?>
      
        </tbody>

    </table>

<?php echo $this->pagination->create_links(); ?>
 	<?php $this->load->view('index/footer'); ?>


