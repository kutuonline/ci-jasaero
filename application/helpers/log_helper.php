<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*--
0 = login
1 = logout
2 = add data
3 = edit data
4 = delete data
--*/

function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe = 1;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe = 3;
    }
    else{
        $log_tipe = 4;
    }
 
    // parameter
    $param['log_user'] = $CI->session->userdata('complete_name');
    $param['log_tipe'] = $log_tipe;
    $param['log_desc'] = $str;
 
    //load model log
    $CI->load->model('M_log');
 
    //save to database
    $CI->M_log->save_log($param);
 
}