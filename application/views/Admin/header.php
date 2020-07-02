<!DOCTYPE html>
<html>
<head>
	<title>Article List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.min.css');?>">
	<script src="<?php echo base_url('assets/bootstrap/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/popper.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/bootstrap.min.js');?>"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">Admin Panel</a>
			<?php
			if($this->session->userdata('id'))
			{
				?>
				<a href="<?= base_url('Admin/logout');?>" class="btn btn-danger">Logout</a> 
				<?php
			}
			?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
		</nav>