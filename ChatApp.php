<?php
	session_start();
	$url=$_SERVER['REQUEST_URI'];
    header("Refresh: 10; URL=$url");
	include("headerwithlogin.php");
?>



<html>
    <head>
        <title>
		    <meta http-equiv="refresh" content="10"/>
            Home
        </title>
        <link rel="stylesheet" type="text/css" href="ChatAppGUI.css">
    </head>
    <body onload=”javascript:setTimeout(“location.reload(true);”,10000);”>
        <div id="main">
            <h1 style="background-color: #6495ed; color: white;">
			<?php 
			
			        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
				    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$rec = $_SESSION['pname']; 
					$sql = "SELECT * FROM online_users where on_user = '$rec' ";
					$result = $dbhandler->query($sql);
				
					if($result->rowCount() > 0)
					{
		                 echo $rec . " - " . "online";
					}
					else
					{
						 echo $rec . " - " . "offline";
					}					
					
			?></h1>
            <div class="output">
			
			<?php
			    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb','root','');
					//echo "Connection is established...<br/>";
		        $sen = $_SESSION['name'];
				$rec = $_SESSION['pname'];
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
				$sql = "SELECT * FROM posts where (sender = '$sen' and receiver = '$rec' ) or ( receiver = '$sen' and sender = '$rec') ";
				$result = $dbhandler->query($sql);
				
				if($result->rowCount() > 0)
				{
					while($row = $result->fetch())
					{
						echo "".$row['sender']." "." :: ".$row['msg']." -- ".$row['date'];
						echo "<br>";
					}
				}
				else
			    {
					echo "0 results";
				}
			
			    
			?>
               
                
            </div>
            <form method="post" action="send.php">
                <textarea name="msg" placeholder="Type to send message..." class="form-control"></textarea><br><br>
                <input type="submit" value="Send">
            </form>
            <br>
            
        </div>
    </body>
</html>
<?php
	include("footer.php");
?>

