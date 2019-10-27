<?php
	session_start();
	require_once('connection.php');

	if (isset($_POST['submit'])) {
		$name = $_POST['username'];
		$password = ($_POST['password']);
		$pass = sha1($password);



		$chosing = "select * from login where UserName='$name' && Password='$pass'";
		$result = mysqli_query($connection, $chosing);
		$validity = mysqli_num_rows($result);

		if ($validity >= 1) {
			$_SESSION['username'] = $name;
			header('Location: question.php');
			exit();
		} else {
			header('Location:login.php');
			exit();
		}
	}
?>

<html>
    <head>
        <title>Login</title>
		<style type="text/css">
			
			h1{color: white; font-family: Monotype Corsiva; 
				font-size: 80px; text-align: center;
				margin-top: 25%;
			}
			
			p{font-size: 30px; margin-top:0%; margin-left:40px; text-align: center; color: white; }
			
			.log{
				height: 100%;
				width: 50%;
				position: fixed;
				z-index: 1;
				top: 0;
				overflow-x: hidden;
				padding-top: 20px;
			}
			
			.left {
				left: 0%;
				background-color: #003333;
			}

			.right {
			  right: 0%;
			  background-color: white;
			}
			
			h2{margin-left: 5%; margin-top: 5%;}
			
			.fieldst{
				border:none;			
			}
			
			.form_input{
				padding: 40px;
				font-size: 20px;
			}
			
			input[type]{
				width:75%;
				height:5%;
				margin-top:20px;
				padding-left:10px;
			}
			
			input[type=submit]{
				width:25%;
				height:5%;
				margin-left:40px;
			}
			
			.new{
				margin-left:40px;
			}
			
		</style>
    </head>
    <body>
			<div class = "log left">
				<h1>QUIZ ...</h1>
				<p>Enjoy your leisure time</p>
			</div>
			
			<div class = "log right">
				<form method="POST" action="login.php">
					<h2>Login Details Here</h2>
					<fieldset class="fieldst">
						<div class="form_input">
							Username: <br/><input type="text" name="username" class="form-control" placeholder="Enter Username"/>
						</div>
						<div class="form_input">
							Password: <br/><input type="password" name="password" class="form-control" placeholder="Enter Password"/>
						</div>
						<input type="submit" name="submit" value="LOGIN">
						<div class="new"><h3><a href="register.php"><br/>REGISTER</a></h3></div>
					</fieldset>
				</form>
			</div>
    </body>
</html>

<?php mysqli_close($connection); ?>
