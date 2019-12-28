<?php 
global $widenation_options;
$class = $widenation_options['sections-footer-class'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
?>
  <?php get_template_part( 'template-parts/section', 'widgets' ); ?>
  <footer id="footer" class="<?php if(@$widenation_options['sections-footer-background-type'] == 1) echo @$widenation_options['sections-footer-background'] . ' ';?><?php if(@$widenation_options['sections-footer-color-type'] == 1) echo @$widenation_options['sections-footer-color'];?> <?php echo $class ?>">
    <div class="content-wrap">
      <div class="container">
        <?php echo do_shortcode( $widenation_options['sections-footer-content'] ); ?>
      </div>
    </div>
  </footer>
<?php
if ($widenation_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
?>
<?php wp_footer(); ?> 
<?php if ($widenation_options['misc-settings-css']) : ?>
  <style>
    <?php echo $widenation_options['misc-settings-css'] ?>    
  </style>
<?php endif; ?>
<?php if ($widenation_options['misc-settings-js']) : ?>
  <script>
    <?php echo $widenation_options['misc-settings-js'] ?> 
  </script>
<?php endif; ?>
</body>
</html>