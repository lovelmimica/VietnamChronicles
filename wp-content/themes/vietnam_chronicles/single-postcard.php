  <?php get_header() ?>
  <div class="container-5 w-container container-main main-section">
      <?php 
        $args =array('post_type' => 'postcard', 'posts_per_page' => -1);
        $loop = new WP_Query( $args );
        
        $currentPostcard = new stdClass;
        $currentPostcard->ID = get_the_ID();
        $currentPostcard->title = get_the_title();
        $currentPostcard->content = get_the_content();
        $currentPostcard->parts =  get_post_custom()['postcard_parts'][0];
        $currentPostcard->imgUrl = get_field('postcard-image');

        $first_link = null;
        $previous_link = null;
        $next_link = null;
        $last_link = null;
        $current_found = false;
        
        while( $loop->have_posts()){
            $loop->the_post();
            
            if( $first_link == null ) $first_link = get_permalink( $loop->post->ID );
            
            if($loop->post->ID == $currentPostcard->ID ){
                $current_found = true;
            }
            
            if( $current_found == false ){
                $previous_link = get_permalink( $loop->post->ID );
            }
            
            if( $current_found == true && $loop->post->ID != $currentPostcard->ID  && $next_link == null ){
                $next_link = get_permalink( $loop->post->ID ); 
            }
            
            $last_link = get_permalink( $loop->post->ID );
        }
        
        if( $next_link == null ) $next_link = $first_link;
        if( $previous_link == null) $previous_link = $last_link;
        
      ?>
      <h2 class="heading-41 page_title postcard-page__title">
          <a href='<?php echo $previous_link; ?>'><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
          <span><?php echo $currentPostcard->title ?></span>
          <a href='<?php echo $next_link; ?>'><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></h2></a>
      <img src=<?php echo $currentPostcard->imgUrl ?> />
      <p><?php echo $currentPostcard->content ?></p>
      <h5 class="heading-63">Pictures From Top Clockwise:</h5>
      <ol class="list-3">
        <?php 
          $partsArr = explode( '.', $currentPostcard->parts );
          foreach($partsArr as $part): 
            if(strlen($part) > 3) echo '<li>'. $part . '</li>';
          endforeach;
        ?>
      </ol>
    
  </div>
  <?php get_footer() ?>