<?php 
global $widenation_options;
$class = $widenation_options['sections-map-class'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_map', $page_details ); 
?>
<section id="section-map" class="<?php if(@$widenation_options['sections-map-background-type'] == 1) echo @$widenation_options['sections-map-background'] . ' ';?><?php if(@$widenation_options['sections-map-color-type'] == 1) echo @$widenation_options['sections-map-color'];?> <?php echo $class ?>">
	<div class="content-wrap">

		<?php do_action( 'action_before_map', $page_details );  ?>
				<?php if($widenation_options['contact-address'][0]['embeded_link']) : ?>
					<div class="embed-responsive embed-responsive-300">
					<iframe class="embed-responsive-item" src="<?php echo $widenation_options['contact-address'][0]['embeded_link'] ?>"></iframe>
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_map', $page_details ); ?>

	</div>
</section>
<?php do_action( 'action_below_map', $page_details  ); ?>