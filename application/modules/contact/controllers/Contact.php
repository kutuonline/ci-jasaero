<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Contact extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('home/M_home');
		$this->load->model('M_Contact');
		$this->load->library(array('form_validation','email'));
		
		$this->load->library('mathcaptcha');
        $this->mathcaptcha->init();
	}

	function index(){
		$data['math_captcha_question'] = $this->mathcaptcha->get_question();
		
		$data['idHome'] = $this->M_home->getId()->result();
		$this->load->view('contact/contact', $data);
	}

	function actNew(){	
        $this->form_validation->set_rules('math_captcha', 'Math CAPTCHA', 'required|callback__check_math_captcha');

        if ($this->form_validation->run() == FALSE)
        {
        	$data['math_captcha_question'] = $this->mathcaptcha->get_question();
        	$data['idHome'] = $this->M_home->getId()->result();
			$this->load->view('contact/contact', $data);
		}
		else {

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
	}

	function _check_math_captcha($str) {
    	if ($this->mathcaptcha->check_answer($str))
    	{
        	return TRUE;
    	}
    	else
    	{
        	$this->form_validation->set_message('_check_math_captcha', 'Enter a valid math captcha response.');
        	return FALSE;
    	}
 	}

}
?>