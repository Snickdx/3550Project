(function(window){
    $(document).ready(function(){
        
        //jquery get for the User Info Button
        $("#grp3b1").click(function(){
            $.get("/prjt/mem3/getTable",function(data){
                var content = "<h2 class='text-center'>Supervisor " + data.username + " Information</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Id</th><th>Username(Student Id)</th><th>User Type</th></tr></thead><tbody>";
                content += '<tr><td>' + data.id  + '</td>' + '<td>' + data.username  + '</td>' + '<td>' + data.type + '</td></tr>';
                content += "</tbody></table>";
                $("#grp3d1").html(content); 
            },"json");
        });
        
        //jquery get for the Log Table Button
        $("#grp3b3").click(function(){
            $.get("/prjt/mem3/getLogTable",function(data){
                var i;
                var content = "<h2 class='text-center'>Supervisor " + data[0].username + " Log</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#grp3d1").html(content);
            },"json");
        });
        
        
		
        $("#grp3b2").click(function(){
             $.get("/prjt/mem3/getLogTable",function(data) {
                var i,time=[],date=[];
                for(i = 0; i < data.length; i++){
                    time.push(parseInt(data[i].time));
                    date.push(data[i].date);
                }
                 
                $('#grp3d1').highcharts({
                    
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
		$("#view3b1").click(function(){
			var content = "";
			$("#view3d2").html(content);
            var today = getTodaysDate();
            $.get("/prjt/mem3/getDailyTable",{today:today},function(data){
                var i;var unSeen = true;
				var usersSeen = new Array();
                var MenuContent = "<select id='sel' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){
					for(j=0;j<usersSeen.length;j++){
						if(data[i].username === usersSeen[j]){
							unSeen = false;
						}
					}
					if(unSeen === true){
						usersSeen[usersSeen.length] = data[i].username;
						MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
					}
					unSeen = true;
				}
                MenuContent += "</select>";
                $("#view3d1").html(MenuContent); 
            },"json");
        });
		
		//load table for selected Student ID
		$(document).on("change","#sel",function(){
            var user = $(this).val();
            var today = getTodaysDate();
            $.get("/prjt/mem3/getTodayLogTable",{user:user,today:today},function(data){
                var i;
                var content = "<h2 class='text-center'>Student " + user + " Log for "+ today +"</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer ID</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].username === user){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view3d2").html(content);
            },"json");
		});
		
		
		//load table for selected Computer ID
		$(document).on("change","#selComp",function(){
            var comp = $(this).val();
            var today = getTodaysDate();
			
            $.get("/prjt/mem3/getTodayLogTable",{user:comp,today:today},function(data){
                var i;
                var content = "<h2 class='text-center'>Computer " + comp + " Log for "+ today +"</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>User logged in</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].comp_id === comp){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].username  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view3d2").html(content);
            },"json");
		});
    
 
	//dynamically loading the computer IDs for the "select a computer" button
	$("#view3b2").click(function(){
			var content = "";
			$("#view3d2").html(content);
            var today = getTodaysDate();
            $.get("/prjt/mem3/getDailyTable",{today:today},function(data){
                var i;var unSeen = true;
				var pcsSeen = new Array();
                var MenuContent = "<select id='selComp' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){
					for(j=0;j<pcsSeen.length;j++){
						if(data[i].comp_id === pcsSeen[j]){
							unSeen = false;
						}
					}
					if(unSeen === true){
						pcsSeen[pcsSeen.length] = data[i].comp_id;
						MenuContent += '<option id ='+data[i].comp_id+' value="'+data[i].comp_id+'">' + data[i].comp_id  + "</option>";	
					}
					unSeen = true;
					
				}
                MenuContent += "</select>";
                $("#view3d1").html(MenuContent); 
            },"json");
        });
	
		//code to display all log data after clicking the button
		$("#view3b3").click(function(){
			var content ="";
			$("#view3d1").html(content);
			var today= getTodaysDate();
			$.get("/prjt/mem3/getDailyTable",{today:today},function(data){
                var i;
                var content = "<h2 class='text-center'>Date Log: " + data[0].date + " </h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#view3d2").html(content);
            },"json");
		
			
		});
	
		//load line chart for button 4
		$("#view3b4").click(function(){
			var today = getTodaysDate();
			$.get("/prjt/mem3/getDailyTable",{today:today},function(data){
				var i,k;var timesSeen = new Array();
				var unSeen = true; var freq = new Array();
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
						if(timesSeen[k] > timesSeen[i]){
							var temp = timesSeen[k];
							timesSeen[k] = timesSeen[i];
							timesSeen[i] = temp;
							var temp2 = freq[k];
							freq[k] = freq[i];
							freq[i] = temp2;
						}
					}
				}
				
				$('#view3d2').highcharts({
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

	
		//load pie chart for button 5					
		$("#view3b5").click(function(){
			var today = getTodaysDate();
            $.get("/prjt/mem3/getDailyTable",{today:today},function(data) {
                
				//need to calculate the actual data for pie chart
				var i,j,k;var finalArrayData = new Array();
				var unSeen = true;var pcsSeen = new Array();
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
					finalArrayData[k] = 0;
					for(i=0;i<data.length;i++){
						if(pcsSeen[k] === data[i].comp_id){
							finalArrayData[k] = finalArrayData[k] + parseInt(data[i].time);
						}
					}
				}
				
				
				
				//loads pie chart
				$("#view3d2").highcharts({
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
		
		
    });
		
        
 
    //function to get today's date
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
