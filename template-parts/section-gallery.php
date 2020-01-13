<?php 
global $widenation_options;
$class = $widenation_options['sections-gallery-class'];
$title = $widenation_options['sections-gallery-title'];
$gallery = $widenation_options['sections-gallery-gallery'];
$content = $widenation_options['sections-gallery-content'];
$link = $widenation_options['sections-gallery-link'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_gallery', $page_details ); 
?>
<section id="section-gallery" class="<?php if(@$widenation_options['sections-gallery-background-type'] == 1) echo @$widenation_options['sections-gallery-background'] . ' ';?><?php if(@$widenation_options['sections-gallery-color-type'] == 1) echo @$widenation_options['sections-gallery-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_gallery', $page_details );  ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($link['text_field_1'] AND $link['text_field_2'] ) : ?>	
					<div class="text-right"><a class="btn btn-link btn-gallery" href="<?php echo esc_url( do_shortcode( $link['text_field_2'] ) ); ?>"><?php echo do_shortcode( $link['text_field_1'] ); ?></a></div>				
				<?php endif; ?>	
				<?php if (@$gallery) : ?>
					<?php $images = explode(',', $gallery); ?>
					<div class="row gallery-images wow fadeInUpBig">
						<?php foreach($images as $attachment_id) : ?>
							<div class="col-lg-4 col-md-6 mb-4 text-center">
								<a class="preview position-relative d-block" data-fancybox="gallery" data-caption="" href="<?php echo wp_get_attachment_url( $attachment_id ) ?>"><img class="img-fluid img-gallery" src="<?php echo aq_resize(wp_get_attachment_url( $attachment_id ),350,250,true) ?>" alt=""></a>		
							</div>
						<?php endforeach; ?>
					</div>					
				<?php endif; ?>
		<?php do_action( 'action_after_gallery', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_gallery', $page_details  ); ?>