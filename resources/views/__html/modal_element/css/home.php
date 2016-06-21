<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends SP_Controller
{
	var $file_id='';
	var $user_id='';
	var $ed_file_id='';
	public function __construct()
	{
		
		parent ::__construct();
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->library('excel');
		$this->load->model('file_model');
		$this->load->helper('pagination_helper');
	}
	/*
	*this function is used for load load home page
	*/

	public function index()
	{
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('home');
	}
	public function student_registration_page()
	{
		$data['get_subject']=$this->file_model->get_subject();
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('add_admin',$data);
	 	$this->load->view('common/footer');
	}
	/*
	*function:save_admin
	*description:this function is used for save admin info.
	*/
	public function save_student_info()
	{
		$subject=serialize($this->input->post('subjects'));
		//print_r($subject);die();
//		$date_of_birth=$this->input->post('dob');
//		$dob=date('d-m-Y',strtotime($date_of_birth));		
		$this->file_model->save_student_info($subject);
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		redirect('home/student_listing','refresh');
	}
	/*
	*function:add_file_page
	*description:this function is used for load add file page with all information.
	*/
	public function add_course_page()
	{
		$data['get_course']=$this->file_model->get_course();
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('course_listing',$data);
	}
	public function get_student_result()
	{
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('student_result_search');
	}
	public function save_course()
	{
		$this->file_model->save_course();
		redirect('home/add_course_page','refresh');
	}
	public function add_subject_page()
	{
		$data=array();
		$data['get_subject']=$this->file_model->get_subject();
		//$data['get_course']=$this->file_model->get_course();
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('subject_listing',$data);
	}
	
	public function save_subject_info()
	{
		$this->file_model->save_subject_info();
		redirect('home/add_subject_page','refresh');
	}
	public function add_result_input_page()
	{
		$data=array();
		$data['get_subject']=$this->file_model->get_subject();
		$data['get_student']=$this->file_model->get_students();
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('result_input',$data);
	}
	public function save_result_info()
	{
		$this->file_model->save_result_info();
		
		redirect('home/add_result_input_page','refresh');
	}
	public function admit_card_page()
	{
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('admit_card');
	}
	public function ser_user_id()
	{
		//$search= $this->input->post('search_data');
	   	$search=$this->uri->segment(3);
		//die();
		$query = $this->file_model->get_single_user($search);
		echo json_encode ($query);
	}
	public function student_listing()
	{
		$uri='home/student_listing';
		$total_rows=$this->file_model->student_count();
		$limit=6;
		$details=create_pagination($uri, $total_rows, $limit, $uri_segment = 3, $full_tag_wrap = true);
		$data=array();
		$data['all_students']=$this->file_model->get_all_students($details['per_page'],$details['offset']);
		$data["links"] =$details['links'];
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('user_listing',$data);
	}
	public function edit_student()
	{
		$data=array();
		$student_edit_id=$this->uri->segment(3);
	 	$data['get_subject']=$this->file_model->get_subject();
		$data['single_students']=$this->file_model->get_single_students($student_edit_id);
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('edit_student_page',$data);
	}
	public function update_student()
	{
		$subject=serialize($this->input->post('subjects'));
	 	$this->file_model->update_student($subject);
		redirect('home/student_listing','refresh');
	}
	public function student_result_listing()
	{
		$registration_id=$this->input->post('student_reg_no',TRUE);
		$roll_no=$this->input->post('student_roll_no',TRUE);
		$data['all_students_results']=$this->file_model->get_all_students_results($registration_id,$roll_no);
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('student_result_listing',$data);
	}
	public function generate_result()
	{
		 $this->load->helper(array('dompdf', 'file'));
		 $total=0;
		 $amount=0;
		 $total_rows=1;
		 $result_id=$this->uri->segment(3);
		 $data['result_info']=$this->file_model->get_result_details($result_id);
		 
			if(sizeof($data['result_info'])>0){
			//echo 'test';
			 $this->load->view('result_generated', $data,true);
			 $html = $this->load->view('result_generated', $data,true);
			 pdf_create($html, 'result-pdf_'.date('Y-m-d'));
				  
			 $data = pdf_create($html, '', false);
			 write_file("pdf/result-pdf_".date('Y-m-d').".pdf", $data);
			}else{
				 redirect('home/student_result_listing');
			}	 
	}
	public function preview_admit_card()
	{
		$registration_no=$this->input->post('student_reg_no',true);
		$roll_no=$this->input->post('student_roll_no',true);
		$data['students_admit_card']=$this->file_model->get_student_admit_card_details($registration_no,$roll_no);
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('preview_admit_card',$data);
	}
	public function generate_admit_card()
	{
	 $this->load->helper(array('dompdf', 'file'));
	 $total=0;
	 $amount=0;
	 $total_rows=1;
	 $student_id=$this->uri->segment('3');
	 $data=array();
	 $data['student_admit_card_info']=$this->file_model->get_student_admit_card_generate($student_id);
	 $data['get_subject']=$this->file_model->get_subject();
		if(sizeof($data['student_admit_card_info'])>0){
		//echo 'test';
		 //$this->load->view('admit_card_generated', $data,true);
		 $html = $this->load->view('admit_card_generated', $data,true);
		 pdf_create($html, 'admit_card-pdf_'.date('Y-m-d'));
			  
		 $data = pdf_create($html, '', false);
		 write_file("pdf/admit_card-pdf_".date('Y-m-d').".pdf", $data);
		}else{
			 redirect('home/admit_card_page');
		}	 
	}
	public function certificate_checking_page()
	{
		$this->load->view('common/header');
	 	$this->load->view('common/sidebar');
		$this->load->view('certificate_input_page');
	}
	
	public function preview_certificate()
	{
		$registration_no=$this->input->post('student_reg_no',true);
		$roll_no=$this->input->post('student_roll_no',true);
		$data['students_certificate']=$this->file_model->get_certificate_details($registration_no,$roll_no);
		//print_r($data);die();
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('preview_certificate',$data);
	}
	public function certificate_generate()
	{
	 $this->load->helper(array('dompdf', 'file'));
	 $total=0;
	 $amount=0;
	 $total_rows=1;
	 $result_id=$this->uri->segment('3');
	 $data=array();
	 $data['student_certificate_info']=$this->file_model->get_student_certificate_generate($result_id);
		if(sizeof($data['student_certificate_info'])>0){
		//echo 'test';
		 //$this->load->view('admit_card_generated', $data,true);
		 $html = $this->load->view('certificate_generated', $data,true);
		 pdf_create($html, 'certificate-pdf_'.date('Y-m-d'));
			  
		 $data = pdf_create($html, '', false);
		 write_file("pdf/certificate-pdf_".date('Y-m-d').".pdf", $data);
		}else{
			 redirect('home/certificate_checking_page');
		}	 
	}
	public function excel_report()
	{
		$date_start=$this->input->post('date_start');
		$date_end=$this->input->post('date_end');
		//print_r($sd);die();
		$this->excel->setActiveSheetIndex(0);
		
		// Add a drawing to the worksheet (Logo)
//        $objDrawing = new PHPExcel_Worksheet_Drawing();
//        $objDrawing->setName('Logo');
//        $objDrawing->setDescription('Logo');
//        //$objDrawing->setPath('../admin/images/logo.png');
//
//        $objDrawing->setCoordinates('A1');
//        $objDrawing->setHeight(90);
//        $objDrawing->setWidth(90);
//        $objDrawing->setWorksheet($this->excel->getActiveSheet());
		
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Students History');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('B1', 'Egra S.S.B College');
		$this->excel->getActiveSheet()->setCellValue('B2', 'Purba Medinipur');
		$this->excel->getActiveSheet()->setCellValue('B3', 'West Bengal');
		
		//$loan_account=$this->loan_model->loan_receiver_name($loanID);
		
		//Set Username
//		$this->excel->getActiveSheet()->mergeCells('A7:B7');
//		$this->excel->getActiveSheet()->setCellValue('A7', 'Username: '.ucfirst($loan_account->username));
		
		//Set Current Date
		$this->excel->getActiveSheet()->mergeCells('G7:H7');
		$this->excel->getActiveSheet()->setCellValue('G7', 'Date: '.date('d-m-Y'));
		
		$this->excel->getActiveSheet()->getStyle('G7:H7')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
		$this->excel->getActiveSheet()->getStyle('G7:H7')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
		$this->excel->getActiveSheet()->getStyle('G7:H7')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
		$this->excel->getActiveSheet()->getStyle('G7:H7')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);

		
		//loan Account
		$this->excel->getActiveSheet()->mergeCells('A8:B8');
		//$this->excel->getActiveSheet()->setCellValue('A8', 'Loan Account : '.$loan_account->loan_key);
		
		$this->excel->getActiveSheet()->getStyle('A7:E8')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A7:E8')->getFont()->setSize(12);
		
		/*$this->excel->getActiveSheet()->getStyle('A5')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
		$this->excel->getActiveSheet()->getStyle('A5')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
		$this->excel->getActiveSheet()->getStyle('A5')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
		$this->excel->getActiveSheet()->getStyle('A5')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);*/
		
		$this->excel->getActiveSheet()->setCellValue('A10', 'Student ID');
		$this->excel->getActiveSheet()->setCellValue('B10', 'Registration No');
		$this->excel->getActiveSheet()->setCellValue('C10', 'Roll No');
		$this->excel->getActiveSheet()->setCellValue('D10', 'First Name');
		$this->excel->getActiveSheet()->setCellValue('E10', 'Middle Nmae');
		$this->excel->getActiveSheet()->setCellValue('F10', 'Last Name');
		$this->excel->getActiveSheet()->setCellValue('G10', 'Father Nmae');
		$this->excel->getActiveSheet()->setCellValue('H10', 'Session');

		$this->excel->getActiveSheet()->getStyle('A10:H10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		// Set title row bold;
        $this->excel->getActiveSheet()->getStyle('A10:H10')->getFont()->setBold(true);
		
		//merge cell A1 until C1
		$this->excel->getActiveSheet()->mergeCells('B1:E1');
		$this->excel->getActiveSheet()->mergeCells('B2:E2');
		$this->excel->getActiveSheet()->mergeCells('B3:E3');
		
		//set aligment to center for that merged cell (A1 to C1)
		$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getStyle('B1')->getFill()->getStartColor()->setARGB('#333');
		
		$this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(14);
		$this->excel->getActiveSheet()->getStyle('B2')->getFill()->getStartColor()->setARGB('#333');
		
		
		$this->excel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B3')->getFont()->setSize(12);
		$this->excel->getActiveSheet()->getStyle('B3')->getFill()->getStartColor()->setARGB('#333');



		for($col = ord('A'); $col <= ord('H'); $col++){
			//set column dimension
			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			 //change the font size
			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(14);
			 
			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}
		//retrive transactions
		$sd = $this->file_model->get_date_wise_students($date_start,$date_end);
		//print_r($sd);die();
		$exceldata="";
		foreach ($sd as $row){
				$exceldata[] =$row;
		}
		
		$total_record=count($exceldata);
		$end_row=$total_record+11;
		
		//Sheet Border
		$styleArray = array(
							'borders' => array(
							'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
         				   )
      					)
 					 );
		//$this->excel->getDefaultStyle()->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A10:H'.$end_row)->applyFromArray($styleArray);
		unset($styleArray);
		
		//Fill data 
		$this->excel->getActiveSheet()->fromArray($exceldata, null, 'A11');
		 
		$this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$filename='StudentReport_'.date('d-m-Y').'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
		
		//Save to server folder
		//$objWriter->save("report/".$filename);
		exit;
	}
}

