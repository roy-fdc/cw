<!-- Service Section-->

  <section id="benefits" class="services text-center">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title bold"><span>EMPLOYEE</span> BENEFITS</h2>
            <p class="section-description">
              Forty Degrees Celsius Inc.(FDCI) provides benefits to employees in addition to their salaries to meet their diverse needs. Our comprehensive benefits include: free meal allowances, monthly company dinner, medical insurance coverage and the company team building.
            </p><!-- /.section-description -->
          </div><!-- /.section-top -->

          <div class="section-details">
            <div class="service-details">

              <div class="col-md-3 col-sm-6 " ng-repeat="benefit in benefits">
                <div class="benefits item wow animated fadeInLeft" data-wow-delay=".5s">
                  <div class="item-icon">
                    <img class="img-responsive picsGall imgCenter" src="<?php echo base_url();?>images/benefits/{{benefit.benefit_image}}"/>
                  </div><!-- /.item-icon -->
                  <div class="item-details">
                    <h4 class="item-title">{{benefit.benefit_title}}</h4><!-- /.item-title -->
                    <p class="item-description">
                      {{benefit.benefit_description}}
                    </p><!-- /.item-description -->
                  </div><!-- /.item-details -->
                </div><!-- /.item -->
              </div>

              

            </div><!-- /.service-details -->
          </div><!-- /.section-details -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /#services -->

  <!-- Service Section-->

  