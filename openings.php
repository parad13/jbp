<?php 
include("header2.php");
include_once("loginpage/includes/application.php");
?>
		
		
		<!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="span12" style="width:100%; padding:0;" >
                    	
                        <div class="headline">
                        	
                           <img src="assets/images/openings.jpg" />
                            
                        </div><!-- end .headline -->
                        
                    </div>
			<!-- end #page-header -->
           <div class="content" style=" background-color: rgb(31, 40, 46);">
               <div class="container">
         
                	<!-- end .spsn12 -->
          
             <style>
							table, th, td {
    border:none; 
}
th, td {
padding:0;
color:#FFFFFF;
vertical-align: middle;
border-bottom:1px dashed #374148;
}
table p{
font-size:12px;
 
}
</style>
          
                <div class="row" >
                
                    <div class="span12">
                	<div class="span3">
                    	<p style="background-color:#f9b125; padding:10px; color:#FFF; font-size:12px;">As a best practice company, we realize that the little things make the most difference. </p>
                        <img src="assets/images/best_practices.jpg">  
                    </div><!-- end .span3 -->
                    <div class="span9">
                  
                    <div class="span12" >
                    <div class="wrap">
		

		<div class="main">


<form class="form-control" method="post" action="search.php">
		<div class="span5">
			<p>Fields</p>
			<input type="text" name='fields_f' id='fields_f'  placeholder="Find your favourite jobs" list="browsers" style=" border-radius:3px;border:1px solid lightgrey;padding:5px;">
			<datalist id="browsers">
			    <option><strong>All Categories</strong></option>			
				<option>Sales</option>
				<option>IT</option>
				<option> Finance</option>
				<option>Web Developer</option>
			</datalist>
		</div>

		<div class="span5">
			<p>Company</p>
			<input type="text" name='cmp_f' id='cmp_f' placeholder="Search Company" list="browsers1" style=" border-radius:3px;border:1px solid lightgrey;padding:5px;">
			<datalist id="browsers1">
				<option>Mindtree</option>
				<option>Infosys</option>
				<option>TCS</option>
				<option>Tech Mahindra</option>
				<option>Siemens</option>
				<option>Wipro</option>
				<!-- <option>TCS</option> -->
			</datalist>
		</div>

		<div class="span2">
			<p style="color:#1f282e;">Search</p>
			<p class="last">
				<input class="btn" id="search" type="search" name="search" value="search" style="padding:7px 15px; border-radius:2px;" >
			</p>
		</div>

</form>
  
<style>
p ,td{
color:#FFF;
}
</style>

<div class="span12" style="margin-top:2em; color:#FFFFFF;"><?php
$searchqry = mysqli_query($con,"select * from  jobs_m_t where jobStatus = 'E' order by jobID DESC");
// $query = mysqli_query("SELECT * FROM house WHERE town LIKE '%$search%'") or die ("Could not search");
// $count = mysqli_num_rows($searchqry);
// $searchfetch = mysqli_fetch_array($searchqry);
// foreach($searchfetch as $a){
// 	echo $a.'<br>';
// }


while($searchfetch = mysqli_fetch_array($searchqry)){
?>

<table>
<tr>
<td><h4><?php echo $searchfetch['jobID'];?>.&nbsp;<?php echo $searchfetch['jobTitle'];?></h4><p><?php echo $searchfetch['compName'];?></p></td>
<td><p><?php echo $searchfetch['qualfctn'];?></p></td>
<td><p><?php echo $searchfetch['experience'];?></p></td>
<td><a href="jobseekerdata.php?click_id=<?php echo $searchfetch['compName'];?>" class="btn btn-primary">Apply</a></td></tr>
</table><?php } ?>

</div>
         
        
    
						  	  
						  </div>
					</div>
                    </div>

					

					
				</div>
                </div>
			</div>
		</div><!--end .main-->
        </div>
	
<style>
/*----- Tabs -----*/
/*----- Tabs -----*/
.tabs {
	width:100%;
	display:inline-block;
}

	/*----- Tab Links -----*/
	/* Clearfix */
	.tab-links:after {
		display:block;
		clear:both;
		content:'';
	}

	.tab-links li {
		margin:0px 65px;
		
		float:left;
		list-style:none;
	}

		.tab-links a {
		text-decoration: none;
    padding: 9px 15px;
    display: inline-block;
    border-radius: 3px 3px 0px 0px;
    background:#fff;
    font-size: 16px;
    font-weight: 600;
    color: #999;
    transition: all linear 0.15s;
		}

		.tab-links a:hover {
			background:#FF6600;
			text-decoration:none;
		}

	.tabs li.active a,.tabs  li.active a:hover {
		background:#FF6600;
		color:#fff;
	}

	/*----- Content of Tabs -----*/
	.tab-content {
		padding:15px;
		border-radius:3px;
		/*box-shadow:-1px 1px 1px rgba(0,0,0,0.15);*/
		background:#fff;
	}

		.tab {
			display:none;
		}

		.tab.active {
			display:block;
		}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function() {
	// Standard
	jQuery('.tabs.standard .tab-links a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});

	// Animated Fade
	jQuery('.tabs.animated-fade .tab-links a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});

	// Animated Slide 1
	jQuery('.tabs.animated-slide-1 .tab-links a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).siblings().slideUp(400);
		jQuery('.tabs ' + currentAttrValue).delay(400).slideDown(400);

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});

	// Animated Slide 2
	jQuery('.tabs.animated-slide-2 .tab-links a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});
});

</script>

                    

                  
		<?php include("footer.php")?>