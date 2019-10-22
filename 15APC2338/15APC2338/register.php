
<?php
session_start();
require_once('connection.php');

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['conpassword'];

    if ($password == $cpassword) {

        $username = $_POST['username'];
        $email = $_POST['email'];

        $pwd = sha1($password);

        $chosing = "select * from login where UserName='$username'";
        $result = mysqli_query($connection, $chosing);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $message = "user already add";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: login.php');
        } else {
            $query = "INSERT INTO login (UserName,Password,Email) VALUES ('{$username}','{$pwd}','{$email}')";
            $result = mysqli_query($connection, $query);
            header('Location: question.php');
        }
    }
}
?>
<html>
    <head>
        <title>Quiz</title>
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
				padding: 20px;
				font-size: 20px;
				margin-left:20px;
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
			
		</style>
    </head>
    <body>
        <div class = "log left">
			<h1>QUIZ ...</h1>
			<p>Enjoy your leisure time</p>
		</div>
		
		<div class = "log right">
            <form method="POST" action="register.php">
				<h2>Enter Your Details Here</h2>
                <fieldset class="fieldst">
                    <div class="form_input">
                        Username: <br/><input type="text" name="username" placeholder="Username"/>
                    </div>
                    <div class="form_input">
                        Email: <br/><input type="email" name="email" placeholder="Email"/>
                    </div>
                    <div class="form_input">
                        Password: <br/><input type="password" name="password" placeholder="Password"/>
                    </div>
                    <div class="form_input">
                        Confirm Password: <br/><input type="password" name="conpassword" placeholder="Confirm Password"/>
                    </div>
                    <input type="submit" name="submit" value="REGISTER">
                </fieldset>
            </form>
        </div>
    </body>
</html>

<?php mysqli_close($connection); ?>