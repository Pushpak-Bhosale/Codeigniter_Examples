<!DOCTYPE html>
<html>
<head>
	<title>Article List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/custom.css');?>">
	<script src="<?php echo base_url('assets/bootstrap/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/popper.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/bootstrap.min.js');?>"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="<?= base_url(); ?>Users/index">Blog</a>
		<a class="navbar-brand" href="<?= base_url(); ?>Login/index">Admin Login</a>
		<a class="navbar-brand" href="<?= base_url(); ?>Examples/dropdown">Drop Down</a>
		<a class="navbar-brand" href="<?= base_url(); ?>Examples">Encryption</a>
		<a class="navbar-brand" href="<?= base_url(); ?>Examples/useragent">Useragent</a>
		<a class="navbar-brand" href="<?= base_url(); ?>Shop">Shop</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
		</div>
	</nav>
	<div class="container-fluid">
		<div class="content-wrapper">   
			<div class="item-container">
				<div class="container"> 
					<h2>Products</h2><br><br><br>
					<a href="<?php echo base_url('cart');?>" class="cart-link" title="View Cart">
						<span class="float-right">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
							(<?php echo $this->cart->total_items();?>)
						</span>
					</a>
					<div class="row">
						<?php if(!empty($products)) { ?>
							<?php foreach ($products as $row ) { ?> 
								<div class="col-lg-6">
									<div class="thumbnail">
										<img src="<?php echo base_url('assets/e5.jpg');?>" alt="">
										<div class="caption">
											<h4 class=""><?php echo $row['name'];?></h4>
											<h4 class=""><?php echo $row['price'];?>USD</h4>
											<p><?php echo $row['description'];?></p>
										</div>
										<div class="atc">
											<a href="<?php echo base_url('Shop/addToCart/'.$row['id']);?>" class="btn btn-success">Add to cart
											</a>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div> 
			</div>
		</div>
	</div>
</body>
</html>


