<?php 
 	$this->load->view('index/header');
 ?>
	<br>
<div class="container">
<div class="row">
  <!-- <?= anchor('admin/welcome','Back',['class' => 'btn btn-lg btn-primary']) ?> -->

</div>
</div>
<div class="container" style="margin-top: 20px;">
	<h1>Edit stock Payment Activity</h1>
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
		<?php // print_r($edit_customers_payment_activity); 
		echo form_open('admin/update_stock_payment_activity/'.
				$edit_stock_payment_activity[0]->s_l_id)
		?>
 		<input type="hidden" name="s_l_id" value="<?php echo $edit_stock_payment_activity[0]->s_l_id; ?>">
		<div class="row">
 				<div class="col-md-4">
 		 <div class="form-group">
                <label>Date</label>
                <input  name="s_l_date" type="date"  id="s_l_date" class="form-control" value="<?php echo $edit_stock_payment_activity[0]->s_l_date; ?>">
            
        </div>
 
 		</div>
 		 <div class="col-md-2">
 		  <div class="form-group">
            <label for="sel1">Debit</label>
                  <input type="text" class="form-control" name="s_l_debit" value="<?php echo $edit_stock_payment_activity[0]->s_l_debit?>"> 
              
        </div>
        <?php echo form_error('rupess');?>
      </div>
       <div class="col-md-2">
 		  <div class="form-group">
            <label for="sel1">Credit</label>
             <input type="text" class="form-control" name="s_l_credit" value="<?php echo $edit_stock_payment_activity[0]->s_l_credit; ?>">
              
        </div>
        <?php echo form_error('rupess');?>
      </div>
       		<div class="col-md-12">
 		    <div class="form-group">
              <label>Description</label>
              <textarea class="form-control rounded-0" name="s_l_description" id="s_l_description" rows="3"><?php echo $edit_stock_payment_activity[0]->s_l_description;?></textarea>
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


