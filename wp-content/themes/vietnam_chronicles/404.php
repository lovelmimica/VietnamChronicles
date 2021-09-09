<?php
	get_header();
?>

<main class='container-main main-section' id="site-content" role="main">
	<div class="section-inner thin error404-content">
		<h1 class="page_title"><?php _e( 'Page Not Found'); ?></h1>
		<div class="intro-text"><p>Oops, I screwed up and you discovered my fatal flaw. 
			Well, we're not all perfect, but we try.  Can you try navigate from header navigation menu or maybe visit our 
			<a class='link_in_text' href="<?php echo get_site_url() ?>/">home page</a> to start fresh.</p>
		</div>
	</div>
</main>

<?php get_footer(); ?>
