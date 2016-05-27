<div class="line7">
  <div class="container">
    <div class="row footer">
      <div class="col-md-12">
        <h3>Follow Us!!</h3>
        <p>Subscribe to our newsletter email to get notification about fresh news, latest promos, giveaways and free stuff from Skew. Stay always up-to-date!</p>
      </div>
      <div class="soc col-md-12">
        <ul>
          <li class="soc1"><a href="#"></a></li>
          <li class="soc2"><a href="#"></a></li>
          <li class="soc3"><a href="#"></a></li>
          <li class="soc4"><a href="#"></a></li>
          <li class="soc5"><a href="#"></a></li>
          <li class="soc6"><a href="#"></a></li>
          <li class="soc7"><a href="#"></a></li>
          <li class="soc8"><a href="#"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="lineBlack">
  <div class="container">
    <div class="row downLine">
      <div class="col-md-6 text-left copy">
        <p>Copyright &copy; 2014 Timber HTML Template. All Rights Reserved.</p>
      </div>
      <div class="col-md-6 text-right dm">
        <ul id="downMenu">
          <li class="active" ><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#gallery">GALLERY</a></li>
          <li><a href="#benefits">BENEFITS</a></li>
          <li><a href="#career">CAREER</a></li>
          <li class="last"><a href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>   
    
  <script type="text/javascript" src="js/gallery/ngGallery.js"></script>
  <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script>
      $(document).ready(function(){

        $('.numeric').keypress(function(e) {
            if(e.charCode < 48 || e.charCode > 57) return false;
        });
        $(".alpha").keypress(function(e){
          if((e.charCode < 97 || e.charCode > 122) && (e.charCode < 65 || e.charCode > 90) && (e.charCode != 45) && (e.charCode != 32)) return false;
        });
        
        $('#menu').slicknav();

        var $menu = $("#menuF");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });

        calculateScroll();
        $(window).scroll(function(event) {
          calculateScroll();
        });
        $('.navmenu ul li a').click(function() {  
          //$('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
          $('html, body').animate({scrollTop: $(this.hash).offset().top - 20}, 800);
          return false;
        });

        $(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true, social_tools: ''});

      });

      function calculateScroll() {
        var contentTop      =   [];
        var contentBottom   =   [];
        var winTop      =   $(window).scrollTop();
        var rangeTop    =   50; //200
        var rangeBottom =   10; //500
        $('.navmenu').find('a').each(function(){
          contentTop.push( $( $(this).attr('href') ).offset().top );
          contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
        })
        $.each( contentTop, function(i){
          if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
            $('.navmenu li')
            .removeClass('active')
            .eq(i).addClass('active');        
          }
        })
      };
  </script>
</body>
</html>