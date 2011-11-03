<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* User database
*
* The name och the database tabel and columns used for storing users.
*/
                                     // Name of the...
$config['users_table'] = 'users';    // ...table containing user credentials.
$config['userid']      = 'id';       // ...id column containing the userid.
$config['username']    = 'username'; // ...username column containing the username.
$config['password']    = 'password'; // ...password column containing the password.
$config['salt']        = 'salt';     // ...salt column containing the salt.

/*
* POST input
*
* The name of the login form input fields.
*/
                                        // Name of the...
$config['username_input'] = 'username'; // ...username inputfield.
$config['password_input'] = 'password'; // ...password inputfield.


/*
* Hash algorithm
*
* What hash algorith to use.
*/
$config['hash_algo'] = 'ripemd160';

/* End of file login.php */
/* Location: ./application/config/login.php */