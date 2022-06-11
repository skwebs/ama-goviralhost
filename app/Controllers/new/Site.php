<?php

namespace App\Controllers;

class Site extends BaseController
{
	public function index()
	{
		$data = [
			'title' => ':: Home | Anshu Memorial Academy ::',
			'description' => 'Anshu Memorial Academy CBSE Pattern Based an English Medium School from Std. Play to 8th'
		];
		return view('site/home', $data);
	}

	public function index2()
	{
		$data = [
			'name' => 'Anshu Memorial Academy',
			'mobile' => 9973757920,
			'email' => 'satishnaucera@gmail.com',
			'subject' => 'Subject',
			'message' => 'Anshu Memorial Academy'
		];
		return view('email-templates/ama-cont-form-email', $data);
	}

	public function submitContacForm()
	{

		
			// if user logged in then process to complete profile
			$validation = $this->validate([
				'name'=>['rules'=>'required|min_length[3]|max_length[30]'],
				'mobile' => ['rules' => 'required|numeric|exact_length[10]'],
				'email' 	=> ['rules' => 'required|valid_email'],
				'subject' 		=> ['rules' => 'required|min_length[5]|max_length[50]'],
				'message' 	=> ['rules' => 'required|min_length[10]|max_length[100]|alpha_numeric'],
			]);
			// check data validated or not
			if (!$validation) {
				// if form data is not validated
				$this->data['success'] = false;
				foreach ($this->validator->getErrors() as $error) {
					$this->message .= '' . $error;
				}
			}else{
				if ($this->request->getMethod() == 'post') {
			
					$post = $this->request->getPost();
					$data = [
						'name' => ucwords($post['name']),
						'mobile' => $post['mob'],
						'email' => $post['email'],
						'subject' => ucfirst($post['sub']),
						'message' => ucfirst($post['msg'])
					];
		
					$subject =
						$htmlMsg = '';
					$htmlMsg .= $data['name'] . ' has filled up contact form on website with following details: <br/>';
					$htmlMsg .= '<table>
						<tr><td><strong>Name</strong> </td><td><strong>:</strong></td><td>' . $data['name'] . '</td></tr>
						<tr><td><strong>Mobile</strong> </td><td><strong>:</strong></td><td>' . $data['mobile'] . '</td></tr>
						<tr><td><strong>Email</strong> </td><td><strong>:</strong></td><td>' . $data['email'] . '</td></tr>
						<tr><td><strong>Subject</strong> </td><td><strong>:</strong></td><td>' . $data['subject'] . '</td></tr>
						<tr><td><strong>Message</strong> </td><td><strong>:</strong></td><td>' . $data['message'] . '</td></tr>
						</table>';
		
					//'Your have registered in Naucera. Your username : <strong>' . $post['email'] . '</strong> and password : <strong>' . $password . '<strong>';
					// Init email instance
					$email2admin = \Config\Services::email();
					$email2admin->setFrom('emailserver@anshumemorial.in', 'Anshu Memorial Academy');
					$email2admin->setTo('anshumemorial@gmail.com');
					// $email2admin->setCC('another@another-example.com');
					// $email2admin->setBCC('them@their-example.com');
					$email2admin->setSubject($data['subject']);
					$email2admin->setMessage($htmlMsg);
					// if need to attach any file uncomment below line 
					// $filename = '/img/yourPhoto.jpg'; //you can use the App patch 
					// $email2admin->attach($filename);
		
					if ($email2admin->send()) {
		
						// Init email instance
						$email2user = \Config\Services::email();
						$email2user->setFrom('emailserver@anshumemorial.in', 'Anshu Memorial Academy');
						$email2user->setTo($data['email']);
						// $email2user->setCC('another@another-example.com');
						// $email2user->setBCC('them@their-example.com');
						$email2user->setSubject('About your contact form submition confirmation');
						$email2user->setMessage(view('email-templates/ama-cont-form-email', $data));
						// if need to attach any file uncomment below line 
						// $filename = '/img/yourPhoto.jpg'; //you can use the App patch 
						// $email2user->attach($filename);
		
						if ($email2user->send()) {
							$session = session();
							$session->setFlashdata('success', 'Hi ' . $data['name'] . ', thank you for contacting us. We sent you a confirmation email to ' . $data['email']);
							return redirect()->to(site_url()); // echo 'mail sent to ' . $data['email'];
						} else {
							$e = $email2user->printDebugger(['headers']);
							print_r($e);
						}
					} else {
						$e = $email2admin->printDebugger(['headers']);
						print_r($e);
					}
					exit;
				}
			};
		// =================

		
	}
}
