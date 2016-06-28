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
		// ID
		$nodoId = $document -> createElement( "id" );
		$nodoId -> nodeValue = $this->escape( $bando['id'] );
		$nodoBando -> appendChild( $nodoId );
		// Nome		
		$nodoNome = $document -> createElement( "nome" );
		$nodoNome-> nodeValue = $this->escape( $bando['nome'] );
		$nodoBando -> appendChild( $nodoNome );
		
		// Regione
		$nodoRegione = $document -> createElement( "regione" );
		$nodoRegioneNome = $document -> createElement( "regioneNome" );
		$nodoRegioneNome -> nodeValue = $this->escape( $bando['regione'] );
		$nodoRegione -> appendChild( $nodoRegioneNome );
		$nodoRegioneId = $document -> createElement( "regioneId" );
		$nodoRegioneId -> nodeValue = $this->escape( $bando['regioneId'] );
		$nodoRegione -> appendChild( $nodoRegioneId );
		$nodoBando -> appendChild( $nodoRegione );
		//if( $bando['id'] == 70 ) echo $bando['regione'];
		
		// Scadenza
		$nodoScadenza = $document -> createElement( "scadenza" );
		$nodoScadenza-> nodeValue = $this->escape( $bando['scadenza'] );
		$nodoBando -> appendChild( $nodoScadenza );
		
		// Link
		$nodoLink = $document -> createElement( "link" );
		$nodoLink-> nodeValue = $this->escape( $bando['link'] );
		$nodoBando -> appendChild( $nodoLink );
		
		// Settori
		if( isset( $bando['settori'] ) ) {
			for( $i = 0; $i < count( $bando['settori'] ); $i++ ) {
				$nodoSettore = $document -> createElement( "settore" );
				$nodoSettoreNome = $document -> createElement( "settoreNome" );
				$nodoSettoreNome-> nodeValue = $this->escape( $bando['settori'][$i]['settore'] );
				$nodoSettore -> appendChild( $nodoSettoreNome );
				$nodoSettoreId = $document -> createElement( "settoreId" );
				$nodoSettoreId-> nodeValue = $this->escape( $bando['settori'][$i]['id'] );
				$nodoSettore -> appendChild( $nodoSettoreId );
				$nodoBando -> appendChild( $nodoSettore );
			}
		}
		
		$nodoBandi -> appendChild( $nodoBando );
		
	}
}
echo $document -> saveXML();

?>