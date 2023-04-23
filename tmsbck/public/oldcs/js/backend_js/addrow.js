// $(document).ready(function(){

// 	     $('.addRows').on('click',function(){

    

// 				 var tr='<tr>'+
//                       '<td>'+
//                       '<select name="main_cat_id" id="main_cat_id" style="width: 220px;">'+
//                     '<option value="0">Main Category</option>'+
//                     '@foreach($brand as $brand_cat)'+
//                     '<option value="{{$brand_cat->main_cat_id}}">{{$brand_cat->main_cat_name}}</option>'+
//                     '@endforeach'+
//                   '</select>'+
// //'<select name="product_name" class="product_name" id="product_name" style="width: 175px;">'+
//                       //  '<option value="0" selected="true" disabled="true"><h6>Product Name </h6></option>'+
//                         // '@foreach($Product as $key  => $value)'+
//                         //   '<option value="{{$value->id}}">{{$value->product_name}}</option>'+
//                         // '@endforeach'+
//                       //  '</select>'+
//                       '</td>'+
//                       '<td>'+
//                        '<select name="sku[]" class="sku" id="sku" style="width: 175px;">'+
//                       '<option value="0" selected="true" disabled="true"><h6>Product Code </h6></option>'+
//                         '</select>'+
//                       '</td>'+
//                   '<td>'+
//                     '<input  type="text" name="price[]" class="price" id="price" style="width: 140px;">'+
//                   '</td>'+
//                   '<td><input type="text" name="qty[]" class="qty" id="qty" style="width: 45px;">'+
//                   '</td>'+
//                   '<td><input  type="text" name="discount[]" class="discount" id="discount" style="width: 140px;">'+
//                   '</td>'+        
//                   '<td><input type="text" name="total[]" class="total" id="total" style="width: 160px;"></td>'+
//                   '<td><a href="#" class="btn btn-danger btn-mini remove"><strong><i class="icon-remove"></strong></a></td>'+
//                   '</tr>'; 
//                   $('tbody').append(tr);
//                });
// });

    
      // var tr='<tr>\n'+
   //                  '<td>\n'+
   //                   '<select name="main_cat_id" id="main_cat_id" style="width: 220px;">\n'+
   //                  '<option value="0">Main Category</option>\n'+
   //                  '@foreach($brand as $brand_cat)\n' +
   //                  '<option value="{{$brand_cat->main_cat_id}}">{{$brand_cat->main_cat_name}}</option>\n' +
   //                  '@endforeach\n' +
   //                '</select>\n' +
   //                    '</td>\n'+
   //                    '<td>\n'+
   //                    '<select name="sku[]" class="sku" id="sku" style="width: 175px;">\n'+
   //                    '<option value="0" selected="true" disabled="true">Product Code </option>\n'+
   //                    '</select>\n'+
   //                    '</td>\n'+
   //                     '<td><input type="text" name="price[]" class="price" style="width: 140px;"></td>\n'+
   //                    '<td><input type="text" name="qty[]" class="qty" style="width: 45px;"></td>\n'+
   //                     '<td><input type="text" name="discount[]" class="discount" style="width: 140px;"></td>\n'+
   //                    '<td><input type="text" name="total[]" class="total" style="width: 160px;"></td>\n'+
   //                     '<td><a href="#" class="btn btn-danger btn-mini remove"><strong><i class="icon-remove"></strong></a></td>\n'+
                       
   //                    '</tr>'; 
    //  $('tbody').append(tr);
    // var tr= '<tr>'+
    //        '<td><input  type="text" name="skubill[]" class="skubill" id="skubill" style="width: 140px;"></td>'+
   //                    '<td><input type="text" name="price[]" class="price" id="price" style="width: 140px;"></td>'+
   //                    '<td><input type="text" name="qty[]" class="qty" id="qty" style="width: 40px;"></td>'+  
   //                    '<td><input type="text" name="discount[]" class="discount" id="discount" style="width: 140px;"></td>'+      
   //                    '<td><input type="text" name="total[]" class="total" id="total" style="width: 160px;"></td>'+
   //                    '<td><a href="#" class="btn btn-danger btn-mini remove"><strong><i class="icon-remove"></strong></a></td>'+
   //                  '</tr>';
    //  $('tbody').append(tr);
      //  var sku=$('#pro_price').val();
        // var i=<input  type="text" name="sku[]" class="sku" id="sku" style="width: 140px;"> ;
     //         var tr="<tr><td>"+i+sku+"</td></tr>";
        // $('#pro_price').append(' <input  type="text" name="skubill[]" class="skubill" id="skubill" style="width: 140px;">');
       // var tr='<select name="product_name[]" class="product_name" id="product_name" style="width: 175px;" >'+
     //             '<option value="0" selected="true" disabled="true"><h6>Product Name </h6></option>'+
     //                    '@foreach($Product as $key => $value)'+
     //                      '<option value="{{$value->id}}">{{$value->product_name}}</option>'+
     //                    '@endforeach'+
     //                    '</select>'+
                 
     //                   '<select name="sku" class="sku" id="sku" style="width: 175px;">'+
     //              '<option value="0" selected="true" disabled="true"><h6>Product Code </h6></option>'+
     //                    '</select>'+
                   
     //                    '<input  value="" type="text" name="pro_price[]" class="pro_price" id="pro_price" style="width: 200px;">'+      
                 
     //                '<input type="text" name="pro_code[]" class="pro_code" id="pro_code" style="width: 200px;">';
                      // $('#pro_code').append('#sku');

      //     var sku=$("#sku").val();
        // var qty=$("#qty").val()
        // var price=$("#price").val();
        // var total=$("#total").val();
        // //var markup="<tr><td>"+sku+"</td><td>"+price+"</td><td>"+qty+"</td><td>"+total+"</td></tr>";
        // var markup="<tr><td><input type="text"  value="+sku+"></td><td>"+price+"</td><td>"+qty+"</td><td>"+total+"</td></tr>";
        // $('tbody').append(markup);

        //var id=$('input[name="pro_code"]').val();
            // var id=$('#pro_code').val().append('.sku');
            // //var td=$('#sku').val(id);
            // var tr='<input  type="text" name="sku[]" class="sku" id="sku" style="width: 140px;">';
            //  $(id).append(tr);
            // var sku=$('#pro_price').val();
            


     


      

    //     $('.btn-add').on('click',function(){
        //  // var tr=$(this).parent().parent();
      //  //  var id=$('input:textbox').val();
      //    var id=$('#pro_code').val();
      //    var sku=$('#pro_price').val();
      //        var tr="<tr><td>"+sku+"</td><td>"+price+"</td></tr>";
      //         $('tbody').append(tr);
      // //   alert(id);
        
      //  });

//---------------------------------end vieew bill--------------------------------------------------

//-------------------------------add bill-------------------------------------------------------

  //$(document).ready(function(){

  // $('#sku').on('change',function(e){
 //      console.log(e);
  //  var id=e.target.value;
  //  var tr=$(this).parent().parent();
 //        // ajax
 //        $.get('/json-attribute?id='+id,function(data){
 //       console.log(data);
 //     //alert(data);
 //     $.each(data,function(index,PriObj){
 //     tr.find(".price").val(PriObj.price);
      
 //   });
 //       });
 //      }); //change label type to text or 
  // });


 // $(document).change(function(){

       //    $('.addRow').on('click',function(){
        // var sku=$("#pro_code").val();
        // var price=$("#pro_price").val();
        // var id=$('option[selected]').val();
        // //var markup="<tr><td>"+sku+"</td><td>"+price+"</td></tr>";
        // $("#pro_code").append('.sku');
      // var tr= '<tr>'+
    //                  '<td>'+
    //                   '<select name="sku[]" class="sku" id="sku" $value="sku" style="width: 200px;">'+
    //                   '<option value="0" selected="true" disabled="true"><h6>Product Code </h6></option>'+
    //                     '@foreach($Product as $key => $value)'+
    //                       '<option value="{{$value->id}}">{{$value->sku}}</option>'+
    //                     '@endforeach'+
    //                     '</select>'+
    //                   '</td>'+
    //                    '<td>'+
    //               '<input  value="" type="text" name="price[]" class="price" id="price" style="width: 200px;">'+      
    //                '</td>'+
    //                   '<td><input type="text" name="qty[]" class="qty" id="qty" style="width: 50px;"></td>'+        
    //                   '<td><input type="text" name="total[]" class="total" id="total" style="width: 200px;"></td>'+
    //                   '<td><a href="#" class="btn btn-danger btn-mini remove"><strong><i class="icon-remove"></strong></a></td>'+
    //                 '</tr>';
      // $('tbody').append(tr);
   //  });
 // });




  


  //   $(document).ready(function(){
      
    // $('tbody').delegate('.price,.qty,.discount','keyup',function(){
    
    //  var tr=$(this).parent().parent();
    //  var qty=tr.find('.qty').val();
    //  var price=tr.find('.price').val();
    //  var discount=tr.find('.discount').val();
    //  //var tot=(qty * price );
    //  var total= (qty * price)- (qty * price * discount)/100;
    //  tr.find('.total').val(total);
    
    //   subtotal();
      // var discount=tr.find('.Discount').val();
      // var amount=(total-discount);
      // tr.find('.amount').val(amount);
      // // subamount();
    //   });
    //    $('.addRow').on('click',function(){
    //      addRow();
    //    });
    // function addRow(){
    //   var tr='<tr>'+
  //                     '<td>'+
  //                     '<select name="sku[]" class="sku" id="sku" $value="sku" style="width: 200px;">'+
  //                     '<option value="0" selected="true" disabled="true"><h6>Product Code </h6></option>'+ 
  //                     '@foreach($Product as $key => $value)'+
  //                        ' <option value="{{$value->sku}}">{{$value->sku}}</option>'+
  //                       '@endforeach'+
  //                       '</select>'+
  //                     '</td>'+
  //                      '<td><input type="text" name="price[]" class="price" style="width: 140px;"></td>'+
  //                     '<td><input type="text" name="qty[]" class="qty" style="width: 45px;"></td>'+
  //                      '<td><input type="text" name="discount[]" class="discount" style="width: 140px;"></td>'+
  //                     '<td><input type="text" name="total[]" class="total" style="width: 160px;"></td>'+
  //                      '<td><a href="#" class="btn btn-danger btn-mini remove"><strong><i class="icon-remove"></strong></a></td>'+
                       
  //                     '</tr>'; 
   //     $('tbody').append(tr);
    // }

   //    $('.addRow').on('click',function(){
   //     //addRow();
      
    //  var tr='<tr>'+
  //                   '<td>'+
  //                    '<select name="product_name[]" class="product_name" id="product_name" style="width: 175px;">'+
  //                   '<option value="0" selected="true" disabled="true">Product Name </option>'+
  //                  '@foreach($Product as $key => $value)'+
  //                     '<option value="{{$value->id}}">{{$value->product_name}}</option>'+
  //                    '@endforeach '+
  //                     '</select>'+
  //                     '</td>'+
  //                     '<td>'+
  //                     '<select name="sku[]" class="sku" id="sku" style="width: 175px;">'+
  //                     '<option value="0" selected="true" disabled="true">Product Code </option>'+
  //                     '</select>'+
  //                     '</td>'+
  //                      '<td><input type="text" name="price[]" class="price" style="width: 140px;"></td>'+
  //                     '<td><input type="text" name="qty[]" class="qty" style="width: 45px;"></td>'+
  //                      '<td><input type="text" name="discount[]" class="discount" style="width: 140px;"></td>'+
  //                     '<td><input type="text" name="total[]" class="total" style="width: 160px;"></td>'+
  //                      '<td><a href="#" class="btn btn-danger btn-mini remove"><strong><i class="icon-remove"></strong></a></td>'+
                       
  //                     '</tr>'; 
   //     $('tbody').append(tr);
  
   //    });

   //     function subtotal(){
    // var subtotal=0;
    // $('.total').each(function(i,e){
    //  var total=$(this).val()-0;
    //  subtotal +=total; 
    // });
    // $('.subtotal').html(subtotal);
   //     };  


   //      function subamount(){
    // var amount=0;
    // $('.subtotal').each(function(i,e){
    //  var subtotal=$(this).val()-0;
    //  amount =subtotal; 
    // });
    // $('.amount').html(amount);
   //     };  


  

      //   $('.remove').live('click',function(){
        //    var l=$('tbody tr').length;
        // if(l==1)
        //  {
        //  alert('You Cannot Delete This One');
        //  }else
        //  {
        // $(this).parent().parent().remove();
        // }
      //   });

      

  //});

    
    // $('#sku').on('change',function(e){
    //   console.log(e);
    //   var tr=$(this).parent().parent();
    //   var id= tr.find('.sku').val();
    //  // var id=e.target.value;
    //   // alert(id);
    //     // ajax
    //     $.get('/json-attribute?id='+id,function(data){
    //    console.log(data);
    //    $('#price').empty();
    //   var price=' <input  type="text" name="price[]" class="price" id="price" style="width: 200px;" >';
    //   // $('#price').append($(price) );
    
    //    $.each(data,function(index,PriceObj){
    // //  $('#price').append('<label value="'+PriceObj.id+'">'+PriceObj.price+'</label>');
    //  //   $('#price').append(PriceObj.price);
    //    $('#price').append($(price) );
    //   });
    //    });
    //   });
   
   // var tr='<tr>'+
          
      //    '<td>'+
   //                 '<b id="number">1'+
   //                 '</td>'+
   //                  '<td>'+
   //                   '<select name="product_name[]" class="product_name" id="product_name" style="width: 175px;">'+
   //                  '<option value="0" selected="true" disabled="true">Product Name </option>'+
   //                 '@foreach($Product as $key => $value)'+
   //                    '<option value="{{$value->id}}">{{$value->product_name}}</option>'+
   //                   '@endforeach '+
   //                    '</select>'+
   //                    '</td>'+
   //                    '<td>'+
   //                    '<select name="sku[]" class="sku" id="sku" style="width: 175px;">'+
   //                    '<option value="0" selected="true" disabled="true">Product Code </option>'+
   //                    '</select>'+
   //                    '</td>'+
   //                     '<td><input type="text" name="price[]" class="price" style="width: 140px;"></td>'+
   //                    '<td><input type="text" name="qty[]" class="qty" style="width: 45px;"></td>'+
   //                     '<td><input type="text" name="discount[]" class="discount" style="width: 140px;"></td>'+
   //                    '<td><input type="text" name="total[]" class="total" style="width: 160px;"></td>'+
   //                     '<td><a href="#" class="btn btn-danger btn-mini remove"><strong><i class="icon-remove"></strong></a></td>'+
                       
   //                    '</tr>'; 
    //  $('tbody').append(tr);
  