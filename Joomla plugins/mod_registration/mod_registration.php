<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$link = $params->get( 'link' );?>
<div id="mod_registration">
<img src="/modules/mod_registration/image.png" onLoad="httpReq('http://' + document.domain + '/<?php echo $link; ?>', document.getElementById('mod_registration'), this);"></img>
<script type=text/javascript>
function  elabHtml(html) {
	var str1 = "<!-- " + "<?php echo $params->get( 'startstr' );?>" + " -->";
	var str2 = "<!-- " + "<?php echo $params->get( 'endstr' );?>" + " -->";
	var start = html.indexOf(str1);
	var stop = html.indexOf(str2);
	var len=stop-start;
	return html.substr(start, len);
}

function httpReq(link, obj, img) {
	if (img.style.display == "none") return;
	img.style.display="none";
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  http=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  http=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	http.onreadystatechange  = function()
    { 
         if(http.readyState  == 4)
         {
              if(http.status  == 200) 
                 obj.innerHTML=obj.innerHTML + elabHtml(http.responseText); 
              else 
                 obj.innerHTML=obj.innerHTML + "Error code " + http.status;
         }
    }; 
	http.open("GET", link, true);
	http.send();
	
}
</script>

</div>