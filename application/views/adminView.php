<title>D.A.T.A Administor</title>
</head>

	<div class="col-lg-12 btn btn-primary active">
			<div class="col-lg-11"><h1>D.A.T.A Administrator</h1></div>
			<div class="col-lg-1"><br/><a class="btn btn-primary btn-lg" href='<?php echo base_url()."main/logout" ?>'>Logout</a></div>
		</div>

	<div class="container">
		<br>
		<!--Nav Tabs--><div class="row">
			<ul class="nav nav-justified nav-tabs">
				<li><a class="btn btn-primary btn-lg" href="#myinfo" data-toggle="tab">My Information</a></li>
				<li><a class="btn btn-primary btn-lg " href="#usage" data-toggle="tab">General Information</a></li>
				<li><a class="btn btn-primary btn-lg " href="#database" data-toggle="tab">Database</a></li>
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
					<li><a class="btn btn-default btn-lg " href="#userstbl" data-toggle="tab">Users Table</a></li><br>
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
				<ul class="well stdheight col-md-2 col-xs-offset-1 nav nav-stacked">
					<li>
						<a class="btn btn-default btn-lg " id="addb1" href="#memtbl" data-toggle="tab">Members Table</a>
					</li><br>
					<li>
						<a class="btn btn-default btn-lg " id="addb2" href="#utbl" data-toggle="tab">Usage Table</a>
					</li><br>
					<li>
						<a class="btn btn-default btn-lg " href="#altbl" data-toggle="tab">Log Table</a>
					</li><br>
				</ul>
				<div class="tab-content col-md-10 col-xs-offset-1">
					
					<div class="tab-pane stdheight well fade in active" id="memtbl">
						<div id="sec3">
							<button class="btn btn-default" id="addRecBtn2" >Add User</button>
							<button class="btn btn-default" id="editRecBtn2" >Edit User</button>
							<button class="btn btn-default" id="deleteRecBtn2" >Delete User</button>
							<div class="sec2" id="addRec2">
								<h2>Add User</h2>
								<div id="addForm2">
									<form id="addUserForm" class="form-horizontal">
										<div class="form-group">
											<label for="addUserUser" class="col-xs-3 col-xs-offset-4 control-label">Create Username</label>
											<div class="col-xs-5">
												<input type="text" class="form-control" id="addUserUser" name="addUserUser" required/>
											</div>
										</div>
										<div class="form-group">
											<label for="addUserPass" class="col-xs-3 control-label">Create Password</label>
											<div class="col-xs-5">
												<input type="password" class="form-control" id="addUserPass" name="addUserPass" required/>
											</div>
										</div>
										<div class="form-group">
											<label for="addUserType" class="col-xs-3 control-label">Select User Type</label>
											<div class="col-xs-5">
												<select class="form-control" id="addUserType" name="addUseType">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class=" col-sm-offset-4">
												<input class="btn btn-default" type="submit" name="submit" value="Add Record"/>
												<div id="addResponse"></div>
											</div>
										</div>
										</form>
								</div>
								<div id="addResponse2"></div>
							</div>
							<div class="sec2" id="editRec2">
								<h2>Edit User</h2>
								<form id="editUserForm" class="form-horizontal">
									<div class="form-group">
										<label for="userIds" class="col-xs-3 control-label">Select User</label>
										<div id="userIds" class="col-xs-5"></div>
									</div>
									<div class="form-group">
										<label for="" class="col-xs-3 control-label">New Username</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" id="editUserUser" name="editUserUser">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-xs-3 control-label">New Password</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" id="editUserPass" name="editUserPass">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-xs-3 control-label">New User Type</label>
										<div class="col-xs-5">
											<select class="form-control" id="editUserType" name="editUserType">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class=" col-md-5 col-md-offset-3">
											<input type="submit" class="btn btn-default" name="submit" value="Edit Record"/>
										</div>
									</div>
								</form>
								<div class="col-md-4 col-md-offset-4" id="editResponse"></div>
							</div>
							<div class="sec2" id="deleteRec2">
								<h2>Delete Record</h2>
								<form class="form-horizontal">
									<div class="form-group">
										<label for="userIds2" class="col-xs-3 control-label">Select User</label>
										<div id="userIds2" class="col-xs-5"></div>
										<input type="submit" class=" col-xs-3 btn btn-default" id="deleteSub" value="Delete"/>
									</div>
								</form>
								<div id="deleteResp"class="col-md-4 col-md-offset-4"></div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane stdheight well fade in" id="utbl">
						<button class="btn btn-default" id="addRecBtn" >Add Record</button>
<!--
						<button class="btn btn-default" id="editRecBtn" >Edit Record</button>
						<button class="btn btn-default" id="deleteRecBtn" >Delete Record</button>
-->
						<div class="sec" id="addRec">
							<h2>Add Record</h2>
							<div id="addForm">
								<form class="form-horizontal" id="addUsageForm" role="form">
									<div class="form-group">
										<label for="addUsageUser" class="col-xs-3 control-label">Username</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="addUsageUser" id="addUsageUser">
										</div>
									</div>
									<div class="form-group">
										<label for="addUsageDate" class="col-xs-3 control-label">Date</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="addUsageDate" id="addUsageDate">
										</div>
									</div>
									<div class="form-group">
										<label for="addUsageTime" class="col-xs-3 control-label">Session Time</label>
										<div class="col-xs-5">
											<input type="text"  class="form-control" name="addUsageTime" id="addUsageTime">
										</div>
									</div>
									<div class="form-group">
										<label for="id" class="col-xs-3 control-label">Computer ID</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="addUsageComp" id="addUsageComp">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-xs-5">
											<input type="submit" class=" btn btn-default" name="addUsageFormq" id="addUsageForm" value="Add Record"/>
										</div>
									</div>
								</form>
								<div class="col-md-4 col-md-offset-4"id="addUsageResponse"></div>
							</div>
						</div>
						<div class="sec" id="editRec">
							<h2>Edit Record</h2>
							<div id="editResponse"></div>
						</div>
						<div class="sec" id="deleteRec">
							<h2>Delete Record</h2>
						</div>
					</div>
					
					<div class="tab-pane stdheight well fade in" id="altbl">
						<button class="btn btn-default" id="log1b1">Select a User</button>
						<button class="btn btn-default" id="log1b2">View All Logged Information</button>
						<br><br>
						<div id="log1d1"></div>
						<div id="log1d2" class=" col-md-8 col-md-offset-2"></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
