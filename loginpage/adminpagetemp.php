<!DOCTYPE html>
<html>
<head>
<script src="datetimepicker_css.js"></script>

<?php include("includes/head_links.php") ?>
<!-- $incFILE = "innertemp/addeditjobs.php"; -->

</head>


<body class="fixed-left">


	<div id="wrapper">
		
<!-- Top Bar Start -->

<?php include("includes/top_header.php") ?> 

<!-- Top Bar End -->

<!-- Left Sidebar Start -->
        
<?php include("includes/left_menu.php") ?>  

<!-- Left Sidebar End -->	
        


<!-- Start right content -->
<table width="100%" border="0" align="center">


	<tr><?php if(empty($incHTML)) { if(!empty($incFILE)) 'hello'; else bolo;} else echo $incHTML; ?></tr>
    <tr>
        <td valign="top">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top"><?php if(empty($incHTML)) { if(!empty($incFILE)) require_once($incFILE); else require_once("index.php");} ?></td>
            </tr>
        </table></td>
    </tr>
</table>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

	</div>
	
	<!-- End of page -->
		<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
				
				            <!-- Footer Start -->
       <div class="clear"></div>     
      
<?php include("includes/footer.php") ?>

          <!-- Footer End -->			

	</body>
</html>