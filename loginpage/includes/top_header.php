<!-- http://localhost/jbp/loginpage/index.php?msg=sorry -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1>
			<a href="home.php">
			<h1><strong>Job Poartal</strong></h1></a>
			</h1>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->

<div class="navbar navbar-default" role="navigation">
<div class="container">
<div class="navbar-collapse2">
    <?php
    if(isset($_SESSION['_SESS_USERID'])){
        echo $_SESSION['_SESS_USERID'];
    }
    $sql ="select filepath
    from user_info
     where user_id = '".$_SESSION['_SESS_USERID']."'";
    $homepgqry 	   = mysqli_query($con,$sql);
    if (!$homepgqry ) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    while($r = $homepgfetch  = mysqli_fetch_array($homepgqry)){
	if(!empty($homepgfetch['filepath'])){
		$imagepath = $homepgfetch['filepath'];
	}else {
		$imagepath = "images/users/default-user.png";
    }
    }
?>            
<ul class="nav navbar-nav navbar-right top-navbar">                    
	<li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
    <li class="dropdown topbar-profile">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image">
<img src="<?php echo $imagepath; ?>" width="35"></span> <?php  echo htmlentities($_SESSION['_SESS_USERNAME']); ?> &nbsp; <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="viewprofile.php?id=<?php echo base64_encode($_SESSION['_SESS_USERID']); ?>">My Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="changepassword.php">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a class="md-trigger" href="logout.php"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
</li>


</ul>

</div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>