<?php

session_start();

  //Developers need to implement this following function.

  //Typically, it should connect to the database and return an 2d array.

  

include 'dbc.php';



	function getTestData($max=10){

		$data=array();

		$gl=array('br','fr','us');

		if($_REQUEST['pagename']=="category")

		  {		

			$check=mysql_query("select * from category where user_id='".$_SESSION['id']."' order by id");	

			$Record=mysql_num_rows($check);

			$poem=mysql_query("select * from category where user_id='".$_SESSION['id']."' order by id");

			

			while($row=mysql_fetch_array($poem))

			  {

				  $subcategory_qr=mysql_query("select * from category where id='".$row['parent_id']."' ");

				  $row_subcat=mysql_fetch_array($subcategory_qr);

				  if($row['parent_id']==0)

				  {

				  	$parentname="Main Category";

				  }

				  else

				  {

				  	$parentname=$row_subcat['category_name'];

				  }

				$record=array('no' =>$row['id'] ,

								'category_name' =>$row['category_name'],

								'parent_id' =>$parentname, 

								'action' => "<input type='button' value='Edit' onclick='javascript:window.location.href=\"category_add.php?id=".$row['id']."\"' > &nbsp; <input type='button' value='Delete' onclick='delpoem(".$row['id'].");' >",

							);

				array_push($data,$record);

			  }

			return $data;	

		 }

		if($_REQUEST['pagename']=="transaction")

		  {		

			$check=mysql_query("select * from transaction_report where user_id='".$_SESSION['id']."' order by id");	

			$Record=mysql_num_rows($check);

			$transaction_report=mysql_query("select * from transaction_report where user_id='".$_SESSION['id']."' order by id");

			

			while($row=mysql_fetch_array($transaction_report))

			  {

					$amount=$row['amount'];
					
				  $product_qr=mysql_query("select * from product where id='".$row['product']."' ");

				  $row_product=mysql_fetch_array($product_qr);

				  if($row['response']==0)

				  {

				  	$status="Success";

				  }

				  else

				  {

				  	$status="Failed";

				  }
					
					//$trans_date_exp=explode(" ",$row['transaction_date']);
					
				$record=array('no' =>$row['id'] ,

								'product_name' =>$row_product['product_name'],

								'status' =>$status,
								
								'amount'=>"$".number_format($amount,2),
								
								'trans_date'=>$row['transaction_date'], 

								'action' => "<input type='button' value='Edit' onclick='javascript:window.location.href=\"category_add.php?id=".$row['id']."\"' > &nbsp; <input type='button' value='Delete' onclick='delpoem(".$row['id'].");' >",

							);

				array_push($data,$record);

			  }

			return $data;	

		 }
		 

		 

		 

		if($_REQUEST['pagename']=="product")

		  {		

			$check=mysql_query("select p.*,c.*,p.id as pid from products p left join category c on p.category=c.id where p.user_id='".$_SESSION['id']."' order by p.id desc");	

			$Record=mysql_num_rows($check);

			$products=mysql_query("select p.*,c.*,p.id as pid from products p left join category c on p.category=c.id where p.user_id='".$_SESSION['id']."' order by p.id desc");

			while($row=mysql_fetch_array($products))

			  {

				$category=mysql_query("select * from category where id='".$row['sub_category']."'");

				$subcategorydata=mysql_fetch_array($category);	

				if($row['image1']=="")
				{
					$row['image1']="noimage.jpg";
				}

				$record=array('no' =>$row['pid'] ,

								'name' =>$row['product_name'], 

								'photo' => "<img src='../images/products/".$row['image1']."' width='95' />",

								'actual_price' => "$".number_format($row['annual_prise'],2),

								'price' => "$".number_format($row['store_prise'],2),

								'brand' => $row['brand_name'],

								'category' => $row['category_name'],

								'sub_category' => $subcategorydata['category_name'],

								'action' =>"&nbsp; <input type='button' value='Edit' onclick='javascript:window.location.href=\"products_add.php?id=".$row['pid']."\"' ><input type='button' value='Delete' onclick='delnews(".$row['id'].");' >",

							);

				array_push($data,$record);

			  }

			return $data;	

		 }		 

	}

	

	function getTestDataForMore(){

    $data = getTestData();

    return $data;

  }



function shortdata($text)

	{

		$chrc=strlen($text);

		if($chrc > 80)

			{

				$new_text=substr($text,0,180);

				$new_text=$new_text."....";

			}

		else

			{

				$new_text=$text;

			}

		return $new_text;

	}



?>



