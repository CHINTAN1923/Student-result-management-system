<?php
session_start();
error_reporting(0);
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Result Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script>
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    filename: 'Result.pdf',
                    image: {
                        type: 'png',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 1
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }
    </script>

</head>

<body>
    <div class="main-wrapper">
        <div class="content-wrapper">
            <div class="content-container">


                <!-- /.left-sidebar -->

                <div class="main-page">


                    <section class="section">
                        <div class="container-fluid">

                            <div class="row">



                                <div class="col-md-8 col-md-offset-2" id="invoice">
                                    <div class="container-fluid">

                                        <div class="row page-title-div">
                                            <div style = "display : flex ; flex-direction : row ; justify-content :center ">
                                                <img src="images/unilogo.jpg" alt=""
                                                    style="height : 150px">
                                            </div>

                                            <div class="col-md-12">
                                                <h2 class="title" align="center">The  University Of
                                                    Baroda</h2>
                                            </div>
                                            <div class="col-md-12">
                                                <h4 class="title" align="center">Faculty Of Engineering
                                                </h4>
                                            </div>

                                        </div>
                                        <!-- /.row -->

                                        <!-- /.row -->
                                    </div>
                                    <!-- /.container-fluid -->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <?php

$prn=$_POST['prn'];
$dept=$_POST['dept'];
$_SESSION['prn']=$prn;
$_SESSION['dept']=$dept;
$qery = "SELECT   tblstudents.StudentName,tblstudents.PRN,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tbldepartments.DeptName from tblstudents join tbldepartments on tbldepartments.id=tblstudents.DeptId where tblstudents.PRN=:prn and tblstudents.DeptId=:dept ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':prn',$prn,PDO::PARAM_STR);
$stmt->bindParam(':dept',$dept,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
                                                <p><b>Student Name :</b> <?php echo htmlentities($row->StudentName);?>
                                                </p>
                                                <p><b>Student PRN :</b> <?php echo htmlentities($row->PRN);?>
                                                <p><b>Student Department:</b> <?php echo htmlentities($row->DeptName);?>
                                                    <?php 
}?>
                                            </div>
                                            <div class="panel-body p-20">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>
                                                            <th>Marks</th>
                                                        </tr>
                                                    </thead>




                                                    <tbody>
                                                        <?php                                              
// Code for result

 $query ="select t.StudentName,t.PRN,t.DeptId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.PRN,sts.DeptId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.PRN=:prn and t.DeptId=:dept)";
$query= $dbh -> prepare($query);
$query->bindParam(':prn',$prn,PDO::PARAM_STR);
$query->bindParam(':dept',$dept,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 

foreach($results as $result){

    ?>

                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                            <td><?php echo htmlentities($result->SubjectName);?></td>
                                                            <td><?php echo htmlentities($totalmarks=$result->marks);?>
                                                            </td>
                                                        </tr>
                                                        <?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
                                                        <tr>
                                                            <th scope="row" colspan="2">Total Marks</th>
                                                            <td><b><?php echo htmlentities($totlcount); ?></b> out of
                                                                <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="2">Percentage</th>
                                                            <td><b><?php echo  htmlentities($totlcount*(100)/$outof); ?>
                                                                    %</b></td>
                                                        </tr>
                                                        <!-- <tr>
                                                <th scope="row" colspan="2">Download Result</th>           
                                                            <td><b><a href="download-result.php">Download </a> </b></td>
                                                             </tr> -->


                                                        <?php } else { ?>
                                                        <div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Your Result is not declared yet</strong> !
                                                            <?php }
?>
                                                        </div>
                                                        <?php 
 } else
 {?>

                                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                                            <strong>Invalid PRN!</strong>
                                                            <?php
echo htmlentities("Please Enter Valid PRN");
 }
?>
                                                        </div>



                                                    </tbody>
                                                </table>



                                            </div>

                                        </div>
                                        <!-- /.panel -->

                                    </div>
                                    <!-- /.col-md-6 -->



                                </div>
                                <!-- /.row -->
                                <div class="col-md-10 text-right mb-3">


                                    <button class="btn btn-primary" id="download">Download Result</button>

                                </div>
                            </div>
                            <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

                </div>
                <!-- /.main-page -->


            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
    $(function($) {

    });
    </script>

    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

</body>

</html>