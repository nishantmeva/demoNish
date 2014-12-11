<?php
/**
 * Template Name: Home Page Template
 */
get_header();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
function ssubChild(id,name,title)
{
	//alert(name);
	var ajaxurlsb = "<?php echo admin_url( 'admin-ajax.php' );?>"

	$.ajax({
		type: "POST",
		url: ajaxurlsb+'?action=ssChild_action',
		data: 'id='+id+'&name='+name+'&title='+title,
		success: function(data)    { // Get the result and asign to each cases
		$('#sub_subchild').html(data);  //output div ID (sendtxt)
		}
	});
}
$(document).ready(function(e) {
    $('.subList').click(function(e) {
        $('.subList').parent('li').removeClass('subActive');
		$(this).parent('li').addClass('subActive');
    });
});
</script>
<div class="pagecontent">
	<div class="sliderBlock">

  			<div class="large-12 medium-12 small-12 columns">
            	<div class="slider" >            	
                    <ul class="bxslider">
				<?php                    
                $args = array( 'post_type' => 'slider', 'posts_per_page' => -1);
                $loop = new WP_Query( $args );
                
                while ( $loop->have_posts() ) : $loop->the_post();
                
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($loop->post->ID) );
				if(!empty($feat_image))
				{
					$slideImg = '<img src="'.$feat_image.'" />';
				}else{
					$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches);
					  $first_img = $matches[1][0];
					
					  if(empty($first_img)){ //Defines a default image with 0 width
					  $slideImg = "<img src='".get_template_directory_uri()."/img/slide-2.jpg' />";
					  } else{
						$slideImg = "<img src='".$first_img."' />";
					  }
				}
                $content = substr(get_the_content(), 0, 150);
				$excerpt = get_the_excerpt();
                ?>
                
                 <li>
                    <?php echo $slideImg; ?>
                    <div class="slide-cont"><h2><?php the_title();?></h2>
                    	<p><?php echo $excerpt; ?> </p>                    
                    </div>
                 </li>
                
                <?php endwhile; ?>
                    </ul>
                </div>
            </div>

    </div>
    
    
  <div class="childPage-cont">
  <div class="large-12 medium-12 small-12 columns">
  <div class="childPage">
    <div class="large-3 medium-3 small-12 columns" style="padding-left:0;">
    	<div class="child-menu">
        <ul>
        <?php
		  if (have_posts()) : 
		while (have_posts()) : the_post(); 
		
	$pageChildren = get_pages( array( 'parent' => $post->ID,'child_of' => $post->ID, 'sort_column' => 'post_date','sort_order' => 'asc' ) );
	if ( $pageChildren ) {
	 //echo "<pre>"; print_r($pageChildren);
	foreach( $pageChildren as $page ) {		
		
		if ($page->post_title) // Check for empty page
		if($page->ID == 61)
		{
			$suclss = "class='subActive'";
		}else
		{
			$suclss = "";
		}
?>
		<li <?php echo $suclss;?>><a class="subList" id="<?php echo $page->post_name;?>" onclick="ssubChild('<?php echo $page->ID;?>','<?php echo $page->post_name;?>','<?php echo $page->post_title; ?>')"><?php echo $page->post_title; ?></a></li>
		
	<?php
	}	
}
	 endwhile; endif; ?>    
        </ul>
        </div>
    </div>
    
    <div id="sub_subchild">
    <?php
    $subChildren = get_pages( array( 'parent' => 61,'child_of' => 61, 'sort_column' => 'post_date','sort_order' => 'asc' ) );
	if ( $subChildren ) {
	 //echo "<pre>"; print_r($pageChildren);
	foreach( $subChildren as $pageS ) {		
		
		if ($pageS->post_title) // Check for empty page
?>
			<div class="large-3 medium-3 small-12 columns">
    	<div class="sub-child-block">
        	<?php echo get_the_post_thumbnail( $pageS->ID,'home_thumb'); ?>
            <h2 class="subchildTitle"><?php echo $pageS->post_title; ?></h2>
            <?php echo '<p class="subchildcontent">'.substr($pageS->post_excerpt, 0, 140).'</p>'; ?>
        </div>
    </div>	
	<?php
	}	
} ?>
    
 
    </div>
   </div> 
  </div>
  </div>
    
</div>

<?php get_footer(); ?>