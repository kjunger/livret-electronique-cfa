function display(id)
	{
		
		
		new Effect.toggle(id);
	
	}
	
	function openPopUp(page,w,h)
	{
		window.open(page, "", 'height='+h+', width='+w+', top=300, left=300, toolbar=no, menubar=no, location=no, resizable=no, scrollbars=no, status=no');
	}

	function popupChampText(id)
	{
		openPopUp("popup_textarea.php?id="+id,650,520);
	}
	
	function affich_comm(elem)
	{
		detail = document.getElementById("detail");
		if(detail.style.display == "none")
		{
			texte = elem.getAttribute("comm");
			
			detail.innerHTML = texte;
			
			pos = findPos(elem);
			
			detail.style.top = pos.y;
			detail.style.left = pos.x+20;
			
			
		}
		
		new Effect.toggle("detail");
		
	}
	
	function findPos(obj) {
    var curleft = obj.offsetLeft || 0;
    var curtop = obj.offsetTop || 0;
    while (obj = obj.offsetParent) {
        curleft += obj.offsetLeft
        curtop += obj.offsetTop
    }
    return {x:curleft,y:curtop};
}
