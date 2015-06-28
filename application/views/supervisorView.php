<title>D.A.T.A Supervisor</title>
</head>

	<div class="container col-lg-12 well">
			<div class="col-lg-10 col-lg-offset-1"><h1>D.A.T.A Supervisor</h1></div>
			<div class="col-lg-1"><br/><a class="btn btn-primary btn-lg" href='<?php echo base_url()."main/logout" ?>'>Logout</a></div>
		</div>

	<div class="container">
		<br>
		<!--Nav Tabs--><div class="row">
			<ul class="nav nav-justified nav-tabs">
				<li><a class="btn btn-primary btn-lg" href="#myinfo" data-toggle="tab">My Information</a></li>
				<li><a class="btn btn-primary btn-lg " href="#usage" data-toggle="tab">General Information</a></li>
			</ul>
		</div>
		
		<div class="row tab-content">
			<!--My Info Tab Content--><div id="myinfo" class="tab-pane fade in active col-md-12" >
				<br>
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
						<br><br><br>
						<div id="dispInfo" class="col-md-8 col-md-offset-2"></div>
					</div>
				</div>
			</div>
			<!--Usage Tab Content--><div id="usage" class="tab-pane fade col-md-12" >
				<br>
				<ul class="well stdheight col-md-2 col-xs-offset-1 nav nav-stacked">
					<li><a class="btn btn-default btn-lg " id="suprb3" href="#ulogs" data-toggle="tab">Usage Logs</a></li><br>
					<li><a class="btn btn-default btn-lg " href="#uquery" data-toggle="tab">Usage Query</a></li><br>
					<li><a class="btn btn-default btn-lg " href="#uview" data-toggle="tab">Usage Overview</a></li><br>
				</ul>
				
				<div class="tab-content col-md-10 col-xs-offset-1">
					<div class="tab-pane stdheight well fade in active" id="ulogs">
						<div id="view1d1" class="col-md-8 col-md-offset-2"></div>
					</div>
					<div class="tab-pane stdheight well fade in" id="uquery">
						<button class="btn btn-default" id="suprb1">Select a Student</button>
						<button class="btn btn-default" id="suprb2">Select a Computer</button>
						<div id="view1d2"></div>
					</div>
					<div class="tab-pane stdheight well fade in" id="uview">
						<button class="btn btn-default" id="suprb4">Line Graph of Time</button>
						<button class="btn btn-default" id="suprb5">Pie Chart of Usage of Computers</button>
						<br><br>
						<div id="view1d3" class="col-md-8 col-md-offset-2"></div>
					</div>
					<div class="tab-pane stdheight well fade in" id="users">
						<div id="view1d5" class="col-md-8 col-md-offset-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
