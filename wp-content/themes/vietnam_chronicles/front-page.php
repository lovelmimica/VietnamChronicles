  <?php get_header() ?>
  <div class="section-8 main-section main-section slider_section">
      <div class='slider_image-wrapper'>
        <!--<img class='slider_image' src='https://vietnamchronicles.com/wp-content/uploads/2020/12/vietnam-chronicles-banner.png' />-->
        <img class='slider_image' src='https://vietnamchronicles.com/wp-content/uploads/2020/11/front-page-banner.jpg' />
        <span class='front-page-title__wrapper'><h1 class='front-page-title'>EXPLORE VIBRANT INDOCHINA <br> WITH US</h1></span>
        <div class="start-exploring-button-wrapper">
            <a href="#section-countries" class="link-btn w-inline-block start-exploring-button-anchor" style="opacity: 1;">
                <span class="text-button start-exploring-button">START HERE</span>
            </a>
        </div>
      </div>
  </div>
    <div class='about_us'>
      <h2>Hi, we're Antonio, David & Lovel!</h2>
      <p>Welcome to our adventure travel blog. We have been travelling South East Asia since 2017, searching for the best destinations and adventures.</p>
      <p>Through the art of storytelling and photography, we help our readers explore the globe with us, and aim to get you on the road as well. </p>
      <a href="<?php echo get_site_url() ?>/about/" class="link-btn w-inline-block">
        <div class="text-button">ABOUT US</div>
      </a>
    </div>
  </div>
  <span id='section-countries'></span> 
  <div class="section container-main">
    <div class="container w-container">
      <div class="part-container">
        <div class="no-mp w-row">
          <div class="cetered-vertical w-col w-col-4"><a class="destination_image" href="<?php echo get_site_url() ?>/category/laos/"><img src=<?php echo get_template_directory_uri() . "/images/laos.jpg" ?> srcset='<?php echo get_template_directory_uri() . "/images/laos-p-800.jpeg" ?> 800w, <?php echo get_template_directory_uri() . "/images/laos.jpg" ?> 960w' sizes="(max-width: 479px) 95vw, (max-width: 767px) 32vw, (max-width: 991px) 230.53125px, 297.6625061035156px" alt="" class="image-destination-left link-image"></a>
            <a class='country-link' href="<?php echo get_site_url() ?>/category/laos/">Laos</a>
          </div>
          <div class="cetered-vertical w-col w-col-4"><a class="destination_image" href="<?php echo get_site_url() ?>/category/vietnam/"><img src=<?php echo get_template_directory_uri() . "/images/vietnam.jpeg" ?> srcset='<?php echo get_template_directory_uri() . "/images/vietnam-p-1080.jpeg" ?> 1080w, <?php echo get_template_directory_uri() . "/images/vietnam-p-1600.jpeg" ?> 1600w, <?php echo get_template_directory_uri() . "/images/vietnam.jpeg" ?> 2000w' sizes="(max-width: 479px) 95vw, (max-width: 767px) 32vw, (max-width: 991px) 230.53125px, 297.6625061035156px" alt="" class="image-destination-center link-image"></a>
            <a class='country-link' href="<?php echo get_site_url() ?>/category/vietnam/">Vietnam</a>
          </div>
          <div class="cetered-vertical w-col w-col-4"><a class="destination_image" href="<?php echo get_site_url() ?>/category/cambodia/"><img src=<?php echo get_template_directory_uri() . "/images/cambodia.jpeg" ?> srcset='<?php echo get_template_directory_uri() . "/images/cambodia-p-800.jpeg" ?> 800w, <?php echo get_template_directory_uri() . "/images/cambodia.jpeg" ?>  960w' sizes="(max-width: 479px) 95vw, (max-width: 767px) 32vw, (max-width: 991px) 230.53125px, 297.6625061035156px" alt="" class="image-destination-right link-image"></a>
            <a class='country-link' href="<?php echo get_site_url() ?>/category/cambodia/">Cambodia</a>
          </div>
        </div>
      </div>
      <div class="part-container">
        <div data-duration-in="300" data-duration-out="100" class="w-tabs">
          <div class="tabs-menu w-tab-menu">
            <a data-w-tab="latest" class="tab w-inline-block w-tab-link w--current">
              <div>LATEST</div>
            </a>
            <a data-w-tab="trending_now" class="tab w-inline-block w-tab-link">
              <div>TRENDING NOW</div>
            </a>
            <a data-w-tab="popular" class="tab w-inline-block w-tab-link">
              <div>POPULAR</div>
            </a>
          </div>
          <div class="w-tab-content">
            <div data-w-tab="latest" class="w-tab-pane w--tab-active">
              <div class='tab-pane-destinations tab_pane'>
            <?php 
              $args =array('post_type' => 'post', 'orderby' => 'publish_date', 'order' => 'DESC');
              $loop = new WP_Query( $args );
              $i = 0;
              while( $loop->have_posts() && $i < 3 ):
                $loop->the_post();
                ?>
                <div class="archive-post-card p-10">
                  <a href='<?php echo get_permalink(); ?>' ><img class='link-image card-image' src=<?php echo get_field('featured_image')  ?> alt="Featured image" />
                  <h4 class="link-heading"><?php the_title() ?></h4></a>
                  <hr>
                  <p><?php echo get_the_excerpt() ?></p>
                  <a href=<?php the_permalink() ?> class="link-read-more">Read more &gt;</a>
                </div>
            <?php 
                $i++;
              endwhile;
            ?>
            </div>
            </div>
            <div data-w-tab="trending_now" class="w-tab-pane">
              <div class='tab-pane-destinations tab_pane'>
            <?php 
              $trending_posts = array(
                get_field('first', 509),
                get_field('second', 509),
                get_field('third', 509)
              );

              $i = 0;
              while( $i < 3 ):
                ?>
                <div class="archive-post-card p-10">
                <a href=<?php the_permalink($trending_posts[$i]) ?>><img class='link-image card-image' src=<?php echo get_field('featured_image', $trending_posts[$i])  ?> alt="Featured image" />
                  <h4 class="link-heading"><?php echo get_the_title($trending_posts[$i]) ?></h4></a>
                  <hr>
                  <p><?php echo get_the_excerpt($trending_posts[$i]) ?></p>
                  <a href=<?php the_permalink($trending_posts[$i]) ?> class="link-read-more">Read more &gt;</a>
                </div>
            <?php 
                $i++;
              endwhile;
            ?>
              </div>
            </div>
            <div data-w-tab="popular" class="w-tab-pane">
              <div class='tab-pane-destinations tab_pane'>
            <?php 
              $popular_posts = array(
                get_field('first', 514),
                get_field('second', 514),
                get_field('third', 514)
              );

              $i = 0;
              while( $i < 3 ):
                ?>
                <div class="archive-post-card p-10">
                  <a href=<?php the_permalink($popular_posts[$i]) ?>><img class='link-image card-image' src=<?php echo get_field('featured_image', $popular_posts[$i])  ?> alt="Featured image" />
                  <h4 class="link-heading"><?php echo get_the_title($popular_posts[$i]) ?></h4></a>
                  <hr>
                  <p><?php echo get_the_excerpt($popular_posts[$i]) ?></p>
                  <a href=<?php the_permalink($popular_posts[$i]) ?> class="link-read-more">Read more &gt;</a>
                </div>
            <?php 
                $i++;
              endwhile;
            ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="meet_the_team">
        <div class="html-embed-5 w-embed">
          <hr>
        </div>
      <h2>Meet the Team</h2>
        <div class="no-mp w-row">
          <div data-w-id="d042aef2-057a-b411-a606-b0c6f763d96a" class="cetered-vertical no-mp w-col w-col-4" data-ix="new-interaction">
            <div class="position-relative">
              <a href="<?php echo get_site_url() ?>/about/"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2020/04/front_page.lovel_.jpeg" alt="Lovel" class="link-image image-member-left">
            </a></div>
            <a class='country-link' href="<?php echo get_site_url() ?>/about/">Lovel</a>
          </div>
          <div data-w-id="d042aef2-057a-b411-a606-b0c6f763d96b" class="cetered-vertical no-mp w-col w-col-4">
            <div class="position-relative">
              <a href="<?php echo get_site_url() ?>/about/"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2020/04/front_page.antonio.jpeg" alt="Antonio" class="link-image image-member-center">
            </a></div>
            <a class='country-link' href="<?php echo get_site_url() ?>/about/">Antonio</a>
          </div>
          <div data-w-id="55f194f8-d976-4dc5-bbea-c2fcb6e77dbb" class="cetered-vertical no-mp w-col w-col-4">
            <div class="position-relative">
              <a href="<?php echo get_site_url() ?>/about/"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2020/04/front_page.david_.jpeg" alt="David" class="link-image image-member-right">
            </a></div>
            <a class='country-link' href="<?php echo get_site_url() ?>/about/">David</a>
          </div>
        </div>
      </div>

      <div class="html-embed-5 w-embed">
        <hr>
      </div>
      <div class="part-container">
        <h2 class="heading-28">Join our Weekly Newsletter</h2>
        <div class="no-mp w-row part_join_newsletter">
          <div class="column-25 w-col w-col-7">
            <p>Get the latest updates on our journey, motorbike routese, travel tips and everything in between!<br>‍<br>Let&#x27;s connect and share some interasting stories and experiences to inspire more people to travel around this stunning region!<br><br>Join our FREE weekly newsletter and get personalized itineraries and motorbike routes as well as countless travel tips!</p>
          </div>
          <div class="column-17 w-col w-col-5 join_newsletter_image"><img src="https://vietnamchronicles.com/wp-content/uploads/2020/09/newsletter_small.jpeg"  alt="Newsletter image"></div>
        </div>
      </div>
      <div class="part-container">
        <div class="no-mp w-row">
          <div class="column-25 w-col w-col-7">
            <div class="form-block w-form">
              <form id="email-form-2" name="email-form-2" data-name="Email Form 2" class="form-2" method="GET" action="<?php echo get_site_url() ?>/wp-json/vnc/v1/create-subscriber">
                <input type="text" class="text-field-2 w-input" maxlength="256" name="subscriber_name" data-name="Name 3" placeholder="Name" id="name-3">
                <input type="email" class="text-field-3 w-input" maxlength="256" name="subscriber_email" data-name="Email" placeholder="Email" id="email" required="">
              </form>
            </div>
          </div>
          <div class="column-17 w-col w-col-5">
            <a href="#" class="link-btn w-inline-block form-subscription">
              <div class="text-button">JOIN NOW</div>
            </a>
          </div>
        </div>
        <div class="success-message w-form-done newsletter-form-success">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="error-message w-form-fail newsletter-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
              </div>
      </div>
      <div class="html-embed-5 w-embed">
        <hr>
      </div>
      <?php 

        $json_ig_photos = file_get_contents("https://graph.instagram.com/17841409071052588/media?fields=id,media_url&access_token=[token]");
        $ig_photos_object = json_decode($json_ig_photos);
        $ig_photos_list = $ig_photos_object->data;
        $ig_photo_urls = array();
        foreach($ig_photos_list as $item ){
          array_push( $ig_photo_urls, $item->media_url );
        }
      ?>
        
      <div class="part-container instagram-photo__section">
        <h2 class="heading-29">See our Photography</h2>
        <div class="div-block-42 ig_images_flexbox">
          <div class="div-block-43 ">
            <div class="icon-arrow w-embed ig_slider_left"><i class="fa fa-angle-left fa-3x" aria-hidden="true"></i></div>
          </div>
          <div class="no-mp align-hor w-row ig_images_flexbox">
            <div class="p-10 cetered-vertical w-col w-col-4">
              <a href="https://www.instagram.com/vietnamchronicles/" target="_blank"><div class="position-relative"><img src='<?php echo $ig_photo_urls[0] ?>' alt="Instagram photo" class="link-instagram link-instagram-1">
                <div class="image-text w-embed"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></div>
              </div></a>
            </div>
            <div class="p-10 cetered-vertical w-col w-col-4">
              <a href="https://www.instagram.com/vietnamchronicles/" target="_blank"><div class="position-relative"><img src='<?php echo $ig_photo_urls[1] ?>' alt="Instagram photo" class="link-instagram link-instagram-2">
                <div class="image-text w-embed"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></div>
              </div></a>
            </div>
            <div class="p-10 cetered-vertical w-col w-col-4">
            <a href="https://www.instagram.com/vietnamchronicles/" target="_blank"><div class="position-relative"><img src='<?php echo $ig_photo_urls[3] ?>' alt="Instagram photo" class="link-instagram link-instagram-3">
                <div class="image-text w-embed"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></div>
              </div></a>
            </div>
          </div>
          <div class="div-block-43 ">
            <div class="icon-arrow w-embed ig_slider_right"><i class="fa fa-angle-right fa-3x" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>
      <div class="ig_images_grid">
        <?php 
        $i = 0;
          foreach( $ig_photo_urls as $photo ): ?>
            <a class='ig_images_grid_item' href="https://www.instagram.com/vietnamchronicles/" target="_blank"><img src=<?php echo $ig_photo_urls[$i] ?> alt="" class="link-instagram link-instagram-1"></a>
          <?php
            $i++;
          endforeach;
          ?>        
  </div>
    </div>
  </div>

  <script>
    ig_image_urls = <?php echo '["' . implode('", "', $ig_photo_urls) . '"]' ?>;
  </script>
  <?php get_footer() ?>

