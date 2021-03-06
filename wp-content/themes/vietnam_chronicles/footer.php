    <div class="section-2 footer">
    <div class="container-4 w-container">
      <div class="columns-11 w-row">
        <div class="w-col w-col-6">
          <div class="w-row">
            <div class="column w-col w-col-4">
              <h4 class="white-text">INFO</h4>
              <a href="<?php echo get_site_url() ?>/about/" class="link">About Us</a>
              <a href="<?php echo get_site_url() ?>/privacy-policy/" class="link">Privacy Policy</a>
              <a href="<?php echo get_site_url() ?>/work-with-us/" class="link">Work With Us</a>
              <a href="<?php echo get_site_url() ?>/contact/" class="link">Contact Us</a>
            </div>
            <div class="w-col w-col-4">
              <h4 class="white-text">DESTINATIONS</h4>
              <a href="<?php echo get_site_url() ?>/category/laos/" class="link">Laos</a>
              <a href="<?php echo get_site_url() ?>/category/vietnam/" class="link">Vietnam</a>
              <a href="<?php echo get_site_url() ?>/category/cambodia/" class="link">Cambodia</a>
            </div>
            <div class="w-col w-col-4">
              <h4 class="white-text">EXPLORE</h4>
              <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-culture/" class="link">Vietnam Culture</a>
              <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-destinations/" class="link">Vietnam Destinations</a>
              <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-living/" class="link">Living in Vietnam</a>
              <a href="<?php echo get_site_url() ?>/category/vietnam/vietnam-travel-tips/" class="link">Vietnam Travel Tips</a>
            </div>
          </div>
        </div>
        <div class="column-23 w-col w-col-6">
          <div class="w-row">
            <div class="column-22 w-col w-col-3"></div>
            <div class="w-col w-col-9">
              <h4 class="white-text">WEEKLY NEWSLETTER</h4>
              <p class="paragraph content-text">Join our FREE weekly newsletter and get the updates about our journey, learn about the culture and traditions, get customized itineraries and motorbike routes as well as countless travel tips!</p>
              <h5>NO SPAM</h5>
              <div class="div-block-2">
                <div class="form-block-2 w-form">
                  <form id="email-form" name="email-form" data-name="Email Form" class="form" method="GET" action="<?php echo get_site_url() ?>/wp-json/vnc/v1/create-subscriber">
                    <input type="email" class="text-field w-input" maxlength="256" name="subscriber_email" data-name="Name 2" placeholder="Email" id="name-2" required>
                    <a href="#" class="footer-btn w-inline-block join-newsletter">
                      <div class="text-footer">JOIN</div>
                    </a>
                  </form>
                  <div class="success-message-2 w-form-done footer-form-success">
                    <div><strong>Thank you! Your submission has been received!</strong></div>
                  </div>
                  <div class="error-message-2 w-form-fail footer-form-fail">
                    <div class="text-block-39 error-message-2">Oops, something went wrong! <br> Email address have to contain @.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="div-block-4">
        <div class="text-block footer-text">Vietnam Chronicles. All rights reserved 2020</div>
        <div class="div-block-3">
      </div>
    </div>

  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src=<?php echo get_template_directory_uri() . "/scripts/webflow.js" ?> type="text/javascript"></script>
  <script src=<?php echo get_template_directory_uri() . "/scripts/custom_wordpress.js" ?> type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    <script src=<?php echo get_template_directory_uri() . "/scripts/jquery.form.js" ?>></script> 
    <?php wp_footer() ?>
  </body>
</html>