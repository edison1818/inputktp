<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_login');
        $this->load->model('m_data');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper( array('captcha', 'url'));

    }


    public function index()
    {
        if($this->m_login->logged_id())
        {
            redirect("admin/overview");
        }else{
            //jika session belum terdaftar
            //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('input_captcha', 'Captcha', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //CEK CAPTCHA YANG DIINPUT        
                if($this->input->post('input_captcha') != $this->session->userdata('captcha_str')) {
                    $response = array(
                        'status' => 'gagalcaptcha'
                    );
                        echo json_encode($response);


                //

                //Jika Captcha benar
                } else {    

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password =$this->input->post('password', TRUE);
                //Pengacak Pass
                $pengacak = "AJWKXLAJSCLWLW";//Pengajak Password bukan hanya MD5
                //

                //checking data via model
                $checking = $this->m_login->check_login('tbl_user', 
                array('username' => $username), 
                array('password' => (md5($pengacak . md5($password) . $pengacak))));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {
                    
                      if($apps->status_user == 1)
                      {
                        $session_data = array(
                            'user_id'   => $apps->id_user,
                            'level'     => $apps->id_level_user,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                            'nama_user' => $apps->nama_user,
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect('admin/overview/');
                        $response = array(
                        'status' => 'success'
                    );
                        echo json_encode($response);
                    
                
                //  

                      } else {
                        $response = array(
                        'status' => 'gagaluserlog'
                    );
                        echo json_encode($response);
                    }
                }

                    
                }else{
                    $response = array(
                        'status' => 'gagal'
                    );
                        echo json_encode($response);

                }
            }


            }else{

             //PENGATURAN CAPTCHA

                //posisi folder untuk menyimpan gambar captcha
                $path = './assets/captcha/';
         
                //membuat folder apabila folder captcha tidak ada
                if ( !file_exists($path) )
                {
                    $create = mkdir($path, 0777);
                    if ( !$create)
                    return;
                }
         
                //Menampilkan huruf acak untuk dijadikan captcha
                $word = array_merge(range('1', '9'), range('A', 'Z'));
                $acak = shuffle($word);
                $str  = substr(implode($word), 0, 5);
         
                //Menyimpan huruf acak tersebut kedalam session
                $data_ses = array('captcha_str' => $str  );
                $this->session->set_userdata($data_ses);
         
                //array untuk menampilkan gambar captcha
                $vals = array(
                    'word'  => $str, //huruf acak yang telah dibuat diatas
                    'img_path'  => $path, //path untuk menyimpan gambar captcha
                    'img_url'   => base_url().'assets/captcha/', //url untuk menampilkan gambar captcha
                    'img_width' => '130', //lebar gambar captcha
                    'img_height' => 48, //tinggi gambar captcha
                    'expiration' => 7200, //expired time per captcha
                    'font_size'  => 16,

                // White background and border, black text and red grid
                'colors'  => array(
                        'background' => array(192, 192, 192),
                        'border' => array(255, 255, 255),
                        'text' => array(0, 0, 0),
                        'grid' => array(255, 255, 255)
                )
                );
         
                $cap = create_captcha($vals);
                $data['captcha_image'] = $cap['image']; //variable array

            //
                $data['profil']=$this->m_data->getProfilApp();

                $this->load->view('login',$data);
            }

        }

    }
    
}