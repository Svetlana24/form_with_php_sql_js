<?php include_once("data_base.php"); ?>

<?php 
		if ( isset($_POST['do_sign_up']) ){
			$errors = array();
			$name = $_POST['login'];
			$email = $_POST['email'];
			$password = $_POST['password_sign_up'];

			if(!preg_match("/[a-zA-Z]{3,}/", $name)) {
					$errors[] = 'The user name is entered incorrectly!';
			}
			if(!preg_match("/[0-9a-z_\.\-]+@[0-9a-z_\.\-]+\.[a-z]{2,}/i", $email)){
					$errors[] = 'The email is entered incorrectly!';
			}
			if(!preg_match("/[0-9a-zA-Z]{6,16}/", $password)){
					$errors[] = 'The password is entered incorrectly!';
			}
		
			if( $_POST['pasword_repeat'] != $_POST['password_sign_up'] ){
				$errors[] = 'Repeated password is entered incorrectly!';
			}

			

			$query = mysqli_query($link,"SELECT * FROM `users` WHERE LOWER(`name`)='".strtolower($name)."' OR LOWER(`email`)='".strtolower($email)."'");
			if(mysqli_num_rows($query) > 0) {
    			

       			$errors[] = "The user with the same login or email already exists!";
     
       		}
			if( count($errors) == 0 ){
				$password = password_hash( $_POST['password_sign_up'], PASSWORD_DEFAULT );
				
				mysqli_query($link,'INSERT INTO `users`(`name`, `email`, `password`) VALUES ("'.$name.'","'.$email.'","'.$password.'"); ');
		
				mysqli_close($link);
				
				echo '<div style="margin: 50px 0; text-align: center; color: white; font-size: 20px;">Thank you for your registration!</div><br><div style="text-align: center;"><a href="sign_in.php" style="color: white; text-decoration: underline;">Sign in</a></div>';
				echo'<style type="text/css">.sign_up {display: none;}</style>';
				}
				

			else
				{
					echo '<div style="position: absolute; width: 40%; left: 30%;top: 70px; padding: 5px auto; font-size: 20px; color: red; text-align: center; line-height: 30px;">'.array_shift($errors).'</div><br>';
			
				}
			
		}
			

	?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css"/>

	<title>Document</title>
</head>
<body>

	<div id="sign_up" class="sign_up">
		<form action="index.php" method="post" class="form_up">
			<p class="text_info">Fields marked “*” are required</p>
			<label for="login">User name*</label>
			<input type="text" title="not less than 3 characters" id="login" name="login" class="login" required="required"  value="<?php echo @$_POST['login']; ?>">
			<label for="email">Email*</label>
			<input type="email" id="email" name="email" class="email" required="required" value="<?php echo @$_POST['email']; ?>">
			<label for="password_sign_up">Password*</label>
			<input type="password" title="not less than 6 characters" id="password_sign_up" name="password_sign_up" class=  "password" required="required" value="<?php echo @$_POST['password_sign_up']; ?>">
			<label for="pasword_repeat">Confirm password*</label>
			<input type="password" id="pasword_repeat" name="pasword_repeat" class="pasword_repeat" required="required" value="<?php echo @$_POST['pasword_repeat']; ?>">
			<input type="submit" value="Sign up" name="do_sign_up" class="submit">
			<a href="sign_in.php" class="to_sign_in">Sign in</a>
		</form>
	
	</div>

	
	

	<script src="script.js"></script>

	
</body>
</html>