	//indexUser.html.twig
	function backgrCat(idDiv, imgLink){	
		var id = document.getElementById(idDiv);
		id.style.backgroundImage = 'url(' + imgLink + ')';
	}

	function imgCat(idImg, imgLink){	
		var id = document.getElementById(idImg);
		id.setAttribute("src", imgLink);
	}
