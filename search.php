<?php
	if(is_search()){
		//*    Add widget support for homepage if widgets are being used
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'entrenamiento_search_loop' );
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );



		function entrenamiento_search_loop() {
			global $wp_query;

			?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="search-overlay-inner search-page">

							<form method="get" class="search-form search-overlay-form" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input type="text"
									   class="search-input"
									   name="s"
									   autocomplete="off"
									   id="s"
									   placeholder="<?php esc_attr_e( 'Buscar', 'entrenamiento' ); ?>"
									   value="<?php echo get_search_query();?>";
								/>
								<label for="s" class="search-label" ><?php _e( 'Introduce tu búsqueda', 'entrenamiento' ); ?></label>
							</form>
							<div class="search-header-resultsummary">
								<?php echo $wp_query->found_posts; ?>  results
							</div>
						</div>
					</div>

				</div>
			</div>
			<?php
			if ( have_posts() ) {


				?>
				<div class="main-sec">
					<div class="container" >
						<div class="row">
						<?php

							do_action( 'genesis_before_while' );

							while ( have_posts() ) {

								the_post();
								$link="<a href='";
								$link.= get_the_permalink();
								$link.= "'>";


								do_action( 'genesis_before_entry' );

									?>
									<div class="simple-item col-md-4 article">
										<article <?php echo post_class();?> itemscope itemtype="https://schema.org/CreativeWork">
										<a class="simple-item-image item-image" href="<?php echo the_permalink()?>">
											<div class="item-image-placeholder">
												<?php if(has_post_thumbnail()) {
													the_post_thumbnail(  'search-featured', array("class"=> "img-thumbnail") );
												}else{
													?>
													<img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/placeholder.png" class="img-thumbnail" alt="">
													<?php
												};?>
											</div>
										</a>
										<div class="simple-item-metadata">
											<?php $cat = get_the_category(); if($cat):?>
											<a class="item-parent-link simple-item-parent-link" href="<?php echo get_category_link($cat[0]->term_id) ;?>">
												<?php echo $cat[0]->name;?> -
											</a>
											<?php endif;?>
											<div class="simple-item-publish-date ">
												<?php echo get_the_date();?>
											</div>
										</div>

										<a class="simple-item-title item-title" href="<?php echo the_permalink()?>">
											<?php the_title();?>
										</a>
										<div class="simple-item-dek item-dek">
											<p>
												<?php
													$excerpt =  get_the_excerpt();
													echo $excerpt;?>
											</p>
										</div>
										</article>
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


						</div>
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

