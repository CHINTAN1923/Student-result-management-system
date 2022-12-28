<?php
session_start();
error_reporting(0);
include('include/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
    <link rel="stylesheet" href="css/prism/prism.css" media="screen" > 
    <link rel="stylesheet" href="CSS/login.css">
	<script src="js/modernizr/modernizr.min.js"></script>
</head>

  <body>
  <form action="result.php" method = "post">
    <div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Student</span><span>Admin</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">MSU Results</h4>
											<div class="form-group">
												<input type="text" name = "prn" name="logemail" class="form-style" placeholder="Enter Your PRN" id="logemail" autocomplete="off">
												<iconify-icon inline icon="uil:at" class="input-icon mt-2 pt-1"></iconify-icon>
											</div>
											<div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label"></label>
														<iconify-icon inline icon="uil:at" class="input-icon mt-3 pt-4"></iconify-icon>			
 <select name="dept" class="form-style" id="default"  required="required">

<option value="" >Select Department</option>

<?php $sql = "SELECT * from tbldepartments";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->DeptName); ?></option>
<?php }} ?>
 </select>
</div>
											<!-- <div class="form-group">
												<input type="text" name="department" class="form-style" placeholder="Enter Your PRN" id="logemail" autocomplete="off">
												<iconify-icon inline icon="uil:at" class="input-icon mt-2 pt-1"></iconify-icon>
											</div>	 -->
											<!-- <a  class="btn mt-4">View Results</a> -->
											<button type="submit" name="checkresult" class="btn mt-4">view result</button>
											<div class="form-control"style="background:none ; border:none ">
											<span style="color : #c3c4ca">Not a Student?</span>
                                            </div>
											<div class="form-control" style="background:none ; border:none ">
											<a href="parent-login.php" class="btn">parents login<iconify-icon icon="material-symbols:arrow-outward-rounded"></iconify-icon></a>
											</div>
	
											
										
                                    
				      					</div>
			      					</div>
			      				</div>
								  </form>
							
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Admin Login</h4>
											<form method="post">
											<div class="form-group mt-2">
												<input type="text" name="username" class="form-style" placeholder="Your Username" id="logemail" autocomplete="off">
												<iconify-icon inline icon="uil:at" class="input-icon mt-2 pt-1"></iconify-icon>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
												<iconify-icon inline icon="uil:lock-alt" class="input-icon mt-2 pt-1"></iconify-icon>
											</div>
											<button type="submit" name="login" class="btn mt-4">Sign in</button>
											</form>
				      					</div>
			      					</div>
			      				</div>
							
							</div>
						</div>
						
						
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

	<script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>
  
  </body>
</html>