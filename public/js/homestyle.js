$('document').ready(function(){

	$('.carousel.carousel-slider').carousel({full_width: true});
  
	setInterval(function(){
	  $('.carousel').carousel('next');
	}, 5000);
 
	var numRand = Math.floor(Math.random()*4)+1;
    document.getElementById("imgRand").src = "img/ads/ads"+numRand+".png";

});