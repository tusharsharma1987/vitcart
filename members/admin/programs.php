<?php
session_start();
$pagename='program';
include 'header.php';

if(isset($_GET['del']) && $_GET['del'] != "")
	{
	$id=$_GET['del'];
	$delete_program=mysql_query("delete from programs where id= '".$id."'");
	header("location:message.php?msg=5");
	}
if(isset($_POST['submit']) && $_POST['submit'] == "program")
	{
		$datefrom=$_POST['datepicker'];
		$dateto=$_POST['datepickerto'];
		$place=$_POST['place'];
		$name=$_POST['name'];
		
		/*date*/
		$fromex=explode("/", $datefrom);
		$dfrom= $fromex[2]."-".$fromex[0]."-".$fromex[1]." 00:00:00";
		
		$toex=explode("/", $dateto);
		$dto= $toex[2]."-".$toex[0]."-".$toex[1]." 23:59:59";
		
		if($datefrom=="")
			{
			$error=1;
			}
		elseif($dateto == "")
			{
			$error=2;
			}
		elseif($place=="")
			{
			$error=3;
			}
		elseif($name=="")
			{
			$error=4;
			}
		else
			{
			//echo "insert into programs (dfrom, dto, place, name) values ('".$dfrom."','".$dto."','".$place."','".$name."')";
			//exit;
			$program_query=mysql_query("insert into programs (dfrom, dto, place, name) values ('".$dfrom."','".$dto."','".$place."','".$name."')") or die (mysql_error());
			header("location:message.php?msg=4");
			}
	}
?>
	<link rel="stylesheet" href="datepicker/base/jquery.ui.all.css">
	<script src="datepicker/jquery-1.4.4.js"></script>
	<script src="datepicker/jquery.ui.core.js"></script>
	<script src="datepicker/jquery.ui.widget.js"></script>
	<script src="datepicker/jquery.effects.core.js"></script>
	<script src="datepicker/jquery.effects.blind.js"></script>
	<script src="datepicker/jquery.effects.bounce.js"></script>
	<script src="datepicker/jquery.effects.clip.js"></script>
	<script src="datepicker/jquery.effects.drop.js"></script>
	<script src="datepicker/jquery.effects.fold.js"></script>

	<script src="datepicker/jquery.effects.slide.js"></script>
	<script src="datepicker/jquery.ui.datepicker.js"></script>

	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#anim" ).change(function() {
			$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
		});
	});
	$(function() {
		$( "#datepickerto" ).datepicker();
		$( "#anim" ).change(function() {
			$( "#datepickerto" ).datepicker( "option", "showAnim", $( this ).val() );
		});
	});

	</script>
	<script language="javascript">
		function check()
			{
				var from=document.getElementById("datepicker").value;
				var to =document.getElementById("datepickerto").value;
				var place = document.getElementById("place").value;
				var name= document.getElementById("name").value;
				if(from == "")
					{
						alert("Please Insert Starting Date of Schedule");
						return false;
					}
				if(to == "")
					{
						alert("Please Insert Ending Date of Schedule");
						return false;
					}
				if(place == "")
					{
						alert("Please Insert Place of Schedule");
						return false;
					}
				if(name == "")
					{
						alert("Please Insert Name of Program");
						return false;
					}
				//if()
			}
		function delete_record(id)
			{
				if(confirm("Do you want to delete this schedule"))
					{
					window.location="programs.php?del="+id;
					}
				else
					{
					return false;
					}
			}
	</script>
<div style="min-height:500px">
	<div align="center" style="font-size:22px; font-weight:bold; padding-top:30px">Program Schedule</div>
	<div align="center" style="width:500px; padding-left:450px; padding-top:30px; ">
	<form name="program" action="" method="post" onsubmit="return check()">
		<div style="float:left; width:20%; text-align:left;">Date From </div>
		<div style="float:left">:&nbsp;<input type="text" id="datepicker" name="datepicker" size="30"/></div>
		<div style="clear:both">&nbsp;</div>

		<div style="float:left; width:20%; text-align:left;">Date To </div>
		<div style="float:left">:&nbsp;<input type="text" id="datepickerto" name="datepickerto" size="30"/></div>
		<div style="clear:both">&nbsp;</div>

		<div style="float:left; width:20%; text-align:left;">Place </div>
		<div style="float:left">:&nbsp;<input type="text" name="place" id="place" size="30"/></div>
		<div style="clear:both">&nbsp;</div>

		<div style="float:left; width:20%;text-align:left;">Program Name </div>
		<div style="float:left">:&nbsp;<input type="text" name="name" id="name" size="30"/></div>
		<div style="clear:both">&nbsp;</div>

		<div style="clear:both; text-align:left; padding-left:75px; padding-top:0px"><input type="image" src="images/submit_c.png" /></div>
		<input type="hidden" name="submit" value="program" />
		</form>
	</div>
									<div style="display:none">
									<p>Animations:<br />
										<select id="anim">
											<option value="show">Show (default)</option>
											<option value="slideDown">Slide down</option>
											<option value="fadeIn">Fade in</option>
											<option value="blind">Blind (UI Effect)</option>
									
											<option value="bounce">Bounce (UI Effect)</option>
											<option value="clip">Clip (UI Effect)</option>
											<option value="drop">Drop (UI Effect)</option>
											<option value="fold">Fold (UI Effect)</option>
											<option selected="selected" value="slide">Slide (UI Effect)</option>
											<option value="">None</option>
									
										</select>
									
									</p>
									</div>

	<div style=" margin-left:150px; margin-top:30; width:80%; overflow:scroll; min-height:150px">
		<div style="width:99.5%; border:1px solid; height:20px; font-weight:bold">
			<div style="float:left; width:10%">Left Days</div>
			<div style="float:left; width:30%">&nbsp;&nbsp;Program Name</div>
			<div style="float:left; width:15%">Date From (Y-M-D)</div>
			<div style="float:left; width:15%">Date To (Y-M-D)</div>
			<div style="float:left; width:20%">Place</div>
			<div style="float:left; width:10%">Action</div>
		</div>
		<?php
		$select_prog=mysql_query("select * from programs where dto > now() order by id asc");
		$record=mysql_num_rows($select_prog);
		if($record <=0)
		{
		?>
		<div style="width:100%; text-align:center; padding-top:30px; height:20px; font-weight:bold">No Schedule Found</div>
		<?php
		}else
		{
		while($data=mysql_fetch_array($select_prog))
			{
			$datefrom=explode(" ",$data['dfrom']);
			$dateto=explode(" ",$data['dto']);
			$left="";
			$dateex=explode("-",$datefrom[0]);
			$datef=mktime(00,00,00,$dateex[1],$dateex[2],$dateex[0]);
			$present=time();
			$left=ceil(($datef - $present)/86400);
			if($left <=0)
				{
				$left="Going on";
				}
		?>
				<div style="float:left; width:10%"><?php echo $left; ?></div>
				<div style="float:left; width:30%">&nbsp;&nbsp;<?php echo $data['name']; ?></div>
				<div style="float:left; width:15%"><?php echo $datefrom[0]; ?></div>
				<div style="float:left; width:15%"><?php echo $dateto[0]; ?></div>
				<div style="float:left; width:20%"><?php echo $data['place']; ?></div>
				<div style="float:left; width:10%"><span style="cursor:pointer" onclick="return delete_record(<?php echo $data['id']; ?>)"><img src="images/delete.png" style="padding-top:4px"/></span></div>
		<?php
			}
		}
		?>
	</div>



</div>
<?php
include 'footer.php';
?>