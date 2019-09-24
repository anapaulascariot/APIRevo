<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<html>
	<head>
		<title>Welcome Page</title>
	</head>
	<body>

		Welcome <?php echo $this->session->userdata('username'); ?>
		<br>
		<a href="<?php echo site_url('demo/logout'); ?>">Logout</a>

	</body>
</html>