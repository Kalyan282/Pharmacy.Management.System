<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="login1.css">
<head>
<div class="header">
  <h1>All in One Pharmacy</h1>
 <p style="margin-top:-20px;line-height:1;font-size:30px;">Pharmacy Management System</p>
</div>
<title>
All in One Pharmacy 
</title>
</head>

<body>

	<br><br><br><br>
	<div class="container">
		<form method="post" action="" onsubmit="return validateForm()">
			<div id="div_login">
				<h1>Admin Login</h1>
				<center>
				<div>
					<input type="text" class="textbox" id="uname" name="uname" placeholder="Username" />
					<span id="uname_error" style="color:red;"></span>
				</div>
				<div>
					<input type="password" class="textbox" id="pwd" name="pwd" placeholder="Password"/>
					<span id="pwd_error" style="color:red;"></span>
				</div>
				<div>
				
				<input type="submit" value="Submit" name="submit" id="submit" />
				<button type="button" onclick="redirectToPharmacistLogin()">Click here for Pharmacist Login</button>
				
	<?php
				
		include "config.php";

		if(isset($_POST['submit'])){

				$uname = mysqli_real_escape_string($conn,$_POST['uname']);
				$password = mysqli_real_escape_string($conn,$_POST['pwd']);

			if ($uname != "" && $password != ""){
		
					$sql="SELECT * FROM admin WHERE a_username='$uname' AND a_password='$password'";
					$result = $conn->query($sql);
					$row = $result->fetch_row();
					if(!$row) {
						echo "<p style='color:red;'>Invalid username or password!</p>";
					}
					else {
						session_start();
						$_SESSION['user']=$uname;
						header('location:adminmainpage.php');
					}
				}
			}
	?>
			
				</div>
				</center>
			</div>
		</form>
	</div>

	<div class=footer>
	<br>
	 
	<br><br>
	</div>
	
	<script>
		function validateForm() {
			var uname = document.getElementById("uname").value;
			var pwd = document.getElementById("pwd").value;
			var isValid = true;
			
			document.getElementById("uname_error").textContent = "";
			document.getElementById("pwd_error").textContent = "";

			if (uname == "") {
				document.getElementById("uname_error").textContent = "Username must be filled out";
				isValid = false;
			}
			if (pwd == "") {
				document.getElementById("pwd_error").textContent = "Password must be filled out";
				isValid = false;
			}
			return isValid;
		}

		function redirectToPharmacistLogin() {
			window.location.href = "mainpage1.php";
		}
	</script>
	
</body>

</html>
