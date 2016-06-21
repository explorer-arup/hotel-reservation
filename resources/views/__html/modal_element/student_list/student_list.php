<?php require_once ROOT.'/includes/header.php' ?>
<?php require_once ROOT.'/includes/student-sidebar.php' ?>
<div class="dash_midright">
<div class="dash_midright01">
<p class="welleft"></p>
<p class="welright">Date-<?php date_default_timezone_set('Asia/Calcutta'); echo date("jS  F Y")?>  </p>
<div class="clear"></div>
</div>
<div class="dash_midright102">
<div class="dash_midright03">
<p class="dashtext01"><span><img src="<?php echo SITE_PATH?>/public/images/newmpic01.png" alt=""></span>Students Table</p>
<a href="<?php echo DESK_SITE_PATH?>student/student_add_page" class="addnew">Add New</a>
</div>
<div class="dash_midright04">
<div class="dash_midright04_sub">
<form method="post" action="<?php echo DESK_SITE_PATH?>student/generate_excel">
<table width="90%">
	<tr>
    	<td><h5>Export Students Data</h5></td>
        <td><span class="font_export">From : </span><input type="text" id="ff" name="date_start" placeholder="DD-MM-YYYY"  class="searching_field"/> &nbsp; <span class="font_export">To : </span><input type="text" id="ff" name="date_end" placeholder="DD-MM-YYYY" class="searching_field" /> 
        <td><input type="submit" name="" value="Get Excel Report"  class="button_search" /></td>
     </tr>
</table>        
</form>
<p class="font_export"><?php echo $date_error_message;?></p>
</div>
<div class="dash_midright04_sub">
<form method="post" action="<?php echo DESK_SITE_PATH?>student/search_student_by_reg">
<table width="60%">
	<tr>
    	<td><h5>Search Student</h5></td>
        <td><input type="text" name="reg_no" placeholder="Registration No" class="searching_field" /></td>
        <td><input type="submit" name="" value="Search Student" class="button_search"/></td>
     </tr>
</table>        
</form>
<p class="font_export"><?php echo $error_message;?></p>
</div>

<div class="memberbox">
<div class="memberbox01">
<div class="memberboxx01">Details</div>
<div class="memberboxx01">Reg. No</div>
<div class="memberboxx01">Roll</div>
<div class="memberboxx01">No</div>
<div class="memberboxx01">Reg.Certificate</div>
<div class="memberboxx01">ACTION</div>
<div class="clear"></div>

</div>
<?php foreach($students as $student){?>
<div class="memberbox02">
<div class="memberboxxx01"><a href="<?php echo DESK_SITE_PATH?>student/get_single_students_details/<?php echo $student['id'];?>" class="modal-ajax">
	<img src="<?php echo SITE_PATH?>/public/images/view-details_318-1493.jpg" /></a></div>
<div class="memberboxxx01"><?php echo $student['reg_no'];?></div>
<div class="memberboxxx01"><?php echo $student['roll'];?></div>
<div class="memberboxxx01"><?php echo $student['no'];?></div>
<div class="memberboxxx01"><a href="<?php echo DESK_SITE_PATH?>student/registration_pdf/<?php echo $student['id'];?>">Get Registration</a></div>
<div class="memberboxxx01"><a href="<?php echo DESK_SITE_PATH?>student/edit_student/<?php echo $student['id'];?>">Edit</a> &nbsp;/&nbsp; <a href="<?php echo DESK_SITE_PATH?>student/delete/<?php echo $student['id'];?>" onclick="return confirm('Are you sure you want to delete the student <?php echo $student['first_name'];?>?');">Delete</a></div>
<div class="clear"></div>
</div>
<?php }?>
</div>

</div>

</div>
</div>
</div>

</div>
<script src="<?=SITE_PATH?>/public/js/jquery.modal.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	//This is the Modal window calling
	$.fn.modal.defaults={width:500,height:600};
	$('.modal-ajax').modal({draggable:true,buttons:{Close:'hide'}});
	});
	
</script>
