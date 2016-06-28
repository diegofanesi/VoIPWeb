function isIE()
{
  return /msie/i.test(navigator.userAgent) && !/opera/i.test(navigator.userAgent);
}

Date.prototype.toDateString = function( ) {
	var string = (this.getDate() < 10) ? "0" + this.getDate() : this.getDate();
	string += "/";
	string += ((this.getMonth()+1) < 10) ? ("0" + (this.getMonth()+1)) : (this.getMonth()+1);
	string += "/";
	string += this.getFullYear();
	return string;
};

Date.prototype.toUnixTimestamp = function( ) {
	var string = (this.getDate() < 10) ? "0" + this.getDate() : this.getDate();
	string += "/";
	string += ((this.getMonth()+1) < 10) ? ("0" + (this.getMonth()+1)) : (this.getMonth()+1);
	string += "/";
	string += this.getFullYear();
	return string;
}

Function.prototype.getCallback = function( scope ) {
	var f = this;
	var args = [];
	for (var n = 1; n < arguments.length; n++)
		args.push(arguments[n]);
	return function() {
		f.apply(scope, args);
	};
};

Function.prototype.setScope = function( scope ) {
	var f = this;
	return function() {
		f.apply(scope);
	};
};

/**
 * Main XMLHttpRequest function.<br>
 * This function create an XMLHttpRequest object to send an asynchronous http
 * request to the given <code>url</code> with the given <code>post</code>. <br>
 * The function will associate the function <code>responseHandler</code> to the
 * server response. <br>
 * @see [main.js]responseHandler()
 * <br><br>
 * @see <a href="http://www.xml.com/pub/a/2005/02/09/xml-http-request.html">
 * Very Dynamic Web Interfaces
 * </a>
 * This function get 2 parameters:
 * 
 * @param url The url for the XMLHttpRequest
 * @param post The POST object. It is actually a normal object. Each attribute
 * 				name is the POST element name, each attribute value is the POST
 * 				value for the given name. <br>
 * 				Example: <br>
 * 					post.lollo = 2; <br>
 * 					post.ghgh = "omfg"; <br><br>
 * 				In php we can retrive:
 * 				$_REQUEST['lollo']<br>
 * 				$_REQUEST['ghgh']<br>
 * 				The first will have value 2 the second will have value "omfg"
 * 
 * 
 * @return nothing
 */
function loadXMLDoc( url, post, responseHandlerFunction ) 
{
    // Create send data variable
    var sendData;
    // If we have posts
    if( post ){
        // We parse the message to send as POST
        var sendData = parseData( post );
        
        // Strip the last char;
        sendData = sendData.slice(0,sendData.length-1);
    }
    
    // branch for native XMLHttpRequest object
    if (window.XMLHttpRequest) {
        this.req = new XMLHttpRequest();
        if( responseHandlerFunction )
        	req.onreadystatechange = responseHandlerFunction;
        else this.req.onreadystatechange = responseHandler;
        this.req.open("POST", url, true);
        this.req.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=utf-8;");
        this.req.send(sendData);
    }
    // branch for IE/Windows ActiveX version
    else if (window.ActiveXObject) {
        this.req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            if( !( responseHandlerFunction === undefined ) )
            	req.onreadystatechange = responseHandlerFunction;
            else req.onreadystatechange = responseHandler;
            req.open("POST", url, true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=utf-8;");
            req.send(sendData);
        }
    }
}

function responseHandler() 
{
    // only if req shows "complete"
    if (req.readyState == 4) {
        // only if "OK"
        if (req.status == 200) {
        	var response = req.responseXML;
            if( response ) {
	        	// Store response
	            response = req.responseXML.documentElement;
	            // Get the function name we need to call
	            var method = response.getElementsByTagName('callback')[0];
	            // If a method is specified go on
	            if( method ) {
	            	method = method.firstChild.data;
		            // Get the result node
		            var result = response.getElementsByTagName('data');
		            // If we have some parameters to give to the function
		            if( result ){
		                eval("this." + method + '(result)');
		            }
		            else{
		                eval("this." + method + '()');
		            }
	            }
	            // Else return
	            else {
	            	return;
	            }
            }
        } else {
            alert("There was a problem retrieving the XML data:\n" +
                 req.statusText);
        }
    }
}

//TODO COMMENT MEEEEEEEEEEEEEEE!!!!!
function parseData( post, key ) {
	var sendData = "";
	// If post is not an array we are iterating
	if( !(key === undefined) ) {
		sendData += encodeURIComponent( key ) + "=";
		for ( var int = 0; int < post.length; int++) {
			// FIXME! Find something better to separate array
			sendData += encodeURIComponent( post[int] ) + "|";
		}
		sendData = sendData.slice(0,sendData.length-1);
		sendData += "&";
		return sendData;
	}	
	// Else
	else {
		for(var key in post){
    		// If post[key] is an array we need to iterate
    		if( post[key].constructor.toString().indexOf("Array") >= 0  ) {
    			sendData = sendData + parseData( post[key], key );
    		}
    		else {
    			sendData = sendData + encodeURIComponent( key ) + "=" +
    						encodeURIComponent( post[key] ) + "&";
    		}
    	}
		return sendData;
	}
}
