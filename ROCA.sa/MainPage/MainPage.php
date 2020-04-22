<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
		<title>ROCA.sa Job Search</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			body{
	  width: 100%;
	  height: auto;
	  background: -webkit-linear-gradient(0deg, #3931af 0%, #2dfbff 100%);
	  font-family: "Robato",sans-serif;
	  font-size: 17px;
	  text-align: center;
	}
	
	#logreg-forms{
		width:700px;
		margin:10vh auto;
		background-color:#0f0d0d4d;
		box-shadow: 0 7px 7px rgba(0, 0, 0, 0.12), 0 12px 60px rgba(0,0,0,0.24);
	  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
	}
	
	#logreg-forms form {
		width: 100%;
		max-width: 700px;
		padding: 30px;
		margin: auto;
	}
	#logreg-forms .form-control {
		position: relative;
		box-sizing: border-box;
		height: auto;
		padding: 10px;
		font-size: 16px;
	}
	#logreg-forms .form-control:focus { z-index: 2; }
	#logreg-forms .form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}
	#logreg-forms .form-signin input[type="password"] {
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
	
	#logreg-forms .social-login{
		width:390px;
		margin:0 auto;
		margin-bottom: 14px;
	}
	#logreg-forms .social-btn{
		font-weight: 100;
		color:white;
		width:190px;
		font-size: 0.9rem;
	}
	
	#logreg-forms a{
		display: block;
		padding-top:10px;
		color:#fff;
	}
	
	#logreg-form .lines{
		width:200px;
		border:1px solid red;
	}
	
	
	#logreg-forms button[type="submit"]{ margin-top:10px; }
	
	#logreg-forms .facebook-btn{  background-color:#3C589C; }
	
	#logreg-forms .google-btn{ background-color: #DF4B3B; }
	
	#logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }
	
	#logreg-forms .form-signup .social-btn{ width:210px; }
	
	#logreg-forms .form-signup input { margin-bottom: 2px;}
	
	.form-signup .social-login{
		width:210px !important;
		margin: 0 auto;
	}
	
	.submit{
	  background: -webkit-linear-gradient(0deg,  #2dfbff 0%, #3c96ff 100%);
	  border-radius: 25px;
	  color: #fff;
	}
	
	/* Mobile */
	
	@media screen and (max-width:500px){
		#logreg-forms{
			width:300px;
		}
	
		#logreg-forms  .social-login{
			width:200px;
			margin:0 auto;
			margin-bottom: 10px;
		}
		#logreg-forms  .social-btn{
			font-size: 1.3rem;
			font-weight: 100;
			color:white;
			width:200px;
			height: 56px;
	
		}
		#logreg-forms .social-btn:nth-child(1){
			margin-bottom: 5px;
		}
		#logreg-forms .social-btn span{
			display: none;
		}
		#logreg-forms  .facebook-btn:after{
			content:'Facebook';
		}
	
		#logreg-forms  .google-btn:after{
			content:'Google+';
		}
	
	}
	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background-color: #333;
	}
	
	li {
	  float: left;
	}
	
	li a {
	  display: block;
	  color: white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}

	.button {
  background-color: rgb(82, 166, 187); /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  
}
.button:hover {background-color: black}
		</style>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<ul>
			<li><a href="../MainPage/MainPage.php">Job Search</a></li>
			<li><a href="../Employee/EmpProfilePage.php">Profile Page</a></li>
			<li><a href="../Applicant/ResumeUpload.php">Update/Submit Resume</a></li>
			<?php
				if ($_SESSION['role'] == "emp")
				{
					echo "<li><a href='../Employee/MessagePage.php'>Manage Messages/Recommendations</a></li>";
				}
				else if ($_SESSION['role'] == "rec")
				{
					echo "<li><a href='../Employee/MessagePage.php'>Manage Messages/Recommendations</a></li>";
					echo "<li><a href='../Recruiter/RecruiterPage.php'>Recruiter Tools Page</a></li>";
				}
			?>
			<li style="float:right"><a class="active" href="../logout.php">Logout</a></li>
		  </ul>
		<div id="logreg-forms">
		<div class = "title">
			<h1 style="color:white"> ROCA.sa Job Search Platform</h1>
		</div>
		
		<div class = "form">
			<form action = "search.php" method = "post">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Keyword" name="keyword" required="">
				  </div>
				<br>
				<br>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="location" name="location" required="">
				  </div>
				<br>
				<br>
				<label style="color:white" for = "degree">Level of Education: </label>
				<select name = "degree">
					<option value = "">No filter</option>
					<option value = "High School">High School</option>
					<option value = "GED">GED</option>
					<option value = "Associate">Associate</option>
					<option value = "Bachelor">Bachelor's</option>
					<option value = "Master">Master's</option>
					<option value = "Ph.D">Ph.D</option>
				</select>
				<br>
				<br>
				<button class="btn btn-primary btn-block" type="submit" id="btn-signup"><i class="fas fa-user-plus"></i> Search</button>
			</form>
		</div>
		</div>
		<br>
	</body>
</html>