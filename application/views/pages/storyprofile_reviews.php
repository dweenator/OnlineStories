<body>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-1 sidenav">
    </div>
    <div class="col-sm-10 text-left"> 
	  <div class="row-sm-4">

	  </div>
	  <div id="review" class="row-sm-4">
		<form method="post" action="<?php echo base_url().'story/submit_review/'.$story_id;?>">
		<div class="form-group">
		<label for="wq">Writing Quality</label>
		<select class="form-control" id="writing_quality" name="writing_quality">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select>
		</div>
		<div class="form-group">
		<label for="us">Update Stability</label>
		<select class="form-control" id="update_stability" name="update_stability">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select>
		</div>
		<div class="form-group">
		<label for="pp">Plot Progression</label>
		<select class="form-control" id="plot_progression" name="plot_progression">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select>
		</div>
		<div class="form-group">
		<label for="cd">Character Design</label>
		<select class="form-control" id="character_design" name="character_design">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select>
		</div>
		<div class="form-group">
		<label for="wb">World Building</label>
		<select class="form-control" id="world_building" name="world_building">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select>
		</div>
		<div class="form-group">
		<label for="review_summary">Summary</label>
		<textarea class="form-control" rows="4" id="review_summary" name="review_summary"></textarea>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</form>
		
		<div id="your_review">
		
		</div>
		<div id="other_review">
		<table class="table table-bordered">
		<tbody>
		<?php
		if(isset($reviews)){
			foreach($reviews as $review_id=>$val){
					echo "<tr>";
					echo "<td>".$val['user_name']."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "<div id='score_card'>";
					foreach($val['score_card'] as $val1){
					echo $val1;}
					echo "</div>";
					echo "</td>";
					echo "<td>";
					echo $val['summary_content'];
					echo "</td>";
					echo "</tr>";
			}
		?>
		<tr><td><?php echo $review_links;} ?></td></tr>
		</tbody>
		</table>
		</div>
	</div>
	
	<div class="row-sm-4">

	</div>
	  
    </div>
    <div class="col-sm-1 sidenav">
    </div>
  </div>
</div>

</body>
