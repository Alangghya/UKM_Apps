<html>
	<head>
		<style type="text/css">
			#mainBox
			{
				width:300px;
				height:150px;
				background-color:lightgreen;
				animation:myanim 5s;
				-moz-animation:myanim 5s infinite; /* Firefox */
				-moz-border-radius:25px;
				-moz-box-shadow: 10px 10px 5px #888888; /* Firefox 3.6 and earlier */
				box-shadow: 10px 10px 5px #888888;
			}
			
			#isiBox{
				position: relative;
				left: 40px;
			}
		</style>
		<title>Registration</title>
		<h1>Registration Form</h1>
	</head>
	<body>
		<div id="mainBox">
			<div id="isiBox">
				<p>Please enter your details below.</p>
				<?php echo form_open('utama/register'); ?>
				Username              :
				<?php echo form_input('Nama', ''); ?>
				<?php echo form_error('Nama', "<br/><span style='color:red'>", "</span>"); ?> <br>
				
				Password              :
				<?php echo form_password('Password',''); ?>
				<?php echo form_error('Password', "<br/><span style='color:red'>", "</span>"); ?> <br>
				
			
				<?php echo form_submit('submit', 'Submit'); ?> <br>
				<?php echo form_close(); ?>
			</div>
		</div>
	</body>
</html>