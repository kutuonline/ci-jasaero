<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
   
class Forgotpass extends CI_Controller {  

	function __construct(){
		parent::__construct();

		$this->load->model('M_Forgotpass');
		$this->load->library(array('form_validation'));
	}   
   
    public function index()  
    {           
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
         
        if($this->form_validation->run() == FALSE) {   
             $this->load->view('forgotpass/forgotpass');  
        }else{  
            $email = $this->input->post('email');   
            $clean = $this->security->xss_clean($email);  
            $userInfo = $this->M_Forgotpass->getUserInfoByEmail($clean);  
               
            if(!$userInfo){  
            	echo "<script>alert('Please type your vallid email.');window.location.href='forgotpass';</script>";
            }    
               
             //build token                          
             $token = $this->M_Forgotpass->insertToken($userInfo->users_id);              
             $qstring = $this->base64url_encode($token);           
             $url = base_url() . '/forgotpass/reset_password/token/' . $qstring;  
             $link = '<a href="' . $url . '">' . $url . '</a>';   
               
             $message = '';             
             $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';  
             $message .= '<strong>Silakan klik link ini:</strong> ' . $link;         
   
             echo $message; //send this through mail  
             exit;  
         }
     }  
   
     public function reset_password()  
     {  
       $token = $this->base64url_decode($this->uri->segment(4));           
       $cleanToken = $this->security->xss_clean($token);  
         
       $user_info = $this->M_Forgotpass->isTokenValid($cleanToken); //either false or array();          
         
       if(!$user_info){  
         $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
         redirect(base_url('auth/auth'),'refresh');   
       }    
   
       $data = array(  
         //'title'=> 'Halaman Reset Password | Tutorial reset password CodeIgniter @ https://recodeku.blogspot.com',  
         'name'=> $user_info->complete_name,   
         'email'=>$user_info->email,   
         'token'=>$this->base64url_encode($token)  
       );  
         
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
       $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
         
       if ($this->form_validation->run() == FALSE) {    
         $this->load->view('forgotpass/resetpass', $data);  
       }else{  
                           
         $post = $this->input->post(NULL, TRUE);          
         $cleanPost = $this->security->xss_clean($post);          
         $hashed = md5($cleanPost['password']);          
         $cleanPost['password'] = $hashed;  
         $cleanPost['users_id'] = $user_info->users_id;  
         unset($cleanPost['passconf']);          
         if(!$this->M_Forgotpass->updatePass($cleanPost)){  
           $this->session->set_flashdata('sukses', 'Update password gagal.');  
         }else{  
           $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');  
         }  
         redirect(base_url('auth/auth'),'refresh');         
       }  
     }  
       
   public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
   }   
   
   public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
   }    
 }  