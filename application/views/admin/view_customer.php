<?php 
  $this->load->view('index/header');
 ?>
<h1 class="text-center Welcome_msg">Customers Details</h1>
<div class="container" style="margin-top:50px;">
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
 
<?php // echo $this->db->last_query()?>

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
<?php 
  $this->load->view('index/footer');
 ?>