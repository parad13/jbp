<?php


if(isset($_POST['search'])){
    $jobTitle     	= $_REQUEST['fields_f'];
    $compName     	= $_REQUEST['cmp_f'];
    
    $sql = "select * from  jobs_m_t
    where jobTitle = '".$jobTitle."' ";
    $result = mysqli_query($con,$sql);

     
   
}


?>
 <h2><?php echo $result?></h2>
