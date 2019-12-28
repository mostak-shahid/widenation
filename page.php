<?php 
global $widenation_options;
$from_theme_option = $widenation_options['general-page-sections'];
$from_page_option = get_post_meta( get_the_ID(), '_widenation_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
?><?php get_header() ?>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>