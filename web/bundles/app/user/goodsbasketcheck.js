$(document).ready(function(){
//function uploadtxt(id){
	$('.good_click').click(function(){
		goodid = $(this).attr('good-id');
		//mclon = $(this).attr('clearone');
		rout = Routing.generate('ajax_bag_user', { id: goodid}); //,  mclon: mclon
		//alert(rout);
		$.ajax({ 
			  url: rout,
			  success: function(data) {
			    $('.content').html(data);
			  }
			});
	})
//}
})

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
					par = document.getElementById('content1');//window.document.getElementById("content");
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