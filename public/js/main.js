$(document).ready(function() {
    //alert("hariom");
    $('#product_id').on('change', function(){
        var skuId = $(this).val();
        
        //alert(skuId);
        if(skuId && skuId !=""){
            $.ajax({
               type:"GET",
               url:'/Api/get_item_price',
               data:{skuId:skuId},
               success:function(res){               
                if(res){
                    //console.log(res);
                    $("#item_price").val('');
                    $("#item_quantity").val('');
                    $("#item_profit").val('');
                    res = $.parseJSON(res, true);
                    //console.log("price=>  "+res[0].sku);
                    $("#item_price").val(res[0].selling_price);
                    $("#sku").val(res[0].sku);
                }else{
                   $("#item_price").val('');
                   $("#item_quantity").val('');
                   $("#item_profit").val('');
                }
               }
            });
        }else{
            //alert("dd");
            $("#item_price").val('');
            $("#item_quantity").val('');
            $("#item_profit").val('');
        }
    });

    $('#item_quantity').on('keyup', function(){
        var quantity = $(this).val();
        var sku = $('#product_id').val();
        //alert(quantity);
        if(sku && quantity){
            $.ajax({
               type:"GET",
               url:'/Api/get_item_profit',
               data:{sku:sku,quantity:quantity},
               success:function(res){               
                if(res){
                    console.log(res);
                    $("#item_profit").val('');
                    res = $.parseJSON(res, true);
                    $("#item_profit").val(res);
                }else{
                   $("#item_profit").val('');
                }
               }
            });
        }else{
            $("#item_profit").val('');
        }
    });


    $('#report').on('change', function(){
        var filterOn = $(this).val();
        $("#table tbody tr").remove();
        //alert(filterOn);
        if(filterOn){
            $.ajax({
               type:"GET",
               url:'/Api/getReports',
               data:{filterOn:filterOn},
               success:function(res){               
                if(res){
                    console.log(res);
                    var i=1;
                    $.each(JSON.parse(res), function(index,jsonObject){
                        var row='<tr>';
                        row+='<td>'+i+'</td>';
                        row+='<td>'+jsonObject['category_name']+'</td>';
                        row+='<td>'+jsonObject['subcategory_name']+'</td>';
                        row+='<td>'+jsonObject['sku']+'</td>';
                        row+='<td>'+jsonObject['item_quantity']+'</td>';
                        row+='<td>'+jsonObject['item_price']+'</td>';
                        row+='<td>'+jsonObject['item_profit']+'</td>';
                        row +='<tr>';
                        $('#table tbody').append(row);
                        i++;
                    });
                }else{
                    var row='<tr><td colspan="7"><strong>No Records Found..</strong></td></tr>';
                }
               }
            });
        }
    });




});