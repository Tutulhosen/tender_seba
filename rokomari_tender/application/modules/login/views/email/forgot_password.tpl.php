<html>
<body>
	<p>Date: <?= date('d-m-Y H:i:s') ?></p>
	<h1><?php echo sprintf(lang('email_forgot_password_heading'), $identity);?></h1>
	<p>Click the following button:</p>
	<button><?= anchor('reset_password/index/'.$forgotten_password_code, lang('email_forgot_password_link')) ?></button>
	<p>Or</p>
	<p><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('reset_password/index/'.$forgotten_password_code, lang('email_forgot_password_link')));?></p>
</body>
</html>