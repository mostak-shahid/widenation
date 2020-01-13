<?php 
global $widenation_options;
$from_theme_option = $widenation_options['general-page-sections'];
$from_page_option = get_post_meta( get_the_ID(), '_widenation_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
unset($sections['content']);
?><?php get_header() ?>
<?php 
global $widenation_options;
$class = $widenation_options['sections-content-class'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_content', $page_details ); 
$machine_categories = mos_get_terms ("machine-category");
$current_term_id = get_queried_object_id();
?>
<section id="page-title" class="text-white ">
	<div class="content-wrap">
		<div class="container">
		<span class="heading"><?php single_term_title() ?></span>
		</div>
	</div>
</section>
<section id="page" class="page-content <?php if(@$widenation_options['sections-content-background-type'] == 1) echo @$widenation_options['sections-content-background'] . ' ';?><?php if(@$widenation_options['sections-content-color-type'] == 1) echo @$widenation_options['sections-content-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-<?php if (@$machine_categories) echo '8 order-lg-last'; else echo 12 ?>">
					<?php
					$args = array( 
						'post_type' => 'machine',
						'posts_per_page' => 10, 
						'tax_query' => array(
							array(
								'taxonomy' => 'machine-category',
								'field'    => 'term_id',
								'terms'    => $current_term_id,
							),
						),
						'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
					);
					$query = new WP_Query( $args );
					?>
					<?php if ( $query->have_posts() ) : ?>
						<div class="row">
						<?php while ( $query->have_posts() ) : $query->the_post();?>
							<div class="col-md-6 mb-4 wow fadeInDown" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">
								<div class="unit p-20 h-100 w-100 position-relative bg-white text-center">
								<?php if (has_post_thumbnail()) : ?>
									<div class="img-part"><img class="img-responsive img-fluid img-bselling" src="<?php echo aq_resize(get_the_post_thumbnail_url(),308,250,true); ?>" alt="<?php echo get_the_title() ?>" width="308" height="250"></div>
								<?php endif; ?>
									<div class="text-part d-block d-md-table w-100 mt-3">
										<div class="name d-block d-md-table-cell text-md-left"><strong><?php echo get_the_title() ?></strong></div>
									</div>
									<a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
								</div>
							</div>
						<?php endwhile; ?>
						</div>
						<?php wp_reset_postdata(); ?>
					    <div class="pagination-wrapper machine-pagination"> 
					        <nav class="navigation pagination" role="navigation">
					            <div class="nav-links"> 
					            <?php 
					            $big = 999999999; // need an unlikely integer
					            echo paginate_links( array(
					                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
					                'format' => '?paged=%#%',
					                'current' => max( 1, get_query_var('paged') ),
					                'total' => $query->max_num_pages,
					                'prev_text'          => __('Prev'),
					                'next_text'          => __('Next')
					            ) );
					            ?>
					            </div>
					        </nav>
					    </div>
					<?php endif; ?>
				</div>
			<?php if (@$machine_categories) :?>
				<div class="col-lg-4 order-lg-fast">
					<div class="woo-sidebar">
						<div id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
							<h3 class="widget-title">Categories</h3>
							<ul class="product-categories">
							<?php foreach($machine_categories as $machine_category) : ?>
								<li class="cat-item cat-item-<?php echo $machine_category['term_id'] ?> <?php if ($current_term_id == $machine_category['term_id']) echo 'current-cat' ?>">
									<a href="http://widenati.aiscript.net/machine-category/<?php echo $machine_category['slug'] ?>/"><?php echo $machine_category['name'] ?></a>
								</li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			<?php endif; ?>
			</div>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_content', $page_details  ); ?>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>