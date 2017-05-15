<?php
session_start();
$pagename='theme';
include 'header.php';
?>

<?php
$error="";

function delete_folder($path)
{
    if (is_dir($path) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file)
        {
            if (in_array($file->getBasename(), array('.', '..')) !== true)
            {
                if ($file->isDir() === true)
                {
                    rmdir($file->getPathName());
                }

                else if (($file->isFile() === true) || ($file->isLink() === true))
                {
                    unlink($file->getPathname());
                }
            }
        }

        return rmdir($path);
    }

    else if ((is_file($path) === true) || (is_link($path) === true))
    {
        return unlink($path);
    }

    return false;
}

if(isset($_POST['themesubmit']))
{
	$name=$_FILES['themes']['tmp_name'];
	$file_type=$_FILES['themes']['type'];
	$length=strlen($name);
	$type=substr($_FILES['themes']['name'],-3);
	$file_name=substr($_FILES['themes']['name'],0,-4);
	
	if($type=="zip" || $file_type=="application/octet-stream")
	{
		$zip = new ZipArchive;
		if ($zip->open($name) === TRUE)
		{
			  $zip->extractTo('../members/modules/themes/');
			  $zip->close();
			  if(!file_exists('../members/modules/themes/'.$file_name.'/'.$file_name.'.jpg'))
			  { 
			  	if(is_dir('../members/modules/themes/'.$file_name))
				{
				
						delete_folder('../members/modules/themes/'.$file_name);
						$error="This is not valid Theme File.";
				}
				else{
					if(!file_exists('../members/modules/themes/'.$file_name.'/'.$file_name.'/'.$file_name.'.jpg'))
					{
						delete_folder('../members/modules/themes/'.$file_name.'/'.$file_name);
						$error="This is not valid Theme File.";
					}
					else
					{
						$qr="insert into theme (theme_name,status) values ('".$file_name."','0')";
						$qr_exec=mysql_query($qr);
						$success="Theme Uploaded Successfully";
					}
				}
			  }
			else
			{
				$qr="insert into theme (theme_name,status) values ('".$file_name."','0')";
				$qr_exec=mysql_query($qr);
				$success="Theme Uploaded Successfully";
			}
		}
		else
		{
		  $error="File should be zip file";
		  }
	}	
	else
	{
		$error="Sorry Unable to Upload Theme";
	}

	
}

?>

<div class="page_title">Add Themes</div>
<div>
	<?php if(isset($success) && $success!="") { ?><div class="success_text"><?php echo $success; ?></div><?php } ?>
	<?php if(isset($error) && $error!="") { ?><div class="error_text"><?php echo $error; ?></div><?php } ?>
<form action="#" method="post" enctype="multipart/form-data">
	<div >	
		<div class="titlefloat">Add Themes:&nbsp&nbsp;</div>
		<div class="padding"><input type="file" name="themes" id="theme_id" /></div>
		<div class="clear"></div>
	</div>
	<div >	
		<div class="titlefloat">&nbsp&nbsp;</div>
		<div class="padding"><input type="submit" name="themesubmit" value="Add Theme"/></div>
		<div class="clear"></div>
	</div>
</form>
</div>
<div class="clear"></div>

<?php
include 'footer.php';
?>