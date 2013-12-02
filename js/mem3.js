(function(window){
    $(document).ready(function(){
        
        //jquery get for the User Info Button
        $("#grp3b1").click(function(){
            $.get("/prjt/mem3/getTable",function(data){
                var content = "<h2 class='text-center'>Student " + data.username + " Information</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Id</th><th>Username(Student Id)</th><th>User Type</th></tr></thead><tbody>";
                content += '<tr><td>' + data.id  + '</td>' + '<td>' + data.username  + '</td>' + '<td>' + data.type + '</td></tr>';
                content += "</tbody></table>";
                $("#grp3d1").html(content); 
            },"json");
        });
        
        //jquery get for the Log Table Button
        $("#grp3b3").click(function(){
            $.get("/prjt/mem3/getLogTable",function(data){
                var i;
                var content = "<h2 class='text-center'>Student " + data[0].username + " Log</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#grp3d1").html(content); 
            },"json");
        });
        
        
        /*$("#grp4b3").click(function(){
            

		
	   });*/
        
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
         
	//drop down menu stuffs
		$("#view3b1").click(function(){
            $.get("/prjt/mem3/getDailyTable",function(data){
                var i;
                var MenuContent = "<select class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){
                    MenuContent += '<option value="'+data[i].username+'">' + data[i].username  + "</option>";
                }
                MenuContent += "</select>";
                $("#view3d1").html(MenuContent); 
            },"json");
        });
		
		$(".IDmenu").change(function(){
			console.log("fsfd");
		});
    });
	
}(this));
