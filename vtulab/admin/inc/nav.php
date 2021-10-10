<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php"><?php logo($sitelogo); ?> </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
     <!--Navigation Start -->   
        
     <div id="cssmenu">
<ul>
   <li class="active"><a href="dashboard.php"><span>Home</span></a></li>
   <li class="has-sub"><a href="#"><span>Payments</span></a>
      <ul>
         <li><a href="depositreq.php"><span>Payment Notification</span></a></li>
         <li><a href="paya.php"><span>Affiliate Payment</span></a></li>
        
      </ul>
   </li>
   
   
   <li class="has-sub"><a href="#"><span>Account</span></a>
      <ul>
         <li><a href="create-account.php"><span>Create New Account</span></a></li>
         <li class="last"><a href="credit-member.php"><span>Credit Wallet</span></a></li>
        
      </ul>
   </li>
   
   <li class="has-sub"><a href="#"><span>Services</span></a>
      <ul>
         <li><a href="add_service.php"><span>Add New Service</span></a></li>
         <li class="last"><a href="view_service.php"><span>View Services</span></a></li>
      <li class="last"><a href="smsblast.php"><span>SMS Broadcast</span></a></li>
         
      </ul>
   </li>
    <li class="has-sub"><a href="#"><span>Billing</span></a>
      <ul>
         
         <li class="last"><a href="rates.php"><span>VTU/Bill Prices</span></a></li>
         <li class="last"><a href="refcom.php"><span>Referral Commission</span></a></li>
         <li class="last"><a href="mtn-sme.php"><span>MTN SME Prices</span></a></li>
         <li class="last"><a href="glo-sme.php"><span>Glo SME Prices</span></a></li>
         <li class="last"><a href="airtel-sme.php"><span>Airtel SME Prices</span></a></li>
         <li class="last"><a href="etisalat-sme.php"><span>9mobile SME Prices</span></a></li>
         <li class="last"><a href="reseller-setup.php"><span>Setup/Upgrade Fee</span></a></li>
      </ul>
   </li>
   
   <li class="has-sub"><a href="#"><span>API</span></a>
      <ul>
         
         <li><a href="API_settings.php" ><span>API Settings</span></a></li>
         <li><a href="smsapi.php" ><span>SMS API</span></a></li>
         
      </ul>
   </li>
   
   <li class="has-sub"><a href="#"><span>Transactions</span></a>
      <ul>
         <li><a href="transactions.php"><span>View Transactions</span></a></li>
         
      </ul>
   </li>
   
   <li class="has-sub"><a href="#"><span>Settings</span></a>
      <ul>
         <li><a href="changepass.php"><span>Security</span></a></li>
         <li class="last"><a href="site-settings.php"><span>Site Settings</span></a></li>
         <li class="last"><a href="payment-gateway.php"><span>Payment Settings</span></a></li>
         <li class="last"><a href="add_bank.php"><span>Add Bank Details</span></a></li>
         
      </ul>
   </li>
   <li class="last"><a href="logout.php"><span>Logout</span></a></li>
</ul>
</div>';
