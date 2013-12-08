(function(window){
	$(document).ready(function(){
		$("#view2b6").click(function(){
			var MenuContent = "";
			$("#view2d2").html(MenuContent);
			$.get("/prjt/mem2/getUniqueDateLogs",function(data){
				var i,j; var datesSeen = [],unSeen = true;
				MenuContent = "<select id='selDate' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
				for(i=0;i<data.length;i++){
					MenuContent += '<option id ='+data[i].date+' value="'+data[i].date+'">' + data[i].date + "</option>";
				}
				MenuContent += "</select>";
				$("#view2d1").html(MenuContent);		
			},"json");
		});
		
		$(document).on("change","#selDate",function(){
            var dateS = $(this).val();
            $.get("/prjt/mem2/getDateLogTable",{dateS:dateS},function(data){
                var i;
                var content = "<h2 class='text-center'> Log for "+ dateS +"</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Comp ID</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].date === dateS){
						content += '<tr><td>' + data[i].username  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view2d2").html(content);
            },"json");
		});
	
	
	//dynmically load student ids in options menu
		$("#view2b1").click(function(){
			var MenuContent = "";
			$("#view2d2").html(MenuContent);
            $.get("/prjt/mem2/getUniqueIdLogs",function(data){
                var i,arr = [];
                arr = orderList(data,"username");
                MenuContent = "<select id='selStu' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){	
						//MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
						MenuContent += '<option id ='+arr[i]+' value="'+arr[i]+'">' + arr[i]  + "</option>";	
				}
                MenuContent += "</select>";
                $("#view2d1").html(MenuContent); 
            },"json");
        });
		
		//load table for selected Student ID
		$(document).on("change","#selStu",function(){
            var user = $(this).val();
            $.get("/prjt/mem2/getIdLogTable",{user:user},function(data){
                var i;
                var content = "<h2 class='text-center'>Students </h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer ID</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].username === user){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view2d2").html(content);
            },"json");
		});
	
		//load table for selected Computer ID
		$(document).on("change","#selComp2",function(){
            var comp = $(this).val();            
            $.get("/prjt/mem2/getCompLogTable",{comp_id:comp},function(data){
                var i;
                var content = "<h2 class='text-center'>Computer</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>User logged in</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
					if(data[i].comp_id === comp){
						content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].username  + '</td>' + '<td>' + data[i].time + '</td></tr>';
					}
				}
                content += "</tbody></table>";
                $("#view2d2").html(content);
            },"json");
		});
    
 
	//dynamically loading the computer IDs for the "select a computer" button
	$("#view2b2").click(function(){
			var content = "";
			$("#view2d2").html(content);        
            $.get("/prjt/mem2/getUniqueCompLogs",function(data){
                var i,arr = [];
                arr = orderList(data,"comp_id");
                var MenuContent = "<select id='selComp2' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){
						//MenuContent += '<option id ='+data[i].comp_id+' value="'+data[i].comp_id+'">' + data[i].comp_id  + "</option>";	
						MenuContent += '<option id ='+arr[i]+' value="'+arr[i]+'">' + arr[i]  + "</option>";	
				}
                MenuContent += "</select>";
                $("#view2d1").html(MenuContent);
            },"json");
        });
	
	
		//content for the all logged information
	$("#view2b3").click(function(){
		var content ="";
			$("#view2d1").html(content);
			$.get("/prjt/mem2/getAllLogInfo",function(data){
                var i;
                var content = "<h2 class='text-center'>Date Log: " + data[0].date + " </h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#view2d2").html(content);
            },"json");
	
	
	
	});
	
	
	//line graph
	$("#view2b4").click(function(){
			$.get("/prjt/mem2/getAllLogInfo",function(data){
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
				$('#view2d2').highcharts({
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
	$("#view2b5").click(function(){
            $.get("/prjt/mem2/getAllLogInfo",function(data) {
                
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
				$("#view2d2").highcharts({
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
	
	
 	
 	
 	
	$("#p2Info").click(function(){
            $.get("/prjt/mem2/getTable",function(data){
                var content = "<h2 class='text-center'>Student " + data.username + " Information</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Id</th><th>Username(Student Id)</th><th>User Type</th></tr></thead><tbody>";
                content += '<tr><td>' + data.id  + '</td>' + '<td>' + data.username  + '</td>' + '<td>' + data.type + '</td></tr>';
                content += "</tbody></table>";
                $("#dispInfo").html(content); 
            },"json");
        });
        
        //jquery get for the Log Table Button
        $("#p2LogTable").click(function(){
            $.get("/prjt/mem2/getLogTable",function(data){
                var i;
                var content = "<h2 class='text-center'>Student " + data[0].username + " Log</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#dispInfo").html(content); 
            },"json");
        });
        
        $("#p2Bargraph").click(function(){
             $.get("/prjt/mem2/getLogTable",function(data) {
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
	
	
 	
 	
 	
 	
 	
 	});
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