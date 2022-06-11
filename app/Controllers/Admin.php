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

	
	public function add_student()
	{
		if ($this->session->verified_admin == "yes") {
			if($this->request->getMethod()=="get"){
				// show student add page
				return view('admin/gen/add_student');
			}else {
				// processing to add student
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
					// if student already added
					$html=  '<div class="alert alert-danger">This student already added.<br><hr>
					Name: '.$data['stu_name'] . ',<br>
					Father: '.$data["father_name"].',<hr>
					Add another <a href="'.site_url("admin/add_student").'">Student</a> or, 
					<a href="'.site_url("admin/all_stu_list").'">Upload Result</a>
					</div>';

					return view('admin/gen/response',["response"=>$html]);
					
				}else{
					// Add student if didn't add yet
					$builder = $this->db->table("students");
					if($builder->insert($data)){
						$id = $this->db->insertID();
						return redirect()->to(site_url("admin/upload_result/$id"));
					}
				}
			}
		}else {
			return redirect()->to(site_url("admin/verify_admin"));
		}
	}

	public function upload_result($id)
	{
		// show result upload page
		if($this->request->getMethod()=="get"){
			
			$builder = $this->db->table("students");
			$builder->select('stu_name');
			$rows = $builder->getWhere(["id" =>$id, "deleted_at" => null])->getResultArray();
		
			return view('admin/gen/upload_result',["stu_name"=>$rows[0]['stu_name'],"stu_id"=>$id]);
		}else {
			$builder = $this->db->table("students");
			$builder->select('stu_name');
			$rows = $builder->getWhere(["id" =>$id, "deleted_at" => null])->getResultArray();
			
			// process uploading result
		
			// get input from user
			$data = $this->request->getPost();
			$data["created_at"] = date("Y-m-d H:i:s");
			// check Result uploaded or not 
			$curSes = date('Y', strtotime('-1 year')) . "-" . date('y');
			// exit($curSes);
			$dbData = $this->db->table("result");
			$row = $dbData->getWhere([
				'stu_id' => $id,
				'session' => $curSes
				])->getResultArray();

			if ($row != null) {
				$row = $row[0];
				$dbStuData = $this->db->table("students");

				$stuDbRow = $dbStuData->getWhere(['id' => $id])->getResultArray()[0];

				// If Result already uploaded
				$html=  '<div class="alert alert-danger">This student Result already uploaded.<br><hr>
				Name: '.$stuDbRow['stu_name'] . ',<br>
				Father: '.$stuDbRow["father_name"].',<br>
				Roll No: '.$row["stu_roll"].',<hr>
				Goto <a class="btn btn-primary" href="'.site_url("admin/add_student").'">Add Student</a> or, 
				<a class="btn btn-primary" href="'.site_url("admin/all_stu").'">Students List</a> or,
				<a class="btn btn-primary" href="'.site_url('admin/single_result/'.$id).'">View Marksheet</a>
				</div>';

				return view('admin/gen/response',["response"=>$html]);
				
			}else{
				// If Result did not uploaded yet then upload
				$builder = $this->db->table("result");
				if($builder->insert($data)){
					$data["result_id"] = $this->db->insertID();
					
					$html = '<div class="alert alert-success" >
							Result uploded of <strong>'.$rows[0]['stu_name'] . '</strong>. Go to 
							<a href="'.site_url('admin/all_stu').'">Students List</a> or,
							<a href="'.site_url('admin/add_student').'">Add Student</a> or,
							<a href="'.site_url('admin/single_result/'.$id).'">View Marksheet</a>
							</div>
							';
					return view('admin/gen/response',["response"=>$html]);
				}else {
					echo "Result didn't upload.";
				}
			}
		}
	}

	public function stuResult(){
		$builder = $this->db->table("result");
		$builder->select('*');
		$builder->join('students', 'result.stu_id = students.id');
		$query = $builder->get();
		$rows = $query->getResultArray();
		
		return view("admin/gen/all_stu_result",["rows"=>$rows]);
	}
public function single_result($id){
		$builder = $this->db->table("result");
		$builder->select('*');
		$builder->join('students', 'result.stu_id = students.id');
		$builder->where(["students.id"=>$id]);
		$rows = $builder->get()->getResultArray();
		// var_dump($rows);
		return view("admin/gen/all_stu_result",["rows"=>$rows]);
	}

	public function all_stu(){
		$va = "";
		if ($this->session->verified_admin == "yes") {
			$va = true;
		}else {
			$va = false;
		}
		$builder = $this->db->table("result");
		$builder->join('students', 'students.id = result.stu_id','right');
		// $builder->select(
		// 	'students.id, students.stu_name, students.mother_name, students.father_name, students.gender,
		// 	students.dob, students.address, students.mobile, result.session, result.stu_class, result.stu_roll, result.cert_num,
		// 	result.english, result.hindi, result.maths, result.drawing, result.total'
		// );
		$builder->select('*');
		$query = $builder->getWhere("students.deleted_at",null);
		$rows = $query->getResultArray();
		return view("admin/gen/all_stu_list",["rows"=>$rows,"verified_admin" => $va]);
		
	}

	public function stu_bin(){
		if ($this->session->verified_admin == "yes") {
			
			$builder = $this->db->table("result");
			$builder->select('*');
			$builder->join('students', 'result.stu_id = students.id');
			$query = $builder->getWhere("students.deleted_at !=",null);
			$rows = $query->getResultArray();
			return view("admin/gen/stu_bin",["rows"=>$rows]);
		}else {
			return redirect()->to(site_url("admin/verify_admin"));
		}
	}

	public function edit_stu($id){
		if ($this->session->verified_admin == "yes") {
			if($this->request->getMethod()=="get"){  
				$builder = $this->db->table("students");
				$query = $builder->getWhere(['id'=>$id]);
				$rows = $query->getResultArray();
				// var_dump($rows);
				return view("admin/gen/edit_stu",["rows"=>$rows]);
			}else{
				// This is post request
				// Update database process
				$data = $this->request->getPost();
				$data["updated_at"] = date("Y-m-d H:i:s");
				$builder = $this->db->table("students");
				$builder->where('id', $id);
				if($builder->update($data)){
					// echo "Data updated of id no.". $id;
					return redirect()->to(site_url("admin/all_stu"));
				}

			}
		}else {
			return redirect()->to(site_url("admin/verify_admin"));
		}
	}

	public function edit_result($id){
		if ($this->session->verified_admin == "yes") {
			if($this->request->getMethod()=="get"){
			
				$builder = $this->db->table("result");
				$builder->join('students', 'students.id = result.stu_id','right');
				// $builder->select(
				// 	'students.id, students.stu_name, students.mother_name, students.father_name, students.gender,
				// 	students.dob, students.address, students.mobile, result.session, result.stu_class, result.stu_roll, result.cert_num,
				// 	result.english, result.hindi, result.maths, result.drawing, result.total'
				// );
				$builder->select('*');
				$query = $builder->getWhere(["students.id"=>$id, "students.deleted_at"=>null]);
				$rows = $query->getResultArray();
				//echo "<pre>";var_dump($rows); echo "</pre>"; exit;
				return view("admin/gen/edit_result",["rows"=>$rows]);
				
			}else{
				// This is post request
				// Update database process
				$data = $this->request->getPost();
				$data["updated_at"] = date("Y-m-d H:i:s");
				$builder = $this->db->table("result");
				$builder->where('stu_id', $id);
				if($builder->update($data)){
					// echo "Data updated of id no.". $id;
					return redirect()->to(site_url("admin/all_stu"));
				}

			}
		}else {
			return redirect()->to(site_url("admin/verify_admin"));
		}
	}

	public function del_stu($id){
		if ($this->session->verified_admin == "yes") {
			$data = $this->request->getPost();
			$data["deleted_at"] = date("Y-m-d H:i:s");
			$builder = $this->db->table("students");
			$builder->where('id', $id);
			if($builder->update($data)){
				// echo "Data updated of id no.". $id;
				return redirect()->to(site_url("admin/all_stu"));
			} else {
				// Something goes wrong in deletion process
				$html = '<div class="alert alert-danger">Something goes wrong in deletion process.<br>
				Go to <a href="'.site_url("admin/all_stu").'">Student List</a></div>';
				return view('admin/gen/response',["response"=>$html]);
			}
		}else {
			return redirect()->to(site_url("admin/verify_admin"));
		}
	}

	public function restore_stu($id){
		$data["deleted_at"] = null;
		$builder = $this->db->table("students");
		$builder->where('id', $id);
		if($builder->update($data)){
			// echo "Data updated of id no.". $id;
			return redirect()->to(site_url("admin/stu_bin"));
		} else {
			// Something goes wrong in deletion process
			$html = '<div class="alert alert-danger">Something goes wrong in deletion process.<br>
			Go to <a href="'.site_url("admin/all_stu").'">Student List</a></div>';
			return view('admin/gen/response',["response"=>$html]);
		}
	}

	public function del_stu_forever($id){
		if ($this->session->verified_admin == "yes") {
			$builder = $this->db->table("students");
			if($builder->delete(['id' => $id])){
				return redirect()->to(site_url("admin/stu_bin"));
			}else {
				// Something goes wrong in deletion process
				$html = '<div class="alert alert-danger">Something goes wrong in deletion process.<br>
				Go to <a href="'.site_url("admin/stu_bin").'">Student List</a></div>';
				return view('admin/gen/response',["response"=>$html]);
			}
		}else {
			return redirect()->to(site_url("admin/verify_admin"));
		}
	}

	public function verify_admin(){
	
		if($this->request->getMethod()=="get"){
			
			return view("admin/gen/verify_admin");
			
		}else{
			// This is post request
			$pw = $this->request->getPost("pw");
		
			// exit($pw);
			if($pw=="S@tish555@sk"){
				$this->session->set("verified_admin","yes");
				return redirect()->to(site_url("admin/all_stu"));
			}else {
				echo "<div style='color:red;'>Wrong password ". date("d-m-Y h:i:s")."</div>";
				return view("admin/gen/verify_admin");
			}
		}
	}

	public function logout_admin(){
		$this->session->destroy();
		return redirect()->to(site_url("admin/all_stu"));
	}
	
}