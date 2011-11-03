<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secret extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('nyauth');
        
        // Login-check
        if (!$this->nyauth->is_authorized()) :
            redirect('login');
            die();
        endif;
    }
	public function index()
	{
        echo 'This page is secret. Shh! <a href="' . site_url('login/logout') . '">Log Out</a>';
	}
}

/* End of file secret.php */
/* Location: ./application/controllers/secret.php */