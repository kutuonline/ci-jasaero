<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Contact extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_Contact');
		$this->load->library(array('form_validation','Recaptcha','email'));
	}

	function index(){
		/*-- 
		untuk library re-cpatcha
		mohon di enable jika sudah online

		$data = array(
			'action' => site_url('contact/actNew'),
			'fullnm' => set_value('fullNm'),
			'email' => set_value('email'),
			'msg' => set_value('msg'),
			'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
		);
		--*/

		$data['idHome'] = $this->M_home->getId()->result();
		$this->load->view('contact/contact', $data);
	}

	function actNew(){	
		/*--
		validasi form re-captcha
		mohon di enable jika sudah online --

        $this->form_validation->set_rules('fullNm', ' ', 'trim|required');
        $this->form_validation->set_rules('email', ' ', 'trim|required|email');
        $this->form_validation->set_rules('msg', ' ', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
 
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
 
        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $this->index();
        } else {
		--*/ 

		$tglskrg = date("Y-m-d");
		$jamskrg = date("H:i:s");

		$fullnm = $this->input->post('fullNm');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$msg = $this->input->post('msg');
		
		/*-- set for security from xss attack --*/
		$this->security->xss_clean($data = array(
			'full_name' => $fullnm,
			'email' => $email,
			'subject' => $subject,
			'msg' => $msg,
			'post_date_msg' => $tglskrg,
			'post_time_msg' => $jamskrg,
		));

		/*-- 
		sending email using PHPMailer 
		reference: https://github.com/ivantcholakov/codeigniter-phpmailer
		--*/
		$recipient = array('doni.andriansyah@jas-aero.com', 'waskita@jas-aero.com', 'marketing@jas-aero.com', 'ariesta@jas-aero.com');

		$result = $this->email
    		->from($email)
    		//->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
    		->to($recipient)
    		->subject($subject)
    		->message($msg)
    		->send();
    	/*-- end sending email --*/
		
		$this->M_Contact->insertData($data, 'contact');
		echo "<script>alert('Your message has been sent.');window.location.href='contact';</script>";
	}
	//}

}
?>