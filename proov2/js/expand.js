function expand(element){
	if(element.nextSibling.style.display == "none"){
		element.nextSibling.style.display = "inline";
	} else {
		element.nextSibling.style.display = "none";
	}
}