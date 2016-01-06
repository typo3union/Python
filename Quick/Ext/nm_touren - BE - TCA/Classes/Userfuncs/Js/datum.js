var currentValue;

window.onload = function() {
	  currentValue = document.getElementById('jahresauswahl').value;
};


function handleClick(myRadio) {
    currentValue = myRadio.value;
 }


function selectFields(day){ 
	if(currentValue =='all'){
		var elems = document.querySelectorAll('.t_'+day);
		 for (var i = 0; i < elems.length; i++) {
			 if (elems[i].type == 'checkbox') {
				 elems[i].checked = true;
			 }
		 }
	}else{
		 var elems = document.querySelectorAll('tr.t_'+currentValue+' .t_'+day);
		 for (var i = 0; i < elems.length; i++) {
			 if (elems[i].type == 'checkbox') {
				 elems[i].checked = true;
			 }
		 }	
	}
	
}

function deSelectAll(ele) {
var checkboxes = document.getElementsByName('termine[]');  
	 for (var i = 0; i < checkboxes.length; i++) {
		 if (checkboxes[i].type == 'checkbox') {
			 checkboxes[i].checked = false;
		 }
	 }
}

function selectAll(ele) {

	var checkboxes = document.getElementsByName('termine[]');  
	if(currentValue=='all'){
		 for (var i = 0; i < checkboxes.length; i++) {
			 if (checkboxes[i].type == 'checkbox') {
				 checkboxes[i].checked = true;
			 }
		 }
	}else{
		var elems = document.getElementsByClassName(currentValue);		
		for (var i = 0; i < elems.length; i++) {
			var child = elems[i].children
			for (var j = 0; j < child.length; j++) {
				if (child[j].children.length > 0) {
					if (child[j].children[0].type == "checkbox") {
						child[j].children[0].checked = true;
					}
				}
			}
		}
		
	}
}

