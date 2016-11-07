/*i = 1;
while(document.getElementById('color' + i)){
	document.getElementById('color' + i).hidden = true;
	i++;
}*/

document.getElementById('color0').hidden = false;
document.getElementById('image00').hidden = false;

var color_true = '0';//current group colors
var image_true = '0';//current image

function sizeSelect(f) {
      n_color = f.selectedIndex;//selected group colors
      //alert(n);
      //alert("Выбран размер: " + f.options[n].value);
      document.getElementById('color' + n_color).hidden = false;
      document.getElementById('color' + color_true).hidden = true;

      n_image = document.getElementById('color' + n_color).selectedIndex;//current color(image)
      document.getElementById('image' + n_color + n_image).hidden = false;
      document.getElementById('image' + color_true + image_true).hidden = true;
      color_true = n_color;
      image_true = n_image;
}

function colorSelect(f) {
      n = f.selectedIndex;//selected color
      //alert(n);
      //alert("Выбран размер: " + f.options[n].value);
      document.getElementById('image' + color_true + n).hidden = false;
      document.getElementById('image' + color_true + image_true).hidden = true;
      image_true = n;
}