<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class NYAuth {
    var $CI;
    
    public function __construct()
    {
        log_message('debug', "Session Class Initialized");
        
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library('session');
		$this->CI->load->config('nyauth', TRUE);
    }
    
    /*
    * authorize
    *
    * @params array
    * @return void
    */
    public function authorize($arrData)
    {
        // Create session, cookie etc.
        $arrNewData = array(
            'userid'      => $arrData[$this->CI->config->item('userid', 'nyauth')],
            'username'    => $arrData[$this->CI->config->item('username', 'nyauth')],
            'is_loggedin' => TRUE
        );
        
        $this->CI->session->set_userdata($arrNewData);
    }
    
    /*
    * deauthorize
    *
    * @return void
    */
    public function deauthorize()
    {
        $this->CI->session->sess_destroy();
    }
    
    /*
    * is_authorized
    *
    * @return bool
    */
    public function is_authorized()
    {
        if ($this->CI->session->userdata('is_loggedin')) :
            return true;
        else :
            return false;
        endif;
    }
    
    /*
    * validate
    *
    * @return bool
    */
    public function validate()
    {
        $query = $this->CI->db->get_where(
            $this->CI->config->item('users_table', 'nyauth'),
            array(
                $this->CI->config->item('username', 'nyauth') => $this->CI->input->post(
                    $this->CI->config->item('username_input', 'nyauth')
                )
            ),
            1
        );
        
        if ($query->num_rows() > 0) :
            $arrR = $query->row_array();
            
            $hash = $this->_hash_password(
                $this->CI->input->post($this->CI->config->item('password_input', 'nyauth')),
                $arrR[$this->CI->config->item('salt', 'nyauth')]
            );
            
            return ($arrR[$this->CI->config->item('password', 'nyauth')] == $hash) ? $arrR : false;
        endif;
        
        return false;
    }
    
    /*
    * _hash_password
    *
    * @return string
    */
    private function _hash_password($password, $salt)
    {
        return hash(
            $this->CI->config->item('hash_algo', 'nyauth'), 
            $password . $salt
        );
    }
    
    /*
    * _generate_salt
    *
    * @return string
    */
    private function _generate_salt()
    {
        return hash(
            $this->CI->config->item('hash_algo', 'nyauth'),
            base64_encode(mt_rand().time())
        );
    }
}

/* End of file Login.php */