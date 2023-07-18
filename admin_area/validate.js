$(document).ready(function(){
    $("#error").hide();
    $("#desc_error").hide();
    $("#keyword_error").hide();
     $("#price_error").hide();
    


    let title_error = true;
    let desc_error= true;
    let keyword_error= true;
    let price_check= true;
    // $("#product_price").keyup(function(){

    //      var p=$("#product_price").val();
    //      if(p == ""){
    //         $("#price_error").css("background-color","red");
    //      }
    //    alert(p);
    //   });
  
    // product tittle check
    $("#product_title").keyup(function (){
         username_check();
    });

    function username_check(){
        let product_title= $("#product_title").val()
        if(product_title == ""){
            $("#error").show();
            $("#error").html("**plese fill product title");
            $("#error").focus();
            $("#error").css("color","red");
            title_error= false;
            return false;
        }
        else{
            $('#error').hide();
        }
        if(product_title.length<8 ||product_title.length > 25){
            $("#error").show();
            $("#error").html("**must betweeen 8-10");
            $("#error").focus();
            $("#error").css("color","red");
            title_error= false;
            return false;
        }
        else{
            $('#error').hide();
        }

        
    // product description check
        
    }
    $("#description").keyup(function (){
        product_desc_check();
   });
        function product_desc_check(){
            let product_desc= $("#description").val();
           
        
            if(product_desc == ""){
                $("#desc_error").show();
                $("#desc_error").html("**plese fill product description");
                $("#desc_error").focus();
                $("#desc_error").css("color","red");
                desc_error= false;
                return false;
            }
            else{
                $('#desc_error').hide();
            }

            if( product_desc.length < 8 ||product_desc.length > 85){
                $("#desc_error").show();
                $("#desc_error").html("**length must between 8-85");
                $("#desc_error").focus();
                $("#desc_error").css("color","red");
                desc_error= false;
                return false;
            }
            else{
                $('#desc_error').hide();
            }
       
        }

        // product keyword check

        $("#product_keywords").keyup(function (){
            product_keyword_check();
       });
       function product_keyword_check(){
        let product_keywords= $("#product_keywords").val();

        if(product_keywords == ""){
            $("#keyword_error").show();
            $("#keyword_error").html("**plese fill product keyword");
            $("#keyword_error").focus();
            $("#keyword_error").css("color","red");
            keyword_error= false;
            return false;
        }
        else{
            $('#keyword_error').hide();
        }
        if(product_keywords.length>150){
            $("#keyword_error").show();
            $("#keyword_error").html("** keyword must between 0-150");
            $("#keyword_error").focus();
            $("#keyword_error").css("color","red");
            keyword_error= false;
            return false;
        }
        else{
            $('#keyword_error').hide();
        }

       }

    //    chech
    $("#product_price").keyup(function(){
        product_price_check();
       ;
   });
   function product_price_check(){
    let product_price= $("#product_price").val();

    if(product_price.length ==0){
        $("#price_error").show();
        $("#price_error").html("**plese enter product price");
        $("#price_error").focus();
        $("#price_error").css("color","red");
        price_check= false;
        return false;
    }
    else{
        $("#price_error").hide();
    }
}
    

       $("#submit_btn").click(function(){
         title_error = true;
         desc_error = true;
         keyword_error = true;
         category_check_val=true;
         brand_check = true;
          
          price_check= true;
        username_check();
        product_desc_check();
        product_keyword_check();
        product_price_check();
    
        if((title_error == true) && ( desc_error == true) && (keyword_error == true) && (price_check == true)){
            return true;
        }
        else{
            return false;
        }

       })
});