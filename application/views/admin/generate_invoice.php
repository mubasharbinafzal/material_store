 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu');
 ?>
 <div class="container" style="margin-top: 20px;">
 	
 	<h1>Generate Invoice</h1>
 	<br>
  
 	<?php echo form_open_multipart('Admin/generate_invoice')?>
 	<div class="row">
         	<div class="col-md-4">
 			<div class="form-group">
 			      <label>Customer ID & Name</label>
 			      <select name="customer_id" class="form-control">
 			          <?php foreach ($customers as $customer){?>
                        <option value="<?php echo $customer->customer_id;?>"><?php echo $customer->customer_id." ".$customer->customer_name;?></option>
                        <?php }?>
                    </select>
 		        <?php echo form_error('customer_id');?>
 			</div> 
 		</div>
 		<div class="col-md-4">
 		 <div class="form-group">
                <label>Date</label>
                <input name="main_invoice_date" type="date" id="main_invoice_date" class="form-control" placeholder="Date">
        </div>
 		</div>
 		
 		 
 			<div class="form-group">
 			      <input type="hidden" class="form-control" name="main_invoice_name" value="<?php echo $this->session->userdata('username');?>" placeholder="<?php echo $this->session->userdata('username');?>">
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
 
 	
 	<table id="customer_table" class="table" style="width:100%">
        <thead>
            <tr>
              <th>Invoice ID</th>
              <th >Customer ID</th>
              <th>Name</th>  
              <th>Date</th> 
              <!--<th>Description</th>  -->
              <th>Debit</th>  
              <!--<th>credit</th>  -->
              <th>Print</th>

            </tr>
        </thead>
        <tbody>
                <?php if(count($generate_invoices)):
          $count = $this->uri->segment(3);
     ?>
 
    <?php $R_balcnce =0; foreach ($generate_invoices as $generate_invoice):  ?>
            <tr>
                <td><?php echo $generate_invoice->main_invoice_id;?></td>
                <td><?php echo $generate_invoice->customer_id;?></td>
                <td><?php echo $generate_invoice->customer_name;?></td>  
                <td><?php   $generate_invoice->main_invoice_date=date_create($generate_invoice->main_invoice_date);
                         echo date_format($generate_invoice->main_invoice_date,"d-M-Y")?></td>  
                <!--<td><?php echo $generate_invoice->main_i_description;?></td>          -->
                <td><?php echo number_format($generate_invoice->main_i_debit);?></td>   
                <!--<td><?php echo number_format($generate_invoice->main_i_credit);?></td>   -->
              
                <?php if ($generate_invoice->main_i_debit == 0 AND $generate_invoice->main_i_credit == 0){ ?>
                <td><?=  anchor("admin/add_invoice/{$generate_invoice->main_invoice_id}",'Generate invoice',['class'=>'btn btn-info']);  ?></td>
                <?php }else {?>
                <td><?=  anchor("admin/view_invoice/{$generate_invoice->main_invoice_id}",'Print invoice',['class'=>'btn btn-success']);  ?></td>
                <?php }?>
            </tr>
               <?php endforeach; ?>
   <?php else: ?>
    <tr>
      <td colspan="3">Not data avalible</td>
    </tr>
   <?php endif; ?>
      
        </tbody>

    </table>
	</div>
<?php echo $this->pagination->create_links(); ?>
 	<?php $this->load->view('index/footer'); ?>


