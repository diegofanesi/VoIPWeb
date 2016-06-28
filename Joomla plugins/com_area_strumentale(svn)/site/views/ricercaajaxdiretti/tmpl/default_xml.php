<?php
defined('_JEXEC') or die('Restricted access');

$doc =& JFactory::getDocument(); 
$doc->setMimeEncoding('application/xml'); 
// XML Document
$document = new DOMDocument( "1.0", "UTF-8" );
$document -> formatOutput = true;

// Document response
$response = $document -> createElement( "response" );
$document -> appendChild( $response );

// Callback function
$action = JRequest::getVar('action');
$callback = $document -> createElement( "callback" );
if( $action == "getCount" ) {
	$callback -> nodeValue = $this->escape( 'getCount' );
	$response -> appendChild( $callback );
	$result = $document -> createElement( "data" );
	$response -> appendChild( $result );
	$count = $document -> createElement( "count" );
	$count -> nodeValue = $this->escape( $this->count );
	$result -> appendChild( $count );
}
else {
	$callback -> nodeValue = $this->escape( 'getBandi' );
	$response -> appendChild( $callback );
	
	// Document result
	$result = $document -> createElement( "data" );
	$response -> appendChild( $result );
	
	$nodoBandi = $document -> createElement( "bandi" );
	$result -> appendChild( $nodoBandi );
	
	foreach ( $this->bandi as $bando ) {
		$nodoBando = $document -> createElement( "bando" );
		// Nome		
		$nodoNome = $document -> createElement( "nome" );
		$nodoNome-> nodeValue = $this->escape( $bando['nome'] );
		$nodoBando -> appendChild( $nodoNome );
		
		// Direzione
		$nodoDirezione = $document -> createElement( "direzione" );
		$nodoDirezione -> nodeValue = $this->escape( $bando['direzione'] );
		$nodoBando -> appendChild( $nodoDirezione );
		
		// Direzione Link
		$nodoDirezione_link = $document -> createElement( "direzione_link" );
		$nodoDirezione_link -> nodeValue = $this->escape( $bando['direzione_link'] );
		$nodoBando -> appendChild( $nodoDirezione_link );
		
		// Scadenza
		$nodoScadenza = $document -> createElement( "scadenza" );
		$nodoScadenza-> nodeValue = $this->escape( $bando['scadenza'] );
		$nodoBando -> appendChild( $nodoScadenza );
		
		// Link
		$nodoLink = $document -> createElement( "link" );
		$nodoLink-> nodeValue = $this->escape( $bando['link'] );
		$nodoBando -> appendChild( $nodoLink );
		
		// Programma
		$nodoProgramma = $document -> createElement( "programma" );
		$nodoProgramma -> nodeValue = $this->escape( $bando['programma'] );
		$nodoBando -> appendChild( $nodoProgramma );
		
		$nodoBandi -> appendChild( $nodoBando );
		
	}
}
echo $document -> saveXML();

?>