$(document).ready(function(){
    // alert('hello');
    $(document).on('click','.inc',function(){
        let productId = $(this).closest('.qtyBox').find('.productId').val();
        console.log(productId);
        let productQty = $(this).closest('.qtyBox').find('.num-product');
        let currentQty = parseInt(productQty.val());
        console.log(currentQty);
        if(!isNaN(currentQty)){
            let updatedQty = currentQty ;
            // productQty.val(updatedQty)
            updateIncDec(productId,updatedQty );   
            updatePrice($(this),updatedQty);      
        }
    
    })
    $(document).on('click','.dec',function(){
        let productId = $(this).closest('.qtyBox').find('.productId').val();
        console.log(productId);
        let productQty = $(this).closest('.qtyBox').find('.num-product');
        let currentQty = parseInt(productQty.val());
        console.log(currentQty);
        if(!isNaN(currentQty)){
            let updatedQty = currentQty ;  
            // productQty.val(updatedQty)
            updateIncDec(productId,updatedQty );  
            updatePrice($(this),updatedQty);      
        }
    
    })
    
    function updatePrice(elemet , qty){
               let row = $(elemet).closest('.table_row'); 
               let price = row.find('.column-3').text();
               let total = price*qty ;
               row.find('.column-5').text(total);
    
        
    }
    
    // function 
    function  updateIncDec(proId , proQty){
            $.ajax({
                url :  "shopcart.php",
                type : "POST",
                data : {
                    "qtyIncDec" : true,
                    "productId" : proId,
                    "productQty" : proQty
                },
                success : function(response){
                            console.log(response);
                }
    
            })    
        
    
    }
    
    })