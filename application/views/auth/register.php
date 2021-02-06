
	<?php include('header.php'); ?>
	<br>
<div class="container" style="margin-top: 20px;">
	<h1>Register Form </h1>
	<!--Message-->
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
    <!--End Message-->
		<?php echo form_open('auth/sendemail')?>
		<div class="row">
			<div class="col-md-6">
					  <div class="form-group">
		   				<label for="exampleInputEmail1">User name</label>
						<?php 
								echo form_input(['class'=>'form-control',
												 'type'=>'text',
												'placeholder'=>' Enter Username',
												'name' => 'username',
												'value'=> set_value('username')
											]);
						?>
		 			</div>

			</div>
			<div class="col-md-6" style="margin-top: 40px;">
					<?php echo form_error('username');?>
			</div>
		</div>

			<div class="row">
			<div class="col-md-6">
				  <div class="form-group">
		    			<label for="exampleInputPassword1">Password</label>
					    <?php 
							echo form_password(['class'=>'form-control',
												'type'=>'password',
											'placeholder'=>' Enter password',
											'name' => 'password',
											'value'=> set_value('password')
										]);
					?>
		  </div>
				
			</div>
			<div class="col-md-6" style="margin-top: 40px;">
				<?php echo form_error('password'); ?>
			</div>
		</div>

			<div class="row">
			<div class="col-md-6">
				  <div class="form-group">
		    			<label>First name</label>
					    <?php 
							echo form_input(['class'=>'form-control',
												'type'=>'text',
											'placeholder'=>'First name',
											'name' => 'firstname',
											'value'=> set_value('firstname')
										]);
					?>
		  </div>
				
			</div>
			<div class="col-md-6" style="margin-top: 40px;">
				<?php echo form_error('firstname'); ?>
			</div>
		</div>


			<div class="row">
			<div class="col-md-6">
				  <div class="form-group">
		    			<label>Last name</label>
					    <?php 
							echo form_input(['class'=>'form-control',
												'type'=>'text',
											'placeholder'=>'Last Name',
											'name' => 'lastname',
											'value'=> set_value('lastname')
										]);
					?>
		  	</div>
			</div>
			<div class="col-md-6" style="margin-top: 40px;">
				<?php echo form_error('lastname'); ?>
			</div>
		</div>
			<div class="row">
			<div class="col-md-6">
				  <div class="form-group">
		    			<label for="exampleInputPassword1">Email</label>
					    <?php 
							echo form_input(['class'=>'form-control',
												'type'=>'Email',
											'placeholder'=>'Email',
											'name' => 'email',
											'value'=> set_value('email')
										]);
					?>
		  		</div>	
			</div>
			<div class="col-md-6" style="margin-top: 40px;">
				<?php echo form_error('email'); ?>
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
	<?php include('footer.php'); ?>