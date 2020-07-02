<div class="container-box" style="margin-top: 25px;">
	<h3 align="center">Dynamic Selection Box</h3>
	<div class="form-group">
		<div class="row" align="center">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<select name="country" id="country" class="form-control">
					<option value="">Select Country</option>
					<?php 
					foreach ($country as $row) {
                        # code...
						echo '<option value='.$row->id.'> '.$row->name.' </option>';
					}

					?>
				</select>
				<select name="state" id="state" class="form-control">
					<option value="">Select State</option>
				</select>
				<select name="city" id="city" class="form-control">
					<option value="">Select City</option>
				</select>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#country').change(function(){
			var country_id = $('#country').val();
            // alert(country_id);
            if (country_id != '') {
            	$.ajax({
            		url:"<?php echo base_url();?>Examples/fetch_state",
            		method:"POST",
            		data:{country_id:country_id},
            		success:function(data)
            		{
            			$('#state').html(data);
            			$('#city').html('<option value="">Select City</option>');
            		}
            	});
            }
            else {
            	$('#state').html('<option value="">Select State </option>');
            	$('#city').html('<option value="">Select City </option>');
            }
        });

		$('#state').change(function(){
			var state_id = $('#state').val();
            // alert(state_id);
            if (state_id != '') {
            	$.ajax({
            		url:"<?php echo base_url();?>Examples/fetch_city",
            		method:"POST",
            		data:{state_id:state_id},
            		success:function(data)
            		{
            			$('#city').html(data);
            			// $('#city').html('<option value="">Select City</option>');
            		}
            	});
            }
            else {
            	// $('#state').html('<option value="">Select State </option>');
            	$('#city').html('<option value="">Select City </option>');
            }
        });
	});
</script>