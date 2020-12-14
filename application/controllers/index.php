<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author dhar
 */
class index extends CI_Controller{
     function __construct() {
        parent::__construct();
        $this->load->model('Common_model','mod');
     }
     function index()
     {
         $this->load->helper('form');
         $data=array('title'=>'Registration Form');
         $data['page']='registration';
          
         if ($this->input->server('REQUEST_METHOD') == 'POST'  ) {
              $this->load->library('form_validation');
              $this->load->library('MY_Form_validation');
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[50]');
                $this->form_validation->set_rules('guardians_name', 'Guardian’s name', 'required|min_length[3]|max_length[50]');
                $this->form_validation->set_rules('gender', 'Gender', 'required|exact_length[1]');
                $this->form_validation->set_rules('dob', 'D.O.B.', 'required|exact_length[10]');
                $this->form_validation->set_rules('age', 'Age', 'required|integer|max_length[3]');
                $this->form_validation->set_rules('district_id', 'District', 'required|integer|max_length[2]');
                $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|min_length[10]|max_length[13]|integer');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('anti_spamm', 'Security Text', 'required|capcha_validation');
                if ($this->form_validation->run() == TRUE and $_FILES['photo']['error'] == 0 )
                {
                    $record=$this->input->post();
                    $record['dob'] = date('Y-m-d', strtotime(str_replace('/', '-', $record['dob'])));
                    $record['registration_date'] = date("Y-m-d H:i:s");
                    $this->load->helper('MY_helper');
                    $record['photo']=file_upload('photo','asset/uploads');
                   // echo $this->security->get_csrf_token_name();
                    unset($record[$this->security->get_csrf_token_name()]);
                    unset($record['anti_spamm']);
                   // print_r($record);
                    $this->db->trans_start();
                    $this->db->insert('registration',$record);
                    $insert_id = $this->db->insert_id();
                    $data['code']="WB".date('Y'). getRandomString(3).substr(str_repeat(0, 7).$insert_id, - 7);
                    $this->db->where('id',$insert_id)->update('registration',array('code'=>$data['code']));
                    $this->db->trans_complete();
                    $data['page']='confirming';
                    $data['title']='Registration confirmation';
                    $data['record']=$record;
                    
                }
                else
                {
                    
                     
                }
         }
         
         
         if($data['page']=='registration')
         {
            $data['districts']=$this->mod->get_key_val_array('district','id','name',array('status'=>1),'Please select District  *');
            $data['capcha']=$this->mod->make_capcha(); 
         }
         
          
         $this->load->view('body',$data); 
     }
    
     function get_captcha()
     {
        $cap= $this->mod->make_capcha();
        
        echo $cap['image'];
     }
     function download($code)
     {
        $row= $this->db->select('r.*,d.name as district')
                 ->from('registration as r')
                ->join('district as d','d.id=r.district_id')
                 ->where(array('r.code'=>$code))
                 ->get()->row();
        if(isset($row->id))
        {
              $content=$this->load->view('profile_view',$row,true); 
            include_once APPPATH . '/third_party/vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $file_path = 'assets/media/pdf/';
            $file_name =  $code. '.pdf';
             if(file_exists($file_path . $file_name)) {
               @unlink($file_path . $file_name);
             }
              $mpdf->WriteHTML($content);
               $mpdf->SetTitle("Registration information");
               $mpdf->Output( $file_name,\Mpdf\Output\Destination::DOWNLOAD);
        }
     }
}
