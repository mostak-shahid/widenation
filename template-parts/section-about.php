<?php 
global $widenation_options;
$class = $widenation_options['sections-about-class'];
$title = $widenation_options['sections-about-title'];
$content = $widenation_options['sections-about-content'];
$media = $widenation_options['sections-about-media'];
$link = $widenation_options['sections-about-link'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_about', $page_details ); 
?>
<section id="section-about" class="<?php if(@$widenation_options['sections-about-background-type'] == 1) echo @$widenation_options['sections-about-background'] . ' ';?><?php if(@$widenation_options['sections-about-color-type'] == 1) echo @$widenation_options['sections-about-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
			<?php do_action( 'action_before_about', $page_details );  ?>
				<div class="row align-items-center">
				<?php if ($media) : ?>
					<div class="col-lg-6 mb-4 mb-lg-0 wow fadeInLeft">
						<img class="img-responsive img-fluid img-about" src="<?php echo wp_get_attachment_url( $media['id'] ) ?>" alt="<?php echo do_shortcode( $title ); ?>">
					</div>
				<?php endif ?> 
					<div class="col-lg-<?php if ($media) echo 6; else 12 ?>">
						<?php if ($title) : ?>				
							<div class="title-wrapper wow fadeInDown">
								<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
							</div>
						<?php endif; ?>
						<?php if ($content) : ?>				
							<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
						<?php endif; ?>	
						<?php if ($link['text_field_1'] AND $link['text_field_2'] ) : ?>				
							<a class="btn btn-about" href="<?php echo esc_url( do_shortcode( $link['text_field_2'] ) ); ?>"><?php echo do_shortcode( $link['text_field_1'] ); ?></a>
						<?php endif; ?>						
					</div>

				</div>
			<?php do_action( 'action_after_about', $page_details ); ?>	
		</div>
	</div>
</section>
<?php do_action( 'action_below_about', $page_details  ); ?>