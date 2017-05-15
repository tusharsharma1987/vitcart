<?php
  //Developers need to implement this following function.
  //Typically, it should connect to the database and return an 2d array.
include 'dbc.php';

	function getTestData($max=10){
		$data=array();
		$gl=array('br','fr','us');
		if($_REQUEST['pagename']=="members")
		  {		
			$check=mysql_query("select * from member order by id")or die(mysql_error());	
			$Record=mysql_num_rows($check);
			$poem=mysql_query("select * from member order by id") or die(mysql_error());
			$buttonvalue="";
			
			while($row=mysql_fetch_array($poem))
			  {
			  	$status=$row['status'];
				if($status==0)
				{
					$status="Active";
					$buttonvalue="Deactive";
				}
				else
				{
					$status="Deactive";
					$buttonvalue="Active";
				}
				$record=array('no' =>$row['id'] ,
								'user_name' =>$row['user_name'],
								'full_name' =>($row['full_name']), 
								'store_name' => $row['store_name'],
								'address' => $row['address'],
								'location' => $row['location'],
								'zip_code' => $row['zipcode'],
								'email' => $row['email'],
								'phone' => $row['phone'],
								'country' => $row['country'],
								'created_date' => $row['created_date'],
								'updated_date' => $row['updated_date'],
								'package' => $row['package'],
								'theme' => $row['theme'],
								'status' => $status,
								'action' => "<input type='button' value=$buttonvalue onclick='javascript:window.location.href=\"members.php?id=".$row['id']."\"' > &nbsp; <input type='button' value='Delete' onclick='delpoem(".$row['id'].");' >",
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

