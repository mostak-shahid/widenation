<?php 
global $widenation_options;
$class = $widenation_options['sections-content-class'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_blank', $page_details ); 
?>
<section id="page" class="page-content <?php if(@$widenation_options['sections-content-background-type'] == 1) echo @$widenation_options['sections-content-background'] . ' ';?><?php if(@$widenation_options['sections-content-color-type'] == 1) echo @$widenation_options['sections-content-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
					<?php if ( have_posts() ) :?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'page' ) ?>
						<?php endwhile;?>	
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif;?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_blank', $page_details  ); ?>