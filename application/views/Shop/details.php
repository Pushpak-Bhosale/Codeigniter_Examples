<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.min.css');?>">
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
		<h2>Shopping Cart</h2>
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
										<input type="number" class="form-control text-center" value="<?php echo $item["qty"];?>" onchange="updateCartItem(this, '<?php echo $item["rowid"];?>')">
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
									<td class="col-sm-1 col-md-1">
										<a class="btn btn-danger" onclick="return confirm('Are You Sure')" href="<?php echo base_url('Cart/removeItem/'.$item["rowid"]);?>">
											<span class="glyphicon glyphicon-remove"></span>Remove 
										</a>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h3>Grand Total</h3></td>
							<td class="text-right"> 
								<h3>
									<strong><?php echo '$'.$this->cart->total();?></strong>
								</h3>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
								<a href="http://localhost/blog/Shop" class="btn btn-default">
									<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
								</a>
							</td>
							<td>
								<a href="<?php echo base_url('Checkout');?>" class="btn btn-success">
									Checkout <span class="glyphicon glyphicon-play"></span>
								</a>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script>
			function updateCartItem(obj,rowid)
			{
				$.get("<?php echo base_url('cart/updateItemQty/');?>",{rowid:rowid,qty:obj.value},function(resp){
					var response = resp;
					if(resp == response){
						location.reload();
					}else{
						alert('Cart Update Failed Try Again');
					}
				})
			}
		</script>
	</body>
	</html>

