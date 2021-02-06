<?php 
  $this->load->view('index/header');
 ?>
<h1 class="text-center Welcome_msg">login successfully, Welcome to admin</h1>

<?php 
  $this->load->view('admin/main_menu');
 ?>


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
<table class="table table-responsive" id="stock_table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Date</th>
      <th scope="col"></th>
  
    </tr>
  </thead>
  <tbody>

    <?php if(count($list)):
          $count = $this->uri->segment(3);
     ?>
 
    <?php foreach ($list as $record):?>
    
    <tr>
      <th scope="row"><?php echo $record->customer_id;?></th>
       <td><?php echo $record->customer_name;?></td>
       <td><?php echo $record->customer_date;?></td>
      <td><?=  anchor("admin/view_invoice/{$record->customer_id}",'Print Invoice',['class'=>'btn btn-success' , 'target'=>'_blank']);?></td>
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