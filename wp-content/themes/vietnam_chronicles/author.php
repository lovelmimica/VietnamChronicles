  <?php get_header() ?>
  <div class="container-main main-section">
    <div class="w-container">
      <div class="div-block-7">
        <img class='category_image' src='<?php echo get_template_directory_uri() . "/images/work_with_us.team.jpg" ?>' class="image">
        <h2 class="heading-blog">Posty by <?php echo get_the_author_meta( 'first_name' ) . " " . get_the_author_meta( 'last_name' );  ?></h2>
      </div>
      <p class="mds-plr-10"><?php echo category_description()?></p>
      <div class="html-embed-5 w-embed">
        <hr>
      </div>
      <?php 
        $args =array('post_type' => 'post', 'author' => get_the_author_meta( 'id' ), 'posts_per_page' => -1 );
        $loop = new WP_Query( $args );
        ?>
        <div class='postcard_grid'>
        <?php
        while( $loop->have_posts() ):
          $loop->the_post();
          ?>
          <div class="archive-post-card p-10">
            <a href=<?php the_permalink() ?>>
            <img class='link-image card-image' src=<?php echo get_field('featured_image') ?> />
            <h4 class="link-heading"><?php the_title() ?></h4></a>
            <hr>
            <p><?php echo get_the_excerpt() ?></p>
            <a href=<?php the_permalink() ?> class="link-read-more">Read more &gt;</a>
          </div>
        <?php         
        endwhile;
      ?>
      </div>
      </div>
    </div>
  </div>
  <?php get_footer() ?>
