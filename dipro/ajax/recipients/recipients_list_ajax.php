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

	$db = new Conexion;
	$user = new User;
	$userData = $user->getUserData();

		$search = trim($_REQUEST['search']);

		$tables="users";
		$fields="*";

		$sWhere="create_user = '".$_SESSION['userid']."'";


        if($search!=null){

			$sWhere.=" and (fname LIKE '%".$search."%' or lname LIKE '%".$search."%')";
        }
        
		// // pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;

	
		$sql="SELECT $fields FROM  $tables where $sWhere";
        $query_count=$db->query($sql);   		
      	$db->execute();
    	$numrows= $db->rowCount();    


        $db->query($sql." limit $offset, $per_page"); 
        $data= $db->registros();
		
		$total_pages = ceil($numrows/$per_page);
		

if ($numrows>0){?>


	<table id="zero_config" class="table table-condensed table-hover table-striped" data-pagination="true" data-page-size="5">
		<thead>
			<tr>
				<th class="text-center"><b><?php echo $lang['edit-clien38'] ?></b></th>
				<th class="text-center"><b><?php echo $lang['edit-clien39'] ?></b></th>
				<th class="text-center"><b><?php echo $lang['langs_01084'] ?></b></th>								
				<th class="text-center"><b><?php echo $lang['edit-clien43'] ?></b></th>
			</tr>
		</thead>
		
		
			<?php if(!$data){?>
			<tr>
				<td colspan="6">
				<?php echo "
				<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='150' /></i>								
				",false;?>
				</td>
			</tr>
			<?php }else{ ?>
			<?php foreach ($data as $user){?>
			<tr>


				<td class="text-center"><?php echo $user->fname;?> <?php echo $user->lname;?></td>
				<td class="text-center"><?php echo $user->email;?></td>
				<td class="text-center"><?php echo $user->phone;?></td>
				<td align='center'>
					<a  href="recipients_edit.php?recipient=<?php echo $user->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-clien46'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>					
					
						<a onclick="eliminar('<?php echo $user->id;?>')" id="item_<?php echo $user->id;?>" class="delete" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-clien47'] ?>"><i style="color:#343a40" class="ti-trash"></i></a>
					
				</td>
			</tr>
			<?php }?>
			
			<?php }?>
		
	</table>


	<div class="pull-right">
					<?php  echo paginate($page, $total_pages, $adjacents);	?>
				</div>
</div>
<?php }?>
