<?php 
global $widenation_options;
$class = $widenation_options['sections-contact-class'];
$title = $widenation_options['sections-contact-title'];
$content = $widenation_options['sections-contact-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_contact', $page_details ); 
?>
<section id="section-contact" class="<?php if(@$widenation_options['sections-contact-background-type'] == 1) echo @$widenation_options['sections-contact-background'] . ' ';?><?php if(@$widenation_options['sections-contact-color-type'] == 1) echo @$widenation_options['sections-contact-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
			<?php do_action( 'action_before_contact', $page_details );  ?>
			<div class="row">
				<div class="col-lg-6 mb-4 mb-lg-0 wow fadeInLeftBig">
					<div class="info-unit w-100 h-100">
						<h3 class="unit-title">Get in touch</h3>
						<div class="wrap">
							<h4>ADDRESS</h4>
							<?php echo do_shortcode( "[address index=1]" ); ?>
						</div>
						<div class="wrap">
							<h4>Opening Hours</h4>
							<?php echo do_shortcode( "[business-hour]" ); ?>
						</div>
						<div class="wrap">
							<h4>PHONE</h4>
							<div class="d-table w-100">
								<div class="d-table-cell text-left"><?php echo do_shortcode( "[phone index=2]" ); ?></div>
								<div class="d-table-cell text-right"><?php echo do_shortcode( "[phone index=3]" ); ?></div>
							</div>
						</div>
						<div class="wrap">
							<h4>MOBILE</h4>
							<div class="d-table w-100">
								<div class="d-table-cell text-left"><?php echo do_shortcode( "[phone index=1]" ); ?></div>
								<div class="d-table-cell text-right"><?php echo do_shortcode( "[phone index=4]" ); ?></div>
							</div>						
						</div>
					</div>
				</div>
				<div class="col-lg-6 wow fadeInRightBig">
					<div class="form-unit w-100 h-100">
						<h3 class="unit-title">Send us a message</h3>
						<?php echo do_shortcode( '[contact-form-7 id="190" title="Contact Form"]' ); ?>
					</div>					
				</div>
			</div>
			<?php do_action( 'action_after_contact', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_contact', $page_details  ); ?>