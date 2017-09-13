<?php require 'partial/head.php'; ?>

<main>
<div class="section">
	<div class="section">
	<center><h5>Updating of the Package</h5></center>
	<hr>
	<br>
      <div class="row">
         <form method="POST" action="/agent/update" id="agentUpdateForm">
		 <div class="col l6 push-l3 s12">
				<div class="row">
			
				   <div class="input-field col l3 offset-l4 s12">
					  Tracking Number
		             <select class="browser-default" name="acm_tracking_number" id="sort" onchange="changeDropdown()">
		              <option value="none">-----</option>

		              <?php for($i=0;$i<count($_SESSION['acm_all_tracking_number']); $i++) : ?>

		               <option value="<?=$_SESSION['acm_all_tracking_number'][$i]->tracking_id;?>" required>
		               	<?=$_SESSION['acm_all_tracking_number'][$i]->tracking_id;?>
		               </option>

		              <?php endfor; ?>
		             </select> 
				   </div>
	
				   <br><br><br><br>
				   <!--
				   <h5>Estimated Time of Arrival</h5>
					<div class="input-field col l12 s12">
					   <br>
					      <i class="material-icons prefix">mode_edit</i>
						  <input id="acm_eta" name="acm_eta" type="text" class="active validate">
						  <label for="acm_eta">ETA</label>          
					   </div>
				   <br><br><br><br>
				  -->
				<h5>Departure</h5> 
				   <div class="input-field col l4 offset-l1 s12">
	                  Drop-Off Place (Province)
	                  <select class="browser-default" name="acm_dropoff_province" id="acm_dropoff_province">
	                    <option value="none">-----</option>

	                    <?php for($i=0;$i<count($_SESSION['acm_province']); $i++) : ?>

	                    <option value="<?=$_SESSION['acm_province'][$i]->province_name?>">
	                    	<?=$_SESSION['acm_province'][$i]->province_name?>
	                    </option>

	                    <?php endfor; ?>

	                  </select>
	                 </div>
	                 <div class="input-field col l4 offset-l1 s12">
	                  Drop-Off Place (City)
	                  <select class="browser-default" name="acm_dropoff_city" 
	                  id="acm_dropoff_city" disabled>
	                    <option value="none">-----</option>
<!-- 
	                    <?php for($i=0;$i<count($_SESSION['acm_city']); $i++) : ?>

	                    <option value="<?=$_SESSION['acm_city'][$i]->city_name?>">
	                    	<?=$_SESSION['acm_city'][$i]->city_name?>
	                    </option>

	                    <?php endfor; ?> -->
	                  </select>      
	                 </div>
				   <div class="input-field col l6 s12">
				   	  Departure Time
					  <input type="text" id="dep_time" name="acm_dep_time" class="date" onclick="dateTime();" required>
					  <label for="dep_time"></label>          
				   </div>
				   <div class="input-field col l6 s12">
				   	  Departure Delay
					  <input id="dep_delay" name="acm_dep_delay" class="date" onclick="dateTime(');">
					  <label for="dep_delay"></label>          
				   </div>
				   <div class="input-field col l7 offset-l2 s12">
				   <br>
				      <i class="material-icons prefix">mode_edit</i>
					  <input id="acm_dep_remark" name="acm_dep_remark" type="text">
					  <label for="acm_dep_remark">Departure Remark</label>          
				   </div>
				</div>
				
				<div class="section"/>
				
				<div class="row">
					<h5>Arrival</h5>
						<div class="row">
						    <div class="input-field col l6 s12">
						      Arrival Time
							  <input id="arr_time" name="acm_arr_time" class="date" onclick="dateTime('arr_time');" required>
							  <label for="arr_time"></label>          
						   </div>
						   <div class="input-field col l6 s12">
						      Arrival Delay
							  <input id="arr_delay" name="acm_arr_delay" class="date" onclick="dateTime('dep_delay');">
							  <label for="arr_delay"></label>          
						   </div>
						   <div class="input-field col l7 offset-l2 s12">
						   <br>
						      <i class="material-icons prefix">mode_edit</i>
							  <input id="acm_arr_remark" name="acm_arr_remark" type="text">
							  <label for="acm_arr_remark">Arrival Remark</label>          
						   </div>
						    <div class="input-field col l4 offset-l1 s12">
			                  Current Location (Province)
			                  <select class="browser-default" name="acm_currloc_province" 
			                  id="acm_currloc_province" >
			                    <option value="none">-----</option>

			                    <?php for($i=0;$i<count($_SESSION['acm_province']); $i++) : ?>

			                    <option value="<?=$_SESSION['acm_province'][$i]->province_name?>">
			                    	<?=$_SESSION['acm_province'][$i]->province_name?>
			                    </option>

			                    <?php endfor; ?>

				              
			                  </select>
			                 </div>
			                 <div class="input-field col l4 offset-l1 s12">
			                  Current Location (City)
			                  <select class="browser-default" name="acm_currloc_city" 
			                  id="acm_currloc_city" disabled>
			                    <option value="none">-----</option>

			                   <!--  <?php for($i=0;$i<count($_SESSION['acm_city']); $i++) : ?>

			                    <option value="<?=$_SESSION['acm_city'][$i]->city_name?>">
			                    	<?=$_SESSION['acm_city'][$i]->city_name?>
			                    </option>

			                    <?php endfor; ?> -->
			                  </select>      
			                 </div>
						   <div class='col l6 push-l3 s12'>
						   <br>
							  <button type='submit' name='btn_update' class='col l6 offset-l3 s12 btn btn-large waves-effect waves-light indigo'>Update</button>
					       </div>
						</div>
				</div>
			</div>
			</div>
         </form>       
      </div>
</main>



<script>

<?php if($_SESSION['acm_update_success'] == true) : ?>
	swal({
		title: "Update Complete!",
		text: "Tracking info was successfully updated",
		type: "success",
		timer: 3000,
		showConfirmButton: false
	});

<?php 

	$_SESSION['acm_update_success'] = false;
	endif; 

?>

	function dropdown($type)
	{
		if($type == 'drop')
		{
			var drop_prov = document.getElementById('acm_dropoff_province');

			var drop_city = document.getElementById('acm_dropoff_city');

			if(drop_prov.value == 'none')
			{
				drop_city.setAttribute("disabled", "disabled");
			}
			else
			{
				drop_city.removeAttribute("disabled");
			}
		}
		else
		{
			var curr_prov = document.getElementById('acm_currloc_province');

			var curr_city = document.getElementById('acm_currloc_city');

			if(curr_prov.value == 'none')
			{
				curr_city.setAttribute("disabled", "disabled");
			}
			else
			{
				curr_city.removeAttribute("disabled");
			}
		}
	}

	


</script>


<?php require 'partial/footer.php' ?>