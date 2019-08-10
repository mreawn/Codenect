<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

   public function __construct()
   {
     parent::__construct();
     $this->load->library('form_validation');
     $this->load->library('session');
     $this->load->model('user_model');
     $this->load->model('teacher_model');

   }

   public function register()
   {
     $validator = array('success' => false, 'messages2' => array());
     $validate_data = array(
       array(
         'field' => 'tfname',
         'label' => 'Name',
         'rules' => 'required'
       ),
       array(
         'field' => 'tpassword',
         'label' => 'Password',
         'rules' => 'required|matches[tpassword2]'
       ),
       array(
         'field' => 'tpassword2',
         'label' => 'Pass Confirmation',
         'rules' => 'required'
       ),
       array(
         'field' => 'temail',
         'label' => 'Email',
         'rules' => 'required|is_unique[users.email]'
       ),
     );

     $this->form_validation->set_rules($validate_data);
     $this->form_validation->set_message('is_unique', 'The {field} already exists');
     $this->form_validation->set_message('integer', 'The {field} must be number');
     $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

     if($this->form_validation->run() === true) {

       $this->teacher_model->register();

       $validator['success'] = true;
       $validator['messages2'] = 'Successfully Registered';
     }
     else {
       $validator['success'] = false;
       foreach ($_POST as $key => $value) {
         $validator['messages2'][$key] = form_error($key);
       }
     }

     echo json_encode($validator);
   }

   public function login()
 	{
 		$validator = array('success' => false, 'messages3' => array());

 		$validate_data = array(
 			array(
 				'field' => 'temail',
 				'label' => 'Email',
 				'rules' => 'required'
 			),
 			array(
 				'field' => 'tpassword',
 				'label' => 'Password',
 				'rules' => 'required'
 			)
 		);

 		$this->form_validation->set_rules($validate_data);
 		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

     $email = $this->input->post('temail');
     $password = $this->input->post('tpassword');
     $type = 'teacher';

     if($this->form_validation->run() === true) {
 			$login = $this->user_model->login($email, $password, $type);
       if($login->num_rows() == 1){
         $data  = $login->row_array();
         $sesdata = array(
             'user_id'  => $data['user_id'],
             'user_type' => $data['user_type'],
             'fname' => $data['fname'],
             'logged_in' => TRUE
         );
         $this->session->set_userdata($sesdata);
         $validator['success'] = true;
      				$validator['messages3'] = 'pages/dashboard';
      			}
      			else {
      				$validator['success'] = false;
      				$validator['messages3'] = 'Incorrect username/password combination';
      			}
         }else {
         	$validator['success'] = false;
         	foreach ($_POST as $key => $value) {
         		$validator['messages3'][$key] = form_error($key);
         	}
         }

        		echo json_encode($validator);
       }

   public function logout()
   {
     $this->session->sess_destroy();
     header('location: ' . base_url());
   }

   public function get_students() {
     $userID = $this->session->userdata('user_id');

     $this->db->where('teacher_id', $userID);
     $query = $this->db->get('teacher_students');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   public function get_students_progress_c() {
     $userID = $this->session->userdata('user_id');
     $studID = $this->input->post('studID');
     $this->db->where('student_id', $studID);
     $this->db->where("CONCAT('',game_difficulty) LIKE '%c_%'");
     $query = $this->db->get('game_progress');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   public function get_students_progress_java() {
     $userID = $this->session->userdata('user_id');
     $studID = $this->input->post('studID');
     $this->db->where('student_id', $studID);
     $this->db->where("CONCAT('',game_difficulty) LIKE '%java_%'");
     $query = $this->db->get('game_progress');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   public function student_data() {
     $studID = $this->input->post('studID');
     $this->db->where('user_id', $studID);
     $this->db->where('user_type', 'student');
     $query = $this->db->get('users');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   function get_student() {

     $query = $this->teacher_model->get_student();

     echo json_encode($query);
   }

   function add_student() {

     $userID = $this->session->userdata('user_id');
     $difficulty = $this->input->post('id_c');

     $data2 = array(
           'teacher_id' => $userID,
           'student_id' => $difficulty
     );
     $query = $this->db->insert('teacher_students', $data2);
     echo json_encode($query);
   }

   function update_profile() {
     $query = $this->teacher_model->update_profile();
     echo json_encode($query);

   }

   function remove_student() {
     $query = $this->teacher_model->remove_student();

     echo json_encode($query);
   }

   public function update_image() {
     // $config['upload_path']= FCPATH.'upload/';
     // $config['allowed_types']='gif|jpg|png';
     // $config['encrypt_name'] = TRUE;
     //
     // $this->load->library('upload',$config);
     // if($this->upload->do_upload("file")){
     //     $data = array('upload_data' => $this->upload->data());
     //
     //     $image= $data['upload_data']['file_name'];
     //
     //     $result= $this->student_model->update_image($image);
     //     echo json_decode($result);
     // }
     $config['upload_path']=FCPATH.'upload/';
         $config['allowed_types']='gif|jpg|png';
         $config['encrypt_name'] = TRUE;

         $this->load->library('upload',$config);
         if($this->upload->do_upload("file")){
             $data = $this->upload->data();

             //Resize and Compress Image
             $config['image_library']='gd2';
             $config['source_image']=FCPATH.'upload/'.$data['file_name'];
             $config['create_thumb']= FALSE;
             $config['maintain_ratio']= FALSE;
             $config['quality']= '60%';
             $config['width']= 600;
             $config['height']= 400;
             $config['new_image']= FCPATH.'upload/'.$data['file_name'];
             $this->load->library('image_lib', $config);
             $this->image_lib->resize();

             $image= $data['file_name'];

             $result= $this->teacher_model->update_image($image);
             echo json_decode($result);
         }
   }

}
