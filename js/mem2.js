(function(window){
	$(document).ready(function(){
		$("#viewb6").click(function(){
			var MenuContent = "";
			$("#viewd2").html(MenuContent);
			$.get("/prjt/mem2/getUniqueDateLogs",function(data){
				var i,j; var datesSeen = [],unSeen = true;
				MenuContent = "<select id='selDate' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
				for(i=0;i<data.length;i++){
					MenuContent += '<option id ='+data[i].date+' value="'+data[i].date+'">' + data[i].date + "</option>";
				}
				MenuContent += "</select>";
				$("#viewd1").html(MenuContent);		
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
                $("#viewd2").html(content);
            },"json");
		});
	
	
	//dynmically load student ids in options menu
		$("#viewb1").click(function(){
			var MenuContent = "";
			$("#viewd2").html(MenuContent);
            $.get("/prjt/mem2/getUniqueIdLogs",function(data){
                var i;
                 MenuContent = "<select id='sel' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){	
						MenuContent += '<option id ='+data[i].username+' value="'+data[i].username+'">' + data[i].username  + "</option>";	
				}
                MenuContent += "</select>";
                $("#viewd1").html(MenuContent); 
            },"json");
        });
		
		//load table for selected Student ID
		$(document).on("change","#sel",function(){
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
                $("#viewd2").html(content);
            },"json");
		});
	
		//load table for selected Computer ID
		$(document).on("change","#selComp",function(){
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
                $("#viewd2").html(content);
            },"json");
		});
    
 
	//dynamically loading the computer IDs for the "select a computer" button
	$("#viewb2").click(function(){
			var content = "";
			$("#viewd2").html(content);        
            $.get("/prjt/mem2/getUniqueCompLogs",function(data){
                var i;
                var MenuContent = "<select id='selComp' class='IDmenu'><option selected ='selected' value ='nothing'>Choose ID</option>";
                for(i= 0; i < data.length; i++){
						MenuContent += '<option id ='+data[i].comp_id+' value="'+data[i].comp_id+'">' + data[i].comp_id  + "</option>";	
				}
                MenuContent += "</select>";
                $("#viewd1").html(MenuContent);
            },"json");
        });
	
	
	
	
	
	
	
	
	
	
	
	
	});
	
}(this));