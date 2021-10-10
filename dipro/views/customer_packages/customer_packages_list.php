<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA PRO -  Integrated Web Shipping System                         *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: support@jaom.info                                              *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

    
    $userData = $user->getUserData();
    $statusrow = $core->getStatus(); 

    // var_dump($_POST);

$payrow = $core->getPayment();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/<?php echo $core->favicon ?>">
    <title>Packages List | <?php echo $core->site_name ?></title>
    <!-- This Page CSS -->
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet">
    
    <link href="assets/css_log/front.css" rel="stylesheet" type="text/css"> 
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.js"></script>
    <script src="assets/js/jquery.wysiwyg.js"></script>
    <script src="assets/js/global.js"></script>
    <script src="assets/js/custom.js"></script>
    <link href="assets/customClassPagination.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <style type="text/css">
        .scrollable-menu {
            height: auto;
            max-height: 300px;
            overflow-x: hidden;
        }
    </style>

<!-- 
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script> -->
    <script>
        $(function() {
            "use strict";
            $("#main-wrapper").AdminSettings({
                Theme: false, // this can be true or false ( true means dark and false means light ),
                Layout: 'vertical',
                LogoBg: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6 
                NavbarBg: 'skin1', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
                SidebarType: 'mini-sidebar', // You can change it full / mini-sidebar / iconbar / overlay
                SidebarColor: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
                SidebarPosition: true, // it can be true / false ( true means Fixed and false means absolute )
                HeaderPosition: true, // it can be true / false ( true means Fixed and false means absolute )
                BoxedLayout: false, // it can be true / false ( true means Boxed and false means Fluid ) 
            });
        });
    </script>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    
    <?php include 'views/inc/preloader.php'; ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        
        <?php include 'views/inc/topbar.php'; ?>
        
        <!-- End Topbar header -->

        
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
        <?php include 'views/inc/left_sidebar.php'; ?>
        

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"> <?php echo $lang['shiplist'];?> | <i class="fas fa-cubes"></i> <?php echo $lang['filter24']; ?></h4>
                         
                    </div>
                </div>
            </div>

             <!-- Action part -->
            <!-- Button group part -->
            <div class="bg-light p-15">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <!-- <div id="loader" style="display:none"></div> -->
                                <div id="resultados_ajax"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Action part -->


            <div class="container-fluid">

                <div class="row">
                    <!-- Column -->

                    <div class="col-lg-12 col-xl-12 col-md-12">

                        <div class="card">
                            <div class="card-body" >
                                
                                    <div class="row mb-5">
                                        <div class="col-md-3 col-sm-12">
                                            <!-- <div class="form-group"> -->
                                                <div class="btn-group mt-2 hide" id="div-actions-checked">
                                                   <span class="mt-2 mr-4"><strong id="countChecked"> Selected: 0</strong></span>
                                                    <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Selected actions
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a  class="dropdown-item"  href="#" data-toggle="modal" data-target="#modalCheckboxStatus"><i style="color:#20c997" class="ti-reload"></i>&nbsp;Edit Status</a>

                                                        <a  class="dropdown-item"  href="#" data-toggle="modal" data-target="#modalDriverCheckbox"><i style="color:#ff0000" class="fas fa-car"></i>&nbsp;<?php echo $lang['left208'] ?></a>

                                                        <a class="dropdown-item" onclick="printMultipleLabel();" target="_blank"> <i style="color:#343a40" class="ti-printer"></i>&nbsp;<?php echo $lang['toollabel'] ?> </a>

                                                     
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                                
                                        </div>

                                        <?php
                                            if ($user->is_Admin()){?>

                                        <div class=" col-sm-12 col-md-2 offset-7">

                                            <div class="form-group">
                                                <a href="customer_packages_add.php"><button type="button" class="btn btn-primary "><i class="ti-plus" aria-hidden="true"></i> Register Packages</button></a>
                                            </div> 
                                        </div>

                                    <?php } ?>

                                    </div>
                                            <!-- <span id="countChecked">0</span> -->

                                <div class="row mb-3 ml-2">

                                    <div class=" col-sm-12 col-md-4">

                                        <div class="input-group">
                                            <input type="text" name="search" id="search" class="form-control input-sm float-right" placeholder="search tracking"  onkeyup="load(1);">
                                            <div class="input-group-append input-sm">
                                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                            </div>

                                        </div>  
                                    </div><!-- /.col -->

                                    <div class="col-sm-12 col-md-3">
                                        <div class="input-group">                                       
                                            <select onchange="load(1);" class="form-control custom-select" id="status_courier" name="status_courier" >
                                            <option value="0">--<?php echo $lang['left210'] ?>--</option>
                                            <?php foreach ($statusrow as $row):?>                                            
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->mod_style; ?></option>
                                                
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>

                                   
                                    

                                                                        
                                </div>

                                    <div class="outer_div"></div>                            

                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>

        <?php 
        include('views/modals/modal_update_status_checked.php'); 
        ?>
         <?php include('views/modals/modal_send_email.php'); ?>

         <?php include('views/modals/modal_update_driver.php'); ?>
         <?php include('views/modals/modal_update_driver_checked.php'); ?>
         
         <?php include('views/modals/modal_add_payment_package.php'); ?>
         <?php include('views/modals/modal_verify_payment_packages.php'); ?>

        
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.min.js"></script>
   
    <script src="dataJs/customers_packages.js"></script> 


    <script>
        $('#add_payment').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id') // Extract info from data-* attributes
          var customer = button.data('customer') // Extract info from data-* attributes
          var total = button.data('total') // Extract info from data-* attributes
          var modal = $(this)
            $('#order_id').val(id)
            $('#total_pay').val(total)
            $('#customer_id').val(customer)
        })







$( "#add_charges" ).submit(function( event ) {
    $('#save_form2').attr("disabled", true);

    if(validateZiseFiles()==true){

        return false;
    }

     var inputFileImage = document.getElementById("filesMultiple");    
     var notes = $('#notes').val();
     var mode_pay = $('#mode_pay').val();
     var order_id = $('#order_id').val();
     var customer_id = $('#customer_id').val();
     

    var file = inputFileImage.files[0];
    var data = new FormData();

    data.append('file_invoice',file);    
    data.append('order_id',order_id);    
    data.append('notes',notes); 
    data.append('mode_pay',mode_pay); 
    data.append('customer_id',customer_id); 
    $.ajax({
            type: "POST",
            url: "ajax/customers_packages/customers_packages_add_ajax.php",
            data: data,
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,
             beforeSend: function(objeto){
                $("#resultados_ajax").html("Send...");
              },
            success: function(datos){
            $("#resultados_ajax").html(datos);
            $('#save_form2').attr("disabled", false);

            $('html, body').animate({
                scrollTop: 0
            }, 600);


            $('#add_payment').modal('hide');
            
            load(1);
             
          }
    });
  event.preventDefault();
    
})

    </script>  




    <script>
        $('#modalDriver').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id_shipment = button.data('id_shipment') // Extract info from data-* attributes
          var id_sender = button.data('id_sender') // Extract info from data-* attributes
          var modal = $(this)
            $('#id_shipment').val(id_shipment)
            $('#id_senderclient_driver_update').val(id_sender)
        })
    </script>  




<script>
    function validateZiseFiles(){

    var inputFile = document.getElementById('filesMultiple');
    var file = inputFile.files;

        var size =0;
        console.log(file);

        for(var i = 0; i < file.length; i ++){

            var filesSize = file[i].size;

            if(size > 5242880){               

                $('.resultados_file').html("<div class='alert alert-danger'>"+
                        "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
                        "<strong>Error! Sorry, but the file size is too large. Select files smaller than 5MB. </strong>"+
                        
                    "</div>"
                );
            }else{
                $('.resultados_file').html("");
            }

            size+=filesSize;
        }

        if(size > 5242880){ 
            $('.resultados_file').html("<div class='alert alert-danger'>"+
                        "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
                        "<strong>Error! Sorry, but the file size is too large. Select files smaller than 5MB. </strong>"+
                        
                    "</div>"
                );

            return true;

        }else{
                $('.resultados_file').html("");

            return false;
        }          

}
</script>

<script>
        
 $('#openMultiFile').click(function(){

    $("#filesMultiple").click();
  });


  $('#clean_file_button').click(function(){

    $("#filesMultiple").val('');

    $('#selectItem').html('Attach files');

    $('#clean_files').addClass('hide');


  });



  $('input[type=file]').change(function(){

    var inputFile = document.getElementById('filesMultiple');
    var file = inputFile.files;
    var contador = 0;
    for(var i=0; i<file.length; i++){

        contador ++;
    }
    if(contador>0){

        $('#clean_files').removeClass('hide');
    }else{

        $('#clean_files').addClass('hide');

    }

    $('#selectItem').html('attached files ('+contador+')');
  });
</script>


     <script>
     $( "#send_email" ).submit(function( event ) {          
        
          $('#guardar_datos').attr("disabled", true);
          
         var parametros = $(this).serialize();
             $.ajax({
                    type: "GET",
                    url: "send_email_pdf_packages.php",
                    data: parametros,
                     beforeSend: function(objeto){
                        $(".resultados_ajax_mail").html("<img src='assets/images/loader.gif'/><br/>Wait a moment please...");
                      },
                    success: function(datos){
                    $(".resultados_ajax_mail").html(datos);
                    $('#guardar_datos').attr("disabled", false);
                    
                  }
            });
          event.preventDefault();
        
        })
 </script>

    <script>
        $('#myModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var order = button.data('order') // Extract info from data-* attributes
          var id = button.data('id') // Extract info from data-* attributes
          var email = button.data('email') // Extract info from data-* attributes
          var modal = $(this)
            $('#subject').val("Invoice # "+order)
            $('#id').val(id)
            $('#sendto').val(email)
        })
    </script>  

        <script >        

        $( "#driver_update" ).submit(function( event ) {
            var parametros = $(this).serialize();

            $.ajax({
                    type: "POST",
                    url: "ajax/customers_packages/customers_package_update_driver_ajax.php",
                    data: parametros,           
                     beforeSend: function(objeto){
                        $("#resultados_ajax").html("Load...");
                      },
                    success: function(datos){
                    $("#resultados_ajax").html(datos);

                    $('html, body').animate({
                        scrollTop: 0
                    }, 600);

                    $('#modalDriver').modal('hide');

                    load(1);

                                
                  }
            });
          event.preventDefault();
            
        })

    </script>


<script>
    

$('#detail_payment_packages').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var customer = button.data('customer') // Extract info from data-* attributes

    $('#order_id_confirm_payment').val(id);
    $('#customer_id_confirm_payment').val(customer);
    
    $(".resultados_ajax_payment_data").html('');

  load_payment_detail(id);//Cargas los pagos 
    
})

function load_payment_detail(id){

    var parametros = {"id":id};
    $.ajax({

        url:'ajax/customers_packages/customers_packages_payment_detail_ajax.php',
        data: parametros,       
        success:function(data){
            $(".resultados_ajax_payment_data").html(data).fadeIn('slow');           
        }
    });
}






 $( "#send_payment" ).submit(function( event ) {          
    
      $('#save_payment').attr("disabled", true);
      
     var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "ajax/customers_packages/customers_packages_confirm_payment.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#resultados_ajax").html("load...");
                  },
                success: function(datos){

                $('#detail_payment_packages').modal('hide');

                $("#resultados_ajax").html(datos);
                $('#save_payment').attr("disabled", false);

                load(1);
                
              }
        });
      event.preventDefault();
    
    })
</script>



</body>

</html>