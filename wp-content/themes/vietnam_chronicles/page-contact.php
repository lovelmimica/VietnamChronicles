  <?php get_header() ?>
  <div class="container-main">
    <div class="w-container">
      <div class="part-container">
        <h1 class="mds-plr-10 page_title">Contact Us</h1>
        <p class="paragraph-15 mds-plr-10">Do you have any questions about your upcoming Vietnam trip?<br></p>
        <p class="mds-plr-10">Don’t hesitate to hit that cute, green button below along with your message. We love when people reach us out and we make sure to answer every message personally. <br></p>
        <p class="mds-plr-10">Usually, it takes up to 48 hours for us to get back to you, but please forgive us if it takes a bit longer as sometimes we’re literally overwhelmed with your AWESOME messages. <br></p>
        <div class="div-wide contact contact-page-content__bottom-paragraph">
          <p class="mds-plr-10 contact-page-content__bottom-paragraph_text">Let’s connect <br></p>
          <div class="w-embed pt-3">&nbsp<i class="fa fa-smile-o fa-lg" aria-hidden="true"></i></div>
        </div>
        <div class="html-embed-5 w-embed">
          <hr>
        </div>
      </div>
      <div class="part-container main-section">
        <div class="form-block-4 w-form">
          <form id="contact-us-form" name="contact-us-form" data-name="Email Form 2" class="form-3" method="GET" action='<?php echo get_site_url() ?>/wp-json/vnc/v1/create-message' >
            <label for="name-3">Name</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="sender_name" data-name="Name 3" id="name-3">
            <label for="email">Email Address</label>
            <input type="email" class="text-field-5 w-input" maxlength="256" name="sender_email" data-name="Email" id="contact_us_email" required="">
            <label for="name-4">Subject</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="msg_subject" data-name="Name 3" id="name-3">
            <label for="name-4">Message</label>
            <textarea placeholder="Message Text" maxlength="5000" id="msg_content" name="msg_content" required="" class="textarea w-input"></textarea>
            <div class="form-footer">
              <a href="#" class="link-btn w-inline-block contact-us-submit" style="opacity: 1;">
                 <div class="text-button">SEND</div>
              </a>              
            </div>
          </form>
          <div class="success-message-3 w-form-done contact-us-success">
            <div>Thank you! Your message has been received!</div>
          </div>
          <div class="error-message-3 w-form-fail contact-us-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer() ?>
