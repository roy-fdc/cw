<!-- Portfolio Section -->
 <div class="section-padding"></div>
  <section id="gallery" class="subscribe-section text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="bg-overlay">
      <div class="section-padding">
        <div class="container">
          <div class="wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title bold">GALLERIES</h2><!-- /.section-title -->
            <p class="career_desc">
              A job isn't just a job. It's also an opportunity to explore new things and meet good people. Right here we've got something you gonna love. 
            </p><!-- /.section-description -->
          </div>
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.bg-overlay -->
  </section><!-- /#subscribe-section -->


  <section id="" class="portfolio text-center">
    <div class="portfolio-bottom">
      <div class="section-padding">
       
        <div class="latest-projects wow animated fadeInUp" data-wow-delay=".5s">
          <div class="itemFilter"></div> <!-- /.itemFilter -->

          <div class="project-items" data-animated="fadeIn" ng-show="albumContainer" style="padding:20px"> 
            <div class="item cat-2 cat-3 albums" ng-repeat="album in albums" >
              <a class="image-popup-vertical-fit" ng-click="viewByAlbum(album.album_id)" >
              <img src="images/galleries/{{ album.images[0].image_name}}" data-at2x="images/galleries/{{ album.images[0].image_name}}" alt="Item Image" style="max-height: 225px; border:3px solid #000; padding: 15px;" class="multiple-borders">
              
              <div class="item-details">
                <h3 class="project-title">{{ album.album_name }}</h3>
              </div><!-- /.item-details -->
              </a>
            </div><!-- /.item -->
          </div>

          <!-- this is album images -->
            <div ng-show="IsVisible">
                <button class="btn btn-primary" ng-click="closeImages()">Close album</button>
                <h3>{{ albumName }}</h3>
                <div class="center-block">
                    <ng-gallery images="ctrl.images" thumbs-num="10"></ng-gallery>
                </div>
            </div>


          <div class="btn-container clearfix"></div><!-- /.btn-container -->
        </div><!-- /.latest-projects -->
      </div><!-- /.section-padding -->
    </div><!-- /.portfolio-bottom -->
  </section>

  <!-- Portfolio Section -->

