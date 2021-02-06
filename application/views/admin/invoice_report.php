 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu');
 ?>
 <div class="container" style="margin-top: 20px;">
 	
 	<h1>Generate Invoice Report</h1>
 	<br>

 	<?php echo form_open_multipart('Admin/invoice_report')?>
 	<div class="row">
 		<div class="col-md-4">
 		 <div class="form-group">
                <label>Start Date</label>
                <input  name="to_date" type="date"  id="form_date" class="form-control">
                <?php echo form_error('to_date');?>
        </div>
 		</div>
 		<div class="col-md-4">
 		 <div class="form-group">
                <label>End Date</label>
                <input name="from_date" type="date"  id="to_date" class="form-control">
                <?php echo form_error('from_date');?>
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


