<?php include('FormClass.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Multiple Forms</title>
	<script src="script.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main">

	<form id="all_forms" action="index.php" method="POST">

		<div align="left" class="top_left" ><h1 align="left">Multiple Forms</h1></div>
		<div align="right" class="top_right">
			<button id="add_contact" onclick="return false;" class="top_button_add" >Add Contact</button>
			<button id="forms_validation" onclick="return false;" class="top_button_validate" >Validate</button>
			<button id="save_form" name="save_form" class="top_button_save" >Save</button>
		</div>
		<div id="forms_container" class="forms_container">
			<?php if(!isset($_POST['save_form'])) {  
				// default form
				?>
			<div id="form0" class="mform">
				<h3>Contact</h3>
				<div class="mform_field">
					<label >Name:</label>
					<input type="text" name="names[]" id="name0" />
					<span id="name_msg0">Invalid name.</span>
				</div>
				<div class="mform_field">
					<label>Email:</label>
					<input type="text" name="emails[]" id="email0" />
					<span id="email_msg0" >Invalid email.</span>
				</div>
				<div class="mform_field">
					<label >Phone Number:</label>
					<input type="text" name="phonenumbers[]" id="phonenumber0" />
					<span id="phonenumber_msg0" >Invalid phone number.</span>
				</div>
			</div>
		<?php }else{ 
				// submitted forms
		$Form = new FormClass();
		$dts=$Form->Validation();
		
		foreach($dts['forms']['names'] as $key=>$value){ ?>
			<div id="form0" class="mform" >
				<h3>Contact</h3>
				<div class="mform_field" >
					<label>Name:</label>
					<input type="text" value="<?php echo $value; ?>" name="names[]" id="name0" />
					<?php if(isset($dts['dts']['names'][$key])){ ?>
						<span id="name_msg0" class="span_active" >Invalid name.</span>
					<?php }else{ ?>
						<span id="name_msg0" >Invalid name.</span>
					<?php } ?>
					
				</div>
				<div class="mform_field">
					<label>Email:</label>
					<input type="text" value="<?php echo $dts['forms']['emails'][$key]; ?>" name="emails[]" id="email0" />
					<?php if(isset($dts['dts']['emails'][$key])){ ?>
						<span id="email_msg0" class="span_active" >Invalid email.</span>
					<?php }else{ ?>
						<span id="email_msg0" >Invalid email.</span>
					<?php } ?>
				</div>
				<div class="mform_field">
					<label >Phone Number:</label>
					<input type="text" value="<?php echo $dts['forms']['phonenumbers'][$key]; ?>" name="phonenumbers[]" id="phonenumber0" />
					<?php if(isset($dts['dts']['phonenumbers'][$key])){ ?>
						<span id="phonenumber_msg0" class="span_active" >Invalid phone number.</span>
					<?php }else{ ?>
						<span id="phonenumber_msg0" >Invalid phone number.</span>
					<?php } ?>
				</div>
			</div>

		<?php } } ?>

		</div>

	</form>

</div>
</body>
</html>