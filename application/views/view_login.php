<html>
	<head>
		<style type="text/css"> 
	#mainBox
	{
		width:300px;
		height:110px;
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
		
	@keyframes myfirst
	{
	30% {background:lightblue;}
	60% {background:pink;}
	100% {background: lightgreen;}
	}
	
	@-moz-keyframes myanim /* Firefox */
	{
	30% {background:lightblue;}
	60% {background:pink;}
	100% {background: lightgreen;}
	}
	
	</style>
		<title>Login</title>
	</head>
	<body>
		
		<h1>Login</h1>
		<div id="mainBox">
			<div id="isiBox">			
				<p><strong>Please LOGIN below.</strong></p>
				<?php echo form_open('utama/login'); ?>
				Username              : 
				<?php echo form_input('Nama', set_value('Nama')); ?>
				<?php echo form_error('Nama', "<span style='color:red'>", "</span>"); ?> <br>
				
				Password              : 
				<?php echo form_password('Password',''); ?>
				<?php echo form_error('Password', "<span style='color:red'>", "</span>"); ?> <br>
				
				<?php echo form_submit('submit', 'Submit'); ?> <br>
				<?php echo form_close(); ?>
			</div>
		</div>
	</body>
</html>