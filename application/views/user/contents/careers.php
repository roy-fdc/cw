<script type="text/javascript" src="<?php echo base_url();?>js/api/career.js"></script>
<style type="text/css">
   .animate-enter, 
   .animate-leave
   { 
       -webkit-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
       -moz-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
       -ms-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
       -o-transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
       transition: 400ms cubic-bezier(0.250, 0.250, 0.750, 0.750) all;
       position: relative;
       display: block;
   } 
    
   .animate-enter.animate-enter-active, 
   .animate-leave {
       opacity: 1;
       top: 0;
       height: 30px;
   }
    
   .animate-leave.animate-leave-active,
   .animate-enter {
       opacity: 0;
       top: -50px;
       height: 0px;
   }
</style>   
      <section>
         <div id="head">
            <div class="line">
               <h1><?php echo $page_header_title;?></h1>
            </div>
         </div>
         <div id="content" >
            <div class="line">
               <div class="margin">
                  <div class="s-12 m-6 l-4" ng-repeat="career in careers" ng-animate=" 'animate' ">
                     <div class="margin-bottom">
                         <a href="#career_desc" ng-click="careerDetails(career.id)">
                            <img src="<?php echo base_url();?>image/careers/{{career.career_image}}" class="image-circle"/>
                         </a>
                        <h3 style="font-weight: bold">{{career.career_title}}</h3>
                        <p>{{career.career_description}}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div id="career_desc">
            <div class="line">
            {{careerVDetails}}
            </div>
         </div>

         
         <!-- GALLERY -->	
         <div id="third-block" style="display: none">
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