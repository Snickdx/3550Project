<?php 
	include'members3.php'; 
	echo'			<li>
				<a class="btn btn-default btn-lg active">Usage Information</a>
			</li>
		</ul>';
?>

		<br>
		<h1>Select an id to view usage..</h1>
		<button class="btn btn-primary" id="view3b1">Select a Student</button>
		<button class="btn btn-primary" id="view3b2">Select a Computer</button>
		<button class="btn btn-primary" id="view3b3">View All Logged Information</button>
		<button class="btn btn-primary" id="view3b4">Line Graph of Time</button>
		<button class="btn btn-primary" id="view3b5">Pie Chart of Usage of Computers</button>
		<br>
		<br>
		<div id="view3d1"></div>
		<div class="row">
		    <div class="col-md-2"></div>
		    <div id="view3d2" class="col-md-8"></div>
		    <div class="col-md-2"></div>
		</div>
