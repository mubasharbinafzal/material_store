 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu');
 ?>
 <div class="container" style="margin-top: 20px;">
  
  <h1>Stock Activity LOG</h1>
  <br>
 
  
  <table id="customer_table" class="table" style="width:100%">
        <thead>
            <tr>
              <th>ID</th>
                <th>Date</th>  
                <th>Description</th>
              <th>Debit</th>  
              <th>credit</th>   
              <th>Gate pass</th> 
              <th>Action</th> 

            </tr>
        </thead>
        <tbody>
                <?php if(count($stock_payment_activity)):
          $count = $this->uri->segment(3);
     ?>
 
    <?php $R_balcnce =0; foreach ($stock_payment_activity as $activity):  ?>
            <tr>
                <td><?php echo $activity->s_l_id;?></td>
                
                <td><?php   
                $activity->s_l_date=date_create($activity->s_l_date);
                         echo date_format($activity->s_l_date,"d-M-Y")?></td>  
                     <?php if (empty($activity->s_l_description)){?>     
                <td><?php echo "#Gate pass"?></td>
                <?php }else{ ?>
                  <td><?php echo  $activity->s_l_description;?></td>
                <?php }?>    
                <td><?php echo number_format($activity->s_l_debit);?></td>    
                <td><?php echo number_format($activity->s_l_credit);?></td>
                <?php if (!empty($activity->gatepass)){?>
                <td><?php echo $activity->gatepass;?></td>
                <?php }else{ ?>
                  <td><?php echo "#stock payment";?></td>
                <?php } ?> 
                <td>
                <?php if (empty($activity->gatepass)){?>
                      <?=  anchor("admin/edit_stock_payment_activity/{$activity->s_l_id}",'Edit',['class'=>'btn btn-primary']);  ?> 
                <?php } ?>
               </td> 
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


