<!-- Portfolio Section -->

<section id="portfolio" class="portfolio text-center">
  <div class="portfolio-bottom">
    <div class="section-padding">
      <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
        <h2 class="section-title"><span>Featured</span> Projects</h2>
        <p class="section-description">
        Suppose then that such rings were produced in a medium without friction as the ether is believed to be, they would be permanent structures with a variety of properties.
        </p>
      </div>

      <div class="latest-projects wow animated fadeInUp" data-wow-delay=".5s">
        <div  class="project-items" style="margin: 25px 0 0 0 ">
          <div class="item cat-2 cat-3 albums" ng-repeat="album in albums" >
            <a href="images/project/2.jpg" class="image-popup-vertical-fit">
            <img src="images/galleries/{{ album.images[0].image_name}}" data-at2x="images/galleries/{{ album.images[0].image_name}}" alt="Item Image">
            </a>
            <div class="item-details">
              <h3 class="project-title">{{ album.album_name }}</h3>
            </div><!-- /.item-details -->
          </div><!-- /.item -->
        </div><!-- /#project-items -->

        <div class="btn-container clearfix"></div>
      </div><!-- /.latest-projects -->
    </div><!-- /.section-padding -->
  </div><!-- /.portfolio-bottom -->
</section>

<!-- Portfolio Section -->


  