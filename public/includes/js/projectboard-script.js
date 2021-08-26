
		//===================================
		//This script adds a line to the form
		//===================================
		function insert_Row()
		{
			var x = document.getElementById("projectTable").insertRow(index = -1);
			var a = x.insertCell(0)
			var b = x.insertCell(1);
			var c = x.insertCell(2);
			var d = x.insertCell(3);
			var e = x.insertCell(4);
			var f = x.insertCell(5);
			var g = x.insertCell(6);
			var h = x.insertCell(7);
			var i = x.insertCell(8);
			var j = x.insertCell(9);
			var k = x.insertCell(10);
			a.innerHTML="<th scope='row' class='dataRow'>#</th>"
			b.innerHTML="<td scope='row'><input type='text' placeholder='client name' name='clientName'></td>";
			c.innerHTML="<td scope='row'><input type='text' placeholder='project name' name='projectName'></td>";
			d.innerHTML="<td scope='row'><input type='text' placeholder='job name' name='jobName'></td>";
			e.innerHTML='<td scope="row"><textarea name="description"></textarea></td>';
			f.innerHTML="<td><td scope='row'><select name='projectLead'><option>JD</option><option>Jim</option><option>Ryan</option></select></td>";
			g.innerHTML='<td scope="row"><select name="assingedEng"><option>Cortez</option><option>Deonisy</option><option>JD</option><option>Jim</option><option>Nicholas</option><option>Nick</option><option>Ryan</option><option>Sterling</option><option>Terance</option><option>Vicki</option></select></td>';
			h.innerHTML='<td scope="row"><input type="date" name="dateEdited"></td>';
			i.innerHTML='<td scope="row"><input type="date" name="dateCreated"></td>';
			j.innerHTML='<td scope="row"><select name="status" id="status" onchange="selectStatus()"><option value="1">Active</option><option value="2">Sales</option><option value="3">Stalled</option><option value="4">Closed</option></select></td>';
			k.innerHTML='<td><input type="button" value="-" onclick="removeRow(this)" class="btn del" id="del"></td>';
		}



		//======================================
		//This script removes a line to the form
		//======================================
		function removeRow(i) {
    		
    		var p=i.parentNode.parentNode;
       		p.parentNode.removeChild(p);
    		}



		//=========================================
		//This script is to auto-expand a text area
		//=========================================
		// var autoExpand = function (field) {
			
		// 	// Reset field height
		// 	field.style.height = 'inherit';
		
		// 	// Get the computed styles for the element
		// 	var computed = window.getComputedStyle(field);
		
		// 	// Calculate the height
		// 	var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
		// 	             + parseInt(computed.getPropertyValue('padding-top'), 10)
		// 	             + field.scrollHeight
		// 	             + parseInt(computed.getPropertyValue('padding-bottom'), 10)
		// 	             + parseInt(computed.getPropertyValue('border-bottom-width'), 10);
			
		// 	field.style.height = height + 'px';
			
		// };
			
		// 	document.addEventListener('input', function (event) {
		// 		if (event.target.tagName.toLowerCase() !== 'textarea') return;
		// 		autoExpand(event.target);
		// }, false);
		
		
		//================================================
		//This script is to hide or show the delete button
		//================================================
			function selectStatus(){
		  		var status = document.getElementById("status").value;
		  		var delButton = document.getElementById("del");
		  		
		  		if (status != "4"){
		  			delButton.style.visibility= 'hidden';
		  		} else {
		  			delButton.style.visibility= 'visible';
		  		}
	  		}
