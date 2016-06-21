
<style>
.dl-horizontal dt {
    clear: left;
    float: left;
    text-align: right;
    white-space: nowrap;
    width: 160px;
	overflow:visible;
}
.modal_window > h2 > p {
    background: #333 none repeat scroll 0 0;
    color: #fff;
    font-family: "Open Sans",sans-serif;
    font-size: 18px;
    line-height: 60px;
    margin: 0;
    padding: 0;
    position: relative;
    text-align: left;
    text-transform: uppercase;
}
#dialog h2 {
    color: #2aa9d7;
    font-family: "Open Sans",sans-serif;
    font-size: 18px;
    font-style: normal;
    font-weight: bold;
    letter-spacing: 1px;
    line-height: 60px;
    margin: 0;
    padding: 0;
    text-align: left;
    text-transform: uppercase;
}
.dl-horizontal {
    border: 1px solid #e7e7e7;
    padding: 15px;
}
.dl-horizontal dt {
    clear: left;
    color: #333333;
    float: left;
    font-family: "Open Sans",sans-serif;
    font-size: 15px;
    font-style: normal;
    font-weight: normal;
    line-height: 22px;
    margin: 0;
    overflow: hidden;
    padding: 0;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 234px;
}
.dl-horizontal dd {
    color: #666666;
    float: left;
    font-family: "Open Sans",sans-serif;
    font-size: 15px;
    font-style: normal;
    font-weight: normal;
    line-height: 22px;
    margin-left: 16px !important;
    padding: 0;
}</style>

<div id="dialog" title="Calculator">
    <h2>Student Details Of <?php echo $single_student_details[0]->first_name;?> <?php echo $single_student_details[0]->middle_name;?> <?php echo $single_student_details[0]->last_name;?></h2>
    <dl class="dl-horizontal">
        <dd style="float:none;text-align:center"><img src="<?php echo SITE_PATH?>student_images/<?php echo $single_student_details[0]->image_path;?>" style="width:100px; height:90px; border:2px solid #000000;"></dd>
        <dt>Student ID :</dt>
        <dd><?php echo $single_student_details[0]->id;?></dd>
        <dt>First Name : </dt>
        <dd><?php echo $single_student_details[0]->first_name;?></dd>
        <dt>Middle Name :</dt>
        <dd><?php echo $single_student_details[0]->middle_name;?></dd>
        <dt>Last Name :</dt>
        <dd><?php echo $single_student_details[0]->last_name;?></dd>
        <dt>Registration No :</dt>
        <dd><?php echo $single_student_details[0]->reg_no;?></dd>
        <dt>Roll :</dt>
        <dd><?php echo $single_student_details[0]->roll;?></dd>
        <dt>No :</dt>
        <dd><?php echo $single_student_details[0]->no;?></dd>
        <dt>Father Name :</dt>
        <dd><?php echo $single_student_details[0]->father_name;?></dd>
        <dt>Date Of Birth :</dt>
        <dd><?php echo $single_student_details[0]->dob;?></dd>
        <dt>Address :</dt>
        <dd><?php echo $single_student_details[0]->address;?></dd>
        <dt>Contact No :</dt>
        <dd><?php echo $single_student_details[0]->contact_no;?></dd>
        <dt>Session :</dt>
        <dd><?php echo $single_student_details[0]->session;?></dd>
        <dt>Gender :</dt>
        <dd><?php echo $single_student_details[0]->gender;?></dd>
        <dt>Registration Date :</dt>
        <dd><?php echo $single_student_details[0]->registration_date;?></dd>
       <div class="clear"></div>
    </dl>
</div>
