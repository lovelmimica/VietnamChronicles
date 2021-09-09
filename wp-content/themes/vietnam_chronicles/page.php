<?php get_header() ?>
<div class="section-6 container-main main-section">
    <div class="container w-container">
        <div class='part-container page'>
            <h1 class="heading-71 mds-plr-10 centered page_title"><?php the_title(); ?></h1> 
            <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
    </div>
</div>
<?php get_footer() ?>