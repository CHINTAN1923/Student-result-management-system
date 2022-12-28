<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php");
    }
    else{

$stid=intval($_GET['stid']);

if(isset($_POST['submit']))
{
$studentname=$_POST['fullname'];
$prn=$_POST['prn']; 
$studentemail=$_POST['emailid']; 
$gender=$_POST['gender'];
$dob=$_POST['dob']; 
$deptid=$_POST['deptid'];  
$status=$_POST['status'];
$sql="update tblstudents set StudentName=:studentname,PRN=:prn,StudentEmail=:studentemail,Gender=:gender,DOB=:dob,Status=:status where StudentId=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':prn',$prn,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();

$msg="Student info updated successfully";
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Edit Student < </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>

.errorWrap {
padding: 10px;
margin: 0 0 20px 0;
background: #fff;
border-left: 4px solid #dd3d36;
-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
padding: 10px;
margin: 0 0 20px 0;
background: #fff;
border-left: 4px solid #5cb85c;
-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.btn{  
border-radius: 4px;
height: 44px;
font-size: 13px;
font-weight: 600;
text-transform: uppercase;
-webkit-transition : all 200ms linear;
transition: all 200ms linear;
padding: 0 30px;
letter-spacing: 1px;
display: -webkit-inline-flex;
display: -ms-inline-flexbox;
display: inline-flex;
-webkit-align-items: center;
-moz-align-items: center;
-ms-align-items: center;
align-items: center;
-webkit-justify-content: center;
-moz-justify-content: center;
-ms-justify-content: center;
justify-content: center;
-ms-flex-pack: center;
text-align: center;
border: none;
background-color: #ffeba7;
color: #102770;
box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);
}
.btn:active,
.btn:focus{  
background-color: #102770;
color: #ffeba7;
box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}
.btn:hover{  
background-color: #102770;
color: #ffeba7;
box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}
.form-control {
padding: 13px 20px;
padding-left: 55px;
height: 48px;
width: 100%;
font-weight: 500;
border-radius: 4px;
font-size: 14px;
line-height: 22px;
letter-spacing: 0.5px;
outline: none;
color: #c4c3ca;
background-color: #1f2029;
border: none;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}
.form-control:focus,
.form-control:active {
border: none;
outline: none;
box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}
.form-group input:-ms-input-placeholder  {
color: #c4c3ca;
opacity: 0.7;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
.form-group input::-moz-placeholder  {
color: #c4c3ca;
opacity: 0.7;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
.form-group input:-moz-placeholder  {
color: #c4c3ca;
opacity: 0.7;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
.form-group input::-webkit-input-placeholder  {
color: #c4c3ca;
opacity: 0.7;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
.form-group input:focus:-ms-input-placeholder  {
opacity: 0;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
.form-group input:focus::-moz-placeholder  {
opacity: 0;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
.form-group input:focus:-moz-placeholder  {
opacity: 0;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
.form-group input:focus::-webkit-input-placeholder  {
opacity: 0;
-webkit-transition: all 200ms linear;
transition: all 200ms linear;
}
</style>       
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('include/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('include/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page" style="background-color: #1f2029">

                     <div class="container-fluid">
                            <div class="row page-title-div" style="background-color: #1f2029">
                                <div class="col-md-6">
                                    <h2 class="title" style="color: #c3c4ca">Update Student Info </h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div" style="background-color: #1f2029">
                                <div class="col-md-6">
                                    <ul class="breadcrumb" style="color: #c3c4ca">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Students</li>   
                                        <li class="active">Update Student</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel" style="background-image: url(images/geometry.png)">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form class="form-horizontal" method="post">
<?php 

$sql = "SELECT tblstudents.StudentName,tblstudents.PRN,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblstudents.StudentEmail,tblstudents.Gender,tblstudents.DOB,tbldepartments.DeptName from tblstudents join tbldepartments on tbldepartments.id=tblstudents.DeptId where tblstudents.StudentId=:stid";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo htmlentities($result->StudentName)?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">PRN</label>
<div class="col-sm-10">
<input type="text" name="prn" class="form-control" id="prn" value="<?php echo htmlentities($result->PRN)?>"  required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email id</label>
<div class="col-sm-10">
<input type="email" name="emailid" class="form-control" id="email" value="<?php echo htmlentities($result->StudentEmail)?>" required="required" autocomplete="off">
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<?php  $gndr=$result->Gender;
if($gndr=="Male")
{
?>
<input type="radio" name="gender" value="Male" required="required" checked>Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
<?php }?>
<?php  
if($gndr=="Female")
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required" checked>Female <input type="radio" name="gender" value="Other" required="required">Other
<?php }?>
<?php  
if($gndr=="Other")
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required" checked>Other
<?php }?>


</div>
</div>



                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label" >Department</label>
                                                        <div class="col-sm-10">
<input type="text" name="classname" class="form-control" id="classname" style="color:black" value="<?php echo htmlentities($result->DeptName)?>" readonly>
                                                        </div>
                                                    </div>
<div class="form-group">
                                                        <label for="date" class="col-sm-2 control-label">DOB</label>
                                                        <div class="col-sm-10">
                <input type="date"  name="dob" class="form-control" value="<?php echo htmlentities($result->DOB)?>" id="date">
                                                        </div>
                                                    </div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Reg Date: </label>
<div class="col-sm-10">
<?php echo htmlentities($result->RegDate)?>
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Status</label>
<div class="col-sm-10">
<?php  $stats=$result->Status;
if($stats=="1")
{
?>
<input type="radio" name="status" value="1" required="required" checked>Active <input type="radio" name="status" value="0" required="required">Block 
<?php }?>
<?php  
if($stats=="0")
{
?>
<input type="radio" name="status" value="1" required="required" >Active <input type="radio" name="status" value="0" required="required" checked>Block 
<?php }?>



</div>
</div>

<?php }} ?>                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn mt-4">Update</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
