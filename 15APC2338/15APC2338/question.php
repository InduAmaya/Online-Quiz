<?php
	require_once('connection.php');
	session_start();
	if (!isset($_SESSION['username'])) {
		header('Location:login.php');
	}
	
?>
<html>
    <head>
        <title>Quiz</title>
		
		<style type="text/css">
			body{
				background-color: #003333;
			}
			
			.toparea{
				margin: 5%;
			}
			
			.qarea{
				background-color: #ebe9e8;
				margin: 5%;
			}
			
			h3{
				margin-left: 20px;
			}
			
			input[type=submit]{
				margin: 20px;
			}
			
			input[type=radio]{
				margin-bottom: 15px;
				margin-left: 60px;
			}
			
			
		</style>
		
    </head>
	
    <body>
		
        <div class="toparea">
            <span style="color: white; font-size: 30px;">
				Welcome <?php echo $_SESSION['username']; ?>...
			</span>
			<form method="POST" action="logout.php">
				<input type="submit" name="logout" value="Logout" style="float:right ">
			</form>
			<h4 style="color: white;">Answer all questions</h4>
		</div>
		<div class="qarea">
                <form action="answer.php" method = "POST" >
                    <?php
					$_SESSION['aID'] = array();
                    $chosing = "Select * from question order by rand() limit 5";
                    $count = 1;
                    $_SESSION['answer'] = array();
                    $_SESSION['question'] = array();
                    $result = mysqli_query($connection, $chosing);
						
						 while ($rows = mysqli_fetch_array($result)) {
                        array_push($_SESSION['answer'], $rows['ansID']);
                        array_push($_SESSION['question'], $rows['question']);
                        ?>
                        <hr/>
                        <h3><?php echo  $count . ". " . $rows['question']; ?></h3><br/>

                        <?php
                        $chosing2 = "Select * from answer WHERE ansID='{$rows['qID']}' order by rand()";
                        $result2 = mysqli_query($connection, $chosing2);
						
                        $count++;
                        while ($rows = mysqli_fetch_array($result2)) {
                            ?>
                            <div class = "answr">
							<input type="radio" name="quizcheck[<?php echo $rows['ansID'];?>]" value="<?php $rows['aID']; ?>"> <?php echo $rows['answer']; ?>
                            <br>

                            </div>



                            <?php
                        }
                    }
                    ?>
                    <div>
                        <input type="submit" name="submit" value="Check Answers">
                    </div>


                </form>
            </div>
		
    </body>
</html>

<?php mysqli_close($connection); ?>