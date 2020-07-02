<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/custom.css');?>">
	<script src="<?php echo base_url('assets/bootstrap/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/popper.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/bootstrap.min.js');?>"></script>
</head>
<body>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<div class="container">
		<h2>Order Preview</h2>
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th class="text-center">Price</th>
							<th class="text-center">Subtotal</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php if($this->cart->total_items() > 0) { ?>
							<?php foreach ($cartItems as $item) { ?>
								<tr>
									<td class="col-sm-8 col-md-6">
										<div class="media">
											<a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo base_url('assets/e5.jpg');?>" style="width: 72px; height: 72px;"> </a>
											<div class="media-body">
												<h4 class="media-heading"><a href="#"><?php echo $item["name"];?></a></h4>
												<h5 class="media-heading"> by <a href="#">Brand name</a></h5>
												<span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
											</div>
										</div>
									</td>
									<td class="col-sm-1 col-md-1" style="text-align: center">
										<?php echo $item["qty"];?>
									</td>
									<td class="col-sm-1 col-md-1 text-center">
										<strong>
											<?php echo $item["price"];?>
										</strong>
									</td>
									<td class="col-sm-1 col-md-1 text-center">
										<strong>
											<?php echo '$'.$item["subtotal"].'USD';?>
										</strong>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
						<tr>
							<td>
								<form class="form-horizontal"  method="post" action="Checkout/checkoutdetails">
									<div class="form-group row">
										<div class="col-12">
											<label for="inputEmail4">Name</label>
											<input type="text" class="form-control"  placeholder="Name" required="" name="name">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12">
											<label for="inputEmail4">Email</label>
											<input type="email" class="form-control"  placeholder="Email" required="" name="email">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12">
											<label for="inputEmail4">Mobile</label>
											<input type="number" class="form-control"  placeholder="Mobile" required="" name="mobile">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12">
											<label for="inputEmail4">Address</label>
											<input type="text" class="form-control"  placeholder="Mobile" required="" name="address">
										</div>
									</div>
									<input type="hidden" name="created" value="<?php echo date("Y-m-d H:i:s");?>">
									<input type="hidden" name="modified" value="<?php echo date("Y-m-d H:i:s");?>">
									<a href="http://localhost/blog/cart" class="btn btn-default">
										<span class="glyphicon glyphicon-shopping-cart"></span> Back To Cart
									</a>
									<button type="submit" class="btn btn-primary" name="">
										Placeorder <span class="glyphicon glyphicon-play"></span>
									</button>
								</form>
							</td>
							<td> </td>
							<td> <h3> Grandtotal </h3> </td>
							<td class="">
								<h3><?php echo '$'.$this->cart->total();?></h3>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

