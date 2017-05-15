<?php
  //Developers need to implement this following function.
  //Typically, it should connect to the database and return an 2d array.
include 'dbc.php';

	function getTestData($max=10){
		$data=array();
		$gl=array('br','fr','us');
		if($_REQUEST['pagename']=="poems")
		  {		
			$check=mysql_query("select * from poems ");	
			$Record=mysql_num_rows($check);
			$poem=mysql_query("select * from poems");
			while($row=mysql_fetch_array($poem))
			  {
				$record=array('no' =>$row['id'] ,
								'title' =>$row['title'],
								'content' =>shortdata($row['poem_content']), 
								'writer' => $row['writer'],
								'action' => "<input type='button' value='Edit' onclick='editpoem(".$row['id'].");' > &nbsp; <input type='button' value='Delete' onclick='delpoem(".$row['id'].");' >",
							);
				array_push($data,$record);
			  }
			return $data;	
		 }
		if($_REQUEST['pagename']=="youtube")
		  {		
			$check=mysql_query("select * from youtube ");	
			$Record=mysql_num_rows($check);
			$youtube=mysql_query("select * from youtube");
			while($row=mysql_fetch_array($youtube))
			  {
				$record=array('no' =>$row['id'] ,
								'title' =>$row['title'],
								'URL' =>$row['youtubeurl'], 
								'action' => "<input type='button' value='Delete' style='height:20px; font-size:11px' onclick='delyoutube(".$row['id'].");' >",
							);
				array_push($data,$record);
			  }
			return $data;	
		 }
		if($_REQUEST['pagename']=="comment")
		  {		
			$check=mysql_query("select * from suggestions order by suggestion_date desc");	
			$Record=mysql_num_rows($check);
			$youtube=mysql_query("select * from suggestions order by suggestion_date desc");
			while($row=mysql_fetch_array($youtube))
			  {
				  $suggestion_date=explode(" ",$row['suggestion_date']);
				$record=array('no' =>$row['id'] ,
								'fullname' =>$row['fullname'],
								'email' =>$row['email'], 
								'phone' =>$row['phone'], 
								'comment' =>$row['comment'], 
								'comment_date' =>$suggestion_date[0], 
								'action' => "<input type='button' value='Delete' style='height:20px; font-size:11px' onclick='delete_comment(".$row['id'].");' >",
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

