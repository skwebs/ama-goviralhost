<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $stu_reg = [
		'student_name'=>[
		'label'=>'Student Name',
		'rules'=>'required|alpha_space'
		],
		'mother_name'=>[
		'label'=>'Mother Name',
		'rules'=>'required|alpha_space'
		],
		'father_name'=>[
		'label'=>'Father Name',
		'rules'=>'required|alpha_space'
		],
		'gender'=>[
		'label'=>'Gender',
		'rules'=>'required'
		],
		'dob'=>[
		'label'=>'Date of Birth',
		'rules'=>'required'
		],
		'mobile'=>[
		'label'=>'Mobile Number',
		'rules'=>'required|numeric|exact_length[10]'
		],
		'email'=>[
		'label'=>'Email',
		'rules'=>'required|valid_email'
		]
		,
		'aadhaar' => [
		'label'=>'Aadhaar',
		'rules'=>'permit_empty|numeric|exact_length[12]'
		],
		'category'=>[
		'label'=>'Category',
		'rules'=>'required'
		],
		'religion'=>[
		'label'=>'Religion',
		'rules'=>'required'
		],
		'address1'=>[
		'label'=>'Local Address',
		'rules'=>'required'
		],
		'address2'=>[
		'label'=>'Permanent Address',
		'rules'=>'required'
		],
		'contact_person'=>[
		'label'=>'Contact Person',
		'rules'=>'required'
		],
		'cp_name'=>[
		'label'=>'Contact Person Name',
		'rules'=>'required_with[Other]'
		],
		'cp_rel'=>[
		'label'=>'Contact Person Relation',
		'rules'=>'required_with[Other]'
		],
		'mother_occup'=>[
		'label'=>'Mother Occupation',
		'rules'=>'required|alpha_numeric_punct'
		],
		'mother_qual'=>[
		'label'=>'Mother Qualification',
		'rules'=>'required|alpha_numeric_space'
		],
		'mother_mob'=>[
		'label'=>'Mother Mobile Number',
		'rules'=>'required|numeric'
		],
		'father_occup'=>[
		'label'=>'Father Occupation',
		'rules'=>'required|alpha_space'
		],
		'father_qual'=>[
		'label'=>'Father Qualification',
		'rules'=>'required|alpha_numeric_space'
		],
		'father_mob'=>[
		'label'=>'Father Mobile Number',
		'rules'=>'required|numeric'
		],
		'income'=>[
		'label'=>'Family Income',
		'rules'=>'required|numeric'
		]
	];



}