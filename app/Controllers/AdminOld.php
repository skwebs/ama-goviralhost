<?php

namespace App\Controllers;

use CodeIgniter\Database\MySQLi\Builder;

class Admin extends BaseController
{
	protected $db;

	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public function index()
	{
		return view('admin/gen/adm_index');
	}

	public function add_student_page()
	{
		return view('admin/gen/add_student');
	}
	
	public function add_student()
	{
		$data = $this->request->getPost();
		$data["created_at"] = date("Y-m-d H:i:s");
		// retrive data from database to check student already exist or new
		$dbData = $this->db->table("students");
		$row = $dbData->getWhere([
			'stu_name' => $data['stu_name'],
			'mother_name' => $data['mother_name'],
			'father_name' => $data['father_name'],
			'dob' => $data['dob']
			])->getResultArray();

		if ($row != null) {
			

			$html=  '<div class="alert alert-danger">This student already added.<br><hr>
			Name: '.$data['stu_name'] . ',<br>
			Father: '.$data["father_name"].',<hr>
			Add another <a href="'.site_url("admin/add_student_page").'">Student</a> or, 
			<a href="'.site_url("admin/upload_result_page").'">Upload Result</a>
			</div>';

			return view('admin/gen/response',["response"=>$html]);
			
		}else{
			$builder = $this->db->table("students");
		if($builder->insert($data)){
			$data["id"] = $this->db->insertID();
			$this->session->set("stu",$data);
			// echo "Data inserted.";
			//return view('admin/gen/upload_result',$data);
			return redirect()->to(site_url("admin/upload_result_page/".$data["id"]));
		}
		}
		

	}

	public function upload_Result_page()
	{
		
		if($this->session->has("stu")){
			$stu_ses_data = $this->session->stu;
	
		return view('admin/gen/upload_result',[
				"stu_name"=>$stu_ses_data['stu_name'],
				"stu_id"=>$stu_ses_data['id']
			]);
		}else {
			$html = '<div class="alert alert-danger">Session Timeout.</div>';
			return view('admin/gen/response',["response"=>$html]);
		} ;
		exit;
		
	}

	public function upload_result()
	{
		
		$stu_ses_data = $this->session->stu;
		// get input from user
		$data = $this->request->getPost();
		$data["created_at"] = date("Y-m-d H:i:s");
		// check Result uploaded or not 
		$curSes = date('Y', strtotime('-1 year')) . "-" . date('y');
		// exit($curSes);
		$dbData = $this->db->table("result");
		$row = $dbData->getWhere([
			'stu_id' => $stu_ses_data['id'],
			'session' => $curSes
			])->getResultArray();

		if ($row != null) {
			$row = $row[0];
			$dbStuData = $this->db->table("students");

			$stuDbRow = $dbStuData->getWhere([
				'id' => $stu_ses_data['id']
				])->getResultArray()[0];

			// If Result already uploaded
			$html=  '<div class="alert alert-danger">This student Result already uploaded.<br><hr>
			Name: '.$stuDbRow['stu_name'] . ',<br>
			Father: '.$stuDbRow["father_name"].',<br>
			Roll No: '.$row["stu_roll"].',<hr>
			Add another <a href="'.site_url("admin/add_student_page").'">Student</a> or, 
			<a href="'.site_url("admin/upload_result_page").'">Upload Result</a>
			</div>';

			return view('admin/gen/response',["response"=>$html]);
			
		}else{
			// If Result did not uploaded yet then upload
			$builder = $this->db->table("result");
			if($builder->insert($data)){
				$data["result_id"] = $this->db->insertID();
				$html = '<div class="alert alert-success" >
						Result uploded of <strong>'.$stu_ses_data['stu_name'] . '</strong>. Go to 
						<a href="'.site_url('admin/add_student_page').'">Add Student</a> or,
						<a href="'.site_url('admin/upload_result_page').'"> Upload Result</a>
						</div>
						';
				return view('admin/gen/response',["response"=>$html]);
			}else {
				echo "Result didn't upload.";
			}
		}
		// echo "<hr>From input<pre>";
		// var_dump($data);
		

	}

	public function stuResult(){
		$builder = $this->db->table("students");
		$builder->select('*');
		$builder->join('result', 'result.stu_id = students.id');
		$query = $builder->get();
		$rows = $query->getResultArray();
		// echo "<hr>From input<pre>";
		// var_dump($rows);
		// $html = '';
		// foreach ($rows as $row) {
		// 	$html .= '<table>';
		// 	foreach ($row as $key => $value) {
		// 		$html .= '<tr>
		// 			<td>'.$key.'</td>
		// 			<td>'.$value.'</td>
		// 		</tr>';
		// 	}
		// 	$html .= '</table><hr>';
		// }
		
		// echo $html;

		return view("admin/gen/all_stu_result",["rows"=>$rows]);
	}

	
}
