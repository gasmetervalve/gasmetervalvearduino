<?php
$myfile = fopen("leveltemp.txt", "r") or die("Unable to open file!");
$temp = fread($myfile,filesize("leveltemp.txt"));
fclose($myfile);

$myfile = fopen("levelgas.txt", "r") or die("Unable to open file!");
$level = fread($myfile,filesize("levelgas.txt"));
fclose($myfile);
$photo = "'propane1.png'";

if($level < 30 || $level == 30){

$photo = "'propane20.png'";
}
if($level > 30 || $level == 30){

$photo = "'propane50.png'";
}
if($level > 60 || $level == 60){
$photo = "'propane60.png'";

}

?>
<html>
<head>
<title>GasMeterLevel.com</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="ol.css">  
<script src="leaflet.js"></script>
<link href="leaflet.css" rel="stylesheet"/>
<style>
#popupcenter {
position: -webkit-sticky;
position: sticky;
top: 0;
padding: 5px;
width:100px;
height:100px;
}
#marker {
width: 20px;
height: 20px;
border: 1px solid #088;
border-radius: 10px;
background-color: #0FF;
opacity: 0.5;
cursor: pointer;
}
#osm-map{
width:100%;
height:100%;
position:relative;
z-index: 2;
!important;
}
#vienna {
text-decoration: none;
color: white;
font-size: 11pt;
font-weight: bold;
text-shadow: black 0.1em 0.1em 0.2em;
}
.popover-content {
min-width: 280px;
min-height: 150px;
max-height: 300px;
overflow-y:scroll;
}
.ol-zoom {
right: 8px;
left: auto;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #ca6036;
}

li {
  float: left;
  height: 60px;

}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 15px 16px;
  text-decoration: none;
  font-size:20px;
  border-right: 2px solid black;
  
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: white;
}
.cartme2{
position: absolute;
width: auto;
height: auto;
left: 10%;
right: 10%;
top: 200px;
background-color: white;
border-radius: 20px;
z-index: -1;
visibility:hidden;
border: 2px solid black;
padding:15px 15px 15px 15px;

}
.cartme{

position: absolute;
width: auto;
height: auto;
left: 10%;
right: 10%;
top: 200px;
background-color: white;
border-radius: 20px;
z-index: -1;
visibility:hidden;
border: 2px solid black;
padding:15px 15px 15px 15px;
}

#Cart {
    position: absolute;
    top: 15%;
    right: 6%;
    height: 100px;
    width: 100px;
    z-index: 999;
}

.close {
  position: absolute;
  right: 2px;
  top: 2px;
  width: 32px;
  height: 32px;
  opacity: 0.3;
  
}
.close:hover {
  opacity: 1;
}
.close:before, .close:after {
  position: absolute;
  left: 15px;
  content: ' ';
  height: 33px;
  width: 2px;
  background-color: red;
}
.close:before {
  transform: rotate(45deg);
}
.close:after {
  transform: rotate(-45deg);
}

.sell {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 15px;

}


#gy
{
  text-decoration: none;
  color: #232323;
  font-size:25px;
  transition: color 0.3s ease;
}

#gy:hover
{
  color: tomato;
}
.midimage {
  width: 100%;
  height: auto;
}


#menuToggle
{
  display: block;
  position: relative;
  top: 60px;
  left: 10px;
  z-index: 8;
  -webkit-user-select: none;
  user-select: none;
}

#menuToggle input
{
  display: block;
  width: 64px;
  height: 55px;
  position: absolute;
  top: -7px;
  left: -5px;
  
  cursor: pointer;
  
  opacity: 0; /* hide this */
  z-index: 2; /* and place it over the hamburger */
  
  -webkit-touch-callout: none;
}

/*
 * Just a quick hamburger
 */
#menuToggle span
{
  display: block;
  width: 53px;
  height: 4px;
  margin-bottom: 5px;
  position: relative;
  background: #FFFFFF;
  border-radius: 3px;
  z-index: 111111111;
  transform-origin: 4px 0px;
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              opacity 0.55s ease;
}

#menuToggle span:first-child
{
/*  transform-origin: 0% 0%;
*/
}

#menuToggle span:nth-last-child(2)
{
 /* transform-origin: 0% 100%;
 */
}

/* 
 * Transform all the slices of hamburger
 * into a crossmark.
 */
#menuToggle input:checked ~ span
{
  opacity: 1;
  transform: rotate(45deg) translate(-2px, -1px);
  background: #232323;
}

/*
 * But let's hide the middle one.
 */
#menuToggle input:checked ~ span:nth-last-child(3)
{
  opacity: 0;
  transform: rotate(0deg) scale(0.2, 0.2);
}

/*
 * Ohyeah and the last one should go the other direction
 */
#menuToggle input:checked ~ span:nth-last-child(2)
{
  transform: rotate(-45deg) translate(0, -1px);
}

/*
 * Make this absolute positioned
 * at the top left of the screen
 */


/*
 * And let's slide it in from the left
 */
#menuToggle input:checked ~ ul
{
  transform: none;
}


.nave{
display:block;
  }
  
#navme{
display:block;
  }
  
  #fstm{
display:none;

  }
  
   #fstm2{
display:block;

  } 
   
  #fst2{
  position: relative;
  top:60px;
  }
  
  #bannerme{
top: 0px;
}

#bigfoot
{
  display: block;
  position: absolute;
  top: 50px;
  left: 36%;
  z-index: 1000;
  -webkit-user-select: none;
  user-select: none;
}

#like
{
  display: block;
  position: absolute;
  top: 40px;
  right: 10px;
  z-index: 1000;
  -webkit-user-select: none;
  user-select: none;
}

#insta
{
  display: block;
  position: absolute;
  top: 40px;
  right: 120px;
  z-index: 1000;
  -webkit-user-select: none;
  user-select: none;
}

/*
 * Make this absolute positioned
 * at the top left of the screen
 */
 #menu2
{
  position: absolute;
  width: 300px;
  margin: -100px 0 0 -50px;
  padding: 50px;
  padding-top: 125px;
  background: url("slidermaster.png") no-repeat;
  background-size: 100% 100%;
  list-style-type: none;
  z-index: 0;
  -webkit-font-smoothing: antialiased;
  /* to stop flickering of text in safari */
  transform-origin: 0% 0%;
  transform: translate(-100%, 0);
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
}

#menu2 li
{
  padding: 10px 0;
  font-size: 22px;
}

#menuToggle2 input:checked ~ ul
{
  transform: none;
}

.preload-images {
  visibility: hidden; 
  width: 0;
  height: 0;
  background: url(mainme.gif),
              url(bigfoot.png),
              url(followme.png),
              url(like.png);
}

#menu
{
  position: absolute;
  width: 300px;
  margin: -100px 0 0 -50px;
  padding: 50px;
  padding-top: 125px;
  background: #ededed;
  list-style-type: none;
  background: url("slidermaster.png") no-repeat;
  background-size: 100% 100%;
  -webkit-font-smoothing: antialiased;
  /* to stop flickering of text in safari */
  transform-origin: 0% 0%;
  transform: translate(-100%, 0);
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
}

#menu li
{
  padding: 10px 0;
  font-size: 22px;
}

/*
 * And let's slide it in from the left
 */




#bigfoot2
{
  display: block;
  position: absolute;
  top: 50px;
  left: 25%;
  z-index: 1;
  -webkit-user-select: none;
  user-select: none;
}
#like2
{
  display: block;
  position: absolute;
  top: 50px;
  right: 10px;
  z-index: 7;
  -webkit-user-select: none;
  user-select: none;
}
#insta2
{
  display: block;
  position: absolute;
  top: 50px;
  right: 60px;
  z-index: 7;
  -webkit-user-select: none;
  user-select: none;
}
#menuToggle2
{
  display: block;
  position: relative;
  top: 40px;
  left: 10px;
  z-index: 6;
  -webkit-user-select: none;
  user-select: none;
}
#menuToggle2 input
{
  display: block;
  width: 50px;
  height: 50px;
  position: absolute;
  top: 0px;
  left: -5px;
  cursor: pointer;
  opacity: 0; /* hide this */
  z-index: 4; /* and place it over the hamburger */
  -webkit-touch-callout: none;
}

/*
 * Just a quick hamburger
 */
#menuToggle2 span
{
  display: block;
  width: 30px;
  height: 6px;
  margin-bottom: 5px;
  position: relative;
  background: #FFFFFF;
  border-radius: 3px;
  z-index: 3000;
  transform-origin: 4px 0px;
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              opacity 0.55s ease;
}

#menuToggle2 span:first-child
{
/*  transform-origin: 0% 0%;
*/
}

#menuToggle2 span:nth-last-child(2)
{
 /* transform-origin: 0% 100%;
 */
}

/* 
 * Transform all the slices of hamburger
 * into a crossmark.
 */
#menuToggle2 input:checked ~ span
{
  opacity: 1;
  transform: rotate(45deg) translate(-2px, -1px);
  background: #232323;
}

/*
 * But let's hide the middle one.
 */
#menuToggle2 input:checked ~ span:nth-last-child(3)
{
  opacity: 0;
  transform: rotate(0deg) scale(0.2, 0.2);
}

/*
 * Ohyeah and the last one should go the other direction
 */
#menuToggle2 input:checked ~ span:nth-last-child(2)
{
  transform: rotate(-45deg) translate(0, -1px);
}

.nave{
display:block;
  }
#navme{
display:block;

  }
  #fstm{
display:none;

  }  
  #midimagemain{
  position: relative;
  top:0px;
  }
#bannerme2{
top: 0px;

}
video {
  object-fit: fill;
}
#desktopdiv{

display:block;
}

#mobilediv{

display:block;
}
.container {
    width: 100%;
    height: 500px;
    margin: auto;
    padding: 10px;
}
.one {
    width: 50%;
    height: 450px;
    float: left;
}
.two {
    margin-left: 50%;
    height: 450px;

}

.cartin {
z-index: 100;

}
.cartimg {
z-index: 100;
    width: auto;
    height: auto;
    max-width: 50px;
    max-height: 50px;

}
#contactme{
position: absolute;
visibility: hidden;
top: 0;
left:0;
width: 100%;
max-width: 300px;
height: 300px;
z-index: -1;
background:white;
border-radius: 20px;
border: 2px solid black;
padding:15px 15px 15px 15px;

}
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
</style>
<script src="ol.js"></script> 
<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
function addControlPlaceholders(map) {
    var corners = map._controlCorners,
        l = 'leaflet-',
        container = map._controlContainer;

    function createCorner(vSide, hSide) {
        var className = l + vSide + ' ' + l + hSide;

        corners[vSide + hSide] = L.DomUtil.create('div', className, container);
    }

   createCorner('verticalcenter', 'left');
    createCorner('verticalcenter', 'right');
}

function contactme(){
 var y = document.getElementById("contactme");

y.style.visibility = "visible";
y.style.zIndex = "11111111";



}
function contactclose(){
 var x = document.getElementById("contactme");

    x.style.zIndex = "-1";
    x.style.visibility = "hidden";
  

}
function myFunction() {
// Where you want to render the map.

var map = new ol.Map({
  target: 'osm-map',
  moveTolerance: 5,
  layers: [
    new ol.layer.Tile({
source: new ol.source.OSM()

    })
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([-120.5542,43.8041]), // Coordinates of New York
    zoom: 6, //Initial Zoom Level
    enableRotation: false
  })
});



var marker = new ol.Feature({
  geometry: new ol.geom.Point(
    ol.proj.fromLonLat([-123.4670077,42.8382338])
  ),desc: 'Your Gas Level:' + <?php echo $level;?> + "% <br>Your Temp:" + <?php echo $temp;?> + "°F",name: "<center><u>Justin's Gas Level</u></center>"  // Cordinates of New York's Town Hall
});


marker.setStyle(new ol.style.Style({
  image: new ol.style.Icon(({
crossOrigin: 'anonymous',
src: <?php echo $photo;?>
  }))
    }));

var vectorSource = new ol.source.Vector({
  features: [marker]
});


var markerVectorLayer = new ol.layer.Vector({
  source: vectorSource,
});

map.addLayer(markerVectorLayer);

//var target = L.latLng(42.382338, -123.4670077);

// Set map's center to target with zoom 14.
//map.setView(target, 4);
///addControlPlaceholders(map);

// Change the position of the Zoom Control to a newly created placeholder.




var popup = new ol.Overlay({
        element: document.getElementById('popup')
});

var popupe = new ol.Overlay({
        element: document.getElementById('popupcenter')
});
map.addOverlay(popupe);
map.addOverlay(popup);

map.on('singleclick', function(evt) {
    var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {
        //you can add a condition on layer to restrict the listener
        //console.log(feature);
        return feature;
        });
    if (feature) {        
        var coordinate = evt.coordinate;
        var element = popup.getElement();
        $(element).popover('destroy');
        popup.setPosition(coordinate);
        $(element).popover({
          placement: 'auto right',
          animation: false,
          html: true,
          content: feature.get('name') + feature.get('desc')
        });
        
        $(element).popover('show'); 
    }else{
    var element = popup.getElement();
    $(element).popover('destroy');

    }
});

}
function showPosition(position) {
map.getView().setCenter(ol.proj.transform([position.coords.longitude,position.coords.latitude], 'EPSG:4326', 'EPSG:3857'));
map.getView().setZoom(7);
document.getElementById('states').style.zIndex = -1;
var marker = new ol.Feature({
  geometry: new ol.geom.Point(
    ol.proj.fromLonLat([position.coords.longitude,position.coords.latitude])
  ),desc: "home",name: "my ",  // Cordinates of New York's Town Hall
});
marker.setStyle(new ol.style.Style({
  image: new ol.style.Icon(({
crossOrigin: 'anonymous',
src: 'me22.png'
  }))
    }));

var vectorSource = new ol.source.Vector({
  features: [marker]
});


var markerVectorLayer = new ol.layer.Vector({
  source: vectorSource,
});

map.addLayer(markerVectorLayer);

}
</script>

</head>
<body onload="myFunction()">



<div style="display: none;">

<!-- Clickable label for Vienna -->

<div id="marker" title="Marker"></div>
<!-- Popup -->
<div id="popup"></div>
  
</div>

<div id="osm-map"></div>

</body>
</html>
