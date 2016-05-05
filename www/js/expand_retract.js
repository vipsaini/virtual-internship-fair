function slideOpen(el){
	var elem = document.getElementById(el);
	elem.style.transition = "height 0.2s linear 0s";
	elem.style.height = "200px";
}
function slideClosed(el){
	var elem = document.getElementById(el);
	elem.style.transition = "height 0.2s linear 0s";
	elem.style.height = "0px";
}