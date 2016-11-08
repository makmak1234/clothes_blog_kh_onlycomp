/*i = 1;
while(document.getElementById('color' + i)){
	document.getElementById('color' + i).hidden = true;
	i++;
}*/

document.getElementById('color0').hidden = false;
document.getElementById('image00').hidden = false;

var color_true = '0';//current group colors(size)
var image_true = '0';//current image(color)

//n_size = document.getElementById('color' + color_true).selectedIndex;
var title_size = titleSize(color_true);//document.getElementById('size').options[color_true].value;//current title size

//n_color = document.getElementById('color' + image_true).selectedIndex;
var title_color = titleColor(color_true, image_true);//document.getElementById('color' + color_true).options[image_true].value;//current title color

function sizeSelect(f) {
      var n_color = f.selectedIndex;//selected group colors(size)
      //alert(n);
      //alert("Выбран размер: " + f.options[n].value);
      document.getElementById('color' + n_color).hidden = false;
      document.getElementById('color' + color_true).hidden = true;

      n_image = document.getElementById('color' + n_color).selectedIndex;//current color(image)
      document.getElementById('image' + n_color + n_image).hidden = false;
      document.getElementById('image' + color_true + image_true).hidden = true;
      color_true = n_color;
      image_true = n_image;

      title_size = titleSize(color_true);//document.getElementById('size').options[color_true].value;//current title size
      title_color = titleColor(color_true, image_true);//document.getElementById('color' + color_true).options[image_true].value;//current title color
}

function colorSelect(f) {
      var n = f.selectedIndex;//selected color
      //alert(n);
      //alert("Выбран размер: " + f.options[n].value);
      document.getElementById('image' + color_true + n).hidden = false;
      document.getElementById('image' + color_true + image_true).hidden = true;
      image_true = n;

      title_color = titleColor(color_true, image_true);//document.getElementById('color' + color_true).options[image_true].value;//current title color
}

function titleSize(color_true){
	return document.getElementById('size').options[color_true].value;
}

function titleColor(color_true, image_true){
	return document.getElementById('color' + color_true).options[image_true].value;
}

