<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function index() {
		if ($this->session->userdata('user_type') === 'student') {
			$this->load->view('pages/student_dashboard');
		} elseif ($this->session->userdata('user_type') === 'teacher') {
			$this->load->view('pages/teacher_dashboard');
		} else {
			$this->load->view('pages/index');
		}
	}

}
