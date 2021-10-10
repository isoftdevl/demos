<?php 
session_start();
require('../db.php');
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: index.php");
exit;
		}
						
$user = $_SESSION['user'];
								
$ins = mysqli_query($conn,"SELECT * FROM users WHERE email='$user' ");
$data = mysqli_fetch_array($ins);
								
$email = $data['email'];
$rowpas = $data['pass'];
$bal = $data['bal'];
							
$deps = "SELECT * FROM deposit  ";
$payment = $conn->query($deps);

include('../inc/logo.php');	

$qrysit = mysqli_query($conn,"SELECT * FROM settings");
$sitnam = mysqli_fetch_array($qrysit);						
								
?> 
<?php include('inc/header.php');?>
<body class="fixed-nav sticky-footer bg-light" id="page-top">



  <!-- Navigation-->
 <?php include('inc/nav.php');?>
        
  <!-- Navigation Ends--> 
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
  
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     
      <div class="row">
        <div class="col-12">
          
     
     <h1 class="w3-xxxlarge w3-text-green" align="center"><b>API Settings</b></h1>
       
<p align="center"><strong>Description:</strong> Configure API credentials  </p>
      <!-- Example Bar Chart Card-->
       
     <?php 
		   // define variables and set to empty values

	$request_dir = $_SERVER['SERVER_NAME'];	
		
		
		if(isset($_POST['rate'])){
		include('inc/api_set.php');
		
						}
			
			
			$query_rec = mysqli_query($conn,"SELECT * FROM api_setting");
			
			$apib = mysqli_fetch_array($query_rec);
		?> 
       
  <form action="" method="post" autocomplete = 'off' > 
  
     <table class="table  margin-tp-10" id="transTable">
   
     <td width="30%"><i class="fa fa-key"></i> Gateway API Key</td>
                            <td id="mainService"> <input type="text" name="epinUsername"  value="<?php echo $apib['APIkey'];?>" class="form-control" required> </td>
                        </tr>
                        
                   
                    <td id="mainService"> </td>
                    <td id="mainService"> <?php gw(); ?></td>
                    </tr>
                                            <tr>
                            <td colspan="2">
                            <button type="submit" id="submit" name="rate" class="btn btn-info">Save Settings</button>
                       </td>
                                                                       
                          <td valign="middle"></td>                                             
                        </tr>
                                    </table> 
  
  </form>
  
     <h1 align="center"><?php echo $sitnam['sitename'];?> Reseller API</h1>
      <!--collapse start-->
            <div class="panel-group m-bot20" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                                      <a class="btn btn-info btn-xs btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                             <i class="fa fa-link"></i>             Airtime VTU API Integration
                                      </a>
                                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                    
                    <h1>VTU Airtime API Integration</h1>
This section contains your RESTful API for Airtime VTU API integration.

<p>&nbsp;</p>
<h4>Authentication</h4>
<p>The <?php echo $sitnam['sitename'];?> API uses API Key for Authentication.</p>

<p>Please use the following details for authentication</p>
<pre>Apikey = kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</pre>
<p><strong>API Key: </strong>Your Gateway API Key</p>
 Please create your API key here <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>">Create API Key</a>
<p>&nbsp;</p>


<h3><strong>Purchase products</strong></h3>
Airtime VTU services can be purchased with the endpoint below:</p>
<p><strong>Base URL:</strong> https://<?php echo $request_dir; ?>/api/airtime</p>
<p><strong>Network: </strong>as specified in the parameters below;</p>
<p>&nbsp;</p>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<tbody>
<tr>
<td width="150"><strong>PARAMETERS</strong></td>
<td width="150"><strong>Required/Optional</strong></td>
<td width="150"><strong>TYPE</strong></td>
<td width="150"><strong>DESCRIPTION</strong></td>
</tr>
<tr>
<td width="150">apikey</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">The reseller gateway API key created at <?php echo $_SERVER['SERVER_NAME'];?> . Example <strong>kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</strong></td>
</tr>
<tr>
<td width="150">network</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">Network as specified. These includes, <strong>mtn</strong>,  <strong>airtel</strong>, <strong>glo</strong>, <strong>etisalat</strong></td>
</tr>
<tr>
<td width="150">phone</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The phone number to receive the airtime</td>
</tr>
<tr>
<td width="150">amount</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The amount you wish to recharge</td>
</tr>
<tr>
<td width="150">ref</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">This is a unique reference with which you can use to execute and query the transaction.</td>
</tr>
</tbody>
</table>
</div>
<p>&nbsp;</p>
<p><strong>SAMPLE </strong><strong>CODE</strong></p>

<pre>
$host="https://<?php echo $_SERVER['SERVER_NAME'];?>/api/airtime?apikey=1234&network=mtn&phone=0803992222&amount=100&ref=8284666332234 ";
//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);

//Close the cURL handle.
curl_close($ch);

$response = json_decode($data);

</pre>

<p>&nbsp;</p>

<p><strong>EXPECTED </strong><strong>RESPONSE</strong></p>
<pre>{"code":101,<br>"description":{"response_description":"TRANSACTION SUCCESSFUL",<br>"ref":"884666332234","amount":"100",<br>"transaction_date":"2020-04-17 07:04:19"<br>}}

</pre>


                    
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                                      <a class="btn btn-info btn-xs btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <i class="fa fa-link"></i>          Electricity Payment API Integration
                                      </a>
                                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                        
                    <h1>Electricity Payment API Integration</h1>
This section contains your RESTful API for Electricity Payment API integration.

<p>&nbsp;</p>
<h4>Authentication</h4>
<p>The <?php echo $sitnam['sitename'];?> API uses API Key for Authentication.</p>

<p>Please see the following sample API key for authentication</p>
<pre>Apikey = kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</pre>
<p><strong>API Key: </strong>Your Gateway API Key</p>
 Please create your API key here <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>">Create API Key</a>
<p>&nbsp;</p>

<h3><strong>VALIDATE METER NUMBER</strong></h3>
You can validate meter number with the following endpoint:</p>
<p><strong>Base URL: </strong>https://<?php echo $_SERVER['SERVER_NAME']; ?>/api/merchant-verify</p>
<p>&nbsp;</p>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<tbody>
<tr>
<td width="150"><strong>PARAMETERS</strong></td>
<td width="150"><strong>Required/Optional</strong></td>
<td width="150"><strong>TYPE</strong></td>
<td width="150"><strong>DESCRIPTION</strong></td>
</tr>
<tr>
<td width="150">apikey</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">The reseller gateway API key created at <?php echo $_SERVER['SERVER_NAME'];?> . Example <strong>kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</strong></td>
</tr>
<tr>
<td width="150">service</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">Service as specified. These includes, <strong>ikeja-electric</strong>, <strong>eko-electric</strong>, <strong>portharcourt-electric</strong>, <strong>jos-electric</strong>, <strong>kano-electric</strong>, <strong>ibadan-electric</strong></p>
</tr>
<tr>
<td width="150">smartNo</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The meter number to load the electricity token</td>
</tr>
<tr>
<td width="150">type</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">This is the meter type. Example: <strong>prepaid</strong> or <strong>postpaid</strong></td>
</tr>
</tbody>
</table>
</div>
<p><strong> </strong></p>
<p>&nbsp;</p>
<p><strong>EXPECTED </strong><strong>RESPONSE</strong></p>
<pre>{
    "code": 119,
    "description": {
        "Customer": "PAUL BECKY",
        "Address": "ELEME - PORTHARCOURT",
        "MeterNumber": "1022101199113"
    }
}

</pre>
<p>&nbsp;</p>

<h3><strong>Generate Token</strong></h3>
This endpoint allows you to generate electricity token using meter number.</p>
<p><strong>Base URL:</strong> https://<?php echo $request_dir; ?>/api/biller</p>
<p><strong>Service: </strong>as specified in the fields below;</p>
<p>&nbsp;</p>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<tbody>
<tr>
<td width="150"><strong>PARAMETERS</strong></td>
<td width="150"><strong>Required/Optional</strong></td>
<td width="150"><strong>TYPE</strong></td>
<td width="150"><strong>DESCRIPTION</strong></td>
</tr>
<tr>
<td width="150">apikey</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">The reseller gateway API key created at <?php echo $_SERVER['SERVER_NAME'];?> . Example <strong>kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</strong></td>
</tr>
<tr>
<td width="150">service</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">Service as specified. These includes, <strong>ikeja-electric</strong>, <strong>eko-electric</strong>, <strong>portharcourt-electric</strong>, <strong>jos-electric</strong>, <strong>kano-electric</strong>, <strong>ibadan-electric</strong></td>
</tr>
<tr>
<td width="150">accountno</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The meter number to load the electricity token</td>
</tr>
<tr>
<td width="150">vcode</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">This is the meter type. Example: <strong>prepaid</strong> or <strong>postpaid</strong></td>
</tr>
<tr>
<td width="150">amount</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The amount of electricity token you want to buy</td>
</tr>
<tr>
<tr>
<td width="150">ref</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">This is a unique reference with which you can use to execute and query the transaction.</td>
</tr>
</tbody>
</table>
</div>
<p>&nbsp;</p>

<p><strong>SAMPLE </strong><strong>CODE</strong></p>

<pre>

$host ="https://<?php echo $_SERVER['SERVER_NAME'];?>/api/biller?apikey=1234&service=ikeja-electric&accountno=100221233&vcode=prepaid&amount=1000&ref=8284666332234 ";
//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);

//Close the cURL handle.
curl_close($ch);

$response = json_decode($data);

</pre>

<p>&nbsp;</p>

<p><strong>EXPECTED </strong><strong>RESPONSE</strong></p>
<pre>
{"code":101,
"description":{"Status":"TRANSACTION SUCCESSFUL",
"Token":"40364652026905256691",
"Units":"500 kWh",
"meterNumber":"100221233",
"product_name":"Ikeja Electric Payment - PHCN"
	
    }
}

</pre>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                                      <a class="btn btn-info btn-xs btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
               <i class="fa fa-link"></i>          TV Payment API Integration
                                      </a>
                                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                      <h1>TV Payment API Integration</h1>
This section contains your RESTful API for TV Payment API integration.

<p>&nbsp;</p>
<h4>Authentication</h4>
<p>The <?php echo $sitnam['sitename'];?> API uses API Key for Authentication.</p>

<p>Please see the following sample API key for authentication</p>
<pre>Apikey = kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</pre>
<p><strong>API Key: </strong>Your Gateway API Key</p>
 Please create your API key here <a href="https://<?php echo $_SERVER['SERVER_NAME']; ?>">Create API Key</a>
<p>&nbsp;</p>

<h3><strong>VALIDATE SMARTCARD/IUC NUMBER</strong></h3>
You can validate smartcard/IUC number with the following endpoint:</p>
<p><strong>Base URL: </strong>https://<?php echo $_SERVER['SERVER_NAME']; ?>/api/merchant-verify</p>
<p>&nbsp;</p>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<tbody>
<tr>
<td width="150"><strong>PARAMETERS</strong></td>
<td width="150"><strong>Required/Optional</strong></td>
<td width="150"><strong>TYPE</strong></td>
<td width="150"><strong>DESCRIPTION</strong></td>
</tr>
<tr>
<td width="150">apikey</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">The reseller gateway API key created at <?php echo $_SERVER['SERVER_NAME'];?> . Example <strong>kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</strong></td>
</tr>
<tr>
<td width="150">service</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">Service as specified. These includes, <strong>dstv</strong>, <strong>gotv</strong>, <strong>startimes</strong>
</tr>
<tr>
<td width="150">smartNo</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The smartcard or IUC number to make the subscription on</td>
</tr>
<tr>

</tbody>
</table>
</div>
<p><strong> </strong></p>
<p>&nbsp;</p>
<p><strong>EXPECTED </strong><strong>RESPONSE</strong></p>
<pre>
{"code":119,
"description":{"Customer":"PAUL BECKY",
"Due_Date":"2019-07-23T00:00:00",
"Status":"Open"
	}
}

</pre>
<p>&nbsp;</p>

<h3><strong>Recharge Decoder</strong></h3>
This endpoint allows you to recharge GOTV/DSTV/Startimes decoder using it’s smartcard/IUC number.</p>
<p><strong>Base URL:</strong> https://<?php echo $request_dir; ?>/api/biller</p>
<p><strong>Service: </strong>as specified in the fields below;</p>
<p>&nbsp;</p>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<tbody>
<tr>
<td width="150"><strong>PARAMETERS</strong></td>
<td width="150"><strong>Required/Optional</strong></td>
<td width="150"><strong>TYPE</strong></td>
<td width="150"><strong>DESCRIPTION</strong></td>
</tr>
<tr>
<td width="150">apikey</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">The reseller gateway API key created at <?php echo $_SERVER['SERVER_NAME'];?> . Example <strong>kDe5dbBw3AeyxnxFCCJA9c9Agl2kxxt8pCB174AC472r38BCM</strong></td>
</tr>
<tr>
<td width="150">service</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">Service as specified. These includes, <strong>dstv</strong>, <strong>gotv</strong>, <strong>startimes</strong></td>
</tr>
<tr>
<td width="150">accountno</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The smartcard or IUC number to make the subscription on</td>
</tr>
<tr>
<td width="150">vcode</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">This is the meter type. Example: <strong>prepaid</strong> or <strong>postpaid</strong></td>
</tr>
<tr>
<td width="150">amount</td>
<td width="150">R</td>
<td width="150">Number</td>
<td width="150">The amount of electricity token you want to buy</td>
</tr>
<tr>
<tr>
<td width="150">ref</td>
<td width="150">R</td>
<td width="150">String</td>
<td width="150">This is a unique reference with which you can use to execute and query the transaction.</td>
</tr>
</tbody>
</table>
</div>
<p>&nbsp;</p>

<p><strong>SAMPLE </strong><strong>CODE</strong></p>

<pre>

$host ="https://<?php echo $_SERVER['SERVER_NAME'];?>/api/biller?apikey=1234&service=gotv&accountno=100221233&vcode=gotv-plus&amount=1900&ref=8284666332234 ";
//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);

//Close the cURL handle.
curl_close($ch);

$response = json_decode($data);

</pre>

<p>&nbsp;</p>

<p><strong>EXPECTED </strong><strong>RESPONSE</strong></p>
<pre>{"code":101,<br>"description":{"response_description":"TRANSACTION SUCCESSFUL",<br>"ref":"884666332234","amount":"100",<br>"transaction_date":"2020-04-17 07:04:19"<br>}}

</pre>

                  </div>
                </div>
              </div>
            </div>
            <!--collapse end-->
               
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('inc/footer.php');?>