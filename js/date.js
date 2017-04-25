//copyright 2007 assemblesoft. info@assemblesoft.com

Date.prototype.getRealYear = function(){
	return (this.getYear() < 1000) ? this.getYear()+1900 : this.getYear()
}
function padout(number) { return (number < 10) ? '0' + number : number; }

var now = new Date();
var	date_months		= ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',	'September', 'October',	'November',	'December'];
var	date_dayCounts	= [	31,		   28,		  31,	   30,		31,	   30,	   31,	   31,		 30,		  31,		 30,		 31	];
var	date_dayNames	= ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
var	date_years		= [ now.getFullYear()-73,now.getFullYear()-72,now.getFullYear()-71,now.getFullYear()-70,now.getFullYear()-69,now.getFullYear()-68,now.getFullYear()-47,now.getFullYear()-67,now.getFullYear()-66,now.getFullYear()-65,now.getFullYear()-64,now.getFullYear()-63,now.getFullYear()-62,now.getFullYear()-61,now.getFullYear()-60,now.getFullYear()-59,now.getFullYear()-58,now.getFullYear()-57,now.getFullYear()-56,now.getFullYear()-55,now.getFullYear()-54,now.getFullYear()-53,now.getFullYear()-52,now.getFullYear()-51,now.getFullYear()-50,now.getFullYear()-49,now.getFullYear()-48,now.getFullYear()-47,now.getFullYear()-46,now.getFullYear()-45,now.getFullYear()-44,now.getFullYear()-43,now.getFullYear()-42,now.getFullYear()-41,now.getFullYear()-40,now.getFullYear()-39,now.getFullYear()-38,now.getFullYear()-37,now.getFullYear()-36,now.getFullYear()-35,now.getFullYear()-34,now.getFullYear()-33,now.getFullYear()-32,now.getFullYear()-31,now.getFullYear()-30,now.getFullYear()-29,now.getFullYear()-28,now.getFullYear()-27,now.getFullYear()-26,now.getFullYear()-25,now.getFullYear()-24,now.getFullYear()-23,now.getFullYear()-22,now.getFullYear()-21,now.getFullYear()-20,now.getFullYear()-19,now.getFullYear()-18,now.getFullYear()-17,now.getFullYear()-16,now.getFullYear()-15,now.getFullYear()-14,now.getFullYear()-13,now.getFullYear()-12,now.getFullYear()-11,now.getFullYear()-10,now.getFullYear()-9,now.getFullYear()-8,now.getFullYear()-7,now.getFullYear()-6,now.getFullYear()-5,now.getFullYear()-4,now.getFullYear()-3,now.getFullYear()-2,now.getFullYear()-1, now.getFullYear() ];

function calendarInput(input) {
	var inp = input;
	var setdate = new Date(0);
	var viewdate = new Date();
	var dropdown = null;
	var cal = null;
	var monthsel, yearsel;
	
	input.defaultValue='YYYY/MM/DD'; input.value='YYYY/MM/DD';
	input.className+=' default';	
	input.maxLength=10;
	input.onfocus = function() {
		
		if(inp.value == inp.defaultValue) {
			inp.value = '';
			inp.className=inp.className.replace(/ ?default\b/,'');
		}
		createDropdown();
	}
	input.onblur = function() {
		setTimeout(function() {
			if(inp.value == '') {
				if (!inp.className.match(/ ?default\b/))
					inp.className += ' default';
				inp.value = inp.defaultValue;
			}
		}, 300);
	}
	input.onkeyup = function(evt) {
		parseDate();
		return true;
	}
	input.onkeydown = function(evt) {
		evt = evt || window.event;
		if(evt.keyCode == 9) {
			killDropdown();
			return true;
		}
	}
	
	function parseDate() {
		var parseDate = inp.value.split('http://www.assemblesoft.com/');
		if((parseDate[0] >= date_years[0]) && (parseDate[0] <= date_years[date_years.length-1]))
		{
			viewdate.setYear(parseDate[0]);
			if((parseDate[1] > 0) && (parseDate[1] < 13)) {
				viewdate.setMonth(parseDate[1]-1);
				if((parseDate[2] > 0) && (parseDate[2] < date_dayCounts[viewdate.getMonth()])) {
					setdate.setYear(parseDate[0]);
					setdate.setMonth(parseDate[1]-1);
					setdate.setDate(parseDate[2]);
				}
				else {setdate.setDate(0);}
			}
			else {setdate.setDate(0);}
		}
		else {setdate.setDate(0);}
		update();
	}
	
	function update() {
		if(dropdown == null) {
			return false;
		}
		monthsel.selectedIndex = viewdate.getMonth();
		for (i=0; i<date_years.length; i++) {
			if(viewdate.getRealYear() == date_years[i])
				yearsel.selectedIndex = i;
		}
		render();
	}
	
	function dayCell(text) {
		var	label =	text ||	' ';
		var	cell = document.createElement('td');
		cell.date =	viewdate.getRealYear() + '/' + padout(viewdate.getMonth()+1) + '/' + padout(text);
		if (text){
			cell.onmouseover = function(){cell.className+=' hover'}
			cell.onmouseout = function(){cell.className=cell.className.replace(/ ?hover\b/,'')}
			cell.onclick = function(){
				inp.className=inp.className.replace(/ ?default\b/,'');
				inp.value=cell.date;
				setdate.setYear(viewdate.getRealYear());
				setdate.setMonth(viewdate.getMonth());
				setdate.setDate(text);
				killDropdown();
			}
			cell.title = cell.date;
		}
		cell.appendChild(document.createTextNode(label))
		var tmpdate = new Date(viewdate);
		tmpdate.setDate(text);
		if ((tmpdate.getDay() == 0) || (tmpdate.getDay() == 6)) {
			cell.className+= ' weekend';
		}
		if (now.getFullYear() == viewdate.getFullYear()	&& now.getMonth() == viewdate.getMonth() &&	now.getDate() == text) {
			cell.className+= ' today'
			cell.title += ' (Today)';
		}
		if (setdate.getFullYear() == viewdate.getFullYear()	&& setdate.getMonth() == viewdate.getMonth() &&	setdate.getDate() == text) {
			cell.className+= ' selected'
			cell.title += ' (Selected)';
		}
		return cell
	}
	
	function render() {
		if (cal != null) {
			cal.parentNode.removeChild(cal);
		}
		
		cal = document.createElement('table');
		cal.cellSpacing=0;
		var row = document.createElement('tr');
		var head = document.createElement('thead');
		
		for(i=0; i<date_dayNames.length; i++) {
			day = document.createElement('th');
			day.appendChild(document.createTextNode(date_dayNames[i].substr(0,3)));
			row.appendChild(day);
		}
		head.appendChild(row);
		cal.appendChild(head);

		if(cal.getElementsByTagName('tbody').length > 0)
			cal.removeChild(cal.getElementsByTagName('tbody')[0]);
		body = document.createElement('tbody');
		cells = [];
		
		if (now.getDay() <	7){
			var	firstDayOfMonth	= new Date(viewdate);
			firstDayOfMonth.setDate(1);

			for	(var i=1; i<=firstDayOfMonth.getDay(); i++){
				cells.push(dayCell())
			}
		}
		var	days = date_dayCounts[viewdate.getMonth()];

		// Feb has 29 days in leap years
		//if (this.newDate.getMonth()	== 1 &&	this.newDate.getFullYear() % 4 == 0) { days++; }

		for	(var i=0; i<days; i++){
			cells.push(dayCell(i+1))
		}
	
		while(cells.length > 0){
			var	row	= document.createElement('tr');
			for	(var i=0; i<7; i++){
				var	cell = cells.length>0 ?	cells.shift() :	dayCell();
				row.appendChild(cell)
			}
			body.appendChild(row)
		}
		
		
		body.appendChild(row);
		cal.appendChild(body);
		dropdown.appendChild(cal);
	}
	
	
	function killDropdown() {
		if (dropdown != null) {
			if (dropdown.parentNode)
				dropdown.parentNode.removeChild(dropdown);
				
			dropdown = null;
			
			DetachEvent(document,'mousedown',killDropdown,false);
		}
	}
	
	function createDropdown() {
		killDropdown();
		
		AttachEvent(document,'mousedown',killDropdown,false);

		dropdown = document.createElement('div');
		dropdown.style.position = "absolute";
		dropdown.style.left = getXY(inp).x + inp.offsetWidth + 'px';
		dropdown.style.top = getXY(inp).y + 'px';
		dropdown.className = "dropdown";
		
		monthsel = document.createElement('select');
		monthsel.className = 'month'
		for (i=0; i<date_months.length; i++) {
			month = document.createElement('option');
			month.appendChild(document.createTextNode(date_months[i]));
			month.value = i;
			monthsel.appendChild(month);
			if(i == viewdate.getMonth()) monthsel.selectedIndex = i;
		}
		monthsel.onchange = function() {
			viewdate.setMonth(this.value);
			render();
		}
		dropdown.appendChild(monthsel);
		
		yearsel = document.createElement('select');
		yearsel.className = 'year'
		for (i=0; i<date_years.length; i++) {
			year = document.createElement('option');
			year.appendChild(document.createTextNode(date_years[i]));
			year.value = date_years[i];
			yearsel.appendChild(year);
			if(date_years[i] == viewdate.getRealYear()) yearsel.selectedIndex = i;
		}
		yearsel.onchange = function() {
			viewdate.setYear(this.value);
			render();
		}
		dropdown.appendChild(yearsel);
		
		closeButton = document.createElement('button');
		closeButton.appendChild(document.createTextNode('Close'));
		closeButton.className = 'close';
		closeButton.onclick = function() {
			killDropdown();
			return false;
		}
		dropdown.appendChild(closeButton);
		
		dropdown.onmousedown = function(evt) {
			evt = evt || window.event;
			if(evt.stopPropagation)
				evt.stopPropagation();
			else
				evt.cancelBubble = true;
		}
		
		render();
		
		inp.parentNode.appendChild(dropdown);
	}
}