<?php

class Teacher_model extends CI_Model
{
  public function view_teachers() {
    $userID = $this->session->userdata('user_id');

    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('user_id', $userID);
    $query = $this->db->get();

    return $query;

  }

  public function register()
	{

		// $salt = $this->salt();
    //
		// $password = $this->makePassword($this->input->post('spassword'), $salt);

		$insert_data = array(
      'email' => $this->input->post('temail'),
			'fname' => $this->input->post('tfname'),
			'password' => $this->input->post('tpassword'),
      'user_type' => 'teacher'

			// 'salt' => $salt
		);

		$this->db->insert('users', $insert_data);
	}



  function get_student() {

    $studID = $this->input->post('studID');

    $this->db->select("*");
    $this->db->from("users");
    $this->db->where("user_type", 'student');
    $this->db->where_not_in('user_id', $studID);
    $query = $this->db->get();

    return $query->result();
  }

  function update_profile() {
    $userID = $this->session->userdata('user_id');

    $data1 = array(
      'fname' => $this->input->post('fname'),
      'mname' => $this->input->post('mname'),
      'lname' => $this->input->post('lname'),
      'age' => $this->input->post('age'),
      'birthdate' => $this->input->post('bday'),
      'gender' => $this->input->post('gender'),
      'school' => $this->input->post('school'),
      'email' => $this->input->post('email'),

    );
    $this->db->where('user_id', $userID);
    $query = $this->db->update('users', $data1);
  }

  function update_image($image) {
    $userID = $this->session->userdata('user_id');
    $data = array(
      'image' => $image
    );
    $this->db->where('user_id', $userID);
    $result= $this->db->update('users',$data);
    return $result;
  }

  function remove_student() {
    $id = $this->input->post('studID');
    $this->db->where('student_id', $id);
    $this->db->delete('teacher_students');
  }

}


?>
