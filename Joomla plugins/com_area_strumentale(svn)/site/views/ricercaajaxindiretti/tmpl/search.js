function Bando( data )
{
	this.id = data.getElementsByTagName("id")[0].firstChild.data;
	this.nome = data.getElementsByTagName("nome")[0].firstChild.data;
	this.regioneNome = data.getElementsByTagName("regioneNome")[0].firstChild.data;
	this.regioneId = data.getElementsByTagName("regioneId")[0].firstChild.data;
	this.scadenza = data.getElementsByTagName("scadenza")[0].firstChild.data;
	this.link = data.getElementsByTagName("link")[0].firstChild.data;
	this.settori = new Array();
	var settori = data.getElementsByTagName("settore");
	for( var int = 0; int < settori.length; int++ ) {
		var obj = new Object();
		obj.nome = settori[int].getElementsByTagName("settoreNome")[0].firstChild.data;
		obj.id = settori[int].getElementsByTagName("settoreId")[0].firstChild.data;
		this.settori.push(obj);
	}
}

function Search( url, regioni, settori )
{
	this._page = 0;
	this.url = url;
	this.post = new Object();
	this.post['action'] = "getCount";
	this.post['regione'] = "";
	this.post['settore'] = "";
	this.post['scadenza'] = "";
	this.post['scaduti'] = "";
	date = new Date();
	date.setMilliseconds(0);
	date.setSeconds(0);
	date.setMinutes(0);
	date.setHours(0);
	this.post['scadenza'] = date.getTime() / 1000;
	this.showFilters( regioni, settori );
	loadXMLDoc( this.url, this.post, responseHandler.getCallback(this) );
}

Search.prototype.showFilters = function( regioni, settori )
{
	var div = document.getElementById("FiltriBandi");
	// Set up regioni
	var p = document.createElement("p");
	p.appendChild( document.createTextNode( "Regione: " ) );
	var fr = document.createElement("select");
	for ( var int = 0; int < regioni.length; int++) {
		var opt = document.createElement("option");
		opt.appendChild( document.createTextNode( regioni[int][0] ) );
		opt.setAttribute("value", regioni[int][1]);
		fr.appendChild( opt );
	}
	div.appendChild( p );
	p.appendChild( fr );
	// Set up settori
	p = document.createElement("p");
	p.appendChild( document.createTextNode( "Settore: " ) );
	var fs = document.createElement("select");
	for ( var int = 0; int < settori.length; int++) {
		var opt = document.createElement("option");
		opt.appendChild( document.createTextNode( settori[int][0] ) );
		opt.setAttribute("value", settori[int][1]);
		fs.appendChild( opt );
	}
	div.appendChild( p );
	p.appendChild( fs );
	// Set up date filter
	p = document.createElement("p");
	p.appendChild( document.createTextNode( "Scadenza minima: " ) );
	var fd = document.createElement("div");
	var fdt = document.createElement("input");
	fdt.setAttribute( "type", "text" );
	var remove = document.createElement("button");
	this.calendar = new Calendar( fd, fdt, remove );
	div.appendChild( p );
	p.appendChild( fdt );
	remove.appendChild( document.createTextNode( "X" ) );
	p.appendChild( remove );
	div.appendChild( fd );
	// Set up past filter
	p = document.createElement("p");
	var past = document.createElement("input");
	past.setAttribute( "type", "checkbox" );
	div.appendChild( p );
	p.appendChild( past );
	p.appendChild( document.createTextNode( "Mostra bandi scaduti" ) );
	// Setting callbacks
    if( !isIE()) past.onchange = this.setFilter.getCallback(this, ["scaduti", past, fdt]);
	else past.onclick = this.setFilter.getCallback(this, ["scaduti", past, fdt]);
    fr.onchange = this.setFilter.getCallback(this, ["regione", fr]);
	fs.onchange = this.setFilter.getCallback(this, ["settore", fs]);
	fdt.onchange = this.setFilter.getCallback(this, ["scadenza", fdt, past]);

};

Search.prototype.setFilter = function( filter )
{
	if( filter[0] == "scadenza" ) {
		var date;
		if( filter[1].value == "" ) {
			if( this.post['scaduti'] != "" ) {
				date = new Date(0);
			}
			else {
				date = new Date();
				date.setMilliseconds(0);
				date.setSeconds(0);
				date.setMinutes(0);
				date.setHours(0);
			}
			filter[2].parentNode.removeAttribute("className")
			|| filter[2].parentNode.removeAttribute("class");
		}
		else {
			var string = filter[1].value;
			string = string.split( "/" );
			date = new Date( string[2], string[1]-1, string[0] );
			var date2 = new Date();
			date2.setMilliseconds(0);
			date2.setSeconds(0);
			date2.setMinutes(0);
			date2.setHours(0);
			if( this.post['scaduti'] == "" && date < date2 ) {
				filter[2].parentNode.setAttribute("className","FiltroErrato")
				|| filter[2].parentNode.setAttribute("class","FiltroErrato");
			}
			else {
				filter[2].parentNode.removeAttribute("className")
				|| filter[2].parentNode.removeAttribute("class");
			}
		}
		this.post[filter[0]] = date.getTime() / 1000;
	}
	else {
		if( filter[0] == "scaduti" ) {
			this.post[filter[0]] = filter[1].checked ? "on" : "";
			filter[2].onchange();
			return;
		}
		else {
			this.post[filter[0]] = filter[1].value;
		}
	}
	// Set action
	this.post['action'] = "getCount";
	loadXMLDoc( this.url, this.post, responseHandler.getCallback(this) );
};

Search.prototype.getCount = function( data )
{
	this.count = data[0].getElementsByTagName("count")[0].firstChild.data;
	this.post['action'] = 0;
	this.setPage( 0 );
};

Search.prototype.setPageNum = function( num )
{
	var div = document.getElementById("PagineBandiUpper");
	while( div.childNodes[0] ) div.removeChild( div.childNodes[0] );
	var p = document.createElement("p");
	p.appendChild( document.createTextNode( "Pagine: " ) );
	for( var int = 0; int < num; int++ ) {
		var link = document.createElement("span");
		if( this._page != int )	{
			link.setAttribute("className","PaginaBandi")
			|| link.setAttribute("class","PaginaBandi");
			link.onclick = this.setPage.getCallback(this, [int]);
		}
		else
			link.setAttribute("className","PaginaCorrente")
			|| link.setAttribute("class","PaginaCorrente");

		link.appendChild( document.createTextNode(int+1) );
		p.appendChild( link );
	}
	div.appendChild( p );
	
	div = document.getElementById("PagineBandiLower");
	while( div.childNodes[0] ) div.removeChild( div.childNodes[0] );
	p = document.createElement("p");
	p.appendChild( document.createTextNode( "Pagine: " ) );
	for( var int = 0; int <= num; int++ ) {
		var link = document.createElement("span");
		if( this._page != int )	{
			link.setAttribute("className","PaginaBandi")
			|| link.setAttribute("class","PaginaBandi");
			link.onclick = this.setPage.getCallback(this, [int]);
		}
		else {
			link.setAttribute("className","PaginaCorrente")
			|| link.setAttribute("class","PaginaCorrente");
		}
		link.appendChild( document.createTextNode(int+1) );
		p.appendChild( link );
	}
	div.appendChild( p );
};

Search.prototype.setPage = function( page )
{
	this._page = page;
	this.post['lower'] = page * 50;
	this.post['upper'] = page * 50 + 50;
	loadXMLDoc( this.url, this.post, responseHandler.getCallback(this) );
};

Search.prototype.getBandi = function( data )
{
	data = data[0].getElementsByTagName("bandi")[0];
	this.bandi = new Array();
	bandi = data.getElementsByTagName("bando");
	for ( var int = 0; int < bandi.length; int++) {
		this.bandi.push( new Bando( bandi[int] ) );
	}
	this.showTable();
	this.setPageNum( this.count / 50 );
};

Search.prototype.showTable = function( data )
{
	if( this.table === undefined ) {
		this.initTable( "TabellaBandi" );
	}
	this.table.showBandi( this.bandi );
};

Search.prototype.initTable = function( id )
{
	this.table = new Table( id );
};

function Table( id )
{
	this.id = id;
	this._table = document.getElementById(id);
}

Table.prototype.clear = function ()
{
	while( this._table.childNodes[0] ) this._table.removeChild( this._table.childNodes[0] );
};

Table.prototype.showBandi = function ( bandi )
{
	this.clear();

	// Creo la testa
	var thead = document.createElement("thead");
	
	if( bandi.length == 0 ) {
		var row = document.createElement("tr");
		var cell = document.createElement("th");
		cell.appendChild( document.createTextNode("Siamo spiacenti, non sono " +
				"presenti bandi che soddisfino questi requisiti") );
		row.appendChild( cell );
		thead.appendChild( row );
		this._table.appendChild( thead );
		return;
	}
	
	// Creo la riga di instestazione
	var row = document.createElement("tr");

	// Campo nome bando
	var cell = document.createElement("th");
	cell.appendChild( document.createTextNode("Nome") );
	row.appendChild( cell );
	

	// Campo direzione bando
	cell = document.createElement("th");
	cell.appendChild( document.createTextNode("Regione") );
	row.appendChild( cell );

	// Campo programma bando
	cell = document.createElement("th");
	cell.appendChild( document.createTextNode("Settore") );
	row.appendChild( cell );
	
	// Campo scadenza bando
	cell = document.createElement("th");
	cell.appendChild( document.createTextNode("Scadenza") );
	row.appendChild( cell );
	
	thead.appendChild(row);
	this._table.appendChild(thead);
	
	// Creo il body
	var tbody = document.createElement("tbody");
	// Per ogni bando creo una riga
	for( var int = 0; int < bandi.length; int++ ) {
		// Create row
		var row = document.createElement("tr");
		if( int % 2 == 0 )
			row.setAttribute("className", "pari") 
			|| row.setAttribute("class", "pari");
		else 
			row.setAttribute("className", "dispari") 
			|| row.setAttribute("class", "dispari");
		// For each element create cell
		// Nome
		var cell = document.createElement("td");
		var link = document.createElement("a");
		link.setAttribute("href", bandi[int].link);
		link.setAttribute("target", "_blank");
		link.appendChild( document.createTextNode( bandi[int].nome ) );
		cell.appendChild( link );
		row.appendChild( cell );
		// Regione
		cell = document.createElement("td");
		cell.appendChild( document.createTextNode( bandi[int].regioneNome ) );
		row.appendChild( cell );
		// Settore
		cell = document.createElement("td");
		var string = "";
		for ( var int2 = 0; int2 < bandi[int].settori.length; int2++) {
			string += bandi[int].settori[int2].nome + ", ";
		}
		if( bandi[int].settori.length > 0 ) 
			string = string.substring(0,string.length-2);
		cell.appendChild( document.createTextNode( string ) );
		row.appendChild( cell );
		// Scadenza
		cell = document.createElement("td");
		var date = new Date( bandi[int].scadenza * 1000);
		if( bandi[int].scadenza != 0 ) 
			cell.appendChild( document.createTextNode( date.toDateString() ) );
		else
			cell.appendChild( document.createTextNode( "Senza scadenza" ) );
		row.appendChild( cell );
		tbody.appendChild(row);
	}
	this._table.appendChild(tbody);
}
