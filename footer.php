<?php
/**
 * The template for displaying the footer
 * @subpackage demonish
 * @since demonish 1.1.0
 */
?>
</div> <!-- content Area-->
</div><!-- end main-wrapper -->

<!-- Footer -->
<div class="pagefooter">
<div class="foottop">
	<div class="row">
    <div class="large-3 medium-3 small-6 columns">
        <div class="block">
        	<h2>Latest News</h2>
            <?php dynamic_sidebar("news-sidebar");?>
        </div>
    </div>
    
    <div class="large-3 medium-3 small-6 columns">
        <div class="block">
        	<h2>Recent Projects</h2>
            <?php dynamic_sidebar("project-sidebar");?>
        </div>
    </div>
    
    <div class="large-3 medium-3 small-6 columns">
        <div class="block">
        	<h2>Stay In Touch</h2>
            <?php dynamic_sidebar("social-sidebar");?>
        </div>
    </div>
    <div class="large-3 medium-3 small-6 columns">
        <div class="block">
        	<h2>Security & Privacy</h2>
            <?php dynamic_sidebar("security-sidebar");?>
        </div>
    </div>
    </div>
</div>
  
  <div id="footer-Wrap" class="row">
  	<footer>    	
        <div class="large-8 medium-8 small-12 columns">
        	<div class="menunav">
            
        	<nav class="top-bar expanded" data-topbar role="navigation">
              <ul class="title-area">
                <li class="name"></li>
                 <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
              </ul>
            
              <section class="top-bar-section">               
                <?php
                    $defaults = array(
                    //'theme_location'  => 'primary',                    
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s left">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                    ?>
              </section>
            </nav>
            </div>
            <!-- end menunav-->
            
            <div class="copyright">
            <?php $copyright_text = ot_get_option( 'copyright_text' ); ?>
            <?php if (!empty($copyright_text)) {?>
            	<?php echo $copyright_text ;?>
            <?php } else { ?>
            	©2014 Demo Nish, All rights Reserved By Demo Nish
            <?php } ?>
            </div>
            
            
        </div>
        
        <div class="large-4 medium-4 small-12 columns">
        	<?php $footer_logo = ot_get_option( 'footer_logo' ); ?>
            <?php if (!empty($footer_logo)) {?>
            	<img class="flogo" src="<?php echo $footer_logo;?>" />
            <?php } else { ?>
        		<img class="flogo" src="<?php echo get_template_directory_uri();?>/img/footer-logo.png" />
            <?php } ?>
        </div>
    </footer>  	
    

</div>
</div><!-- end footer-wrapper -->
	<script src="<?php echo get_template_directory_uri();?>/js/vendor/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/foundation/foundation.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/foundation/foundation.topbar.js"></script>
    
    
    <!-- bxSlider Javascript file -->
    <script src="<?php echo get_template_directory_uri();?>/bxslider/jquery.bxslider.min.js"></script>
    
    <script>
    
    $(document).ready(function(){
        
      $(document).foundation(); 
        
      $('.bxslider').bxSlider({
          mode: 'vertical',
          slideMargin: 5
        });
    });
    </script>
	<?php wp_footer(); ?>
</body>
</html>