<?php 
ob_start();
include_once("user_chk.php");
include_once("includes/application.php");
include_once("includes/class.CommonFunc.php");


if(!empty($_REQUEST['id'])) {
	$id 			   = base64_decode($_REQUEST['id']);
	$searchqry 	    = mysqli_query($con,"select * from  jobs_m_t
							 			where jobID = '".$id."'");
	while($searchfetch 	   = mysqli_fetch_array($searchqry)){
		$jobTitle      = $searchfetch['jobTitle'];
		$compName      = $searchfetch['compName'];
		$qualfctn      = $searchfetch['qualfctn'];
		$experience      = $searchfetch['experience'];
		$jobStatus 	= $searchfetch['jobStatus'];
	}
}
if(!empty($_REQUEST['submit'])) {
	$id 	 = base64_decode($_REQUEST['id']);
	$jobTitle     	= $_REQUEST['jobname_f'];
	$compName     	= $_REQUEST['compName_f'];
	$qualfctn     	= $_REQUEST['qualfctn_f'];
	$experience     	= $_REQUEST['experience_f'];
	$jobStatus   	  = $_REQUEST['status_f'];
	$result	    = mysqli_query($con,"select count( * ) from  jobs_m_t
							 				where jobID = '".$id."'");
	while($searchcountqry = mysqli_fetch_array($result))	{							
	if($searchcountqry > 0){
		$id = $_REQUEST['id_f'];
		$insqry = mysqli_query($con,"update  jobs_m_t set
								jobTitle  	    = '".mysqli_real_escape_string($con,$jobTitle)."',
								compName  	    = '".mysqli_real_escape_string($con,$compName)."',
								qualfctn  	    	= '".mysqli_real_escape_string($con,$qualfctn)."',
								experience  	   		= '".mysqli_real_escape_string($con,$experience)."',
								modifiedBy		= '".$_SESSION['_SESS_USERID']."',
								modifiedDate	= now(),
								jobStatus		= '".$jobStatus."'
								where jobID 	= '".$id."'");
		$msg = "Updated";
	} else {
		$insqry = mysqli_query($con,"insert into  jobs_m_t set
								jobTitle  	    = '".mysqli_real_escape_string($con,$jobTitle)."',
								compName  	    = '".mysqli_real_escape_string($con,$compName)."',
								qualfctn  	    	= '".mysqli_real_escape_string($con,$qualfctn)."',
								experience  	    	= '".mysqli_real_escape_string($con,$experience)."',
								createdBy		= '".$_SESSION['_SESS_USERID']."',
								createdDate		= now(),
								jobStatus 		= '".$jobStatus."'");
		$id = $insqry;								
		$msg = "Inserted";
	}
}
	$ides = base64_encode($id);
	header("Location: vieweditjob.php?msg=$msg&id=$ides");
}
$incFILE = "innertemp/addeditjobs.php";
include_once("adminpagetemp.php");
?>