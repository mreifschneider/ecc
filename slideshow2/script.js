var counter = 0;
    $items = $('.slideshow figure');
    numItems = $items.length; 

var showCurrent = function(){
    var itemToShow = Math.abs(counter%numItems);
    $items.removeClass('show'); 
    $items.eq(itemToShow).addClass('show');    
};

function nextPhoto(){
alert("next");
    counter++;
    showCurrent(); 
};

function prevPhoto(){
alert("prev");
    counter--;
    showCurrent(); 
};