<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController
{
    protected $db;
    //protected $file_dir = 'student_docs';
    protected $img_dir = 'assets/dynamic/student/img';
    //protected $img_dir = 'student_docs/students_img';
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = ['title' => ':: Registration | Anshu Memorial Academy ::', 'description' => 'Anshu Memorial Academy CBSE Pattern Based an English Medium School from Std. Play to 8th.'];
        return view('student/stu_gen_page', $data);
    }

    public function register()
    {
        $data = ['title' => ':: Registration | Anshu Memorial Academy ::', 'description' => 'Anshu Memorial Academy CBSE Pattern Based an English Medium School from Std. Play to 8th.'];
        return view('student/gen/stu_reg', $data);
    }
    public function page()
    {
        $action = $this
            ->request
            ->getPost('action');
        $data = ['title' => ':: Registration | Anshu Memorial Academy ::', 'description' => 'Anshu Memorial Academy CBSE Pattern Based an English Medium School from Std. Play to 8th.'];
        return view('student/stu_ajax_page', $data);
    }

    public function action()
    {
        $action = $this
            ->request
            ->getPost('action');
        //exit($action);
        if ($action == 'regPage') {
            return view('student/ajax/stu_reg');
        } else if ($action == 'reg-success') {
            $reg_num = $this
                ->request
                ->getPost("reg_num");
            return view('student/ajax/stu_reg_suc', ['reg_num' => $reg_num]);
        }
    }

    public function action2()
    {
        $resData = [];
        $error = [];

        if (
            $this
            ->request
            ->getMethod() == 'post'
        ) {
            // exit("exit");
            $action = $this
                ->request
                ->getPost('action');
            // exit($action);
            if ($action == 'regData') {
                $form_valid = $this
                    ->validation
                    ->run($this
                        ->request
                        ->getPost(), 'stu_reg');

                if (!$form_valid) {
                    $error['invalid'] = $this
                        ->validation
                        ->listErrors();
                }
                // exit;
                $data = [];
                foreach ($this
                    ->request
                    ->getPost() as $k => $v) {
                    $data[$k] = ucwords(strtolower($v));
                }
                $data['dob'] = date("Y-m-d", strtotime($data['dob']));
                $data['email'] = strtolower($data['email']);
                // get incoming file
                $imgFile = $this
                    ->request
                    ->getFile('student_image');

                //echo '<pre>';var_dump($imgFile);exit;
                //echo '<pre>';var_dump($data);exit;
                // registration number
                $regNum = time();
                $resData['regNum'] = $regNum;
                // file directory
                //$this->img_dir = 'students_docs/students_img2';
                // new image name
                $img_new_name = $regNum . '_img_' . uniqid() . '.' . $imgFile->guessExtension();
                // check file
                if ($imgFile->isValid() && !$imgFile->hasMoved()) {
                    // upload file
                    if ($imgFile->move($this->img_dir, $img_new_name)) {
                        // set path in variable
                        $path = $this->img_dir . '/' . $img_new_name;
                    };
                }

                $data['reg_num'] = $regNum;

                $data['student_img'] = $path;

                // create model instance
                $student = new StudentModel;
                // save data
                if ($r = $student->save($data)) {

                    $resData['success'] = true;
                    //$session->setFlashdata('success', 'Successful Registration');
                    //return redirect()->to(site_url());

                } else {
                    $resData['success'] = false;
                };
                //var_dump($r);
                //echo
                $resData['lastQuery'] = $this
                    ->db
                    ->getLastQuery();
                ///return json_encode($resData);
                return $this
                    ->response
                    ->setJSON($resData);
                //var_dump($resData);

            }
        }
    } // action2

    function login()
    {
        echo 'Login page';
    }
}
