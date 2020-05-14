<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Contactless Prescriptions</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
					<img src="assets/img/logo.png" width="p35" height="35" alt=""> <span>mimosa care</span>
				</a>
			</div>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span> <?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item "  href="reset-password.php">Password Reset</a>
						<a class="dropdown-item " href="logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="https://www.nishanchettri.com">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item "  href="reset-password.php">Password Reset</a>
						<a class="dropdown-item " href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h3 class="page-title" align="center"style="margin-left: -250px;margin-bottom: 50px;"> <b>UPLOAD TEST REPORTS</b></h3>
                    </div>
                </div>
                <div class="row"style="margin-left: -250px;">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="testreportemail.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">

                                        <label>Patient ID<span class="text-danger">*</span> </label>
                                        <input class="form-control" type="text" name="pid" required>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">

                                        <label>Patient Email<span class="text-danger">*</span> </label>
                                        <input class="form-control" type="text" name="email" required>
                                    </div>
                                 </div>

                                <div class="col-sm-6">
                                    <div class="form-group">

                                        <label>Testing In-charge<span class="text-danger">*</span> </label>
                                        <input class="form-control" type="text" name="testername" required>
                                    </div>
                                 </div>
                                 <div class="col-sm-12">
                                     <div class="form-group">

                                       <label>Title<span class="text-danger">*</span> </label>
                                       <input class="form-control" type="text" name="title" required>
                                     </div>
                                  </div>

                                 <div class="col-sm-12">
                                   <div class="form-group">
                                     <div class="profile-upload">
                                       <div class="upload-img">
                                         <img alt="" src="assets/img/report.png">
                                       </div>
                                       <div class="upload-input">
                                             <input class="form-control" type="File" name="file">

                                       </div>
                                     </div>
                                   </div>
                               </div>
                               <div class="m-t-20 text-center" style="padding-left: 350px;">
                                   <input class="btn btn-primary submit-btn"  type="submit" name="submit">
                               </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
