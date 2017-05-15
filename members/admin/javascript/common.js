function DoNewObject()
{
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
		}
	}
	//If we are using a non-IE browser, create a JavaScript instance of the object.
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function fetch_subcategory(id)
	{
		var url1="fetch_subcategory.php?id="+id;
		if(!xmlhttp)
		{
			var xmlhttp = false;
			xmlhttp = DoNewObject();
		}
		xmlhttp.open("GET",url1)
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var temp=xmlhttp.responseText;
					document.getElementById("subcategory_id").innerHTML=temp;
			}
		}
xmlhttp.send(null);
}

	function check()
	{
		var productname=document.getElementById("products_id").value;
		var category=document.getElementById("category_id").value;
		var subcategory=document.getElementById("subcategory_id").value;
		var brandname=document.getElementById("brandname_id").value;
		var annualprice=document.getElementById("annualprice_id").value;
		var discount=document.getElementById("discount_id").value;
		var shortdiscription=document.getElementById("shortdiscription_id").value;
		var longdiscription=document.getElementById("longdiscription_id").value;
		var status=document.getElementById("status_id").value;
		
		
			if(productname==""){
				alert("Product name must be entered..");
				return false;
			}
			else if(category=="0"){
				alert("Category must be selected..");
				return false;
			}
			else if(subcategory=="0"){
				alert("Sub category must be selected..");
				return false;
			}
			else if(brandname==""){
				alert("Brand name must be entered..");
				return false;
			}
			else if(annualprice==""){
				alert("Annual price must be entered..");
				return false;
			}
			else if(discount==""){
				alert("Discount must be entered..");
				return false;
			}
			else if(shortdiscription==""){
				alert("Short discription must be given..");
				return false;
			}
			else if(longdiscription==""){
				alert("Long discription must be given..");
				return false;
			}
			else
			{
				return true;
			}
	}
	
	function price()
	{
		var a = document.getElementById("annualprice_id").value;
		var d = document.getElementById("discount_id").value;
		document.getElementById("storeprice_id").value = a - (a * (d/100)) ;
	}
