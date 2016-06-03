<!-- Include jQuery Js -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include jQuery Js -->
  <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.2.min.js"><\/script>')</script>
  <!-- Include WOW Min Js -->
  <script src="assets/js/wow.min.js"></script>
 
    <!-- Include Custom Js </-->
  <script src="assets/js/custom.min.js"></script>

  <script>

    $(".bxslider").bxSlider({auto:!0,preloadImages:"all",mode:"horizontal",captions:!1,controls:!0,pause:4000,speed:1200,onSliderLoad:function(){$(".bxslider>li .slide-inner").eq(1).addClass("active-slide"),$(".slide-inner.active-slide .slider-title").addClass("wow animated bounceInDown"),$(".slide-inner.active-slide .slide-description").addClass("wow animated bounceInRight"),$(".slide-inner.active-slide .btn").addClass("wow animated zoomInUp")},onSlideAfter:function(e,i,n){console.log(n),$(".active-slide").removeClass("active-slide"),$(".bxslider>li .slide-inner").eq(n+1).addClass("active-slide"),$(".slide-inner.active-slide").addClass("wow animated bounceInRight")},onSlideBefore:function(){$(".slide-inner.active-slide").removeClass("wow animated bounceInRight"),$(".one.slide-inner.active-slide").removeAttr("style")}}),$(document).ready(function(){function e(){return"ontouchstart"in document.documentElement}function i(){if("undefined"!=typeof google){var i={center:[-37.817331,144.955652],zoom:15,mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU},navigationControl:!0,scrollwheel:!1,streetViewControl:!0};e()&&(i.draggable=!1),$("#googleMaps").gmap3({map:{options:i},marker:{latLng:[23.709921,90.407143],options:{icon:"images/mapicon.png"}}})}}$("#masthead #main-menu").onePageNav(),i()});/*,
      $("#contactform").on("submit",function(e){
          e.preventDefault(),$this=$(this),
          $.ajax({
            type:"POST",
            url:$this.attr("action"),
            data:$this.serialize(),
            success:function(){
              alert("Message Sent Successfully")
            }
          })
        });*/

  </script>
</body>
</html>