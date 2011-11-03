<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('nyauth');
    }
    
	public function index()
	{
        $this->login_form = 'welcome_message'; // Login form view.
        
	    // Check if user is already authorized.
	    if ($this->nyauth->is_authorized()) :
	        redirect(base_url());
	        
	    // Authenticate user if login post request is set.    
	    elseif ($this->input->post('login-submit')) :
	        if ($this->_authenticate()) :
	            // Action when user is authenticated.
                redirect('secret');
                
	        else :
	            // Action when authentication fails.
	            $this->load->view(
	                $this->login_form,
	                array(
	                   'is_error' => TRUE,
	                   'error_msg' => 'Wrong username or password.'
	                )
	            );
	        endif;
	        
	    // Otherwise display login form.
	    else :
		    $this->load->view($this->login_form);
		endif;
	}
	
	public function logout()
	{
	    $this->nyauth->deauthorize();
	    redirect(base_url());
	}
	
	private function _authenticate()
	{
        // Validate user credentials. POST data avaliable in the model.
        $validate = $this->nyauth->validate();
	    if ($validate) :
            $this->nyauth->authorize($validate);
	        return true;
	        
	    else :
	        return false;
	    endif;
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */