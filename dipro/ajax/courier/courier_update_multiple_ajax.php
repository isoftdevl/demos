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



   require_once ("../../loader.php");
   require_once ("../../helpers/querys.php");

// var_dump($_POST);
// var_dump($_GET);
session_start();

$status = intval($_GET['status']);
$data = json_decode($_GET['checked_data']);

foreach ($data as $key) {

   updateStatusCourierMultiple($key, $status);


   $courier = getCourierMultiple($key);

   $receiver= $courier->receiver_id; 
   $prefix= $courier->order_prefix; 
   $office= $courier->origin_off; 

   $tracking= $prefix.$key;

   $comments='Update multiple';
   $user =$_SESSION['userid'];

   updateShipTrackingMultiple($tracking, $status, $comments, $office, $user); 

  $message[$key] = $key." It has been updated";
 
}


    if (!empty($message)){
        // var_dump($message);
      ?>
            <div class="alert alert-success" id="success-alert">
                <p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i>
                    <span>Success! </span> Successfully updated shipments
                    <ul class="error">
                         <?php
                            foreach ($message as $msj) {?>
                        <li>
                            <i class="icon-double-angle-right"></i>
                            <?php
                             echo $msj;
                            
                            ?>

                        </li>
                        <?php
                             
                        }
                        ?>


                    </ul>
                </p>
            </div>      
      <?php
      }        
		