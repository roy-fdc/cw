

  <section id="career" class="subscribe-section text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="bg-overlay">
      <div class="section-padding">
        <div class="container">
          <div class="wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title">Career</h2><!-- /.section-title -->
            <p class="section-description">
              To get Polmo WordPress version subscribe now. Polmo theme is ablolutely free for your business or personal use.
            </p><!-- /.section-description -->

            
          </div>
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.bg-overlay -->
  </section><!-- /#subscribe-section -->



  <section id="" class="blog text-center">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-details">
            <div class="post-area">

              <div class="col-md-4" ng-repeat="career in careers">
                <article class="type-post post wow animated fadeInUp" data-wow-delay=".35s">
                  <div class="post-thumbnail">
                    <img class="img-responsive picsGall imgCenter" src="<?php echo base_url();?>images/careers/{{career.career_image}}"/>
                  </div><!-- /.post-thumbnail -->

                  <div class="post-content">
                    <h4 class="entry-title">{{career.career_title}}</h4><!-- /.entry-title -->
                    <p class="entry-content">
                      {{career.career_description}}
                    </p><!-- /.entry-content -->
                  </div><!-- /.post-content -->
                </article><!-- /.type-post -->
              </div>
            </div><!-- /.post-area -->            
          </div><!-- /.section-details -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /#blog -->

