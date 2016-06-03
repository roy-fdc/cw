

  <section id="career" class="subscribe-section text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="bg-overlay">
      <div class="section-padding">
        <div class="container">
          <div class="wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title bold">Why Work Here?</h2><!-- /.section-title -->
            <p class="career_desc">
              We are dependable, innovative, adaptable, and easy to do business with. Aside that we value the talent & expertise of every employee, we provide benefits on day one, industry leading training and with a team like no other.
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
                  <article class="type-post post wow animated fadeInUp" data-wow-delay=".35s" ng-click="showCareerDetail(career.id)">
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
  
    <section ng-show="careerVisibleContainer">
        <div class="row">
            <div class="col-sm-12 jumbotron">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="backToback btn btn-primary pull-right" ng-click="removeCareerDescription()"><span class="glyphicon glyphicon-remove"></span></button>
                        <div ng-bind-html="careerDetailContainer"></div>
                        <a href="#contact" ng-click="quickApply(careerClickId)">Click here to apply</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.backToback').click(function(){
          var y = $(window).scrollTop();  //your current y position on the page
          $(window).scrollTop(y-450);    
        });
      });
    </script>
