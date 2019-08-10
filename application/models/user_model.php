<?php

class User_model extends CI_Model
{

  public function login($email, $password, $type)
  {
      $this->db->select("*");
      $this->db->from("users");
      $this->db->WHERE('email', $email);
      $this->db->WHERE('password', $password);
      $this->db->WHERE('user_type', $type);
      $this->db->LIMIT(1);
      $query = $this->db->get();
      return $query;
  }

	public function fetchDataByEmail($email = null)
	{
		if($email) {
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql, array($email));
			$result = $query->row_array();

			return ($query->num_rows() == 1) ? $result : false;
			return $result;
		}
	}

	 public function fetchUserData($user_id = null)
	{
		if($user_id) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($user_id));
			$result = $query->row_array();

			return $result;
		}
	}

}

?>
