/**
 * Takes the checkboxes, and moves the the values of them (on, off) to the inputfield called hidden<Checkbox-name>[<index>]
 */
function moveCheckboxesToHidden(form) {    
    for (i=0; i<form.elements.length; i++) {
	element = form.elements[i];
		
	if (element.type == "checkbox") {
	    firstBracketIndex = element.name.indexOf('[');
	    secondBracketIndex = element.name.indexOf(']', firstBracketIndex);
	    index = element.name.substring(firstBracketIndex + 1, secondBracketIndex);
	    
	    originalName = element.name.substring(0, firstBracketIndex);
	    name = "hidden" + originalName.substring(0, 1).toUpperCase() + originalName.substring(1);
	    name += "["+index+"]";
	    
	    set = element.checked ? 'on' : 'off';
	    form.elements[name].value = set;
	}
    }	    
}

function submitTableForm(form) {
    moveCheckboxesToHidden(form);    
    form.submit();
}

function doSubmit(form, action) {
    document.forms[form].objectAction.value = action;
    document.forms[form].submit();
}

function changeVisibility(buttonCaller, elementId, showString, hideString) {
    element = document.getElementById(elementId);
	
    if (element.style.display == "none") {
	element.style.display = "block";
	buttonCaller.value = hideString;
    } else {
	element.style.display = "none";
	buttonCaller.value = showString;
    }
    buttonCaller.blur();
}

function trim(str) {
    return str.replace(/^\s*|\s*$/g,"");
}