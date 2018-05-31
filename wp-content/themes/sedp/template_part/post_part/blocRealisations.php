<!--*******************************     PROJETS   -->
<?php 
$metierTags = get_tags(); 
$tag_id 	= 0;
$tag_ids 	= array();
$args1 		= array( 'post_type' => 'projets', 'posts_per_page' => 3, 'orderby' => 'rand', 'post_status' => 'publish' );
$name 		= get_the_title(); 
$name 		= trim(strtolower($name)); 
$name 		= strtolower(str_replace('&rsquo;', '\'', $name));
foreach ($metierTags as $metierTag):
	$metierName =  strtolower(trim($metierTag->name));  


	if (  $name == $metierName ){ 
		// echo "<br>";
		// echo $name;
		// echo "<br>";
		// echo $metierName;
		// echo "<br>";
		$tag_id = $metierTag->term_id;
		array_push($tag_ids, $metierTag->term_id);
		$args1['meta_key']  	= 'metierPrincipal';
		$args1['meta_value'] 	= $tag_id;
		break;

	} 

endforeach; 


$query1 = new WP_Query($args1);
$total = $query1->post_count;

$i = 0;
if ($total == 0 ) $i = 3;
else if ($total == 1 ) $i = 2;
else if ($total == 2 ) $i = 1;

$featured_ids = wp_list_pluck( $query1->posts, 'ID' );
$args2 		= array( 
	'post_type' => 'projets', 
	'orderby' => 'rand', 
	'post_status' => 'publish',
	'tag__in' => $tag_ids,
	'posts_per_page' => $i,
	'post__not_in'   => $featured_ids 
	);
$query = new WP_Query();

if ($total < 3 ){
	$query2 = new WP_Query($args2);
	$query->posts = array_merge($query1->posts,$query2->posts);
	$query->post_count = $query1->post_count + $query2->post_count;
}else{
	$query = $query1;
}

?>

<section class="projets">

	<div class="row">
		<div class="columns medium-12">
			<div class="section_title">
				<img src="<?php bloginfo('template_directory');?>/images/icons/title_ico_arrow.png" >
				Nos références
			</div>
		</div>
	</div>

	<div class="row">
		<div class="columns medium-12">
			<?php if ($query): $i=0; ?>
				<div id="page_slider_projets" class="slider_projets">

					<?php while($query->have_posts()) : $query->the_post(); ?>

						<div class="item single_projet <?php echo ($i % 2 == 0 ) ? 'black' : 'red' ;  ?> ">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('full' , array( 'class' => 'lazyOwl' )); ?>
							</a>
							<div class="sous">
								<?php 
								$metierTags = get_the_tags(); 
								if ( isset($query->post->metierPrincipal) && $query->post->metierPrincipal != 0 ){ 
									foreach ($metierTags as $metierTag){

										if ( $query->post->metierPrincipal == $metierTag->term_id ) {	
											$posttags = $metierTag;
											break;
										}
									}
								}else{	
									$posttags = $metierTags[0] ; 
								}  
								?>

								<a href="<?php bloginfo('url');?>/nos_references/<?php echo $posttags->term_id ?>">
									<div class="titre"><?php echo $posttags->name ?><span class="underline"></span> </div>
								</a>
								<a href="<?php the_permalink(); ?>">
									<div class="description"><?php the_title();?></div>
								</a>
							</div>
						</div>

						<?php $i++; endwhile; ?>

					</div>
				<?php endif ?>
			</div>
		</div>

		<div class="row">
			<div class="columns medium-12">
				<div class="tout"><a href="<?php echo get_permalink('46'); ?>">Toutes nos références<span class="ico_arrow_right"></span></a></div>
			</div> 
		</div>
	</section>		
<!--*******************************     END PROJETS   -->