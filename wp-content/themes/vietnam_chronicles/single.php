
  <?php get_header() ?>
    <div class="section-6 container-main main-section">
    <div class="container w-container">
      <h1 class="heading-71 mds-plr-10 centered page_title"><?php the_title(); ?></h1>     
      <div class='part-container'>
        <img class='feature_image' src=<?php echo get_field('featured_image')  ?> alt="Featured image"  />
       </div>
      <div class="div-social-share-single">
        <div class="social-share-icons">
          <a href='http://facebook.com/sharer.php?u=<?php echo get_permalink() ?>' class="html-embed-8 icon-facebook w-embed social-share-icon"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i><span class="social-share-icon__text">&nbsp;Share</span></a>
          <a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink() ?>" class="html-embed-8 icon-twitter w-embed social-share-icon"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i><span class="social-share-icon__text">&nbsp;Tweet</span></a>
        </div>
      </div>

        <?php 
          $content = wpautop(get_post()->post_content); 
          preg_match_all( '@<h[1-3].*?>(.*?)<\/h[1-3]>@', $content, $matches );
          $tag = $matches[0];
        ?>

      <div class="part-container single_post_content pl-10 pr-10">
          <?php 
            $intro_end_position = strpos($content, '<h1') ? strpos($content, '<h1') : strpos($content, '<h2'); 
            $intro = substr($content, 0, $intro_end_position);
            echo $intro;
          ?>
      </div>
      <?php if(count($tag) > 0): ?>
      <div class='table_of_contents-wrapper'>
        <div class="table_of_contents pl-10 pr-10">
        <div class='table_of_contents-heading'>
          <h3>Table of Contents</h3>
          <i class="button_expand-content fa fa-plus fa-lg" aria-hidden="true"></i>
        </div>
        <ul class='table_of_contents-body'>
        <?php 
          $index = 0;
          foreach($tag as $heading):
            //$heading_dashed = strtolower(str_replace(" ", "-", strip_tags( $heading )));
            if(substr($heading, 0, 3) == "<h3") echo "<li><a href=#" . $index . " class='content_link subchapter_heading'><i class='fa fa-angle-double-right' aria-hidden='true'></i><i class='fa fa-angle-double-right' aria-hidden='true'></i></i>&nbsp;". strip_tags( $heading ) . "</a></li>";
            else if(substr($heading, 0, 3) == "<h1") echo "<li><a href=#" . $index . " class='content_link h1_chapter_heading'><i class='fa fa-angle-double-right'></i>&nbsp;". strip_tags( $heading ) . "</a></li>";
            else echo "<li><a href=#" . $index . " class='content_link chapter_heading'><i class='fa fa-angle-double-right'></i>&nbsp;". strip_tags( $heading ) . "</a></li>";
            $data_title = strip_tags(str_replace(" ", "-", strtolower($heading)));
            $labeled_heading = "<span class='labeled_heading' id='" . $index . "' data-title='" . $data_title . "'>" . $heading . "</span>";
            $content = str_replace($heading, $labeled_heading, $content);
            
            $index++;
          endforeach;
        ?>
        </ul>
      </div> 
      </div>
      <?php endif; ?> 
      <div class="part-container single_post_content pl-10 pr-10">
        <?php
          //$intro_end_position = strpos($content, '<h1') ? strpos($content, '<h1') : strpos($content, '<h2');
          $intro_end_position = strpos($content, "<span class='labeled_heading' id=");
          echo substr($content, $intro_end_position);
        ?>
      </div>
      <?php 
        $author_id = get_post()->post_author;
        $author_field = get_the_author_meta( 'last_name', $author_id );
      ?>
      <div class='part-container'>
        <?php 
          $category_id = get_the_category()[0]->term_id;
          $args = array('post_type' => 'post', 'orderby' => 'publish_date', 'order' => 'DESC', 'cat' => $category_id );
          $loop = new WP_Query( $args );

          $current_post = clone get_post();       
          
          if($loop->post_count > 1): ?> 
            <h3 class="heading-12">Related Posts</h3>
          <?php endif; ?> 
        
        <div class='related_posts'>
        <?php 
          $i = 0;
          while( $loop->have_posts() && $i < 3 ):
            $loop->the_post();
            if($current_post->ID == get_post()->ID) continue;
            ?>
            <div class="archive-post-card p-10">
              <a href='<?php echo get_permalink(); ?>' ><img class='link-image card-image' src=<?php echo get_field('featured_image')  ?> alt="Featured image" />
              <h4 class="link-heading"><?php the_title() ?></h4></a>
              <hr>
              <p><?php the_excerpt() ?></p>
              <a href=<?php the_permalink() ?> class="link-read-more">Read more &gt;</a>
            </div>
          <?php 
              $i++;
            endwhile;
          
            if( $i < 3 ){
              $tags = get_the_tags( get_post()->ID);

              function extract_id($term){
                return $term->term_id;
              }

              $tags ? $tag_ids = array_map('extract_id', $tags) : '';
              $args = array('post_type' => 'post', 'orderby' => 'publish_date', 'order' => 'DESC', 'cat' => -$category_id, 'tag__in' => $tag_ids );
              $loop = new WP_Query( $args );

              while( $loop->have_posts() && $i < 3 ):
                $loop->the_post();
                if($current_post->ID == get_post()->ID) continue;
                ?>
                <div class="archive-post-card p-10">
                  <a href='<?php echo get_permalink(); ?>' ><img class='link-image card-image' src=<?php echo get_field('featured_image')  ?> alt="Featured image" />
                  <h4 class="link-heading"><?php the_title() ?></h4></a>
                  <hr>
                  <p><?php the_excerpt() ?></p>
                  <a href=<?php the_permalink() ?> class="link-read-more">Read more &gt;</a>
                </div>
              <?php 
                  $i++;
                endwhile;
            }
          ?>
      </div>
          </div>
      <div class="div-block-22 post_author_section">
        <h3 class="heading-22">ABOUT THE AUTHOR</h3>
        <div class="html-embed-3 w-embed">
          <hr>
        </div>
        <div class="columns-12 w-row">
          <div class="column-12 w-col w-col-3 author-image_box">
            <?php echo get_avatar($author_id, 180); ?>
            <strong class='author_social_media-title'>Author on social media:</strong>
            <div class='author_social_media'>
              <a href='<?php echo get_the_author_meta( 'facebook', $author_id ) ?>'> <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
              <a href='<?php echo get_the_author_meta( 'instagram', $author_id ) ?>'><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
              <a href='<?php echo get_the_author_meta( 'linkedin', $author_id ) ?>'><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="w-col w-col-9">
            <a class='author_name_link' href='<?php echo get_site_url() ?>/author/<?php echo get_the_author_meta( 'user_nicename', $author_id ); ?>'><h4 class="heading-39"><?php echo get_the_author_meta( 'first_name', $author_id ) . " " . get_the_author_meta( 'last_name', $author_id );  ?></h4></a>
            <p class="paragraph-9"><?php echo get_the_author_meta( 'description', $author_id ); ?></p>
            <a href='<?php echo get_site_url() ?>/author/<?php echo get_the_author_meta( 'user_nicename', $author_id ); ?>' class="link-read-more author-card">Read more from this author &gt;</a>
          </div>
        </div>
      </div>
      <?php
        //Get post comments
        $comments = get_approved_comments( $current_post->ID );
        $sorted_comments = array();
        //Sort post comments
        $comments_count = count( $comments );
        $current_parent_ID = 0;
        $last_transfered_ID = -1;
        
        while( count( $comments ) != 0 || count( $sorted_comments ) != $comments_count ){
            for($i = 0; $i < count( $comments ); $i++ ){
                if( $comments[$i]->comment_parent == $current_parent_ID ){
                    //Copy comment from default to sorted array
                    array_push( $sorted_comments, $comments[$i] );
                    
                    //Update last transfered ID to ID of current comment
                    $last_transfered_ID = $comments[$i]->comment_ID;
                    
                    //Update current parent ID
                    $current_parent_ID = $comments[$i]->comment_ID;
                }else if( $comments[$i]->comment_ID == $last_transfered_ID ){
                    //Update last transfered ID to the ID of current comment parent
                    $last_transfered_ID = $comments[$i]->comment_parent;
                    
                    //Update current parent ID to the ID of comment parent
                    $current_parent_ID = $comments[$i]->comment_parent;
                    
                    //Remove last transfered comment from default array
                    array_splice($comments, $i, 1);
                    
                    $i--;
                } 
            }
        }
      ?>
      <div id="comment-section" class="part-container">
      <h3 class="heading-12">Write Comment</h3>
        <div class="form-block-4 w-form">
          <form id="comment-form" name="email-form-2" data-name="Email Form 2" class="form-3" method="GET" action="<?php echo get_site_url() ?>/wp-json/vnc/v1/create-comment">
            <input type="hidden" name="comment_post_ID" value=<?php echo $current_post->ID ?> >
            <label for="name-3">Nickname</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="comment_author" data-name="Name 3" placeholder="Name or nickname" id="name-3">
            <label for="email-3">Email Address</label>
            <input type="email" class="text-field-5 w-input" maxlength="256" name="comment_author_email" data-name="Email 3" placeholder="Email" id="email-3" required="">
            <label for="comment_parent">Reply to</label>
            <select id="comment_parent" name="comment_parent">
                <option value="0">None</option>
                <?php 
                    foreach( $sorted_comments as $comment ): 
                        $comment_excerpt = substr($comment->comment_author . ", at " . $comment->comment_date . ": " . $comment->comment_content, 0, 150);
                ?>
                    <option value="<?php echo $comment->comment_ID ?>"><?php echo $comment_excerpt;?></option>
                <?php 
                    endforeach; 
                ?>
            </select>
            <label for="name-3">Comment</label>
            <textarea data-name="Field" maxlength="5000" id="comment_content" name="comment_content" required="" placeholder="Comment" class="textarea w-input"></textarea>
            <div class="form-footer">
                <a href="#" class="link-btn w-inline-block comment-form-submit g-recaptcha" data-sitekey="your_site_key">
                  <div class="text-button">Send</div>
                </a>
            </div>
          </form>
          <div class="success-message-3 w-form-done comment-form-success">
            <div>Thank you! Your comment has been sent!</div>
          </div>
          <div class="error-message-3 w-form-fail comment-form-fail">
            <div>Oops! Something went wrong while submitting the comment.</div>
          </div>
        </div>
      </div>
      <div class="html-embed-5 w-embed">
        <hr>
      </div>
      <h3 class="heading-12"><?php if( $comments ) echo count( $comments ) . " comments"; else echo "No comments so far" ?></h3>
      <?php
        $current_comment = null;
        foreach( $sorted_comments as $comment ): ?>
            <div class="part-container <?php if( $comment->comment_parent != 0 ) echo 'comment-reply'; ?>">
            <div class="no-mp w-row comment_box">
              <div class="p-10 w-col comment_col w-col-3 comment-reply-avatar-box">
                <?php echo get_avatar( $comment->comment_author_email, 100); ?>
              </div>
              <div class="p-10 w-col comment_col w-col-9">
                <h4 class="align-left link-heading comment_author"><?php echo $comment->comment_author ?>, at <?php echo $comment->comment_date; ?></h4>
                <p class="paragraph-16"><?php echo $comment->comment_content; ?> </p>
              </div>
              <div class="reply-button-wrapper-extern">
                <a class="link-btn w-inline-block reply-button-wrapper" href="#comment-section" data-id="<?php echo $comment->comment_ID ?>" style="opacity: 1;">
                    <span class="text-button reply-button">REPLY</span>
                </a>
              </div>
            </div>
          </div>
          <hr>
        <?php        
        endforeach;        
      ?>     
    </div>
  </div>
  <div data-w-id="eb73c041-6ea5-c96a-d171-564be81b92c3" class="div-to-top">
    <div class="icon-to-top w-embed"><a href="#page-top"><i class="fa fa-chevron-circle-up fa-4x button-to-top" aria-hidden="true"></i></a></div>
  </div>
  <?php get_footer() ?>