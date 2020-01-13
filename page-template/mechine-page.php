<?php /*Template Name: Mechine Page Template*/ ?>
<?php 
global $widenation_options;
$from_theme_option = $widenation_options['general-page-sections'];
$from_page_option = get_post_meta( get_the_ID(), '_widenation_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
?><?php get_header() ?>
<section id="mechine-page">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-lg-last">
					<?php $cat = get_post_meta( get_the_ID(), '_widenation_mechine_cat', true );?>
					<?php echo do_shortcode( "[mechine-list id='".$cat."']" ); ?>
				</div>
				<div class="col-lg-4 order-lg-first">
					<div class="woo-sidebar">
						<div id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
							<h3 class="widget-title">Categories</h3>
							<ul class="product-categories">
								<li class="cat-item cat-item-17 cat-parent">
									<a href="http://widenati.aiscript.net/product-category/clothing/">Clothing</a>
								</li>
							</ul>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>