

  <!-- Contact Section -->
  <section id="contact" class="contact">
    <div class="contact-inner">
      <div id="google-map" class="google-map">
  
        <iframe class="google-map-container"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1962.5814646875833!2d123.90562445802519!3d10.328842936901827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99922157b8c91%3A0x529b9bacb2aff9!2sPark+Centrale%2C+Jose+Maria+del+Mar+St%2C+Cebu+City%2C+6000+Cebu!5e0!3m2!1sen!2sph!4v1459911359760" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
      </div><!-- /#google-map -->

      <div class="form-area text-center wow animated fadeInRight" data-wow-delay=".75s">
        <h2 class="section-title"><span>Contact</span> With Us</h2><!-- /.section-title -->
        <form action="email.php" method="post" id="contactform" class="contactform">
          <input id="name" class="form-control" name="name" type="text" placeholder="Name *" value="" required>
          <input id="email" class="form-control pull-right" name="email" type="email" placeholder="Email *" value="" required>
          <input type="text" class="form-control numeric" id="phone" name="phone" placeholder="Phone number *" required>
          <select name="subject" id="subject" class="form-control" style="margin-bottom: 10px">
              <option value="careerClickName" ng-if="careerClickName !==''" selected>{{careerClickName}}</option>
              <option value="Inquiry">Inquiry</option>
              <option ng-repeat="carOp in careers" value="carOp.career_title" ng-if="carOp.career_title !== careerClickName">{{carOp.career_title}}</option>
          </select>
          <textarea id="message" class="form-control" name="message" placeholder="Your Message *" rows="3" required></textarea>
          <input type="file" class="form-control" id="file" name="attachment">
          <button name="submit" class="btn submit-btn" type="submit" id="submit">Send Message</button>
          <button name="reset" class="btn submit-btn" type="reset" id="reset">Reset</button>
        </form><!-- /#contactform -->
      </div><!-- /.form-area -->
    </div><!-- /.contact-inner -->
  </section>

  <!-- Contact Section -->




  


    




  
