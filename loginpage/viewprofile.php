<?php 
ob_start();
include_once("user_chk.php");
include_once("includes/application.php");
include_once("includes/class.CommonFunc.php");
// 
/*if($_SESSION['_SESS_SELLMYBIZZ_USERROLE'] != 1){
	header("Location: headerpage.php?msg=abuse");
} 
*/if(!empty($_REQUEST['id'])) {
	$id 			  = base64_decode($_REQUEST['id']);
	$searchqry 	   = mysqli_query($con,"select
							user_firstname,user_lastname,filepath,user_name,user_dob,user_gender,
							user_address,user_cellphone,user_email,user_status,decode(user_pwd,'sellmybiz') as oldpassword
										from user_info
										 where user_id = '".$id."'");
									 
	while($searchfetch 	 = mysqli_fetch_array($searchqry)){
	
	$firstName 	   = $searchfetch['user_firstname'];
	$secondName      = $searchfetch['user_lastname'];
	$usrimagepath 	= $searchfetch['filepath'];
	$userid 	   	  = $searchfetch['user_name'];
	$dob    	 	 = $searchfetch['user_dob'];
	$gender 	 	  = $searchfetch['user_gender'];
	$address     	 = $searchfetch['user_address'];
	$mobileno    	= $searchfetch['user_cellphone'];
	$email 		   = $searchfetch['user_email'];
	$status   		  = $searchfetch['user_status'];
	$oldpassword     = $searchfetch['oldpassword'];
	echo $oldpassword;
	}
}
if(!empty($_REQUEST['submit'])) {
	$userfname       = $_REQUEST['userfname_f'];
	$usersname       = $_REQUEST['usersname_f'];
	$dob    	 	 = date($_REQUEST['dob_f']);
	$gender    	  = $_REQUEST['gender_f'];
//	$userid    	  = $_REQUEST['userid_f'];
	$address    	 = $_REQUEST['address_f'];
	$mobileno     	= $_REQUEST['mobileno_f'];
	$email 		   = $_REQUEST['email_f'];
//	$nPass           = $_REQUEST['nPass'];
//	$status   		  = $_REQUEST['status_f'];
	$usrimagepath   	   = $_FILES['imagepath_f']['name']; 

/*	$searchcountqry 	   = mysqli_query($con,"select * from users_m_t
							 			where user_email = '".mysqli_real_escape_string($con,$email)."' 
										and user_name  	    	= '".mysqli_real_escape_string($con,$userid)."'
										and user_role = 2 and user_status = 'E'");
	if($searchcountqry > 0){
		$msg = "Existing";
		header("Location: viewprofile.php?msg=$msg");
	}
*/
	if(!empty($_REQUEST['id_f'])){
		$id = $_REQUEST['id_f'];
		$insqry = mysqli_query($con,"update users_m_t set
								user_firstname  	= '".mysqli_real_escape_string($con,$userfname)."',
								user_lastname  		= '".mysqli_real_escape_string($con,$usersname)."',
								user_address  	   	= '".mysqli_real_escape_string($con,$address)."',
								user_cellphone  	= '".mysqli_real_escape_string($con,$mobileno)."',
								user_email  	    = '".mysqli_real_escape_string($con,$email)."',
								user_dob  	    	= '".mysqli_real_escape_string($con,$dob)."',
								user_gender  		= '".mysqli_real_escape_string($con,$gender)."',
								modifiedBy			= '".$_SESSION['_SESS_USERID']."',
								modifiedDate		= '".date('Y-m-d')."',
								user_status 		= '".$status."'
								where user_id 		= '".$id."'");
		$msg = "Updated";
	} else {
		$insqry = mysqli_query($con,"insert into users_m_t set
								user_firstname  	= '".mysqli_real_escape_string($con,$userfname)."',
								user_lastname  		= '".mysqli_real_escape_string($con,$usersname)."',
								user_address  	   	= '".mysqli_real_escape_string($con,$address)."',
								user_cellphone  	= '".mysqli_real_escape_string($con,$mobileno)."',
								user_email  	    = '".mysqli_real_escape_string($con,$email)."',
								user_dob  	    	= '".mysqli_real_escape_string($con,$dob)."',
								user_gender  		= '".mysqli_real_escape_string($con,$gender)."',
								createdBy			= '".$_SESSION['_SESS_USERID']."',
								createdDate			= '".date('Y-m-d')."',
								user_status 		= '".$status."'");
		$msg = "Inserted";
		  $id = $insqry;
	}
	if(!empty($_REQUEST['nPass'])){
		$insqry =mysqli_query($con,"update users_m_t 
								set
									user_pwd 			= (ENCODE('" . mysqli_real_escape_string($con,$nPass) . "','sellmybiz'))
								where
									user_id 		= '".$id."'");
	}
	if(!empty($usrimagepath)) {
			$file_name=$_FILES["imagepath_f"]["name"];
			$temp_name=$_FILES["imagepath_f"]["tmp_name"];
			$imgtype=$_FILES["imagepath_f"]["type"];
			$ext= GetImageExtension($imgtype);
			$imagename="userid_".$id.$ext;
			$target_path = "uploadusrimgs/".$imagename;
			if(move_uploaded_file($temp_name, $target_path)) {
			
				$insqry =mysqli_query($con,"update users_m_t 
										set
											filepath = '".$target_path."'
										where
											user_id 		= '".$id."'");
			   $msg = "Successfully uploading image on the server";
			}else{
			   $msg = "Error While uploading image on the server";
			} 
	}	
	$ides = base64_encode($id);
	header("Location: viewprofile.php?msg=$msg&id=$ides");
}
$incFILE = "innertemp/viewprofile.php";
include"adminpagetemp.php";


?>