<?php
session_start();

require_once('include/configpdo.php');


require"dompdf/autoload.inc.php";

use Dompdf\Dompdf; 

ob_start();
//error_reporting(0);
?>

<html>
<style>
body {
  padding: 4px;
  text-align: center;
}

table {
  width: 100%;
  margin: 10px auto;
  table-layout: auto;
}

.fixed {
  table-layout: fixed;
}

table,
td,
th {
  border-collapse: collapse;
}

th,
td {
  padding: 1px;
  border: solid 1px;
  text-align: center;
}


</style>


<?php 
$totlcount=0;
$prn=$_SESSION['prn'];
$dept=$_SESSION['dept'];
$qery = "SELECT   tblstudents.StudentName,tblstudents.PRN,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tbldepartments.DeptName from tblstudents join tbldepartments on tbldepartments.id=tblstudents.DeptId where tblstudents.PRN=? and tblstudents.DeptId=?";
$stmt21 = $mysqli->prepare($qery);
$stmt21->bind_param("ss",$prn,$dept);
$stmt21->execute();
                 $res1=$stmt21->get_result();
                 $cnt=1;
                   while($result=$res1->fetch_object())
                  {  ?>
<p><b>Student Name :</b> <?php echo htmlentities($result->StudentName);?></p>
<p><b>Student PRN :</b> <?php echo htmlentities($result->PRN);?></p>
<p><b>Student Department:</b> <?php echo htmlentities($result->DeptName);?></p>
<?php }

    ?>
 <table class="table table-inverse" border="1">
                      
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
 $query ="select t.StudentName,t.PRN,t.DeptId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.PRN,sts.DeptId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.PRN=? and t.DeptId=?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss",$prn,$dept);
$stmt->execute();
                 $res=$stmt->get_result();
                 $cnt=1;
                   while($row=$res->fetch_object())
                  {

    ?>

                                                    <tr>
                                                <td ><?php echo htmlentities($cnt);?></td>
                                                      <td><?php echo htmlentities($row->SubjectName);?></td>
                                                      <td><?php echo htmlentities($totalmarks=$row->marks);?></td>
                                                    </tr>
<?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
<tr>
                                                <th scope="row" colspan="2">Total Marks</th>
<td><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
                                                <th scope="row" colspan="2">Percntage</th>           
                                                            <td><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
                                                             </tr>

                            </tbody>
                        </table>
                    </div>
</html>






<?php
$html = ob_get_clean();


$dompdf = new dompdf();

$dompdf->set_option('enable_html5_parser', TRUE);

$dompdf->loadHtml($html); 
 

$dompdf->setPaper('A4', 'landscape'); 
 

$dompdf->render(); 
 

$dompdf->stream("result");
?>