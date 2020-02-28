<?php
	if (is_category()) {
		//*    Add widget support for homepage if widgets are being used
		remove_action('genesis_loop', 'genesis_do_loop');
		add_action('genesis_loop', 'entrenamiento_cat_loop');
		add_filter('genesis_site_layout', '__genesis_return_full_width_content');


		function entrenamiento_cat_loop() {

			if ( get_theme_mod( 'entrenamiento_cat_background_image' ) ) {
				$cat_background = get_theme_mod( 'entrenamiento_cat_background_image' );
			}
			?>

			<div id="category-header"
			     style='background: url("<?php echo $cat_background; ?>")'>
				<h1 class="archive-title" style="text-transform: none;"><?php single_cat_title(); ?></h1>

			</div>
			<div class="container cat-description">
				<div class="row">
					<div class="page-header">
						<div class="taxonomy-description">
							<p>
								<?php echo category_description(); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<?php echo get_template_part('include/featured-post');?>
				</div>
			</div>


			<?php

			$category = get_queried_object();
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'post',
				'category_name' => $category->name,
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'featured_post',
						'compare' => 'NOT EXISTS'
					),
					array(
						'key' => 'featured_post',
						'value' => '1',
						'compare' => '!='
					),
				),
				'paged' => $paged
			);
			$cat_query = new WP_Query($args);

			if ($cat_query->have_posts()) {

?>
				<div class="main-sec">
					<div class="container">
				<?php
				do_action('genesis_before_while');

				while ($cat_query->have_posts()) {

					$cat_query->the_post();
					$link = "<a href='";
					$link .= get_the_permalink();
					$link .= "'>";

					do_action('genesis_before_entry');


					?>

					<div class="row main-articles article-feed">
						<div class="col-md-12 ">
							<article <?php echo post_class(); ?> itemscope itemtype="https://schema.org/CreativeWork">
								<div class="row">
									<header class="col-md-6">
										<p class="meta-data">
											<span class="cat"><?php echo $category->name; ?></span>
										</p>
										<h2 class="art-title" itemprop="headline">

											<?php the_title($link, '</a>'); ?>
										</h2>
										<p class="art-excerpt" itemprop="text">

											<?php
												$excerpt = get_the_excerpt();
												echo $excerpt; ?>
										</p>
									</header>
									<div class="col-md-6 order-first order-md-last">
										<a href="<?php the_permalink(); ?>">
											<div class="feature-img">
												<?php
													if (has_post_thumbnail()) {
														the_post_thumbnail('main-featured', array("class" => "img-fluid"));
													}
												?>
											</div>
										</a>
									</div>
								</div>
							</article>
						</div>
					</div>
					<?php

					/**
					 * Fires inside the standard loop, after the entry closing markup.
					 *
					 * @since 2.0.0
					 */
					do_action('genesis_after_entry');

				} // End of one post.

				/**
				 * Fires inside the standard loop, after the while() block.
				 *
				 * @since 1.0.0
				 */
				?>
				</div >
				</div>
				<?php
				do_action('genesis_after_endwhile');
			} else { // If no posts exist.

				/**
				 * Fires inside the standard loop when they are no posts to show.
				 *
				 * @since 1.0.0
				 */
				do_action('genesis_loop_else');

			} // End loop.
			wp_reset_postdata();
		}


	}


	//* Run the Genesis loop
	genesis();