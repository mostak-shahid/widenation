<?php 
global $widenation_options;
$class = $widenation_options['sections-onsale-class'];
$title = $widenation_options['sections-onsale-title'];
$content = $widenation_options['sections-onsale-content'];
$slides = $widenation_options['sections-onsale-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_onsale', $page_details ); 
?>
<section id="section-onsale" class="<?php if(@$widenation_options['sections-onsale-background-type'] == 1) echo @$widenation_options['sections-onsale-background'] . ' ';?><?php if(@$widenation_options['sections-onsale-color-type'] == 1) echo @$widenation_options['sections-onsale-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-10">

						<?php do_action( 'action_before_onsale', $page_details );  ?>
						<?php if ($title) : ?>				
							<div class="title-wrapper wow fadeInDown">
								<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
							</div>
						<?php endif; ?>
						<?php if ($content) : ?>				
							<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
						<?php endif; ?>
						<?php if (@$slides) : ?>				
							<?php $delay = 500; ?>
							<div class="row">
								<?php foreach ($slides as $slide) : ?>
									<div class="col-lg-3 col-md-6 wow fadeInDown" data-wow-delay="<?php echo $delay ?>ms">
										<div class="unit p-20 h-100 w-100 position-relative bg-white text-center">
										<?php if ($slide['attachment_id']) : ?>
											<div class="img-part"><img class="img-responsive img-fluid img-onsale" src="<?php echo aq_resize(wp_get_attachment_url( $slide['attachment_id'] ), 325, 260, true) ?>" alt="<?php echo strip_tags($slide['title']) ?>" width="<?php echo $slide['width']?>" height="<?php echo $slide['height'] ?>"></div>
										<?php endif; ?>
											<div class="text-part d-block d-md-table w-100 mt-3">
												<div class="name d-block d-md-table-cell text-md-left"><strong><?php echo do_shortcode( $slide['title'] ); ?></strong></div>
												<div class="price d-block d-md-table-cell text-md-right"><?php echo do_shortcode( $slide['link_title'] ); ?></div>
											</div>
										<?php if($slide['link_url']) : ?>
											<a href="<?php echo esc_url( do_shortcode( $slide['link_url'] ) ); ?>" class="hidden-link">Read More</a>
										<?php endif; ?>
										</div>
									</div>
									<?php $delay = $delay + 200; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>							

				<?php do_action( 'action_after_onsale', $page_details ); ?>
				</div>
			</div>
		</div>


	</div>
</section>
<?php do_action( 'action_below_onsale', $page_details  ); ?>