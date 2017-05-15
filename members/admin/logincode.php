<?php

session_start();

include("dbc.php");

$uname=$_POST['mid'];

$pwd=$_POST['password'];

if($uname=='' || $pwd=='')

	{

	if($uname=='')

		{

		$type=1;

		}

	if($pwd=='')

		{

		$type=2;

		}

	if($pwd=='' && $uname=='')

		{

		$type=3;

		}

		echo $type;

	?>

		<script language=javascript>

			window.location.href="index.php?type=<?php echo $type; ?>&name=<?php echo $uname; ?>";

		</script>

		<?php	

	}

else

	{

		$sql="SELECT * FROM member WHERE email='".$uname."' and password='".md5($pwd)."'";

		$result=mysql_query($sql);

		$count=mysql_num_rows($result);

		

		if($count==1)

		{

			$user_info=mysql_fetch_array($result);

			$_SESSION['uname']=$user_info['user_name'];

			$_SESSION['id']=$user_info['id'];

			$_SESSION['type']="member";

		  ?>

			<script language=javascript>

			window.location.href="profile.php";

			</script>

			<?php

		}

		else

		{

			echo "<div align=center>";

			$error=1;

				   ?>

			<script language=javascript>

			window.location.href="index.php?error=match";

			</script>

		<?php

		}    

}

?>