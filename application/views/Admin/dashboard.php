<?php include ('header.php');?>



<div class="container" style="margin-top: 50px;">
	<h3 class="text-dark">Login Successfully, Welcome To Admin</h3>
	<div class="container" style="margin-top: 50px;">
		<div class="row">
			<a href="<?= base_url(); ?>Admin/adduserarticle" class="btn btn-primary">Add Articles</a>
		</div>
		<div class="container" style="margin-top: 20px;">
			<?php if ($msg=$this->session->flashdata('msg')){
				$msg_class=$this->session->flashdata('msg_class')
				?>
				<div class="row">
					<div class="col-lg-6">
						<div class="alert <?= $msg_class ?>">
							<?php echo "$msg"; ?>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
	<div class="table table-responsive" style="margin-top: 50px;">
		<table class="table table-light">
			<caption>List of articles</caption>
			<thead class="thead-dark">
				<tr>
					<th>S.no</th>
					<th>Article_Title</th>
					<th>Article_Body</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($articles)):
					$count=$this->uri->segment(3);
					?>
					<?php foreach ($articles as $art): ?>
						<tr>
							<td><?= ++$count; ?> </td>
							<td><?= $art->article_title; ?></td>
							<td><?= $art->article_body; ?></td>
							<!-- <td><a href="#" class="btn btn-primary">Edit</a></td> -->
							<!-- <td><a href="#" class="btn btn-danger">Delete</a></td> -->
							<td><?=  anchor("Admin/editarticle/{$art->id}",'Edit',['class'=>'btn btn-primary']);  ?></td>

							<td>

								<?=
								form_open('Admin/delarticles'),
								form_hidden('id',$art->id),
								form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
								form_close();
								?>

							</td> 
						</tr>
					<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="3">No Data Available</td>
						</tr>
					<?php endif; ?> 
				</tbody>

				
			</table>
			<?php  echo $this->pagination->create_links();   ?> 
		</div>
	</div>

	<?php include ('footer.php');?>
	

