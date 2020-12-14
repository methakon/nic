<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author dhar
 */
class Admin  extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Common_model','mod');
        $this->mod->check_login();
        $this->user= ($this->session->has_userdata('user'))?$this->session->userdata('user'):null;
     }
     function index()
     {
         $data=array('title'=>'Admin Panel');
         $data['user']= $this->user;
          
         $data['page']='admin/table_view'; 
         $this->load->view('admin/layout',$data); 
     }
     function barchart()
     {
         $data=array('title'=>'Bar chart');
         $data['user']= $this->user;
         $data['bar_chart']=$this->db->select('d.name as district,count(r.id) as count')
                 ->from('registration r')
                 ->join('district d','d.id=r.district_id')
                 ->group_by('r.district_id')
                 ->get()->result();
         $data['page']='admin/barchart';
         $this->load->view('admin/layout',$data); 
     }
     function edit($id)
     {
          $data=array('title'=>'Edit');
          $data['user']= $this->user;
          $data['page']='admin/profile_edit';
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
                if ($this->form_validation->run() == TRUE  )
                {
                    $record=$this->input->post();
                    $id=$record['id'];
                    unset($record['id']);
                    unset($record[$this->security->get_csrf_token_name()]);
                    $record['dob'] = date('Y-m-d', strtotime(str_replace('/', '-', $record['dob'])));
                    if($this->db->where('id',$id)->update('registration',$record))
                    {
                        $this->session->set_flashdata('success', "Record updated Successfully"); 
                    }else{
                        $this->session->set_flashdata('error', "ERROR Occured");
                    }
                     
                    
                }
          }
          $data['row']= $this->db->select('r.*,d.name as district')
                 ->from('registration as r')
                ->join('district as d','d.id=r.district_id')
                 ->where(array('r.id'=>$id))
                 ->get()->row();
          $data['districts']=$this->mod->get_key_val_array('district','id','name',array('status'=>1),'Please select District  *');
          $this->load->helper('form');
          $this->load->view('admin/layout',$data); 
     }
     function view($id)
     {
          $data=array('title'=>'View');
          $data['user']= $this->user;
            
          $data['page']='profile_view';
          $data['row']= $this->db->select('r.*,d.name as district')
                 ->from('registration as r')
                ->join('district as d','d.id=r.district_id')
                 ->where(array('r.id'=>$id))
                 ->get()->row();
          $this->load->view('admin/layout',$data); 
     }
     function get_list()
     {
        $list=array();
        $this->db->select('r.id,r.code,r.name,r.guardians_name,r.gender,r.dob,r.age,d.name as district,r.mobile_no,r.email,r.photo')
                 ->from('registration r')
                 ->join('district d','d.id=r.district_id')
                 ->order_by('r.id'); 
         foreach($this->db->get()->result() as $row)
         {
             $dat= explode('-', $row->dob);
             $list['data'][]=array(
                  $row->code,
                  $row->name,
                  $row->guardians_name,
                  $row->gender,
                  $dat[2].'-'.$dat[1].'-'.$dat[0],
                  $row->age,
                  $row->district,
                  $row->mobile_no,
                  $row->email,
                  '<img src="'.base_url($row->photo).'" height="50px">',
                  ' <a href="'.base_url('index.php/admin/edit/'.$row->id).'" class="btn"><i class="fa fa-edit"></i></a>
                    <a href="'.base_url('index.php/admin/view/'.$row->id).'" class="btn"><i class="fa fa-eye"></i></a>',
             );
         }
         
         echo json_encode($list);
                 
     }
     function excel_download()
     {
         
         $path = FCPATH . 'asset/captcha/';
         $file_name = 'registered_candidates_'. uniqid() . '.xls';
            if(file_exists($path . $file_name)) {
                @unlink($path . $file_name);
            }
        $this->db->select('r.id,r.code,r.name,r.guardians_name,r.gender,r.dob,r.age,d.name as district,r.mobile_no,r.email,r.photo')
                 ->from('registration r')
                 ->join('district d','d.id=r.district_id')
                 ->order_by('r.id'); 
        $content = array();
        foreach($this->db->get()->result() as $row)
         {
             $dat= explode('-', $row->dob);
             $content[]=array(
                  $row->code,
                  $row->name,
                  $row->guardians_name,
                  $row->gender,
                  $dat[2].'-'.$dat[1].'-'.$dat[0],
                  $row->age." Year",
                  $row->district,
                  $row->mobile_no,
                  $row->email,
                  base_url($row->photo),
                  
             );
           
         }
          $this->load->library('PHPXlsx', 'phpxlsx');
          $this->phpxlsx->download('registered',$file_name,array(
            'Code',
            'Name',
            'Guardian’s name',
            'Gender',
            'D.O.B.',
            'Age',
            'District',
            'Mobile No',
            'Email Id',
            'Photo'
        ),$content);
        
     }
}
