
      <section ng-app="validationApp" ng-controller="mainController">
         <div id="head">
            <div class="line">
               <h1><?php echo $page_header_title;?></h1>
            </div>
         </div>
         <div id="content" class="left-align contact-page">
            <div class="line">
               <div class="margin">
                  <div class="s-12 l-6">
                     <h2>Forty Degrees Celsius Inc.</h2>
                     <address>
                        <p><i class="icon-home icon"></i> Unit1503-1503,15th Floor, Park Centrale, Asia Town I.T Park, Salinas Drive Lahug Cebu City, 6000 Philippines</p>
                        <p><i class="icon-globe_black icon"></i> (032) 260-2595</p>
                        <p><i class="icon-mail icon"></i><a href="mailto:fdcincph@gmail.com?Subject=Inquiry" target="_top">fdcincph@gmail.com</a></p>
                     </address>
                     <br />
                     <div id="map-block">     
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1962.5814646875833!2d123.90562445802519!3d10.328842936901827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99922157b8c91%3A0x529b9bacb2aff9!2sPark+Centrale%2C+Jose+Maria+del+Mar+St%2C+Cebu+City%2C+6000+Cebu!5e0!3m2!1sen!2sph!4v1459911359760" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                     </div>
                  </div>
                    <div class="s-12 l-6">
                        <h2>Contact Form</h2>
                        <form name="userForm" ng-submit="submitForm()" novalidate class="customform" method="post" action="<?php echo base_url().'contact-us/processMail'; ?>">

                            <!-- NAME -->
                            <div class="s-12 l-7" ng-class="{ 'has-error' : userForm.name.$invalid && !userForm.name.$pristine}">
                                <input type="text" name="name" ng-model="user.name" required placeholder="* Your name (required)" title="Your name" >
                                <p ng-show="userForm.name.$invalid && !userForm.name.$pristine && !userForm.name.$touch" class="help-block error-text">You name is required.</p>
                            </div>
                                <!-- EMAIL -->
                            <div class="s-12 l-7" ng-class="{ 'has-error' : userForm.email.$invalid && !userForm.email.$pristine }">
                                <input type="email" name="email" ng-model="user.email" placeholder="* Your Email (required)" title="Your email" required>
                                <p ng-show="userForm.email.$invalid && !userForm.email.$pristine" class="help-block error-text">Enter a valid email.</p>
                            </div>                      

                            
                             <!-- NAME -->
                            <div class="s-12 l-7" ng-class="{ 'has-error' : userForm.number.$invalid && !userForm.number.$pristine }">
                                <input type="text" name="number" ng-model="user.number" required placeholder="* Your Phone Number (required)" title="Your phone number">
                                <p ng-show="userForm.number.$invalid && !userForm.number.$pristine" class="help-block error-text">Phone number is required.</p>
                            </div>
                             
                            <div class="s-12 l-7">
                                <select name="subject">
                                    <option value="Inquiry">Inquiry</option>
                                    <option value="Web Translator">Web Translator</option>
                                    <option value="Web Programmer">Web Programmer</option>
                                    <option value="Web Application Tester">Web Application Tester</option>
                                </select>
                            </div>
                             
                            <div class="s-12" ng-class="{ 'has-error' : userForm.message.$invalid && !userForm.message.$pristine }">
                                <textarea placeholder="* Your massage (required)" name="message" rows="5" ng-model="user.message" required></textarea>
                                <p ng-show="userForm.message.$invalid && !userForm.message.$pristine" class="help-block error-text">Message is required.</p>
                            </div>
                             
                            <div class="s-12 l-12">
                                <input name="" type="file"/>
                            </div>
                             
                            <div class="s-12 m-6 l-4">
                                <button type="submit" ng-disabled="userForm.$invalid">Submit Button</button>
                            </div>
                        </form>

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
<script>
    // create angular app
    var validationApp = angular.module('validationApp', []);

    // create angular controller
    validationApp.controller('mainController', function($scope, $http) {

        // function to submit the form after all validation has occurred            
        $scope.submitForm = function() {
            if ($scope.userForm.$valid) {
                alert(JSON.stringify($scope.user));
            }
        };

    });
</script>
     