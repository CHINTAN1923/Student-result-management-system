<style>
.element:hover {
    color: #ffeba7;
    box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
    background-color: #102770;
}
.left-sidebar.small-nav .has-children {
  position: relative;
}

.left-sidebar.small-nav .has-children:hover .child-nav {
  display: block !important;
}

.left-sidebar.small-nav .has-children:hover .child-nav a {
  padding-left: 20px;
}

.left-sidebar.small-nav .has-children:hover .child-nav span {
  display: inline-block;
}
.left-sidebar .side-nav .has-children.open {
  background: rgba(0, 0, 0, 0.15);
}

.left-sidebar .side-nav .has-children.open .arrow {
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
  padding-top: 15px;
}
</style>

<div class="left-sidebar box-shadow " style="background: #FFEBA7">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="admin" class="img-circle profile-img">
                                <h6 class="title">Admin</h6>
                                <small class="info">Head of department</small>
                            </div>
                            
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav" style="color: #102770">
                                    <li class="nav-header">
                                        <span class="">UNIVERSITY ADMIN</span>
                                    </li>
                                    <li class="element">
                                        <a  href="dashboard.php" ><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                    </li>
<!-- 
                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li> -->
                                    <li class="has-children" >
                                        <a class="element" href="#"><i class="fa fa-bank"></i> <span >College Departments</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li class="element"><a href="create-dept.php"><i class="fa fa-user-plus"></i> <span>Create Department</span></a></li>
                                            <li class="element"><a href="manage-dept.php"><i class="fa fa fa-server"></i> <span>Manage Departments</span></a></li>
                                           
                                        </ul>
                                    </li>
  <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li class="element"><a href="create-subject.php"><i class="fa fa-user-plus"></i> <span>Create Subject</span></a></li>
                                            <li class="element"><a href="manage-subjects.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                                           <li class="element"><a href="add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add Subject Combination </span></a></li>
                                           <li class="element"><a href="manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Subject Combination </span></a></li>
                                        </ul>
                                    </li>
   <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li class="element"><a  href="add-students.php"><i class="fa fa-user-plus"></i> <span>Add Students</span></a></li>
                                            <li class="element"><a  href="manage-students.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>
                                        
                                           
                                        </ul>
                                    </li>
<li class="has-children">
                                        <a  href="#"><i class="fa fa-info-circle"></i> <span>Result</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li class="element"><a  href="add-result.php"><i class="fa fa-user-plus"></i> <span>Add Result</span></a></li>
                                            <li class="element"><a  href="manage-results.php"><i class="fa fa fa-server"></i> <span>Manage Result</span></a></li>
                                           
                                        </ul>
                                        <!-- <li><a href="change-password.php"><i class="fa fa fa-server"></i> <span> Admin Change Password</span></a></li> -->
                                           
                                    </li>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
                    <script src="js/main.js"></script>
        <script src="js/main.min.js"></script>                    