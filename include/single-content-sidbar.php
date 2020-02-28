

<div class="main-sec">
	<div class="container">
		<?php
			the_post();
		?>
		<div class="row single-page-article">
			<div class="col-md-8">
				<article <?php echo post_class("article"); ?> itemscope itemtype="https://schema.org/CreativeWork">
					<header class="content-header standard-header">
						<h1 class="content-hed standard-hed">
							<?php the_title(); ?>
						</h1>
						<h2 class="content-dek standard-dek">
							<?php
								$excerpt = get_the_excerpt();
								echo $excerpt; ?>
						</h2>
						<div class="content-info standard-info">
							<div class="content-info-metadata">
								<div class="byline-with-image">
									<div class="content-info-byline-image">
										<?php
											echo get_avatar(get_the_author_meta("ID"), 200, ' ', '', ['class' => 'img-circle']);
										?>
									</div>
									<!-- shared/byline -->
									<div class="byline " itemprop="author" itemscope=""
										 itemtype="http://schema.org/Person">
										By
										<a class="byline-name"
										   href="<?php  echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))); ?>" rel="author"
										   itemprop="url">
															<span class="byline-name" rel="author" itemprop="name">
																<?php the_author(); ?>
															</span>
										</a>
									</div>
									<!-- / shared/byline -->
								</div>
								<div class="content-info-date" >
									<?php echo get_the_date(); ?>
								</div>
							</div>
							<?php
								prefix_entry();
							?>


						</div>


					</header>
					<div class="content-feature-img">
						<?php if(has_post_thumbnail()){
							the_post_thumbnail(  'post-thumbnail', array("class"=> "img-fluid") );
						}?>
					</div>
					<div class="single-page-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>

					<aside class="col-md-4 sidebar " itemscope itemtype="https://schema.org/WPSideBar">
						<div class="row">
							<div class="cold-md-12">
								<?php entrenamiento_single_page_side_1()?>
							</div>
							<div class="cold-md-12">
								<?php entrenamiento_single_page_side_2()?>
							</div>
							<div class="cold-md-12">
								<?php entrenamiento_single_page_side_3()?>
							</div>
							<div class="cold-md-12">
								<?php entrenamiento_single_page_side_4()?>
							</div>
							<div class="cold-md-12">
								<?php entrenamiento_single_page_side_5()?>
							</div>
							<div class="cold-md-12">
								<?php entrenamiento_single_page_side_6()?>
							</div>
						</div>
					</aside>

		</div>


	</div>
</div>