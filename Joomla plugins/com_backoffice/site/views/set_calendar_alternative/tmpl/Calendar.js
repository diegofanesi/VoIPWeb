Date.prototype.toDateString = function( ) {
	var string = (this.getDate() < 10) ? "0" + this.getDate() : this.getDate();
	string += "/";
	string += ((this.getMonth()+1) < 10) ? ("0" + (this.getMonth()+1)) : (this.getMonth()+1);
	string += "/";
	string += this.getFullYear();
	return string;
};

Function.prototype.getCallback = function( scope ) {
	var f = this;
	var args = [];
	for (var n = 1; n < arguments.length; n++)
		args.push(arguments[n]);
	return function( event ) {
        if( event ) event.preventDefault();
		f.apply(scope, args);
	};
};

function Calendar( div, input, button )
{
	this._input = input;
	this._input.onclick = this.show.getCallback(this);
	this._input.onkeydown = function(event) {
		return false;
	};
	
	if( button ) {
		button.setAttribute("className", "Calendar")
		|| button.setAttribute("class", "Calendar");
		button.onclick = function ( ) {
			this._input.value = "";
			if( this._input.onchange ) this._input.onchange( );
			this._date = new Date();
			this.update();
		}.getCallback( this );
	}
	
	this.monthName = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
	                  "Sep", "Oct", "Nov", "Dec"];
	
	this._date = new Date( );
	
    this._div = div;
    this._div.style.display = "none";
    this._table = document.createElement("table");
    this._table.setAttribute("className","Calendar")
    || this._table.setAttribute("class","Calendar");
    // Creating the grid
    this._grid = new Array();
    
    this._initTable();
    
    this._div.appendChild( this._table );
        
    this.update();
}

Calendar.prototype = {
	
	_initTable: function( )
	{
		// Header
		var thead = document.createElement("thead")
		var head = document.createElement("tr");
	    head.appendChild( document.createElement("th") );
	    head.appendChild( document.createElement("th") );
	    head.appendChild( document.createElement("th") );
	    
	    var prev = document.createElement("button");
	    prev.appendChild( document.createTextNode( "<<" ) );
	    prev.onclick = this.prevMonth.getCallback(this);
	    
	    var next = document.createElement("button");
	    next.appendChild( document.createTextNode( ">>" ) );
	    next.onclick = this.nextMonth.getCallback(this);
	    
	    head.childNodes[0].appendChild( prev );
	    head.childNodes[1].setAttribute("colSpan","5");
	    head.childNodes[1].appendChild( 
	    			document.createTextNode( this.monthName[this._date.getMonth( )]
	    			                         + " " + this._date.getFullYear() )
	    		);
	    head.childNodes[2].appendChild( next );
	    
	    thead.appendChild( head );
	    this._table.appendChild( thead );
	    
	    // Create body
	    var tbody = document.createElement("tbody");
	    // Days
	    var days = document.createElement("tr");
	    days.appendChild( document.createElement("td") );
	    days.appendChild( document.createElement("td") );
	    days.appendChild( document.createElement("td") );
	    days.appendChild( document.createElement("td") );
	    days.appendChild( document.createElement("td") );
	    days.appendChild( document.createElement("td") );
	    days.appendChild( document.createElement("td") );
	
	    days.childNodes[0].appendChild( document.createTextNode("Sun") );
	    days.childNodes[1].appendChild( document.createTextNode("Mon") );
	    days.childNodes[2].appendChild( document.createTextNode("Tue") );
	    days.childNodes[3].appendChild( document.createTextNode("Wed") );
	    days.childNodes[4].appendChild( document.createTextNode("Thu") );
	    days.childNodes[5].appendChild( document.createTextNode("Fri") );
	    days.childNodes[6].appendChild( document.createTextNode("Sat") );
	    
	    tbody.appendChild( days )
	    
	    for ( var i = 0; i < 6; i++) {
	    	// Row element
	    	var row = document.createElement("tr");
	    	// Row array
	    	var arr = new Array();
	    	// Put row array in the grid
	    	this._grid.push(arr);
	    	
	    	for ( var j = 0; j < 7; j++) {
	    		// Create a day and append it's cell to the row
	    		var day = new Day( this );
	    		
	    		arr.push(day);
	    		
				row.appendChild( day.getCell( ) );
			}
			tbody.appendChild( row );
		}
	    this._table.appendChild( tbody );
	},
	
	/**
	 * Get the number of day in this month
	 * @return
	 */	
	getLength: function( )
	{
		// thirty days has September...
		switch( this._date.getMonth( ) ){
			case 1:
				if ( ( this._date.getFullYear()%4==0
							&&
							this._date.getFullYear()%100!=0 )
						|| 
						this._date.getFullYear()%400==0 )
					return 29; // leap year
				else
					return 28;
			case 3:
				return 30;
			case 5:
				return 30;
			case 8:
				return 30;
			case 10:
				return 30;
			default:
				return 31;
		}
	},
	
	update: function( )
	{
		this.clear();
		
		this._table.childNodes[0].childNodes[0].childNodes[1].firstChild.data =
										this.monthName[this._date.getMonth( )] +
										" " + this._date.getFullYear();
		
		// Setting vars
	    var realDay = this._date.getDate( );
		
		// We set the date to the first day of the month so we can know
		// what day of week it is (is useful when we start writing the table)
		this._date.setDate( 1 );
		var firstWeekDayOfMonth = this._date.getDay( );
		
		var currDay = 1;
		var lastDay = this.getLength( );
		
		// Reset the real date
		this._date.setDate( realDay );
		
		var weekDay = firstWeekDayOfMonth;
		var week = 0;
		
		while ( currDay <= lastDay  ) {
			this.setValue(week, weekDay, currDay);
			currDay++;
			weekDay = ( weekDay + 1 ) % 7;
			if( weekDay == 0 ) week++;
		}
	},
	
	clear: function( )
	{
		for ( var i = 0; i < this._grid.length; i++) {
			for ( var j = 0; j < this._grid[i].length;	j++ ) {
				this._grid[i][j].clear( );
			}
		}
	},
	
	/**
	 * Set <code>value</code> text in cell <code>i</code>, <code>j</code>
	 * @param i The row number
	 * @param j The column number
	 * @param value The text value
	 * @return
	 */
	setValue: function( i, j, value )
	{
		this._grid[i][j].setText( value );
	},
	
	getDiv: function( ) {
		return this._div;
	},
	
	nextMonth: function( )
	{
		var month = this._date.getMonth( );
		this._date.setMonth( (month + 1) % 12 );
		
		if( this._date.getMonth( ) == 0 ) {
			this._date.setFullYear( this._date.getFullYear() + 1 );
		}
		this.update();
	},
	
	prevMonth: function( )
	{
		var month = this._date.getMonth( );
		if( month - 1 < 0 ) {
			this._date.setMonth( 11 );
			this._date.setFullYear( this._date.getFullYear() - 1 );
		}
		else {
			this._date.setMonth( month - 1 );
		}
		this.update();
	},
	
	getDate: function( )
	{
		return this._date;
	},
	
	selected: function( day )
	{
		this._date.setDate( day );
		var data = this.getDate();
		this._input.value = data.toDateString();
		if( this._input.onchange ) this._input.onchange();
	},
	
	hide: function( )
	{
		this._div.style.display = "none";
	},
	
	show: function( )
	{
		this._div.style.display = "block";
	}
};

function Day( parent )
{
	this.parent = parent;
	
	// Cell
	this._td = document.createElement("td");
	
	// Button
	this._button = document.createElement("button");
	this._button.appendChild( document.createTextNode("\u00a0") );
	this._button.onclick = this.selected.getCallback( this );
	
	// Text
	this._text = document.createTextNode("\u00a0");
	
	// We append text (button is used only if the day is occupied)
	this._td.appendChild( this._text );
	
}

Day.prototype =
{
	setText: function( text )
	{
		this._td.removeChild( this._text );
		this._button.firstChild.data = text;
		this._td.appendChild( this._button );
	},
	
	getCell: function( )
	{
		return this._td;
	},
	
	clear: function( ){
		try {
			this._td.removeChild( this._button );
			this._td.appendChild( this._text );
		} catch (e) {
			
		}
	},
	
	selected: function( )
	{
		this.parent.hide();
		this.parent.selected( this._button.firstChild.data );
	}
};
