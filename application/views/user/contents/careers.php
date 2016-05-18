<script type="text/javascript" src="<?php echo base_url();?>js/api/career.js"></script>
   
      <section>
         <div id="head">
            <div class="line">
               <h1><?php echo $page_header_title;?></h1>
            </div>
         </div>
         <div id="content">
            <div class="line">
               <div class="margin">
                  <div class="s-12 m-6 l-4" ng-repeat="career in career_res">
                     <div class="margin-bottom">
                         <a href="#career_desc">
                            <img src="<?php echo base_url();?>image/teams/{{career_res.career_image}}" class="image-circle"/>
                         </a>
                        <h3 style="font-weight: bold">test{{career_res.career_title}}</h3>
                        <p>
                            Can read and write Japanese language, speak Japanese and translate to English.
                        </p>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
         <!-- GALLERY -->	
         <div id="third-block">
            <div class="line">
               <h2 id="contacts">Responsive gallery</h2>
               <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
               </p>
               <div class="margin">
                  <div class="s-12 m-6 l-3">
                      <img src="<?php echo base_url();?>image/user/first-small.jpg">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img src="<?php echo base_url();?>image/user/second-small.jpg">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img src="<?php echo base_url();?>image/user/third-small.jpg">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img src="<?php echo base_url();?>image/user/fourth-small.jpg">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div id="fourth-block">
            <div class="line">
               <div id="owl-demo2" class="owl-carousel owl-theme">
                  <div class="item">
                     <h2>Amazing responsive template</h2>
                     <p class="s-12 m-12 l-8 center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
                  <div class="item">
                     <h2>Responsive components</h2>
                     <p class="s-12 m-12 l-8 center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
                  <div class="item">
                     <h2>Retina ready</h2>
                     <p class="s-12 m-12 l-8 center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>