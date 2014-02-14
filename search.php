<?php get_header(); ?>

<?php $search_query = get_search_query(); ?>

<div class="row">
 	
 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
 
		<article class="page">
			<h2 class="text-center">Search Results</h2>
			<p class="intro text-center">You Searched for: "<?php echo $search_query; ?>"</p>
			
			<div class="search-form-wrap">
			<?php get_search_form(); ?>
			</div>
		</article>
		
		<section class="search-list">
		
			<?php if ( have_posts() ): ?>
			
			<div class="post-list">
				
						<?php while ( have_posts() ) : the_post();
						$date = get_the_date('l - jS F - Y');
						$intro = get_field('intro');
						 ?>	
					
						<article <?php post_class(); ?>>
							<a href="<?php esc_url( the_permalink() ); ?>" title="View <?php the_title_attribute(); ?> article" rel="bookmark">
								<h4><?php the_title(); ?></h4>
								
								<?php if ($post->post_type == 'post') { ?>
								<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><i class="fa fa-calendar"></i> <?php echo $date; ?></time>
								<?php } ?>
								
								<?php if (empty($intro)) { ?>
								<?php the_excerpt(); ?>
								<?php } else { ?>
								<p><?php echo $intro; ?></p>
								<?php } ?>
								
								
							</a>
						</article>
		
						<?php endwhile; ?>
						
				<div class="page-links">
					<?php wp_pagenavi(); ?>
				</div>					
			
			</div><!-- End List -->
			
			<?php else: ?>
			<h3 class="text-center">Sorry</h3>
			<p class="text-center">There are no search results for "<?php echo $search_query; ?>". Please try again.</p>
		
			<?php endif; ?>
		
		</section>
		
 	</div>
	
</div>

<?php get_footer(); ?>
