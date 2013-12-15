<title>D.A.T.A Administor</title>
</head>
	<div class="col-md-12 btn btn-primary active">
		<h1>D.A.T.A Administrator</h1>
	</div>

	<ul class="nav nav-justified nav-tabs">
		<li>
			<a class="btn btn-default btn-lg " href="#myinfo" data-toggle="tab">My Information</a>
		</li>
		<li>
			<a class="btn btn-default btn-lg " href="#usage" data-toggle="tab">Usage Information</a>
		</li>
		<li>
			<a class="btn btn-default btn-lg " href="#database" data-toggle="tab">Database</a>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active col-md-12" id="myinfo">
			<br>
			<ul class="well col-md-2 col-xs-offset-1 nav nav-stacked">
				<li>
					<a class="btn btn-default btn-lg " id="p1Info" href="#profile" data-toggle="tab">My Profile</a>
				</li><br>
				<li>
					<a class="btn btn-default btn-lg " href="#myusage" data-toggle="tab">My Usage</a>
				</li><br>
			</ul>
			<div class="tab-content col-md-9 col-xs-offset-1">
				<div class="tab-pane well fade in active" id="profile">
					<div class="row">
						<div class="col-md-2"></div>
							<div id="dispInfo2" class="col-md-8"></div>
						<div class="col-md-2"></div>
					</div>
				</div>
				<div class="tab-pane well fade in" id="myusage">
					<button class="btn btn-default" id="p1Bargraph">Bar Graph</button>
					<button class="btn btn-default" id="p1LogTable">Log Table</button>
					<br><br><br>
					<div class="row">
						<div class="col-md-2"></div>
							<div id="dispInfo" class="col-md-8"></div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade col-md-12" id="usage">
			<br>
			<ul class="well col-md-2 col-xs-offset-1 nav nav-stacked">
				<li>
					<a class="btn btn-default btn-lg " id="view1b3" href="#ulogs" data-toggle="tab">Usage Logs</a>
				</li><br>
				<li>
					<a class="btn btn-default btn-lg " href="#uquery" data-toggle="tab">Usage Query</a>
				</li><br>
				<li>
					<a class="btn btn-default btn-lg " href="#uview" data-toggle="tab">Usage Overview</a>
				</li><br>
			</ul>
			<div class="tab-content col-md-9 col-xs-offset-1">
				<div class="tab-pane well fade in active" id="ulogs">
					<div class="row">
						<div class="col-md-2"></div>
						<div id="view1d1" class="col-md-8"></div>
						<div class="col-md-2"></div>
					</div>
				</div>
				<div class="tab-pane well fade in" id="uquery">
					<button class="btn btn-default" id="view1b1">Select a Student</button>
					<button class="btn btn-default" id="view1b2">Select a Computer</button>
					<button class="btn btn-default" id="view1b6">Select a Date</button>
					<div id="view1d2"></div>
				</div>
				<div class="tab-pane well fade in" id="uview">
					<button class="btn btn-default" id="view1b4">Line Graph of Time</button>
					<button class="btn btn-default" id="view1b5">Pie Chart of Usage of Computers</button>
					<br><br>
					<div class="row">
						<div class="col-md-2"></div>
						<div id="view1d3" class="col-md-8"></div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade col-md-12" id="database">
			<br>
			<ul class="well col-md-2 col-xs-offset-1 nav nav-stacked">
				<li>
					<a class="btn btn-default btn-lg " id="addb1" href="#memtbl" data-toggle="tab">Members Table</a>
				</li><br>
				<li>
					<a class="btn btn-default btn-lg " id="addb2" href="#utbl" data-toggle="tab">Usage Table</a>
				</li><br>
				<li>
					<a class="btn btn-default btn-lg " href="#altbl" data-toggle="tab">Access Logs Table</a>
				</li><br>
			</ul>
			<div class="tab-content col-md-9 col-xs-offset-1">
				
				<div class="tab-pane well fade in active" id="memtbl">
					<div id="sec3">
						<button class="btn btn-default" id="addRecBtn2" >Add Record</button>
						<button class="btn btn-default" id="editRecBtn2" >Edit Record</button>
						<button class="btn btn-default" id="deleteRecBtn2" >Delete Record</button>
						<div class="sec2" id="addRec2">
	<!--
							<h2>Add Record</h2>
							<div id="addForm2">
								<form class="form-horizontal" id="addUserForm" role="form">
									<div class="form-group">
										<label for="addUsageUser" class="col-xs-3 control-label">Username</label>
										<div class="col-xs-5">
											<input type="text" class="form-control" name="addUsageUser" id="addUsageUser">
										</div>
									</div>
									<div class="form-group">
										<label for="addUsageDate" class="col-xs-3 control-label">Date</label>
										<div class="col-xs-5">
											<input type="date" class="form-control" name="addUsageDate" id="addUsageDate">
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
											<input type="submit" class=" btn btn-primary" name="addUsageForm" id="addUsageForm" value="Add Record"/>
										</div>
									</div>
								</form>
							</div>
	-->
							<h2>Add Record</h2><form id="addUserForm">Enter Username(Student ID): <input type="text" id="addUserUser" name="addUserUser" required/><br><br>Enter Password: <input type="password" id="addUserPass" name="addUserPass" required/><br><br>Enter User Type(1 to 4): <input type="text" id="addUserType" name="addUseType"required/><br><input type="submit" name="submit" value="Add Record"/></form>
							<div id="addResponse2"></div>
						</div>
						<div class="sec2" id="editRec2">
							<h2>Edit Record</h2>
							<form id="editUserForm2">
								Enter Username(Student ID): <input type="text" id="editUserOrg" name="editUserOrg" required/><br>
								<h3>Enter Any Below To Update the User</h3><br><br>
								Enter New Username(Student ID): <input type="text" id="editUserUser" name="editUserUser"/><br><br>
								Enter New Password: <input type="password" id="editUserPass" name="editUserPass"/><br><br>
								Enter New User Type(1 to 4): <input type="text" id="editUserType" name="editUserType"/><br>
								<input type="submit" class="btn btn-primary" name="submit" value="Edit Record"/>
							</form>
							<div id="editResponse2"></div>
						</div>
						<div class="sec2" id="deleteRec2">
							<h2>Delete Record</h2>
							Enter Username(Student ID) : <input type="text" id="deleteUser" /><input type="submit" id="deleteSub" value="Delete"/>
							<div id="deleteResp"></div>
						</div>
					</div>
				</div>

				<div class="tab-pane well fade in" id="utbl">
					<button class="btn btn-default" id="addRecBtn" >Add Record</button>
					<button class="btn btn-default" id="editRecBtn" >Edit Record</button>
					<button class="btn btn-default" id="deleteRecBtn" >Delete Record</button>
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
										<input type="date" class="form-control" name="addUsageDate" id="addUsageDate">
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
										<input type="submit" class=" btn btn-default" name="addUsageForm" id="addUsageForm" value="Add Record"/>
									</div>
								</div>
							</form>
						</div>
						<div id="addResponse"></div>
					</div>
					<div class="sec" id="editRec">
						<h2>Edit Record</h2>
						<div id="editResponse"></div>
					</div>
					<div class="sec" id="deleteRec">
						<h2>Delete Record</h2>
					</div>
				</div>

				<div class="tab-pane well fade in" id="altbl">
					<br>
					<button class="btn btn-default" id="log1b1">Select a Student</button>
					<button class="btn btn-default" id="log1b2">View All Logged Information</button>
					<br><br>
					<div id="log1d1"></div>
					<div class="row">
						<div class="col-md-2"></div>
						<div id="log1d2" class="col-md-8"></div>
						<div class="col-md-2"></div>
					</div>
				</div>

			</div>
		</div>
	</div>
