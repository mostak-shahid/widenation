<?php 
global $widenation_options;
if (is_home()) $page_id = get_option( 'page_for_posts' );
else $page_id = get_the_ID();

$from_theme_option = $widenation_options['archive-page-sections'];
$from_page_option = get_post_meta( $page_id, '_widenation_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
?><?php get_header() ?>
<section id="archive" class="page-content <?php if(@$widenation_options['sections-content-background-type'] == 1) echo @$widenation_options['sections-content-background'] . ' ';?><?php if(@$widenation_options['sections-content-color-type'] == 1) echo @$widenation_options['sections-content-color'];?>">
	<div class="content-wrap">
		<div class="container">
			<?php if ( have_posts() ) :?>
				<div class="row blogs">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-lg-4 col-md-6 mb-4 wow fadeInDown">
				        	<div class="blog-unit w-100 h-100 position-relative">
				        	<?php if (has_post_thumbnail()) : ?>
				        		<div class="part-img mb-30">
				        			<img class="img-fluid img-blog" src="<?php echo aq_resize(get_the_post_thumbnail_url(),380,300,true) ?>" alt="<?php echo get_the_title(); ?>">
				        			<div class="date">
				        				<span class="number"><?php echo get_the_date('d') ?></span>
				        				<span class="text"><?php echo get_the_date('M') ?></span>
				        			</div>
				        		</div>
				        	<?php endif; ?>
				        		<div class="part-con">
				        			<h4 class="blog-title"><?php echo get_the_title(); ?></h4>
				        			<div class="blog-desc"><?php echo wp_trim_words( strip_shortcodes(get_the_content()), 10, '' ); ?></div>
				        			<div class="blog-meta">Post By: <?php echo get_the_author(); ?></div>
				        		</div>
				        		<a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
				        	</div>					
							<?php // get_template_part( 'content', get_post_format() ) ?>
						</div>
					<?php endwhile;?>						
				</div>
				<div class="pagination-wrapper">
				<?php
					the_posts_pagination( array(
						'show_all' => false,
						'screen_reader_text' => " ",
						'prev_text'          => 'Prev',
						'next_text'          => 'Next',
					) );
				?>
				</div>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;?>			
		</div>	
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>