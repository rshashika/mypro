//product adding js
$(document).ready(function(){

   $('#student').on('change',function(e){
       console.log(e);
      var stud=e.target.value;

         //ajax
         $.get('/json-class?stud='+stud,function(data){
        console.log(data);
        $('#class_id').empty();
         $('#class_id').append('<option value="0" selected="true" disabled="true">Select Class </option>');

        $.each(data,function(index,brandObj){
         $('#class_id').append('<option value="'+brandObj.id+'">'+brandObj.first_name+' - '+brandObj.subject+'</option>');
        });
        });
    });


   $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type:'get',
            url:'/admin/check-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#chkPwd").html("<font color='red'>Current Password is incorrect</font>");
                }else if(resp=="true"){
                    $("#chkPwd").html("<font color='green'>Current Password is correct</font>");
                }
            },error:function(){
                alert("Error");
            }
        });
    });
	
});

//-----------------------------------------------add product -----------------------------------------

//-----------------------------------------end view bill------------------------------------------------------

  $(document).ready(function(){

   
//----------------------------------dynamic dropdown-----------------------------------------------------------------------
   $('#product_name').on('change',function(e){
           console.log(e);
          var id=e.target.value;

             //ajax
             $.get('/json-attributes?id='+id,function(data){
            console.log(data);
          //  alert(data);
            $('#sku').empty();
             $('#sku').append(' <option value="0" selected="true" disabled="true"></option>');

            $.each(data,function(index,ProObj){
             $('#sku').append('<option value="'+ProObj.id+'">'+ProObj.sku+'</option>');
              
            });
            });
        });

          $('#class_id').on('change',function(e){
            console.log(e);
         var id=e.target.value;
         var tr=$(this).parent().parent();
        
              // ajax
              $.get('/json-attribute?id='+id,function(data){
             console.log(data);
            //alert(data);
            $.each(data,function(index,PriObj){
           //     alert(PriObj.grade);
            //  tr.find(".fees").val(PriObj.grade);
         //   tr.find(".pro_price").val(PriObj.price);
           //  tr.find(".price").val(PriObj.price);
            // tr.find(".skubill").val(PriObj.sku);
             $('#fees').val(PriObj.fees);

            });
             });
          }); 

          $('#type').on('change',function(e){
            console.log(e);
         var id=e.target.value;
         var tr=$(this).parent().parent();
        
              // ajax
              // $.get('/json-attribute?id='+id,function(data){
                 $.get('/json-attributepaytype?id='+id,function(data){
             console.log(data);
            //alert(data);
            $.each(data,function(index,PriObj){
           //     alert(PriObj.grade);
            //  tr.find(".fees").val(PriObj.grade);
         //   tr.find(".pro_price").val(PriObj.price);
           //  tr.find(".price").val(PriObj.price);
            // tr.find(".skubill").val(PriObj.sku);
             $('#amount').val(PriObj.amount);

            });
             });
          });

           $('#typepay').on('change',function(e){
            console.log(e);
         var id=e.target.value;
         var tr=$(this).parent().parent();
        
              // ajax
              $.get('/json-loadpaymenttypes?id='+id,function(data){
             console.log(data);
            //alert(data);
            $.each(data,function(index,PriObj){

             $('#amount').val(PriObj.amount);

            });
             });
          });  

           $('#member_id').on('change',function(e){
            console.log(e);
         var id=e.target.value;
         var tr=$(this).parent().parent();
        
              // ajax
              $.get('/json-loadbranch?id='+id,function(data){
             console.log(data);
            //alert(data);
            $.each(data,function(index,PriObj){

             $('#branch').val(PriObj.branch);

            });
             });
          }); 
      });
  //----------------------------------------end dynamin dropdown------------------------------------------------------


    $(document).on('click','.deleteRecord',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
             window.location.href="/admin/"+deleteFunction+"/"+id; 
          }
        })
     });




     // swal({
        //   title: "Are you sure?",
        //   text: "Your will not be able to recover this Record Again!",
        //   type: "warning",
        //   showCancelButton: true,
        //   confirmButtonClass: "btn-danger",
        //   confirmButtonText: "Yes, delete it!",
        //   closeOnConfirm: false
        // },
        // function(){
        //     window.location.href="/admin/"+deleteFunction+"/"+id;
        // });

        //  Swal.fire({
        //   title: 'Are you sure?',
        //   text: "You won't be able to revert this!",
        //   icon: 'warning',
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        //   if (result.isConfirmed) {
        //      window.location.href="/admin/"+deleteFunction+"/"+id;
        //     Swal.fire(
        //       'Deleted!',
        //       'Your file has been deleted.',
        //       'success'
        //     )
        //   }
        // })






























