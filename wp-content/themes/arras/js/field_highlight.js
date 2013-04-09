$(document).ready(function(){

//Animation For infoBox
$("input.info").focus(function() {
	
				$(".infoBox").fadeIn(100);

        });
        $("input.info").blur(function() {
                $(".infoBox").fadeOut(100);
        });
// Current Field Selector	
$("input, select").focus(function() {
                $(this).parent().addClass("curFocus")
        });
        $("input, select").blur(function() {
                $(this).parent().removeClass("curFocus")
        });
//Remove Value in Name Field
    
    $('input[type="text"]').focus(function() {  
         
        if (this.value == this.defaultValue){  
            this.value = '';  
        }  

    });
	
	 $('select.game').blur(function() {  
         
		 if (this.value != "Foosball" && this.value != "blank" && this.value != "Tennis" ){  
           $(".team").fadeIn(200);
        }
		        
		if (this.value == "Foosball" || this.value == "blank" || this.value == "Tennis"){  
           $(".team").hide();
        }
		
    });

		
});