(function (window) {
	$(document).ready(function () {

		$("#view1b6").click(function () {
			$.get("/prjt/manager_con/getUniqueDateLogs", function (data) {
				var i, j;
				var datesSeen = [],
					unSeen = true;
				MenuContent = "<br/><div class='col-xs-5'><select id='selDate1' class='form-control IDmenu'><option selected ='selected' value ='nothing'>Date</option>";
				for (i = 0; i < data.length; i++) {
					MenuContent += '<option id =' + data[i].date + ' value="' + data[i].date + '">' + data[i].date + "</option>";
				}
				MenuContent += "</select></div>";
				$("#view1d2").html(MenuContent);
			}, "json");
		});

		$(document).on("change", "#selDate1", function () {
			var dateS = $(this).val();
			$.get("/prjt/manager_con/getDateLogTable", {
				dateS: dateS
			}, function (data) {
				var i;
				var content = "<h2 class='text-center'> Log for " + dateS + "</h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Comp ID</th><th>Session Time(min)</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					if (data[i].date === dateS) {
						content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].comp_id + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
				content += "</tbody></table></div>";
				$("#view1d2").html(content);
			}, "json");
		});

		//dynmically load student ids in options menu
		$("#view1b1").click(function () {
			$.get("/prjt/manager_con/getUniqueIdLogs", function (data) {
				var i, arr = [];
				arr = orderList(data, "username");
				MenuContent = "<br/><div class='col-xs-5'><select id='selStu1' class='form-control IDmenu'><option selected ='selected' value ='nothing'>User</option>";
				for (i = 0; i < data.length; i++) {
					//MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
					MenuContent += '<option id =' + arr[i] + ' value="' + arr[i] + '">' + arr[i] + "</option>";
				}
				MenuContent += "</select></div>";
				$("#view1d2").html(MenuContent);
			}, "json");
		});

		//load table for selected Student ID
		$(document).on("change", "#selStu1", function () {
			var user = $(this).val();
			$.get("/prjt/manager_con/getIdLogTable", {
				user: user
			}, function (data) {
				var i;
				var content = "<h2 class='text-center'>Students </h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer ID</th><th>Session Time(min)</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					if (data[i].username === user) {
						content += '<tr><td>' + data[i].date + '</td>' + '<td>' + data[i].comp_id + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
				content += "</tbody></table></div>";
				$("#view1d2").html(content);
			}, "json");
		});

		//load table for selected Computer ID
		$(document).on("change", "#selComp1", function () {
			var comp = $(this).val();
			$.get("/prjt/manager_con/getCompLogTable", {
				comp_id: comp
			}, function (data) {
				var i;
				var content = "<h2 class='text-center'>Computer</h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>User logged in</th><th>Session Time(min)</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					if (data[i].comp_id === comp) {
						content += '<tr><td>' + data[i].date + '</td>' + '<td>' + data[i].username + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
				content += "</tbody></table></div>";
				$("#view1d2").html(content);
			}, "json");
		});

		//dynamically loading the computer IDs for the "select a computer" button
		$("#view1b2").click(function () {
			$.get("/prjt/manager_con/getUniqueCompLogs", function (data) {
				var i, arr = [];
				arr = orderList(data, "comp_id");
				var MenuContent = "<br/><div class='col-xs-5'><select id='selComp1' class='form-control IDmenu'><option selected ='selected' value ='nothing'>Select Comp ID</option>";
				for (i = 0; i < data.length; i++) {
					//MenuContent += '<option id ='+data[i].comp_id+' value="'+data[i].comp_id+'">' + data[i].comp_id  + "</option>";	
					MenuContent += '<option id =' + arr[i] + ' value="' + arr[i] + '">' + arr[i] + "</option>";
				}
				MenuContent += "</select></div>";
				$("#view1d2").html(MenuContent);
			}, "json");
		});

		//content for the all logged information
		$("#view1b3").click(function () {
			var content = "";
			$("#view1d1").html(content);
			$.get("/prjt/manager_con/getAllLogInfo", function (data) {
				var i;
				var content = "<h2 class='text-center'>Logs </h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].comp_id + '</td>' + '<td>' + data[i].time + '</td></tr>';
				}
				content += "</tbody></table></div>";
				$("#view1d1").html(content);
			}, "json");



		});
        
        $("#userstbl").click(function () {
			var content = "";
			$("#view1d5").html(content);
			$.get("/prjt/admin_con/getUsersTbl", function (data) {
				var i;
				var content = "<h2 class='text-center'>Users Table </h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Computer Id</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].type + '</td></tr>';
				}
				content += "</tbody></table></div>";
				$("#view1d5").html(content);
			}, "json");



		});

		//add edit delete from DB forms

		$("#addRecBtn").click(function () {
			$(".sec").hide();
			$("#addRec").show();
		});

		$("#editRecBtn").click(function () {
			$(".sec").hide();
			$("#editRec").show();
		});

		$("#deleteRecBtn").click(function () {
			$(".sec").hide();
			$("#deleteRec").show();
		});

		$("#addRecBtn2").click(function () {
			$(".sec2").hide();
			$("#addRec2").show();
		});

		$("#editRecBtn2").click(function () {
			$(".sec2").hide();
			$("#editRec2").show();
		});

		$("#deleteRecBtn2").click(function () {
			$(".sec2").hide();
			$("#deleteRec2").show();
		});

		//line graph
		$("#view1b4").click(function () {
			$.get("/prjt/manager_con/getAllLogInfo", function (data) {
				var i, k;
				var timesSeen = [];
				var unSeen = true;
				var freq = [];
				for (i = 0; i < data.length; i++) {
					for (k = 0; k < timesSeen.length; k++) {
						if (data[i].time === timesSeen[k]) {
							freq[k] = freq[k] + 1;
							unSeen = false;
						}
					}
					if (unSeen === true) {
						freq[freq.length] = 1;
						timesSeen[timesSeen.length] = data[i].time;
					}
					unSeen = true;
				}
				//sorts the timesSeen and the freq chart in ascending order

				for (i = 0; i < timesSeen.length; i++) {
					for (k = 0; k < timesSeen.length; k++) {
						if (parseInt(timesSeen[k]) > parseInt(timesSeen[i])) {
							var temp = timesSeen[k];
							timesSeen[k] = timesSeen[i];
							timesSeen[i] = temp;
							var temp2 = freq[k];
							freq[k] = freq[i];
							freq[i] = temp2;
						}
					}
				}

				$('#view1d3').highcharts({
					title: {
						text: 'Time Spent Logged In',
						x: -20 //center
					},

					xAxis: {
						title: {
							text: 'Time'
						},
						categories: timesSeen
					},
					yAxis: {
						title: {
							text: 'Frequency'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
                }]
					},
					tooltip: {
						valueSuffix: ''
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'middle',
						borderWidth: 0
					},
					series: [{
						name: 'Usage Frequency',
						data: freq
            }]
				});

			}, "json");
		});
        
        $("#suprb1").click(function(){
			var MenuContent = "";
			$("#view3d2").html(MenuContent);
            var today = getTodaysDate();
            $.get("/prjt/superv_con/getDailyTable",{today:today},function(data){
                var i;
                arr = orderList(data,"username");
                 MenuContent = "<br/><div class='col-xs-5'><select id='supvStu1' class='form-control IDmenu'><option selected ='selected' value ='nothing'>User</option>";
                for(i= 0; i < data.length; i++){	
						MenuContent += '<option id ='+arr[i]+' value="'+arr[i]+'">' + arr[i]  + "</option>";	
				}
                MenuContent += "</select></div>";
                $("#view1d2").html(MenuContent); 
            },"json");
        });
		
		//load table for selected Student ID
		$(document).on("change","#supvStu1",function(){
            var user = $(this).val();
            var today = getTodaysDate();
            $.get("/prjt/superv_con/getTodayLogTable",{user:user,today:today},function(data){
                var i;
                var content = "<h2 class='text-center'>Student " + user + " Log for Today</h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer ID</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].username === user){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table></div>";
                $("#view1d2").html(content);
            },"json");
		});
		
		
		//load table for selected Computer ID
		$(document).on("change","#suprComp",function(){
            var comp = $(this).val();
            var today = getTodaysDate();
            $.get("/prjt/superv_con/getTodayCompLogTable",{comp:comp,today:today},function(data){
                var i;
                var content = "<h2 class='text-center'>Computer " + comp + " Log for Today </h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>User logged in</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].comp_id === comp){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].username  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table></div>";
                $("#view1d2").html(content);
            },"json");
		});
    
 
	   //dynamically loading the computer IDs for the "select a computer" button
        $("#suprb2").click(function(){
                var content = "";
                $("#view3d2").html(content);
                var today = getTodaysDate();
                $.get("/prjt/superv_con/getDailyCompTable",{today:today},function(data){
                    var i,arr = [];
                    arr = orderList(data,"comp_id");
                    var MenuContent = "<br/><div class='col-xs-5'><select id='suprComp' class='form-control IDmenu'><option selected ='selected' value ='nothing'>Select Comp ID</option>";
                    for(i= 0; i < data.length; i++){
                            MenuContent += '<option id ='+arr[i]+' value="'+arr[i]+'">' + arr[i]  + "</option>";	
                    }
                    MenuContent += "</select></div>";
                    $("#view1d2").html(MenuContent);
                },"json");
            });
        
        $("#suprb3").click(function(){
			var content ="";
			$("#view1d1").html(content);
			var today= getTodaysDate();
			$.get("/prjt/superv_con/getAllDailyTable",{today:today},function(data){
                var i;
                var content = "<h2 class='text-center'>Date Log: " + data[0].date + " </h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table></div>";
                $("#view1d1").html(content);
            },"json");
		
			
		});
        
        $("#suprb5").click(function(){
			var today = getTodaysDate();
            $.get("/prjt/superv_con/getDailyGraph",{today:today},function(data) {
				//need to calculate the actual data for pie chart
				var i,j,k;var finalArrayData = [];
				var unSeen = true;var pcsSeen = [];
					for(i= 0; i < data.length; i++){
                        for(j=0;j<pcsSeen.length;j++){
                            if(data[i].comp_id === pcsSeen[j]){
                                unSeen = false;
                            }
                        }
                        if(unSeen === true){
                            pcsSeen[pcsSeen.length] = data[i].comp_id;
                        }
                        unSeen = true;
				    }

				for(k=0;k<pcsSeen.length;k++){
                    var temp=[],sum;
                    sum = getSum(data,pcsSeen[k]);
                    temp.push("comp ID: "+pcsSeen[k],sum);
                    finalArrayData[k] = temp;
                }

				//loads pie chart
				$("#view1d3").highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: true
                    },
                    title: {
                        text: 'Usage of PCs  '
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: pcsSeen,
                        data: finalArrayData
                    }]
				});					
			},"json");
            
		});
	
        
        //line graph
		$("#suprb4").click(function(){
			var today = getTodaysDate();
			$.get("/prjt/superv_con/getDailyGraph",{today:today},function(data){
				var i,k;var timesSeen = [];
				var unSeen = true; var freq = [];
				for(i=0;i<data.length;i++){
					for(k=0;k<timesSeen.length;k++){
						if(data[i].time === timesSeen[k]){
							freq[k] = freq[k] +1;
							unSeen = false;
						}
					}
						if(unSeen === true){
							freq[freq.length] = 1;
							timesSeen[timesSeen.length] = data[i].time;
						}
						unSeen = true;
				}
				//sorts the timesSeen and the freq chart in ascending order
                
				for(i=0;i<timesSeen.length;i++){
					for(k=0;k<timesSeen.length;k++){
						if(parseInt(timesSeen[k]) > parseInt(timesSeen[i])){
							var temp = timesSeen[k];
							timesSeen[k] = timesSeen[i];
							timesSeen[i] = temp;
							var temp2 = freq[k];
							freq[k] = freq[i];
							freq[i] = temp2;
						}
					}
				}

				$('#view1d3').highcharts({
            title: {
                text: 'Time Spent Logged In',
                x: -20 //center
            },
            
            xAxis: {
				title:{
					text:'Time'
					},
                categories: timesSeen
            },
            yAxis: {
                title: {
                    text: 'Frequency'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Usage Frequency',
                data: freq
            }]
        });
			
			},"json");
		});

		//pie chart
		$("#view1b5").click(function () {
			$.get("/prjt/manager_con/getAllLogInfo", function (data) {

				//need to calculate the actual data for pie chart
				var i, j, k;
				var finalArrayData = [];
				var unSeen = true;
				var pcsSeen = [];
				for (i = 0; i < data.length; i++) {
					for (j = 0; j < pcsSeen.length; j++) {
						if (data[i].comp_id === pcsSeen[j]) {
							unSeen = false;
						}
					}
					if (unSeen === true) {
						pcsSeen[pcsSeen.length] = data[i].comp_id;
					}
					unSeen = true;
				}

				for (k = 0; k < pcsSeen.length; k++) {
					var temp = [],
						sum;
					sum = getSum(data, pcsSeen[k]);
					temp.push("comp ID: " + pcsSeen[k], sum);
					finalArrayData[k] = temp;
				}


				//loads pie chart
				$("#view1d3").highcharts({
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: true
					},
					title: {
						text: 'Usage of PCs  '
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								format: '<b>{point.name}</b>: {point.percentage:.1f} %'
							}
						}
					},
					series: [{
						type: 'pie',
						name: pcsSeen,
						data: finalArrayData
                    }]
				});
			}, "json");

		});

		$("#p1Info").click(function () {
			$.get("/prjt/student_con/getTable", function (data) {
				var content = "<h2 class='text-center'>Student " + data.username + " Information</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Id</th><th>Username(Student Id)</th><th>User Type</th></tr></thead><tbody>";
				content += '<tr><td>' + data.id + '</td>' + '<td>' + data.username + '</td>' + '<td>' + data.type + '</td></tr>';
				content += "</tbody></table>";
				$("#dispInfo2").html(content);
			}, "json");
		});

		$("#log1b2").click(function () {
			var content = "";
			$("#log1d1").html(content);
			$.get("/prjt/manager_con/getWebLogTable", function (data) {
				var i;
				content = "<h2 class='text-center'>Application Logs</h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered pre-scrollable'><thead><tr><th>User ID</th><th>Username</th><th>Logged On</th><th>Logged Off</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					content += '<tr><td>' + data[i].id + '</td><td>' + data[i].username + '</td>' + '<td>' + data[i].start + '</td>' + '<td>' + data[i].end + '</td></tr>';
				}
				content += "</tbody></table></div>";
				$("#log1d2").html(content);
			}, "json");
		});

		//jquery get for the Log Table Button
		$("#p1LogTable").click(function () {
			$.get("/prjt/student_con/getLogTable", function (data) {
				var i;
				var content = "<h2 class='text-center'>" + data[0].username + " Log</h2><div class='pre-scrollable tblHeight'><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					content += '<tr><td>' + data[i].date + '</td>' + '<td>' + data[i].comp_id + '</td>' + '<td>' + data[i].time + '</td></tr>';
				}
				content += "</tbody></table></div>";
				$("#dispInfo").html(content);
			}, "json");
		});

		$("#p1Bargraph").click(function () {
			$.get("/prjt/student_con/getLogTable", function (data) {
				var i, time = [],
					date = [];
				for (i = 0; i < data.length; i++) {
					time.push(parseInt(data[i].time));
					date.push(data[i].date);
				}

				$('#dispInfo').highcharts({

					chart: {
						type: 'bar',
						borderWidth: 2
					},
					title: {
						text: 'Date vs Time(length of usage)'
					},
					xAxis: {
						categories: date
					},
					yAxis: {
						title: {
							text: 'Time'
						}
					},
					series: [{
						name: 'Time',
						data: time
                    }]
				});

			}, "json");
		});

		//dynmically load student ids in options menu
		$("#log1b1").click(function () {
			var MenuContent = "";
			$("#log1d2").html(MenuContent);
			$.get("/prjt/manager_con/getUniqueIdLogs2", function (data) {
				var i, arr = [];
				arr = orderList(data, "username");
				MenuContent = "<div class='col-md-3'><select id='selStuLog2' class=' form-control IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
				for (i = 0; i < data.length; i++) {
					//MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
					MenuContent += '<option id =' + arr[i] + ' value="' + arr[i] + '">' + arr[i] + "</option>";
				}
				MenuContent += "</select></div>";
				$("#log1d1").html(MenuContent);
			}, "json");
		});

		$("#editRecBtn2").click(function () {
			var MenuContent = "";
			$.get("/prjt/admin_con/getUniqueUsers", function (data) {
				var i,arr = [];
                arr = orderList(data, "username");
				MenuContent = "<select id='editUserOrg' name='editUserOrg' class=' form-control IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
				for (i = 0; i < data.length; i++) {
					MenuContent += '<option id =' + arr[i] + ' value="' + arr[i] + '">' + arr[i] + "</option>";
                    //MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
				}
				MenuContent += "</select>";
				$("#userIds").html(MenuContent);
			}, "json");
		});

			$("#deleteRecBtn2").click(function () {
			var MenuContent = "";
			$.get("/prjt/admin_con/getUniqueUsers", function (data) {
				var i,arr = [];
                arr = orderList(data, "username");
				MenuContent = "<select id='deleteUser' name='editUserOrg' class='form-control IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
				for (i = 0; i < data.length; i++) {
					MenuContent += '<option id =' + arr[i] + ' value="' + arr[i] + '">' + arr[i] + "</option>";
                    //MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
				}
				MenuContent += "</select>";
				$("#userIds2").html(MenuContent);
			}, "json");
		});

		//load table for selected Student ID
		$(document).on("change", "#selStuLog2", function () {
			var user = $(this).val();
			$.get("/prjt/manager_con/getIdLogTable2", {
				user: user
			}, function (data) {
				var i;
				var content = "<h2 class='text-center'>Logs</h2><div class='tblHeight pre-scrollable'><table id='mytable' class='table table-striped table-bordered '><thead><tr><th>Log ID</th><th>Log Start Time</th><th>Log End Time</th></tr></thead><tbody>";
				for (i = 0; i < data.length; i++) {
					if (data[i].username === user) {
						content += '<tr><td>' + data[i].id + '</td>' + '<td>' + data[i].start + '</td>' + '<td>' + data[i].end + '</td></tr>';
					}
				}
				content += "</tbody></table></div>";
				$("#log1d2").html(content);
			}, "json");
		});
        

		$("#addb1").click(function () {
			$("#sec3").show();
			$(".sec2").hide();
			$("#addResponse").hide();
			$("#addForm2").show();
		});

		$("#sec3").hide();
		$("#addb2").click(function () {
			$(".sec").hide();
			$("#addResponse").hide();
			$("#addForm").show();
		});

		$("#deleteSub").click(function () {
			var user = $("#deleteUser").val();
			$.post("/prjt/admin_con/deleteUser", {
				user: user
			}, function (data) {
				$("#deleteResp").html("<br><div class='alert alert-success' style='height:55px;width:175px;'><p>"+data+"</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
				return false;
			});
            return false;
		});

		$(document).on("submit","#editUserForm",function () {
			var ouser = $("#editUserOrg").val();
            if(ouser === "nothing") {
                $("#editResponse").html("<br><div class='alert alert-danger' style='height:55px;width:175px;'><p>ERROR:Enter ID</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
                return false;
            }
			var user = $("#editUserUser").val();
			if (user.length === 0) user = -999;
			var password = $("#editUserPass").val();
			if (password.length === 0) password = -999;
			var type = parseInt($("#editUserType").val());
			if (type.length === 0) type = -999;
			if (validateUser(type) === true) {
				$.post("/prjt/admin_con/editUser", {
					ouser: ouser,
					user: user,
					password: password,
					type: type
				}, function (data) {
					$("#editResponse").html("<br><div class='alert alert-success' style='height:55px;width:175px;'><p>"+data+"</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
					return false;
				});
				return false;
			} else {
				$("#editResponse").html("<br><div class='alert alert-danger' style='height:55px;width:175px;'><p>Error</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
				return false;
			}
			return false;
		});

		$(document).on("submit", "#addUsageForm", function () {
			var user = $("#addUsageUser").val();
			var date = $("#addUsageDate").val();
			var time = parseInt($("#addUsageTime").val());
			var comp = parseInt($("#addUsageComp").val());
			if (validateUsage(date, time, comp) === true) {
				$.post("/prjt/admin_con/addUsageTable", {
					user: user,
					date: date,
					time: time,
					comp: comp
				}, function (data) {
					$("#addUsageResponse").html("<br><div class='alert alert-success' style='height:55px;width:175px;'><p>"+data+"</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
					$("#addUsageResponse").show();
					return false;
				});
				return false;
			} else {
                console.log("as");
				$("#addUsageResponse").html("<br><div class='alert alert-danger' style='height:55px;width:175px;'><p>ERROR</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
				$("#addUsageResponse").show();
				return false;
			}
			return false;

		});

		$(document).on("submit", "#addUserForm", function () {
			var user = $("#addUserUser").val();
			var password = $("#addUserPass").val();
			var type = parseInt($("#addUserType").val());
			if (validateUser(type) === true) {
				$.post("/prjt/admin_con/addUserTable", {
					user: user,
					password: password,
					type: type
				}, function (data) {
					$("#addResponse").html("<br><br><div class='alert alert-success' style='height:55px;width:175px;'><p>"+data+"</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
					$("#addResponse").show();
					return false;
				});
				return false;
			} else {
				$("#addResponse").html("<br><br><div class='alert alert-danger' style='height:55px;width:175px;'><p>Error</p></div>").delay(2).fadeIn(3000).delay(2000).fadeOut(300);
				$("#addResponse").show();
				return false;
			}
			return false;
		});

	});


	function validateUser(n) {
		if (n === -999) return true;
		if (n > 0 && n < 5) return true;
		return false;
	}

	function validateUsage(str, time, comp) {
		if (time < 0) return false;
		if (comp < 0) return false;
		if (str.substring(2, 3) !== "-" || str.substring(2, 3) !== "-" || str.length !== 10)
			return false;
		return true;
	}

	function getSum(data, key) {
		var sum = 0,
			i;
		for (i = 0; i < data.length; i++) {
			if (key === data[i].comp_id) {
				sum = sum + parseInt(data[i].time);
			}
		}
		return sum;
	}

	function orderList(d, str) {
		var arr = [],
			i;
		for (i = 0; i < d.length; i++)
			arr[i] = d[i][str];
            arr.sort(function(a,b){return a-b;})

		return arr;
	}
    
    function getTodaysDate(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;        
        var yyyy = today.getFullYear();
        
        if(dd<10){dd='0'+dd} 
        if(mm<10){mm='0'+mm} 
        today = dd+'-'+mm+'-'+yyyy;
        
        return today;   
    }

}(this));