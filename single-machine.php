<?php 
global $widenation_options;
$from_theme_option = $widenation_options['archive-page-sections'];
$from_page_option = get_post_meta( get_the_ID(), '_widenation_page_section_layout', true );
$sections = ($from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
?><?php get_header() ?>
<section id="blogs" class="page-content <?php if(@$widenation_options['sections-content-background-type'] == 1) echo @$widenation_options['sections-content-background'];?>">
	<div class="content-wrap">
		<div class="container">

			<?php if ( have_posts() ) :?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
					<?php if (has_post_thumbnail()) : ?>
						<div class="col-lg-6">
							<img class="img-fluid img-mechine-single" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
						</div>
					<?php endif; ?>
						<div class="col-lg-<?php if (has_post_thumbnail()) echo 6; else echo 12 ?>">
							<div class="wrap">
								<h3 class="mechine-title"><?php echo get_the_title(); ?></h3>
								<div class="mechine-desc"><?php the_content(); ?></div>
								<a class="btn btn-info rounded-0" href="<?php echo home_url('/contact/'); ?>">Get a Quote</a>
							</div>
						</div>
					</div>
				<?php endwhile;?>	


			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;?>
			<div class="post-linking">
				<div class="row">
					<div class="col-md-6 text-left">								
						<?php previous_post_link("%link", "Prev") ; ?>
					</div>
					<div class="col-md-6 text-right">
						<?php next_post_link("%link", "Next"); ?>
					</div>						
				</div>
			</div>
			<?php // if (comments_open() || '0' != get_comments_number()) : comments_template(); endif;?>			

		</div>	
	</div>
</section>
<?php get_footer() ?>