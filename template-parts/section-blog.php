<?php 
global $widenation_options;
$class = $widenation_options['sections-blog-class'];
$title = $widenation_options['sections-blog-title'];
$content = $widenation_options['sections-blog-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_blog', $page_details ); 
?>
<section id="section-blog" class="<?php if(@$widenation_options['sections-blog-background-type'] == 1) echo @$widenation_options['sections-blog-background'] . ' ';?><?php if(@$widenation_options['sections-blog-color-type'] == 1) echo @$widenation_options['sections-blog-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<?php do_action( 'action_before_blog', $page_details );  ?>
							<?php if ($title) : ?>				
								<div class="title-wrapper wow fadeInDown">
									<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
								</div>
							<?php endif; ?>
							<?php if ($content) : ?>				
								<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
							<?php endif; ?>

							<?php
			 				$args = array(
			 					'post_type' => 'post',
			 					'posts_per_page' => 4,
			 				);
			 				?>
							<?php $the_query = new WP_Query( $args ); ?>
							<?php if ( $the_query->have_posts() ) : ?>
								<?php $delay = 500; ?>
							    <div class="row blogs">
							    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							        <div class="col-lg-3 col-md-6 mb-4 wow fadeInDown" data-wow-delay="<?php echo $delay ?>ms">
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
							        		<div class="part-con text-white">
							        			<h4 class="blog-title"><?php echo get_the_title(); ?></h4>
							        			<div class="blog-desc"><?php echo wp_trim_words( strip_shortcodes(get_the_content()), 10, '' ); ?></div>
							        			<div class="blog-meta">Post By: <?php echo get_the_author(); ?></div>
							        		</div>
							        		<a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
							        	</div>
							        	
							        </div>
							        <?php $delay = $delay + 200; ?>
							    <?php endwhile;?>
							    </div>
							<?php endif; ?>
							<?php wp_reset_postdata();?>
					<?php do_action( 'action_after_blog', $page_details ); ?>
				</div>
			</div>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_blog', $page_details  ); ?>