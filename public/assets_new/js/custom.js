/**************** home page **********************/

//dropdown

    

    /*for equal height*/
equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     jQueryel,
     topPosition = 0;
 jQuery(container).each(function() {
   jQueryel = jQuery(this);
   jQuery(jQueryel).height('auto')
   topPostion = jQueryel.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = jQueryel.height();
     rowDivs.push(jQueryel);
   } else {
     rowDivs.push(jQueryel);
     currentTallest = (currentTallest < jQueryel.height()) ? (jQueryel.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

jQuery(window).load(function() {
  equalheight('.img_sec .reach, .thumbnail .org-ratings, .work-list .working_p, .list-content  .listcont1');
});


jQuery('.tomato_link a').on('shown.bs.tab', function(event){
   equalheight('.img_sec .reach');
});


jQuery(window).load(function() {
  equalheight('.img_sec .images_12_sell');
});


jQuery(window).resize(function(){
  equalheight('.text-style .reach, .img_sec .images_12_sell');
});







