<div style="float:left; width:200px;">
<div style="text-align:center; height:30px; background-color:#0CF; width:200px; margin-top:5px;">Categories</div>
<div style="border:1px solid #0CF; padding-left:5px;">
	<?php
		if(isset($_GET['cat']) && $_GET['cat']!="")
		{
			$data=base64_decode($_GET['cat']);
			$data_exp=explode("/",$data);
			$sub_cat=$data_exp[1];
			$cat=$data_exp[0];
		}
		else
		{
			$display="none";
		}
		
    for($i=0;$i<$total_cat; $i++)
    {  ?>
        <div onclick="show_hide('<?php echo $category_array[$i]['id']; ?>');" style="cursor:pointer;"><?php echo $category_array[$i]['name']; ?></div>
        <div id="<?php echo $category_array[$i]['id']; ?>_sub" <?php  if(trim($data_exp[0]) == $category_array[$i]['id']) {echo "style=''";} else { echo "style='display:none'";} ?>>
        <?php for($j=0;$j<$total_sub_cat[$i]; $j++) { $cat=base64_encode($category_array[$i]['id']."/".$sub_category_array[$i][$j]['id']); ?>
            <div <?php if($data_exp[1]==$sub_category_array[$i][$j]['id']) {echo "style='font-weight:bold'";} else { echo "style='color:#fff'";} ?>><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/modules/products/all_products.php?cat=<?php echo $cat; ?>"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;".$sub_category_array[$i][$j]['name']; ?></a></div>
            <?php } ?>
            </div>
    <?php }
    ?>
	</div>
</div>