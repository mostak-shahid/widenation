<?php 
global $widenation_options;
$class = $widenation_options['sections-content-class'];
$from_theme_option = $widenation_options['general-page-sections'];
$from_page_option = get_post_meta( get_the_ID(), '_widenation_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
unset($sections['content']);
// var_dump($sections);
?><?php get_header() ?>
    <section id="page" class="page-content <?php if(@$widenation_options['sections-content-background-type'] == 1) echo @$widenation_options['sections-content-background'] . ' ';?><?php if(@$widenation_options['sections-content-color-type'] == 1) echo @$widenation_options['sections-content-color'];?> <?php echo $class ?>">
    	<div class="content-wrap">
 	    	<div class="container text-center">
	    		<h4 class="subtitle">OOOPPS.! THE PAGE YOU WERE LOOKING FOR, COULDN'T BE FOUND.</h4>
				<a href="<?php echo home_url(); ?>" class="btn btn-success">Back to Home</a>
	    	</div>   		
    	</div>
    </section><!--/#error-->
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>