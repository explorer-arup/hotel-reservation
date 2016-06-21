<div class="dash_midright">
<div class="dash_midright01">
<p class="welleft">Welcome User: </p>
<p class="welright">Date-15th August 2015  </p>
<div class="clear"></div>
</div>
<div class="dash_midright102">
<div class="dash_midright03">
<p class="dashtext01"><span><img src="images/newmpic01.png" alt=""></span>Student Listing</p>
<a href="<?php echo base_url('home/student_registration_page');?>" class="addnew">Add New</a>
</div>
<div class="dash_midright04">
<div class="dash_midright04_sub">
<form method="post" action="<?php echo base_url('home/excel_report');?>">
<div class="dashboxxx">
  <div class="dashboxxx_sub"><h2>Export Students Data</h2><p>From:</p> <input type="text" id="ff" name="date_start" placeholder="DD-MM-YYYY" /></div> <div class="dashboxxx_sub01"><p>To :</p> <input type="text" id="ff" name="date_end" placeholder="DD-MM-YYYY" /></div></div>
<div class="searchbox_right001">
<input type="submit" name="" value="Get Excel Report" />

</div>
<div class="clear"></div>

</form>

</div>
<div style="padding-left:277px;;"><p><span style="color:#993300; font-weight:800;"><?php echo $error_message;?></span></p></div>
<div class="dash_midright04_sub">
<form method="post" action="<?php echo base_url('home/search_student');?>">
<div class="dashboxxx">
  <div class="dashboxxx_sub"><h2>Search Students With</h2><p>Reg : </p><input type="text" id="ff" name="rg_no" placeholder="Registration No" /></div> <div class="dashboxxx_sub01"><p>Roll : </p> <input type="text" id="ff" name="roll_no" placeholder="Roll No" /></div></div>
<div class="searchbox_right001">
<input type="submit" name="" value="Search" />

</div>
<div class="clear"></div>

</form>

</div>
<div class="memberbox">
<div class="memberbox01">
<div class="memberboxx0002">STUDENT ID</div>
<div class="memberboxx0002">STUDENT NAME</div>
<div class="memberboxx0002">REGISTRATION NO</div>
<div class="memberboxx0002">ROLL NO</div>
<div class="memberboxx0002">SESSION</div>
<div class="memberboxx0002">ACTION</div>
<div class="clear"></div>

</div>
<?php foreach($all_students as $s){?>
<div class="memberbox02">
<div class="memberboxxx0002"><?php echo $s['id'];?></div>
<div class="memberboxxx0002"><?php echo $s['first_name'];?> <?php echo $s['middle_name'];?> <?php echo $s['last_name'];?></div>
<div class="memberboxxx0002"><?php echo $s['registration_no'];?></div>
<div class="memberboxxx0002"><?php echo $s['roll_no'];?></div>
<div class="memberboxxx0002"><?php echo $s['session'];?></div>
<div class="memberboxxx0002"><a href="<?php echo base_url('home/edit_student/'.$s['id']);?>">Edit Student</a></div>
<div class="clear"></div>

</div>
<?php }?>
</div>
</div>
</div>
<div class="clear"></div>
</div>

