<?php

class Student_model extends CI_Model
{
  // public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->library('session');
	// }

  public function view_students() {
    $userID = $this->session->userdata('user_id');

    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('user_id', $userID);
    $query = $this->db->get();

    return $query;

  }

  public function register()
	{

    $email = $this->input->post('semail');
    $password = $this->input->post('spassword');
    $fname = $this->input->post('fname');
    $utype = 'student';

		$insert_data = array(
      'email' => $email,
			'fname' => $fname,
			'password' => $password,
      'user_type' => $utype
		);

		$this->db->insert('users', $insert_data);
    $this->register_game_progress($email);
	}

    public function register_game_progress($email) {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('email', $email);
    $student_id = 0;
    $query = $this->db->get();
    foreach ($query->result() as $row)
    {
            $student_id = $row->user_id;
    }

    $data = array(
         array(
                 'student_id' => $student_id,
                 'gametime' => '0',
                 'game_difficulty' => 'c_novice',
                 'game_status' => 'ongoing',
                 'game_progress' => '0',
                 'game_mistakes' => '0'

         ),
         array(
                 'student_id' => $student_id,
                 'gametime' => '0',
                 'game_difficulty' => 'c_intermediate',
                 'game_status' => 'ongoing',
                 'game_progress' => '0',
                 'game_mistakes' => '0'

         ),
         array(
                 'student_id' => $student_id,
                 'gametime' => '0',
                 'game_difficulty' => 'c_advance',
                 'game_status' => 'ongoing',
                 'game_progress' => '0',
                 'game_mistakes' => '0'

         ),
         array(
                 'student_id' => $student_id,
                 'gametime' => '0',
                 'game_difficulty' => 'java_novice',
                 'game_status' => 'ongoing',
                 'game_progress' => '0',
                 'game_mistakes' => '0'

         ),
         array(
                 'student_id' => $student_id,
                 'gametime' => '0',
                 'game_difficulty' => 'java_intermediate',
                 'game_status' => 'ongoing',
                 'game_progress' => '0',
                 'game_mistakes' => '0'

         ),
         array(
                 'student_id' => $student_id,
                 'gametime' => '0',
                 'game_difficulty' => 'java_advance',
                 'game_status' => 'ongoing',
                 'game_progress' => '0',
                 'game_mistakes' => '0'

         )

     );

     $this->db->insert_batch('game_progress', $data);

  }

  // public function fetchDataByEmail($email = null)
	// {
	// 	if($email) {
	// 		$sql = "SELECT * FROM student_user WHERE email = ?";
	// 		$query = $this->db->query($sql, array($email));
	// 		$result = $query->row_array();
  //
	// 		return ($query->num_rows() == 1) ? $result : false;
	// 		return $result;
	// 	}
	// }

  // public function fetchUserData($userId = null)
	// {
	// 	if($userId) {
	// 		$sql = "SELECT * FROM student_user WHERE id = ?";
	// 		$query = $this->db->query($sql, array($userId));
	// 		$result = $query->row_array();
  //
	// 		return $result;
	// 	}
	// }

  function get_teacher() {

    $this->db->select("*");
    $this->db->from("users");
    $this->db->where('user_type', 'teacher');
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

  function insert_progress() {
    $data = array(
     array(
        'student_id' => $this->session->userdata('user_id') ,
        'gametime' => '0' ,
        'game_difficulty' => 'c_novice' ,
        'game_status' => 'ongoing' ,
        'game_progress' => '0' ,
        'game_mistakes' => '0'

     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'c_intermediate' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'c_advance' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'java_novice' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'java_intermediate' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'java_advance' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     )
  );

  $this->db->insert_batch('game_progress', $data);
  }

}


?>
