function _(x){
	return document.getElementById(x);
}
function toggleElement(x){
	var x = _(x);
	if(x.style.display == 'block'){
		x.style.display = 'none';
	}else{
		x.style.display = 'block';
	}
}

function getNames(u){	
	var rx = new RegExp;
	rx = /[^a-z0-9]/gi;	
	var replaced = u.search(rx) >= 0;
	if(replaced){
    	u = u.replace(rx, "");
		document.getElementById("searchUsername").value = u;
	}	
	if(u == ""){
		document.getElementById("memSearchResults").style.display = "none";
		return false;
	}
	// http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
    hr.open("POST", "search_exec.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			if(return_data != ""){	
				document.getElementById("memSearchResults").style.display = "block"; 
				document.getElementById("memSearchResults").innerHTML = return_data;
			}
	    }
    }
    hr.send("u="+u);
}

window.addEventListener('mouseup', function(event){
	var box = document.getElementById('memSearchResults');
	if (event.target != box && event.target.parentNode != box){
        box.style.display = 'none';
		document.getElementById("searchUsername").value = "";
    }
});

function scrollFunction() {
    document.getElementById("memSearchResults").style.display = "none";
    document.getElementById("searchUsername").value = "";
}

window.onscroll = scrollFunction;
