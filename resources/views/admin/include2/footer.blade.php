<footer class="page-footer footer gradient-shadow  footer-static   footer-dark gradient-45deg-indigo-purple ">
  <div class="footer-copyright">
    <div class="container">
      <span>© 2021 <a href="https://www.digilantern.com/" target="_blank">DigiLantern</a> All rights reserved.
      </span>
      <span class="right hide-on-small-only">
      Powered by <a href="https://www.digilantern.com/">DigiLantern</a>
      </span>
    </div>
  </div>
</footer>


<!-- <script type="text/javascript" src="{{ url('/admin/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('/admin/js/bootstrap.js')}}"></script>
<script src="{{ url('/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{ url('/admin/js/scripts.js')}}"></script>
<script src="{{ url('/admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{ url('/admin/js/jquery.nicescroll.js')}}"></script>

<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script src="{{ url('/admin/js/plugins/pace.min.js')}}"></script>
<script src="{{ url('/admin/js/main.js')}}"></script>
<script type="text/javascript" src="{{ url('/admin/js/plugins/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/admin/js/plugins/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/admin/js/plugins/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/admin/js/jquery.table2excel.js')}}"></script> -->


<!-- BEGIN VENDOR JS-->
<script src="{{asset('js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
@yield('vendor-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/custom/custom-script.js')}}"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->


<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>

<script src="{{asset('js/scripts/data-tables.js')}}"></script>
<script src="{{asset('js/scripts/form-select2.js')}}"></script>
<script>
 function validatesec() {
        $("#myForm").validate();
    }
    function planForm() {
        // alert('hi');
        $("#planForm").validate();
    }
    function subfrom() {
        $("#subfrom").validate();
    }
    function validatesection() {
        // alert('hi');
    $("#myForm").validate({
        
        rules:{
            things:{
                required:true
            }
            },
        messages:{
            things:{
                required:true
            }
            }
    });
        }
    $("#phone").on("keydown keyup change", function(){
   
   var value = $(this).val();
   if (value.length < minLength){
       $("#phone").addClass("error");
   }
   else if (value.length > maxLength){
       $("#phone").addClass("error");
   }
   else{
      //$("#phone").addClass("valid");
      $("#phone").removeClass("error");
   }
});
$('#phone').keypress(function(e){
 if (![48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(e.keyCode)){
   e.preventDefault();
 }
});

$("#phonesec").on("keydown keyup change", function(){
   
   var value = $(this).val();
   if (value.length < minLength){
       $("#phonesec").addClass("error");
   }
   else if (value.length > maxLength){
       $("#phonesec").addClass("error");
   }
   else{
      //$("#phone").addClass("valid");
      $("#phonesec").removeClass("error");
   }
});
$('#phonesec').keypress(function(e){
 if (![48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(e.keyCode)){
   e.preventDefault();
 }
});

$("#email").on("keydown keyup change", function(){
   var email = $('#email').val();
   var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   emailExp.test(email);

   if(!emailExp.test(email)) {
       // $('#error').show();
       $("#email").addClass("error");
       // $("#email").removeClass("valid");
   } else {
       // $('#error').hide();
       //$("#email").addClass("valid");
       $("#email").removeClass("error");
   }
});
</script>
@yield('page-script')












<?php 
$permissionoprid = [];
if(isset(session('userinfo')['user_category_operation_permissions'][0]['opid'])){
$permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
$permissionoprid = explode(',', $permissionoprid);
}
                ?>
<script type="text/javascript">
      $('#sl').click(function(){
        $('#tl').loadingBtn();
        $('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
      });
      $('#demoSelect').select2();

      function validatesec() {
        $("#myForm").validate();
    }
    </script>
    <script>
    // ClassicEditor
    //     .create( document.querySelector( '#editor' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    
</script>

    <!-- Reset Value of form -->
    <script>
      function myFunction() {
          document.getElementById("myForm").reset();
        }

    //     function servicecategory(){
    //   var servicecat = $("#servicecat").val();
    // //   alert(servicecat)
    // $.ajax({
    //     type: "post",
    //     // cache: false,
    //     // async: false,
    //     url:   "{{url('/service-change')}}",
    //     data: {'servicecat': servicecat},
    //     success: function (result)
    //     {   
    //         $("#service").html(result);  
    //     },
    //     complete: function () {
    //     },
    // });
    // }

    function servicetype(){
        var video_type = $('#video_type').val();
        // alert(video_type);
        if(video_type=='image'){
            $('.videoupload').show();
            $('.videolink').hide();
        }else if(video_type=='link'){
            $('.videoupload').hide();
            $('.videolink').show();
        }
    }

    function serviceshowtype(){
        var showtype = $('#showtype').val();
        // alert(video_type);
        if(showtype=='inside'){
            $('.homeservice').hide();
        }else if(showtype=='outside'){
            $('.homeservice').show();
        }
    }

    // function ServiceCategory() {
    //     var servicecategory = $("#servicecategory").val();
    //     // alert(servicecategory);
    //     var token = $("#token").val();
    //     $.ajax({
    //         type: "post",
    //         url: "{{url('/admin/secondcategory')}}",
    //         data: {
    //             'servicecategory': servicecategory,'_token': token
    //         },
    //         success: function(result) {
    //             $("#secondcategory").empty();
    //             $("#thirdcategory").empty();
                
    //             $.each(result.data,function(index,firstvalue){
    //                 if(firstvalue.ser_id==servicecategory){
    //                             // console.log(firstvalue.children);
    //                             // $("#secondcategory").append('<option value='+firstvalue.secser_id+'>'+firstvalue.secservice_name+'</option>');
    //                 }
    //                 $.each(firstvalue.children,function(index,secondvalue){
    //                     if(secondvalue.parent_id==servicecategory && secondvalue.ser_status=='publish'){
    //                     $("#secondcategory").append('<option value='+secondvalue.ser_id+'>'+secondvalue.service_name+'</option>');
    //                     }
    //                     $.each(secondvalue.children,function(index,thirdvalue){
    //                         // console.log(secondvalue.children);
    //                         if(thirdvalue.parent_id==secondvalue.ser_id && thirdvalue.ser_status=='publish'){
    //                     $("#thirdcategory").append('<option value='+thirdvalue.ser_id+'>'+thirdvalue.service_name+'</option>');
    //                     }

    //                     $.each(thirdvalue.children,function(index,fourthvalue){
    //                         console.log(thirdvalue.children);
    //                         if(fourthvalue.parent_id==secondvalue.ser_id && fourthvalue.ser_status=='publish'){
    //                     $("#servicesec").append('<option value='+fourthvalue.ser_id+'>'+fourthvalue.service_name+'</option>');
    //                     }
                        
    //             });
                        
    //             });
    //         });
    //         });
    //             // $("#secondcategory").html(result);
    //         },
    //         complete: function() {},
    //     });
    // }
/////////////////service category////////////////
    function ServiceCategory() {
        var servicecategory = $("#servicecategory").val();
        // alert(servicecategory);
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/secondcategory')}}",
            data: {
                'servicecategory': servicecategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('36',$permissionoprid)){  ?>
                    $("#secondcategory").html(result);
                <?php } 
                 if(in_array('16',$permissionoprid)){  ?>
                     $("#servicesec").html(result);
                 <?php } ?>
                

               // $("#secondcategory").html(result);
            },
            complete: function() {},
        });
    }

    function SecondCategory() {
        var secondcategory = $("#secondcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/thirdcategory')}}",
            data: {
                'secondcategory': secondcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('37',$permissionoprid)){  ?>
                    $("#thirdcategory").html(result);
                <?php } 
                if(in_array('36',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php } ?>
                //$("#thirdcategory").html(result);
            },
            complete: function() {},
        });
    }
    function ThirdCategory(){
      var thirdcategory = $("#thirdcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/fourthcategory')}}",
            data: {
                'thirdcategory': thirdcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('38',$permissionoprid)){  ?>
                   $("#fourthcategory").html(result);
                <?php } 
                if(in_array('37',$permissionoprid)){  ?>
                    $("#servicesec").html(result);
                <?php  } ?>
               // $("#fourthcategory").html(result);
            },
            complete: function() {},
        });
    }

    function FourthCategory(){
      var fourthcategory = $("#fourthcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/fifthcategory')}}",
            data: {
                'fourthcategory': fourthcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('39',$permissionoprid)){  ?>
                   $("#fifthcategory").html(result);
                <?php } 
                if(in_array('38',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php }  ?>
                // $("#fifthcategory").html(result);
            },
            complete: function() {},
        });
    }

    function FifthCategory(){
      var fifthcategory = $("#fifthcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/servicesection')}}",
            data: {
                'fifthcategory': fifthcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('39',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php } ?>
            },
            complete: function() {},
        });
    }
  ////////////////////result category////////////////////////
  function ResultCategory() {
        var servicecategory = $("#servicecategory").val();
        // alert(servicecategory);
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/secondresultcategory')}}",
            data: {
                'servicecategory': servicecategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('40',$permissionoprid)){  ?>
                    $("#secondcategory").html(result);
                <?php } 
                 if(in_array('19',$permissionoprid)){  ?>
                     $("#servicesec").html(result);
                 <?php } ?>
                

               // $("#secondcategory").html(result);
            },
            complete: function() {},
        });
    }

    function SecondResultCategory() {
        var secondcategory = $("#secondcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/thirdresultcategory ')}}",
            data: {
                'secondcategory': secondcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('41',$permissionoprid)){  ?>
                    $("#thirdcategory").html(result);
                <?php } 
                if(in_array('40',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php } ?>
                //$("#thirdcategory").html(result);
            },
            complete: function() {},
        });
    }
    function ThirdResultCategory(){
      var thirdcategory = $("#thirdcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/fourthresultcategory')}}",
            data: {
                'thirdcategory': thirdcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('42',$permissionoprid)){  ?>
                   $("#fourthcategory").html(result);
                <?php } 
                if(in_array('41',$permissionoprid)){  ?>
                    $("#servicesec").html(result);
                <?php  } ?>
               // $("#fourthcategory").html(result);
            },
            complete: function() {},
        });
    }

    function FourthResultCategory(){
      var fourthcategory = $("#fourthcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/fifthresultcategory')}}",
            data: {
                'fourthcategory': fourthcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('43',$permissionoprid)){  ?>
                   $("#fifthcategory").html(result);
                <?php } 
                if(in_array('42',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php }  ?>
                // $("#fifthcategory").html(result);
            },
            complete: function() {},
        });
    }

    function FifthResultCategory(){
      var fifthcategory = $("#fifthcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/serviceresultsection')}}",
            data: {
                'fifthcategory': fifthcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('43',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php } ?>
            },
            complete: function() {},
        });
    }  

    ////////////////////video category////////////////////////
  function VideoCategory() {
        var servicecategory = $("#servicecategory").val();
        // alert(servicecategory);
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/secondvideocategory')}}",
            data: {
                'servicecategory': servicecategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('44',$permissionoprid)){  ?>
                    $("#secondcategory").html(result);
                <?php } 
                 if(in_array('22',$permissionoprid)){  ?>
                     $("#servicesec").html(result);
                 <?php } ?>
                

               // $("#secondcategory").html(result);
            },
            complete: function() {},
        });
    }

    function SecondVideoCategory() {
        var secondcategory = $("#secondcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/thirdvideocategory ')}}",
            data: {
                'secondcategory': secondcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('45',$permissionoprid)){  ?>
                    $("#thirdcategory").html(result);
                <?php } 
                if(in_array('44',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php } ?>
                //$("#thirdcategory").html(result);
            },
            complete: function() {},
        });
    }
    function ThirdVideoCategory(){
      var thirdcategory = $("#thirdcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/fourthvideocategory')}}",
            data: {
                'thirdcategory': thirdcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('46',$permissionoprid)){  ?>
                   $("#fourthcategory").html(result);
                <?php } 
                if(in_array('45',$permissionoprid)){  ?>
                    $("#servicesec").html(result);
                <?php  } ?>
               // $("#fourthcategory").html(result);
            },
            complete: function() {},
        });
    }

    function FourthVideoCategory(){
      var fourthcategory = $("#fourthcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/fifthvideocategory')}}",
            data: {
                'fourthcategory': fourthcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('47',$permissionoprid)){  ?>
                   $("#fifthcategory").html(result);
                <?php } 
                if(in_array('46',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php }  ?>
                // $("#fifthcategory").html(result);
            },
            complete: function() {},
        });
    }

    function FifthVideoCategory(){
      var fifthcategory = $("#fifthcategory").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/servicevideosection')}}",
            data: {
                'fifthcategory': fifthcategory,'_token': token
            },
            success: function(result) {
                <?php 
                if(in_array('47',$permissionoprid)){  ?>
                   $("#servicesec").html(result);
                <?php } ?>
            },
            complete: function() {},
        });
    }  
    

     ////////////////////Menu////////////////////////
  function PrimaryMenu() {
        var menuid = $("#primarymenu").val();
        // alert(primarymenu);
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/primarymenu')}}",
            data: {
                'menuid': menuid,'_token': token
            },
            success: function(result) {
               $("#secondarymenu").html(result);
            },
            complete: function() {},
        });
    }

    function SecondaryMenu() {
        var menuid = $("#secondarymenu").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/primarymenu')}}",
            data: {
                'menuid': menuid,'_token': token
            },
            success: function(result) {
                $("#thirdmenu").html(result);
            },
            complete: function() {},
        });
    }
    function ThirdMenu(){
      var menuid = $("#thirdmenu").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/primarymenu')}}",
            data: {
                'menuid': menuid,'_token': token
            },
            success: function(result) {
               $("#fourthmenu").html(result);
            },
            complete: function() {},
        });
    }

    function FourthMenu(){
      var menuid = $("#fourthmenu").val();
        var token = $("#token").val();
        $.ajax({
            type: "post",
            url: "{{url('/admin/primarymenu')}}",
            data: {
                'menuid': menuid,'_token': token
            },
            success: function(result) {
                $("#fifthmenu").html(result);
            },
            complete: function() {},
        });
    }

    </script>
</body>
</html>