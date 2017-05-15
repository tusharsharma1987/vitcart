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

