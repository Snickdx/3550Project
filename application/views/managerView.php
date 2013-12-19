<title>D.A.T.A Manager</title>
</head>

	<div class="col-lg-12 btn btn-primary active">
			<div class="col-lg-8 col-lg-offset-2"><h1>D.A.T.A Manager</h1></div>
			<div class="col-lg-1"><a class="btn btn-primary btn-lg" href='<?php echo base_url()."main/logout" ?>'>Logout</a></div>
		</div>

	<div class="container">
		<br>
		<!--Nav Tabs--><div class="row">
			<ul class="nav nav-justified nav-tabs">
				<li><a class="btn btn-primary btn-lg" href="#myinfo" data-toggle="tab">My Information</a></li>
				<li><a class="btn btn-primary btn-lg " href="#usage" data-toggle="tab">General Information</a></li>
				<li><a class="btn btn-primary btn-lg " href="#database" data-toggle="tab">Log Information</a></li>
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
					<li><a class="btn btn-default btn-lg " id="view1b3" href="#ulogs" data-toggle="tab">Usage Logs</a></li><br>
					<li><a class="btn btn-default btn-lg " href="#uquery" data-toggle="tab">Usage Query</a></li><br>
					<li><a class="btn btn-default btn-lg " href="#uview" data-toggle="tab">Usage Overview</a></li><br>
					<li><a class="btn btn-default btn-lg " id="userstbl" data-toggle="tab">Users Table</a></li><br>
				</ul>
				
				<div class="tab-content col-md-10 col-xs-offset-1">
					<div class="tab-pane stdheight well fade in active" id="ulogs">
						<div id="view1d1" class="col-md-8 col-md-offset-2"></div>
					</div>
					<div class="tab-pane stdheight well fade in" id="uquery">
						<button class="btn btn-default" id="view1b1">Select a Student</button>
						<button class="btn btn-default" id="view1b2">Select a Computer</button>
						<button class="btn btn-default" id="view1b6">Select a Date</button>
						<div id="view1d2"></div>
					</div>
					<div class="tab-pane stdheight well fade in" id="uview">
						<button class="btn btn-default" id="view1b4">Line Graph of Time</button>
						<button class="btn btn-default" id="view1b5">Pie Chart of Usage of Computers</button>
						<br><br>
						<div id="view1d3" class="col-md-8 col-md-offset-2"></div>
					</div>
					<div class="tab-pane stdheight well fade in" id="users">
						<div id="view1d5" class="col-md-8 col-md-offset-2"></div>
					</div>
				</div>
			</div>
			<!--Database Tab Content--><div id="database" class="tab-pane fade col-md-12" >
				<br>
				<div class="tab-pane stdheight well fade in" id="altbl">
					<button class="btn btn-default" id="log1b1">Select a Student</button>
					<button class="btn btn-default" id="log1b2">View All Logged Information</button>
					<br><br>
					<div id="log1d1"></div>
					<div id="log1d2" class=" col-md-8 col-md-offset-2"></div>
				</div>
			</div>
		</div>
	</div>
