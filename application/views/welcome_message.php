<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
<?php
$login_handler_url = base_url('index.php/login');
?>
<?php echo form_open($login_handler_url); ?>
    <?php echo form_fieldset('Login'); ?>
        <?php if (isset($is_error) && $is_error) : ?>
        <p class="error">
            <?php echo $error_msg; ?>
        </p>
        <?php endif; ?>
        <?php echo form_label('Username', 'username'); ?>
        <?php
        echo form_input(
            array(
                'name'        => 'username',
                'placeholder' => 'Username'
            )
        );
        ?>
        <?php echo form_label('Password', 'password'); ?>
        <?php
        echo form_password(
            array(
                'name'        => 'password',
                'placeholder' => 'Password'
            )
        );
        ?>
        <?php echo form_submit('login-submit', 'Login'); ?>
    <?php echo form_fieldset_close();?>
<?php echo form_close();?>
</div>

</body>
</html>