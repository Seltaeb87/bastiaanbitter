	(function(){  
	var counter = 0, // to keep track of current slide
	    $items = document.querySelectorAll('.slideshow figure'), // a collection of all of the slides

	// this function is what cycles the slides, showing the next or previous slide and hiding all the others
	var showCurrent = function(){
	  var itemToShow = Math.abs(counter%numItems);// uses remainder (aka modulo) operator to get the actual index of the element to show  
	  
	  // If you go to next or previous, remove this image
	  [].forEach.call( $items, function(el){
	    el.classList.remove('show');
	  });
	  
	  // SHow the image
	  $items[itemToShow].classList.add('show');    
	};

	// add click event to go forward and back
	document.querySelector('.next').addEventListener('click', function() {
	     counter++;
	     showCurrent();
	  }, false);

	document.querySelector('.prev').addEventListener('click', function() {
	     counter--;
	     showCurrent();
	  }, false);

	//set interval of slideshow(now 5000ms = 5sec)
	window.setInterval(function(){
	counter++;
	showCurrent();
	}, 5000);
	  
})();