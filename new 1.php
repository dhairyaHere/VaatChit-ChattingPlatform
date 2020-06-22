<?php
  session_start();
  try {
      
      
      $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=vaatchitdb', 'root', '');
      $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $_SESSION['pname'] = $_POST['pname'];
      if(isset($_POST['pname']) || isset($_SESSION['pname']))
      {
          $personname = ;
          if(!empty($_POST['pname']))
          {
              $query = $dbhandler->prepare("select * from userdetails where full_name = ?");
              $query->execute(array($personname));
              //$r = $query->fetchAll(PDO::FETCH_ASSOC);
			  
              $count = $query->rowCount();
			 if($count > 0)
			 {				 
              while($r = $query->fetch())
			  {
				  $date = $r['birth_date'];
			      $email = $r['email'];
                  $mobno = $r['mob_no'];
                  $gender = $r['gender'];
			   
			      $msg = "";
				  $_SESSION['msg'] = $msg;
			   
			   }
			  
			 }else
			 {
				
				 $msg = "No Match Found! Try again";
				 $_SESSION['msg'] = $msg;
				 header("location:search.php");
			 }
			 
            
          }
         
      }
	  if(isset($_POST['request']))
	  {
		  $reqsender = $_SESSION['name'];
		  $reqreceiver = $_SESSION['pname'];
		  $sql2 = "insert into request_handler(request_sender,request_receiver,mod_bit) values('$reqsender','$reqreceiver',0)";
		  $dbhandler->query($sql2);
		  
	  }
       
  } catch (Exception $ex) {
      
}

	    include("headerwithlogin.php");

?>
<html>
    <head>
        <link rel="stylesheet" href="searchGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body>
        <div class = "header">
            <form class = "" action="Requestsent.php" method="post">
					<h1><?php echo $personname; ?></h1>
     
					<table border = "2">
						<tr>
							<td><b>E-mail:</b></td>
							<td class = "title"><?php echo $email; ?></td>
						</tr>
						<tr>
							<td><b>Date Of Birth:</b></td>
							<td class = "title"><?php echo $date; ?></td>
						</tr>
						<tr>
							<td><b>Gender:</b></td>
							<td class = "title"><?php echo $gender; ?></td>
						</tr>
						<tr>
							<td><b>Contact No.:</b></td>
							<td class = "title"><?php echo $mobno; ?></td>
						</tr>
        
        
					</table>
					<div style="margin: 24px 0;">
						<a href="#"><i class="fa fa-dribbble"></i></a> 
						<a href="#"><i class="fa fa-twitter"></i></a>  
						<a href="#"><i class="fa fa-linkedin"></i></a>  
						<a href="#"><i class="fa fa-facebook"></i></a> 
					</div>
					<div class="form-box">
						<input class = "search_btn" type="submit" value = "Send Request" name = "request">
					</div>
			 
			</form>
        </div>
    </body>
</html>
<?php
	include("footer.php");
?>