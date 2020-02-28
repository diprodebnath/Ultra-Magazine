

<?php
	if(is_author()){
 	//*    Add widget support for homepage if widgets are being used
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_action( 'genesis_loop', 'entrenamiento_author_loop' );
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

	function entrenamiento_author_loop() {

			?>

		<div class="container">
		<div class="row author-header-inner">


				<div class="author-header-image-wrapper col-md-2">
					<div class="author-header-image-container">
					<?php
						echo  get_avatar(get_the_author_meta("ID"),200, ' ','' ,  ['class'=> 'img-fluid']);
						?>
					</div>
				</div>
				<div class="author-header-title-wrapper col">
					<div class="author-header-title ">
						<h1 class="author-header-name">
						 <?php echo get_the_author_meta("display_name");?>
						</h1>
					</div>
					<div class="author-header-content">
						<p class="author-header-subhead">
						 <?php  echo get_the_author_meta("description");?>
						</p>
					</div>
					<div class="author-header-shares"></div>
				</div>

		</div>
		</div>
		</div>


			<?php


			$single_author = get_queried_object();
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'post',
				'author_name' => $single_author->display_name,
				'paged'        => $paged
			);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {


				?>
				<div class="main-sec">
					<div class="container" >
				<?php
				do_action( 'genesis_before_while' );

				while ( $query->have_posts() ) {

					$query->the_post();
					  $link="<a href='";
	                  $link.= get_the_permalink();
	                  $link.= "'>";

					do_action( 'genesis_before_entry' );


						?>

						<div class="row main-articles article-feed">
          					<div class="col-md-12 ">
          					<article <?php echo post_class();?> itemscope itemtype="https://schema.org/CreativeWork">
					              <div class="row">
					                <div class="col-md-6">
					                  <p class="meta-data">
					                    <span class="date"><?php echo get_the_date();?></span>,
					                    <span class="cat"><?php the_category(  ','   );?></span>
					                  </p>
					                  <h2 class="art-title" itemprop="headline">

					                  <?php the_title( $link, '</a>' );?>
										</h2>
					                  <p class="art-excerpt" itemprop="text">

										<?php
										$excerpt =  get_the_excerpt();
										echo $excerpt;?>
					              </p>
					                </div>
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
					do_action( 'genesis_after_entry' );

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
				do_action( 'genesis_after_endwhile' );
			} else { // If no posts exist.

				/**
				 * Fires inside the standard loop when they are no posts to show.
				 *
				 * @since 1.0.0
				 */
				do_action( 'genesis_loop_else' );

			} // End loop.
		}


	}




	//* Run the Genesis loop
	genesis();