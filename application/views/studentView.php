<title>D.A.T.A Student</title>
</head>

	<div class="col-lg-12 btn btn-primary active">
			<div class="col-lg-9 col-lg-offset-1"><h1>D.A.T.A Student</h1></div>
			<div class="col-lg-1"><br><a class="btn btn-primary btn-lg" href='<?php echo base_url()."main/logout" ?>'>Logout</a></div>
	</div>

	<div class="container">
		<br/>
		<ul class="well stdheight col-md-2 nav nav-stacked">
			<li><a class="btn btn-default btn-lg " id="p1Info" href="#profile" data-toggle="tab">My Profile</a></li><br>
			<li><a class="btn btn-default btn-lg " href="#myusage" data-toggle="tab">My Usage</a></li><br>
		</ul>
		<div class="tab-content col-md-10 col-xs-offset-1">
			<div class="tab-pane well stdheight fade in active" id="profile">
				<div id="dispInfo2" class="col-md-8 col-md-offset-2"></div>
			</div>
			<div class="tab-pane well stdheight fade in" id="myusage">
				<button class="btn btn-default" id="p1Bargraph">Bar Graph</button>
				<button class="btn btn-default" id="p1LogTable">Log Table</button>
				<br/><br/><br/>
				<div id="dispInfo" class="col-md-8 col-md-offset-2"></div>
			</div>
		</div>
	</div>
