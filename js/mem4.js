(function(window){
    $(document).ready(function(){
        
        
        //jquery get for the User Info Button
        $("#p4Info").click(function(){
            $.get("/prjt/mem4/getTable",function(data){
                var content = "<h2 class='text-center'>Student " + data.username + " Information</h2><table id='myInfoTable' class='table table-striped table-bordered'><thead><tr><th>Id</th><th>Username(Student Id)</th><th>User Type</th></tr></thead><tbody>";
                content += '<tr><td>' + data.id  + '</td>' + '<td>' + data.username  + '</td>' + '<td>' + data.type + '</td></tr>';
                content += "</tbody></table>";
                $("#dispInfo").html(content); 
            },"json");
        });
        
        //jquery get for the Log Table Button
        $("#p4LogTable").click(function(){
            $.get("/prjt/mem4/getLogTable",function(data){
                var i;
                var content = "<h2 class='text-center'>Student " + data[0].username + " Log</h2><table id='myLogTable' class='table table-striped table-bordered'><thead><tr><th>Date</th><th>Computer Id</th><th>Session Time(min)</th></tr></thead><tbody>";
                for(i= 0; i < data.length; i++){
                    content += '<tr><td>' + data[i].date  + '</td>' + '<td>' + data[i].comp_id  + '</td>' + '<td>' + data[i].time + '</td></tr>';
                }
                content += "</tbody></table>";
                $("#dispInfo").html(content); 
            },"json");
        });
        
        
        $("#p4Bargraph").click(function(){
             $.get("/prjt/mem4/getLogTable",function(data) {
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


}(this));
