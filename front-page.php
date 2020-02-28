<?php
	if (is_home()) {
		//*    Add widget support for homepage if widgets are being used
		remove_action('genesis_loop', 'genesis_do_loop');
		add_action('genesis_loop', 'entrenamiento_standard_loop');
		add_filter('genesis_site_layout', '__genesis_return_full_width_content');

		function entrenamiento_standard_loop() {


			?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php entrenamiento_front_page_1(); ?>
					</div>
				</div>
			</div>

			<div class="container-fluid mr-auto front_page_top">
				<div class="row">
					<div class="col-md-12 front_page_top-ad">
						<?php entrenamiento_front_page_ad_area(); ?>
					</div>
				</div>
			</div>
			<div class="main-sec">
				<div class="container">

					<?php

						if (have_posts()) {
							do_action('genesis_before_while');
							$numb = 1;
							while (have_posts()) {

								the_post();
								$link = "<a href='";
								$link .= get_the_permalink();
								$link .= "'>";

								do_action('genesis_before_entry');
								if ($numb == 1) {
									?>
									<div class="row big-article article-feed">
										<div class="col-md-8 ">
											<article <?php post_class("article"); ?> itemscope itemtype="https://schema.org/CreativeWork">
												<a href="<?php the_permalink(); ?>">
												<div class="feature-img">
													<?php
														if (has_post_thumbnail()) {
															the_post_thumbnail('big-featured', array("class" => "img-fluid"));
														}
													?>
												</div>
												</a>
												<p class="meta-data">
													<span class="cat"><?php the_category(','); ?></span>
												</p>
												<h2 class="art-title" itemprop="headline">

													<?php the_title($link, '</a>'); ?>
												</h2>

												<p class="art-excerpt" itemprop="text">

													<?php
														$excerpt = get_the_excerpt();
														echo $excerpt; ?>
												</p>
												<div class="byline " itemprop="author" itemscope="" itemtype="http://schema.org/Person">By
													<a class="byline-name"
													   href="<?php  echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))); ?>" rel="author"
													   itemprop="url">
															<span class="byline-name" rel="author" itemprop="name">
																<?php the_author(); ?>
															</span>
													</a>
												</div>
											</article>
										</div>
										<div class="col-md-4">
											<?php entrenamiento_front_page_side_ad_area(); ?>
										</div>
									</div>
									<?php
									$numb++;
								} else {
									?>
									<div class="row main-articles article-feed">
										<div class="col-md-12">
											<article <?php post_class("article"); ?> itemscope  itemtype="https://schema.org/CreativeWork">
												<div class="row">
													<div class="col-md-6">
														<p class="meta-data">

															<span class="cat"><?php the_category(','); ?></span>
														</p>
														<h2 class="art-title" itemprop="headline">

															<?php
																the_title($link, '</a>'); ?>
														</h2>
														<p class="art-excerpt" itemprop="text">

															<?php
																$excerpt = get_the_excerpt();
																echo $excerpt; ?>
														</p>
														<div class="byline " itemprop="author" itemscope="" itemtype="http://schema.org/Person">By
															<a class="byline-name"
															   href="<?php  echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))); ?>" rel="author"
															   itemprop="url">
															<span class="byline-name" rel="author" itemprop="name">
																<?php the_author(); ?>
															</span>
															</a>
														</div>
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
								}
								/**
								 * Fires inside the standard loop, after the entry closing markup.
								 *
								 * @since 2.0.0
								 */
								do_action('genesis_after_entry');

							} // End of one post.
							?>
							<div class="container">
								<div class="row">
									<div class="col-md-12 front-page-bottom-widget"  style="margin: 30px 0">
										<?php //entrenamiento_front_page_bottom_ad_area(); ?>
									</div>
								</div>
							</div>
							<?php
							/**
							 * Fires inside the standard loop, after the while() block.
							 *
							 * @since 1.0.0
							 */

							do_action('genesis_after_endwhile');
						} else { // If no posts exist.

							/**
							 * Fires inside the standard loop when they are no posts to show.
							 *
							 * @since 1.0.0
							 */
							do_action('genesis_loop_else');

						} // End loop.
					?>
				</div>
			</div>
			<?php
		}


	}


	//* Run the Genesis loop
	genesis();