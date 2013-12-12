(function(window){
	$(document).ready(function(){
		$("#view1b6").click(function(){
			var MenuContent = "";
			$("#view1d2").html(MenuContent);
			$.get("/prjt/mem1/getUniqueDateLogs",function(data){
				var i,j; var datesSeen = [],unSeen = true;
				MenuContent = "<select id='selDate1' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
				for(i=0;i<data.length;i++){
					MenuContent += '<option id ='+data[i].date+' value="'+data[i].date+'">' + data[i].date + "</option>";
				}
				MenuContent += "</select>";
				$("#view1d1").html(MenuContent);		
			},"json");
		});
		
		$(document).on("change","#selDate1",function(){
            var dateS = $(this).val();
            $.get("/prjt/mem1/getDateLogTable",{dateS:dateS},function(data){
                var i;
                var content = "<h2 class='text-center'> Log for "+ dateS +"</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Comp ID</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].date === dateS){
						content += '<tr><td>' + data[i].username  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view1d2").html(content);
            },"json");
		});
	 
	 
	//dynmically load student ids in options menu
		$("#view1b1").click(function(){
			var MenuContent = "";
			$("#view1d2").html(MenuContent);
            $.get("/prjt/mem1/getUniqueIdLogs",function(data){
                var i,arr = [];
                arr = orderList(data,"username");
                MenuContent = "<select id='selStu1' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){	
						//MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
						MenuContent += '<option id ='+arr[i]+' value="'+arr[i]+'">' + arr[i]  + "</option>";	
				}
                MenuContent += "</select>";
                $("#view1d1").html(MenuContent); 
            },"json");
        });
		
		//load table for selected Student ID
		$(document).on("change","#selStu1",function(){
            var user = $(this).val();
            $.get("/prjt/mem1/getIdLogTable",{user:user},function(data){
                var i;
                var content = "<h2 class='text-center'>Students </h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer ID</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].username === user){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view1d2").html(content);
            },"json");
		});
	
		//load table for selected Computer ID
		$(document).on("change","#selComp1",function(){
            var comp = $(this).val();            
            $.get("/prjt/mem1/getCompLogTable",{comp_id:comp},function(data){
                var i;
                var content = "<h2 class='text-center'>Computer</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>User logged in</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].comp_id === comp){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].username  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view1d2").html(content);
            },"json");
		});
    
 
	//dynamically loading the computer IDs for the "select a computer" button
	$("#view1b2").click(function(){
			var content = "";
			$("#view1d2").html(content);        
            $.get("/prjt/mem1/getUniqueCompLogs",function(data){
                var i,arr = [];
                arr = orderList(data,"comp_id");
                var MenuContent = "<select id='selComp1' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){
						//MenuContent += '<option id ='+data[i].comp_id+' value="'+data[i].comp_id+'">' + data[i].comp_id  + "</option>";	
						MenuContent += '<option id ='+arr[i]+' value="'+arr[i]+'">' + arr[i]  + "</option>";	
				}
                MenuContent += "</select>";
                $("#view1d1").html(MenuContent);
            },"json");
        });
	
	
		//content for the all logged information
	$("#view1b3").click(function(){
		var content ="";
			$("#view1d1").html(content);
			$.get("/prjt/mem1/getAllLogInfo",function(data){
                var i;
                var content = "<h2 class='text-center'>Date Log: " + data[0].date + " </h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#view1d2").html(content);
            },"json");
	
	
	
	});
	
	
	//line graph
	$("#view1b4").click(function(){
			$.get("/prjt/mem1/getAllLogInfo",function(data){
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
				//console.log(typeof(timesSeen[0]));
				$('#view1d2').highcharts({
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
	$("#view1b5").click(function(){
            $.get("/prjt/mem1/getAllLogInfo",function(data) {
                
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
				$("#view1d2").highcharts({
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
	
	
 	
 	
 	
	$("#p1Info").click(function(){
            $.get("/prjt/mem1/getTable",function(data){
                var content = "<h2 class='text-center'>Student " + data.username + " Information</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Id</th><th>Username(Student Id)</th><th>User Type</th></tr></thead><tbody>";
                content += '<tr><td>' + data.id  + '</td>' + '<td>' + data.username  + '</td>' + '<td>' + data.type + '</td></tr>';
                content += "</tbody></table>";
                $("#dispInfo").html(content); 
            },"json");
        });
        
        
        $("#log1b2").click(function(){
			var content = "";
			$("#log1d1").html(content);
            $.get("/prjt/mem1/getWebLogTable",function(data){
                var i;
				content = "<h2 class='text-center'>Website Logged Infomation</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Logged On</th><th>Logged Off</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>'+data[i].id+'</td><td>' + data[i].username  + '</td>' + '<td>' + data[i].start  + '</td>' + '<td>' + data[i].end + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#log1d2").html(content); 
            },"json");
        });
        
        
        
        //jquery get for the Log Table Button
        $("#p1LogTable").click(function(){
            $.get("/prjt/mem1/getLogTable",function(data){
                var i;
                var content = "<h2 class='text-center'>Student " + data[0].username + " Log</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#dispInfo").html(content); 
            },"json");
        });
        
        $("#p1Bargraph").click(function(){
             $.get("/prjt/mem1/getLogTable",function(data) {
                var i,time=[],date=[];
                for(i = 0; i < data.length; i++){
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
            
            },"json");
        });
		
		//dynmically load student ids in options menu
		$("#log1b1").click(function(){
			var MenuContent = "";
			$("#log1d2").html(MenuContent);
            $.get("/prjt/mem1/getUniqueIdLogs2",function(data){
                var i,arr = [];
                arr = orderList(data,"username");
                MenuContent = "<select id='selStuLog2' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){	
						//MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
						MenuContent += '<option id ='+arr[i]+' value="'+arr[i]+'">' + arr[i]  + "</option>";	
				}
                MenuContent += "</select>";
                $("#log1d1").html(MenuContent); 
            },"json");
        });
		
		//load table for selected Student ID
		$(document).on("change","#selStuLog2",function(){
            var user = $(this).val();
            $.get("/prjt/mem1/getIdLogTable2",{user:user},function(data){
                var i;
                var content = "<h2 class='text-center'>Logs</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Log ID</th><th>Log Start Time</th><th>Log End Time</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].username === user){
						content += '<tr><td>' + data[i].id  + '</td>' + '<td>' + data[i].start  + '</td>' + '<td>' + data[i].end + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#log1d2").html(content);
            },"json");
		});
	
	
 	$("#addb1").click(function(){
        $("#addResponse").hide();
        $("#addForm").html('<br><br><form id="addUserForm">Enter Username(Student ID): <input type="text" id="addUserUser" name="addUserUser" required/><br><br>Enter Password: <input type="password" id="addUserPass" name="addUserPass" required/><br><br>Enter User Type(1 to 4): <input type="text" id="addUserType" name="addUseType"required/><br><input type="submit" name="submit" value"Add Record"/></form>');                     
    });
    
    
    $("#addb2").click(function(){
        $("#addResponse").hide();
        $("#addForm").html('<br><br><form id="addUsageForm">Enter Username: <input type="text" id="addUsageUser" name="addUsageUser"required/><br><br>Date: <input type="text" id="addUsageDate" name="addUsageDate" required/><br><br>Time Spent: <input type="text" id="addUsageTime" name="addUsageTime" required/><br><br>Computer ID: <input type="text" id="addUsageComp" name="addUsageComp" required/><br><input  type="submit" name="addUsageForm" value"Add Record"/></form>' );                     
    });
        
    $("#deleteSub").click(function(){
        var user = $("#deleteUser").val();
        $.post("/prjt/mem1/deleteUser",{user:user},function(data){
            $("#deleteResp").html(data);
            return false;
        });
    });
        
   $("#editUserForm").click(function(){
        var ouser = $("#editUserOrg").val(); 
        var user = $("#editUserUser").val(); if(user.length === 0 ) user = -999;
        var password = $("#editUserPass").val(); if(password.length === 0 ) password = -999;
        var type = parseInt($("#editUserType").val()); if(type.length === 0 ) type = -999;
       if(validateUser(type) === true){
            $.post("/prjt/mem1/editUser",{ouser:ouser,user:user,password:password,type:type},function(data){
                $("#editResponse").html(data);
                return false;
            });
           return false;
       }else {
            $("#editResponse").html("<p>User Type Must Be A Number(1 to 4)");  
           return false;
       }
       return false;
    });
        
    $(document).on("submit","#addUsageForm",function(){
        var user = $("#addUsageUser").val();
        var date = $("#addUsageDate").val();
        var time = parseInt($("#addUsageTime").val());
        var comp = parseInt($("#addUsageComp").val());
        if(validateUsage(date,time,comp) === true){
            $.post("/prjt/mem1/addUsageTable",{user:user,date:date,time:time,comp:comp},function(data){
                $("#addResponse").html(data);
                $("#addResponse").show();
                return false;
            });
            return false;
        }else {
            $("#addResponse").html("<p>User Type Must Be A Number(1 to 4)"); 
            $("#addResponse").show();
           return false;
       }
       return false;
        
    });
 	
 	
 	$(document).on("submit","#addUserForm",function(){
        var user = $("#addUserUser").val();
        var password = $("#addUserPass").val();
        var type = parseInt($("#addUserType").val());
        if(validateUser(type) === true){
            $.post("/prjt/mem1/addUserTable",{user:user,password:password,type:type},function(data){
                $("#addResponse").html(data);
                $("#addResponse").show();
                return false;
            });
            return false;
        }else {
            $("#addResponse").html("<p>User Type Must Be A Number(1 to 4)"); 
            $("#addResponse").show();
           return false;
       }
       return false;
    });
 	
 	
 	
 	
 	
 	
 	});
    
    
    function validateUser(n){
        if (n === -999) return true;
        if(n>0 && n<5) return true;
        return false;
    }
    
    function validateUsage(str,time,comp){
        if(time < 0) return false;
        if(comp < 0) return false;
        if(str.substring(2,3) !== "-" || str.substring(2,3) !== "-" || str.length !== 10 )
           return false;
        return true;
    }
    
	function getSum(data,key){
        var sum=0,i;
        for(i=0;i<data.length;i++){
            if(key === data[i].comp_id){
                sum = sum +  parseInt(data[i].time);
            }
        }
        return sum;
    }
    
    function orderList(d,str){
        var arr = [],i;
        for(i=0;i<d.length;i++)
            arr[i] = d[i][str];
        arr.sort();
        
        return arr;
    }
 	
 }(this));