<?php 
session_start(); 
if($_SESSION['name']==null)
{
?>

<html>

    <head>
        <title>Vatchit</title>
        <link rel="stylesheet" href="headerGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>


        
        <div class="companybar">
            <div class="logo">
                <h1>&nbsp;&nbsp;&nbsp;<i class="fa fa-comments-o"></i>&nbsp;my<span>CHAT</span></h1>
            </div>
            <div class="tagline">
                <h1><pre>T A L K   W H I L E   Y O U   W A L K !!</pre></h1>
            </div>
        </div>
        <div class="navbar">
            
                <a href="home.php"><i class="fa fa-fw fa-home"></i> Home &nbsp;&nbsp;</a> 
                <a href="contactus.php"><i class="fa fa-address-book-o"></i> Contact Us &nbsp;&nbsp;</a> 
                <a href="aboutus.php"><i class="fa fa-fw fa-envelope"></i> About Us </a> 
                
                <button class="button" name="signup" onclick="mySignup()"><i class="fa fa-sign-in"></i>&nbsp;Sign up </button>
                <button class="button" name="login" onclick="myLogin()"><i class = "fa fa-user"></i>&nbsp;Login </button>
				<button class="button" name="su_login" onclick="mySu_Login()"><i class = "fa fa-user"></i>&nbsp;Developer Login</button>
        </div>
        <script>
            function myLogin() {
                location.replace("login.php");
            }
            function mySignup() {
                location.replace("signup1.php");
            }
			function mySu_Login() {
                location.replace("su_login.php");
            }
        </script>
    </body>
    
</html>
<?php 
}
else
{
	?>
	<html>

    <head>
        <title>Vatchit</title>
        <link rel="stylesheet" href="headerGUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>


        
        <div class="companybar">
            <div class="logo">
                <h1>&nbsp;&nbsp;&nbsp;<i class="fa fa-comments-o"></i>&nbsp;my<span>CHAT</span></h1>
            </div>
            <div class="tagline">
                <h1><pre>T A L K   W H I L E   Y O U   W A L K !!</pre></h1>
            </div>
        </div>
        <div class="navbar">
            
                <a href="home.php"><i class="fa fa-fw fa-home"></i> Home &nbsp;&nbsp;</a> 
                <a href="contactus.php"><i class="fa fa-address-book-o"></i> Contact Us &nbsp;&nbsp;</a> 
                <a href="aboutus.php"><i class="fa fa-fw fa-envelope"></i> About Us </a> 
                
                <p>WELCOME <?php echo $_SESSION['name']; ?></p>
        </div>
        <script>
            function myLogin() {
                location.replace("login.php");
            }
            function mySignup() {
                location.replace("signup1.php");
            }
			function mySu_Login() {
                location.replace("su_login.php");
            }
        </script>
    </body>
    
</html>

<?php
}
?>

