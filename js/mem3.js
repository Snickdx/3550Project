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
					console.log(i,usersSeen.length,unSeen,usersSeen);
				}
                MenuContent += "</select>";
                $("#view3d1").html(MenuContent); 
            },"json");
        });
		
		//load table for selected Student ID
		$(document).on("change","#sel",function(){
            var user = $(this).val();
            var today = getTodaysDate();
			console.log("sdsd");
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
			console.log("sdsd");
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
	
		$("#view3b3").click(function(){
			var content ="";
			$("#view3d1").html(content);
			var today= getTodaysDate();
			$.get("/prjt/mem3/getDailyTable",{today:today},function(data){
				console.log("dsd");
                var i;
                var content = "<h2 class='text-center'>Date Log: " + data[0].date + " </h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Username</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].username + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#view3d2").html(content);
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
