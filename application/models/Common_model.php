<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Common_model
 *
 * @author dhar
 */
class Common_model extends CI_Model {

    public function __construct() {
         
    }
     function make_capcha()
     {
         $this->load->helper('captcha');
         $capcha_word= mt_rand(10000, 99999);
         $this->session->set_userdata('capcha_word',$capcha_word);
         
         $vals = array(
            'word'          =>  $capcha_word,
            'img_path'      => getcwd(). '/asset/captcha/',
            'img_url'       => base_url('asset/captcha'),
            'img_width'     => '81',
            'img_height'    => 24,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 15,
            'img_id'        => 'anti_aunty',
            'pool'          => '0123456789',

            // White background and border, black text and red grid
            'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 225),
                    'grid' => array(255, 255, 255)
            )
        );

        return create_captcha($vals);
     }
    function get_key_val_array($table,$key,$val,$where=array(),$first_text='')
    {
        $this->db->select($key.",".$val)
                ->from($table)->order_by($val);
        if(count($where)>0)
        {
            $this->db->where($where);
        }
        $out=array(''=>$first_text);
        foreach ( $this->db->get()->result() as $rw)
        {
           $out[$rw->$key] = $rw->$val;
        }
        return $out;
    }
    function check_login()
    {
        $user= ($this->session->has_userdata('user'))?$this->session->userdata('user'):null;
         if(!isset($user->id)){
             redirect(base_url('index.php/login/index'));
         }
    }
}
