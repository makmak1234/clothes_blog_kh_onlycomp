/*$(document).ready(function(){
//function goodbasketcheck(id){
	$('.good_click').click(function(){
		goodid = $(this).attr('good-id');
		mclon = $(this).attr('mclon');
		rout = Routing.generate('ajax_bag_user', { id: goodid, mclon: mclon}); //,  mclon: mclon
		alert(rout);
		$.ajax({ 
			  url: rout,
			  success: function(data) {
			    $('.bascetsmall').html(data);
			  }
			});
	})
//}
})*/

function goodbasketcheck(id, mclon, route_name){
	route = Routing.generate(route_name, { id: id, mclon: mclon}); //,  mclon: mclon
	alert('color_true: ' + color_true + ' image_true: ' + image_true);
	$.ajax({ 
		  url: route,
		  success: function(data) {
		    $('.bascetsmall').html(data);
		  }
		});
}

/*function sizeSelect(f) {
      n = f.selectedIndex;
      //alert(n);
       alert("Выбран размер: " + f.options[n].value);
    }*/

/*function uploadtxt(id){
	//params = "?filetxt=" + filetxt + "&nocache1=" + Math.random() * 1000000;
	params = "?id=" + id + "&nocache1=" + Math.random() * 1000000;
	request = new ajaxRequest();
	//console.log(Routing.generate('index_user'));
	rout = Routing.generate('ajax_bag_user', { id: id}); //, { id: 10, foo: "bar" }
	//rout = "http://clothes_blog2.home/web/app_dev.php/user/ajax_bag_user";
	//alert(rout);
	request.open("GET", rout, true);//"uploadajx.php"
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null)
				{
					//window.parent.document.getElementById("myajax").style.display="none";
					//var dstrex = new Array();
					par = document.getElementById('bascetsmall');//window.document.getElementById("content");
					//var parall;
					txtreply = this.responseText;
					//alert(txtreply);
					par.innerHTML = txtreply;
				}
				else alert("Ajax error: No data received")
			}
			else{
				uploadtxt()
			} 
		}
	}
	request.send();

	function ajaxRequest()
	{
		try
		{
			var request = new XMLHttpRequest()
		}
		catch(e1)
		{
			try
			{
				request = new ActiveXObject("Msxml2.XMLHTTP")
			}
			catch(e2)
			{
				try
				{
					request = new ActiveXObject("Microsoft.XMLHTTP")
				}
				catch(e3)
				{
					request = false
				}
			}
		}
		return request
	}
}*/