
<?php 
 	$this->load->view('index/header');
 ?>

	<br>
<div class="container" style="margin-top: 20px;">
	<h1>ADMIN Panel</h1>
	<?php if($error = $this->session->flashdata('login_failed')):?>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert alert-danger">
					
					<?php echo $error; ?>
				</div>

			</div>
			<div class="col-lg-6"></div>

		</div>

		<?php endif; ?>
		<?php echo form_open('auth')?>
		<div class="row">
			<div class="col-md-6">
					  <div class="form-group">
		   				<label for="exampleInputEmail1">User name</label>
						<?php 
								echo form_input(['class'=>'form-control',
												 'type'=>'text',
												'placeholder'=>' Enter Username',
												'name' => 'uname',
												'value'=> set_value('uname')
											]);
						?>
		 			</div>

			</div>
			<div class="col-md-6" style="margin-top: 40px;">
					<?php echo form_error('uname');?>
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
											'name' => 'pass',
											'value'=> set_value('pass')
										]);
					?>
		  </div>
				
			</div>
			<div class="col-md-6" style="margin-top: 40px;">
				<?php echo form_error('pass'); ?>
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

		<!-- <?php echo anchor('auth/register/','Sign Up','class="link-class"') ?> -->

	</div>


  <?php $this->load->view('index/footer'); ?>


