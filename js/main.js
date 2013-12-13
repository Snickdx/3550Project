(function(window){
    $(document).ready(function(){
            $(".loader").hide();
        
            $("#p4LogTable").click(function(){
                console.log("as");
                $(".loader").hide();
                var load=0;
                var offset = 7;
                $(window).scroll(function(){
                        var nbr = getSize();
                        if ($("#myLogTable").length !== 0) {
                        
                            if($(window).scrollTop() === $(document).height()-$(window).height())
                            {
                                $(".loader").show();
                                load++;
                                if(load * 10 > nbr)
                                {
                                    if((load-nbr) < 10)
                                    {	
                                        offset = load-nbr;	
                                    }
                                    $(".loader").hide();
                                }else{
                                    $.post("/prjt/mem4/infTable",{load:load,offset:offset},function(data){
                                        $('#myLogTable tr:last').after(data);
                                        $(".loader").hide();
                                    });
                                }
                            } 
                        }
                });
            });

    });
    
    function getSize(){
        var size;
        $.get("/prjt/mem4/getSize",function(data){
             size = parseInt(data);
            return size;
        });
    }
    
}(this));