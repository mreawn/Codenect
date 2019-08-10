<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

  public function __construct()
  {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('user_model');
      $this->load->model('student_model');
      $this->load->model('teacher_model');
      $this->load->library('form_validation');
  }

  public function dashboard() {
    $result = $this->student_model->view_students();
    if($result->num_rows() > 0){
      $data  = $result->row_array();
      $data = array(
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
          'image' => $data['image']
      );
    }
    if ($this->session->userdata('user_type') === 'student') {
      $this->load->view('pages/student_dashboard', $data);
    } elseif ($this->session->userdata('user_type') === 'teacher') {
      $this->load->view('pages/teacher_dashboard', $data);
    } else {
      header('location: ' . base_url());
    }
  }

  public function profile() {
    if ($this->session->userdata('user_type') === 'student') {
      $result = $this->student_model->view_students();
      if($result->num_rows() > 0){
        $data  = $result->row_array();
        $data = array(
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
            'image' => $data['image']
        );
      }
      $this->load->view('pages/student_profile', $data);
    } elseif ($this->session->userdata('user_type') === 'teacher') {
      $result = $this->teacher_model->view_teachers();
      if($result->num_rows() > 0){
        $data  = $result->row_array();
        $data = array(
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
            'image' => $data['image']
        );
      }
      $this->load->view('pages/teacher_profile', $data);
    } else {
      header('location: ' . base_url());
    }
  }

  public function courses() {
    if ($this->session->userdata('user_type') === 'student') {
      $result = $this->student_model->view_students();
      if($result->num_rows() > 0){
        $data  = $result->row_array();
        $data = array(
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
            'image' => $data['image']
        );
      }
      $this->load->view('pages/student_courses', $data);
    } elseif ($this->session->userdata('user_type') === 'teacher') {
      $result = $this->teacher_model->view_teachers();
      if($result->num_rows() > 0){
        $data  = $result->row_array();
        $data = array(
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
            'image' => $data['image']
        );
      }
      $this->load->view('pages/teacher_courses', $data);
    } else {
      header('location: ' . base_url());
    }
  }

  public function c_novice() {
    $this->load->view('pages/novice_c');
  }

  public function c_intermediate() {
    $this->load->view('pages/intermediate_c');
  }

  public function c_advance() {
    $this->load->view('pages/advance_c');
  }

  public function java_novice() {
    $this->load->view('pages/novice_java');
  }

  public function java_intermediate() {
    $this->load->view('pages/intermediate_java');
  }

  public function java_advance() {
    $this->load->view('pages/advance_java');
  }

  public function students() {
    $result = $this->teacher_model->view_teachers();
    if($result->num_rows() > 0){
      $data  = $result->row_array();
      $data = array(
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
          'image' => $data['image']
      );
    }
    $this->load->view('pages/teacher_students', $data);
  }

}
?>
