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
            var today = getTodaysDate();
            //console.log(today);
            $.get("/prjt/mem3/getDailyTable",{today:today},function(data){
                var i;
                var MenuContent = "<select id='sel' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){
                    MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";
                }
                MenuContent += "</select>";
                $("#view3d1").html(MenuContent); 
            },"json");
        });
		
        //load table for selected id
		$(document).on("change","#sel",function(){
            var user = $(this).val();
            var today = getTodaysDate();
            $.get("/prjt/mem3/getTodayLogTable",{user:user,today:today},function(data){
                var i;
                var content = "<h2 class='text-center'>Student " + data[0].username + " Log for "+ today +"</h2><table id='mytable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
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
