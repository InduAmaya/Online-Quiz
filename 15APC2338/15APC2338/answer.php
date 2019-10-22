<?php
$conn_error="could not connect";
	$host='localhost';
	$user='root';
	$pass='';
	$db='mydb';
	
	$conn=mysqli_connect($host,$user,$pass) or die($conn_error);
	//echo "connected";
	mysqli_select_db($conn,$db) or die ($conn_error);
	//echo "connected";
	
?>


<html>
    <head>
        <title>Quiz</title>
		<style type="text/css">
			body{
				background-color: #003333;
			}
			
			.area{
				background-color: #ebe9e8;
				width: 80%;
				height: 80%;
				margin: 5%;
			}
			
			.thank{
				font-size: 60px;
				padding: 10%;
				text-align: center;
			}
			
			.logout{
				padding: 20px;
			}
			
			.result{
				text-align: center;
				font-size: 30px;
			}
		</style>

    </head>
    <body>
        <div class="area">
            <div class="logout">
                <form method="POST" action="logout.php">
                    <input type="submit" name="logout" value="Logout" style="float:right ">
                </form>
            </div>
             
                <?php
				
				$result=0;
				if(isset($_POST['submit'])){
					
				if(!empty($_POST['quizcheck'])){
						$count=count($_POST['quizcheck']);
						if($count==5){
						?>
						<div class="thank">
							<?php
								echo"Thank you...";
								echo"<br>";
							?>
						</div>
						
						<?php
							$i=1;
							$selected=$_POST['quizcheck'];
							$q="select * FROM question";
							$query=mysqli_query($conn,$q);
							
							
							while($rows=mysqli_fetch_array($query)){
								 
								if($rows['ansID'] == $selected[$i]){
									$result++;
								}
								$i++;
							}
						?>
						<div class="result">
						<?php
						
							echo "Your score is ".$result;
					
						} else{
							if (isset($_POST['submit'])) {
								header('Location:question.php');
							}
						}
						
				}
				}
				?>
				</div>
            </div>



    </body>
</html>


