 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu');
 ?>
 <div class="container" style="margin-top: 20px;">
 	
 	<h1>Customer Activity LOG</h1>
 	<br>
 
 	
 	<table id="customer_table" class="table" style="width:100%">
        <thead>
            <tr>
              <th>Invoice ID</th>
                <th>Date</th> 
              <th>Description</th> 
             <th>Customer ID</th>    
              <th>Debit</th>  
              <th>credit</th>  
              <th>Action</th>

            </tr>
        </thead>
        <tbody>
                <?php if(count($customers_payment_activity)):
          $count = $this->uri->segment(3);
     ?>
 
    <?php $R_balcnce =0; foreach ($customers_payment_activity as $activity):  ?>
            <tr>
                <td><?php echo $activity->main_invoice_id;?></td>
                
                <td><?php   
                $activity->main_invoice_date=date_create($activity->main_invoice_date);
                         echo date_format($activity->main_invoice_date,"d-M-Y")?></td>  
                <td><?php 
                          if (empty($activity->main_i_description)){
                            echo "#Customers stock Invoice";
                          }else{
                            echo $activity->main_i_description;
                          }
                ?></td>    
                <td><?php echo $activity->customer_id;?></td>      
                <td><?php echo number_format($activity->main_i_debit);?></td>   
                <td><?php echo number_format($activity->main_i_credit);?></td>
           
                   <td><?=  anchor("admin/edit_customer_payment_activity/{$activity->main_invoice_id}",'Edit',['class'=>'btn btn-primary']);  ?></td>   
               
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


