function checked(element){
	if(element.classList.contains("nocheck")){
		element.classList.remove("nocheck");
		element.classList.add("checked");
	}
	else{
		element.classList.remove("checked");
		element.classList.add("nocheck");
	}
}

function EditStyle(element){
		var target = element.getAttribute("id")-1; 
		var find = document.getElementById("first").querySelectorAll("tr");
		find[target].querySelector("td.editT").setAttribute("style","");
		find[target].querySelector("td.layposition").setAttribute("style","display:none");
		find[target].querySelector("div.before").setAttribute("style","display:none");
}

function passData(){

var find = document.querySelectorAll(".checked");
var array = [];
	
	for(var i=0;i<find.length;i++)
		array.push(find[i].getAttribute("id"));

	let id = array;
	
	if(id.length === 0)
	{
		alert("Nothing selected")
		location.reload()
	} else {
		let request = new XMLHttpRequest();
		let url = "comfirm.php";
		request.open("POST",url,false);
		request.setRequestHeader('Content-Type','application/json');
		request.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(this.responseText)
				location.reload()
			}			
    	};
		request.send(JSON.stringify(id));
	}
}
