<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('user_model');
      $this->load->model('student_model');

  }

  public function register()
  {
    $validator = array('success' => false, 'messages' => array());
    $validate_data = array(
      array(
        'field' => 'fname',
        'label' => 'Name',
        'rules' => 'required'
      ),
      array(
        'field' => 'spassword',
        'label' => 'Password',
        'rules' => 'required|matches[spassword2]'
      ),
      array(
        'field' => 'spassword2',
        'label' => 'Pass Confirmation',
        'rules' => 'required'
      ),
      array(
        'field' => 'semail',
        'label' => 'Email',
        'rules' => 'required|is_unique[users.email]'
      ),
    );

    $this->form_validation->set_rules($validate_data);
    $this->form_validation->set_message('is_unique', 'The {field} already exists');
    $this->form_validation->set_message('integer', 'The {field} must be number');
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if($this->form_validation->run() === true) {

      $this->student_model->register();

      $validator['success'] = true;
      $validator['messages'] = 'Successfully Registered';
    }
    else {
      $validator['success'] = false;
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
      }
    }

    echo json_encode($validator);
  }

  public function login()
	{
		$validator = array('success' => false, 'messages1' => array());

		$validate_data = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $type = 'student';

    if($this->form_validation->run() === true) {
			$login = $this->user_model->login($email, $password, $type);
      if($login->num_rows() > 0){
        $data  = $login->row_array();
        $sesdata = array(
            'user_id'  => $data['user_id'],
            'user_type' => $data['user_type'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'mname' => $data['mname'],
            'age' => $data['age'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'school' => $data['school'],
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        $validator['success'] = true;
     				$validator['messages1'] = 'pages/dashboard';
     			}
     			else {
     				$validator['success'] = false;
     				$validator['messages1'] = 'Incorrect username/password combination';
     			}
        }else {
        	$validator['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$validator['messages1'][$key] = form_error($key);
        	}
        }

       		echo json_encode($validator);
      }

  public function logout()
	{
		$this->session->sess_destroy();
		header('location: ' . base_url());
	}

  public function get_teacher() {

    $query = $this->student_model->get_teacher();

    echo json_encode($query);
  }

  public function update_profile() {
    $query = $this->student_model->update_profile();
    echo json_encode($query);

  }

  public function add_teacher() {
    // redirect($this->uri->uri_string());

    $userID = $this->session->userdata('user_id');
    $difficulty = $this->input->post('id_c');
    // $data1 = array(
    //       'teacher_id' => $difficulty
    // );
    //
    // $this->db->where('id', $userID);
    // $query = $this->db->update('student_user', $data1);

    $data2 = array(
          'teacher_id' => $difficulty,
          'student_id' => $userID
    );
  $query = $this->db->insert('teacher_students', $data2);

    echo json_encode($query);
  }

  public function teacher_students() {
    $userID = $this->session->userdata('user_id');
    $this->db->where_in('student_id', $userID);
    $query = $this->db->get('teacher_students');

    $res =  $query->result();
    echo json_encode($res);
  }

  public function get_student_data() {
    $userID = $this->session->userdata('user_id');
    $game = $this->input->post('c_game');
    $this->db->where_in('student_id', $userID);
    $this->db->where_in('game_difficulty', $game);
    $query = $this->db->get('game_progress');

    $res =  $query->result();
    echo json_encode($res);
  }

  public function view_teacher() {
    $teacher = $this->input->post('teachID');
    $this->db->select("*");
    $this->db->from("users");
    $this->db->where("user_id", $teacher);
    $query = $this->db->get();

    $res = $query->result();
    echo json_encode($res);

  }

  public function remove_teacher() {
    $teacher = $this->input->post('teachID');
    $userID = $this->session->userdata('user_id');
    // $data1 = array(
    //       'teacher_id' => NULL
    // );
    // $this->db->where_in('id', $userID);
    // $this->db->where_in('id', $teacher);
    // $query = $this->db->update('student_user', $data1);



    $this->db->where('student_id', $userID);
    $this->db->where_in('teacher_id', $teacher);
    $query = $this->db->delete('teacher_students');

    echo json_encode($query);

  }

  public function check_progress() {
    $userID = $this->session->userdata('user_id');
    $this->db->from('game_progress');
    $this->db->where('student_id', $userID);
    $query = $this->db->get();

    $res = $query->result();

    echo json_encode($res);

  }

  public function insert_progress() {
    $this->student_model->insert_progress();
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

            $result= $this->student_model->update_image($image);
            echo json_decode($result);
        }
  }

  public function home()
  {
    $this->load->library('session');
    $this->load->view('pages/student_dashboard');
  }

	public function profile()
  {
    $this->load->view('pages/student_profile');
  }

  public function courses()
  {
    $this->load->view('pages/student_courses');
  }

  public function rankings()
  {
    $this->load->view('pages/student_rankings');
  }

  public function novice_c()
  {
    $this->load->view('pages/novice_c');
  }
}
