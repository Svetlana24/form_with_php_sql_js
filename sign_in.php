<?php include_once ("data_base.php"); ?>

 <?php 
		
		if ( isset($_POST['do_sign_in']) ){
			$users = mysqli_query($link, "SELECT * FROM `users` WHERE LOWER(`name`)='".strtolower($_POST['user_name'])."' OR LOWER(`email`)='".strtolower($_POST['user_name'])."'");
			$count = mysqli_num_rows($users);
			

			

			if( $count == 1 ) {
		
				$result = mysqli_fetch_array($users, MYSQLI_ASSOC);
				
				$hash = $result['password'];
	
				$control = password_verify($_POST['password'], $hash);
				
				if( password_verify($_POST['password'], $hash)) {

					echo '<div style="margin: 50px 0; text-align: center; color: white; font-size: 20px;">You are logged in!';
					echo'<style type="text/css">.sign_in {display: none;}</style>';
				
				}

				else
					{
						echo '<div style="position: absolute; width: 40%; left: 30%;top: 90px; padding: 5px auto; font-size: 20px; color: red; text-align: center; line-height: 30px;">The password is incorrect!</div><br>';

					}

			}
			 else
		 		{

			 		echo '<div style="position: absolute; width: 40%; left: 30%;top: 70px; padding: 5px auto; font-size: 20px; color: red; text-align: center; line-height: 30px;">The user with this login not found!</div><br>';
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
	<div id="sign_in" class="sign_in">
		<form action="sign_in.php" method="post" class="form_in">
			<label for="user_name">User name or email</label>
			<input type="text" id="user_name" name="user_name" class="user_name" required="required">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" class="password" required="required">
			<input type="checkbox" id="keep_login" class="keep_login">
			<label for="keep_login">Remember me</label>
			<input type="submit" value="Sign in" name="do_sign_in" class="submit">
			<div class="form_links">
				<a href="" class="link_info">Forgot your password?</a>
				<a href="index.php" class="to_sign_up">Sign up</a>
			</div>
		</form>
	</div>

	<script src="form_in.js"></script>	
</body>
</html>