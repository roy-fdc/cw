<!-- About Us Section -->

  <section id="about" class="about">
    <div class="about-top">
      <div class="section-padding">
        <div class="container">
          <div class="row">
            <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
              <h2 class="section-title" style="text-align: center;"><span>About </span>Us</h2>
              <div ng-bind-html="detail"></div>
            </div><!-- /.section-top -->
          </div>

        </div>
      </div>
    </div>

    <div class="about-middle">
      <div class="about-breifing">
        <div class="col-md-6 col-sm-6" style="height: 200px;">
          <div class="item media wow animated fadeInLeft" data-wow-delay=".35s">
              <h2 class="section-title"><span>M</span>ission</h2><!-- /.section-title -->
              <p class="subtitile white">{{ company_mission[0].description }}</p>
          </div><!-- /.item -->
        </div>

        <div class="col-md-6 col-sm-6" style="height: 200px;">
          <div class="item media wow animated fadeInLeft" data-wow-delay=".55s">
              <h2 class="section-title "><span>V</span>ission</h2><!-- /.section-title -->
              <p class="subtitile white">{{ company_vision[0].description }}</p>
          </div><!-- /.item -->
        </div>

      </div><!-- /.about-briefing -->
    </div><!-- /.about-middle -->

    <div class="about-middle">
      <div class="about-breifing">

        <div class="col-md-12">
          <div class="item media wow animated fadeInLeft" data-wow-delay=".55s">
              <div class="col-md-4 circleImg padd" ng-repeat="value in values">
          <div class="know-about-us wow animated fadeInLeft" data-wow-delay=".5s">
           <div class="">
            <img class="pic1Ab" src="<?php echo base_url();?>images/values/{{value.value_image}}">
            <span class="oneLetter">{{value.value_title}}</span>
            <p class="description">{{value.value_description}}</p><!-- /.description -->
            <div class="btn-container"></div><!-- /.btn-container -->
          </div><!-- /.know-about-us -->
        </div>
          </div><!-- /.item -->
        </div>

      </div><!-- /.about-briefing -->
    </div><!-- /.about-middle -->

    <div class="about-middle">
      <div class="about-breifing">
        <div class="bg-overlay col-md-12">
        <h2 class="section-title center"><span>Our</span> Teams</h2>
        </div>
        <div class="bg-overlay col-md-3" ng-repeat="team in teams" style="height: 385px;">
          <article class="type-post post wow animated fadeInUp" data-wow-delay=".35s">
            <div class="post-thumbnail">
              <img class="img-responsive picsGall imgCenter" src="<?php echo base_url();?>images/teams/{{team.team_image}}"/>
            </div>

            <div class="post-content center">
              <h4 class="item-title">{{team.team_name}}</h4>
              <p class="white"><small>{{team.team_position}}</small></p>
              <p class="entry-content white">{{team.team_description}}</p>
            </div>
          </article>
        </div>
      </div><!-- /.about-briefing -->
    </div><!-- /.about-middle -->


  </section><!-- /#about -->

  <!-- About Us Section -->