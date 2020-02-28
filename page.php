<?php
	if (is_page()) {
		//*    Add widget support for homepage if widgets are being used
		remove_action('genesis_loop', 'genesis_do_loop');
		add_action('genesis_loop', 'entrenamiento_page_loop');
		add_filter('genesis_site_layout', '__genesis_return_full_width_content');

		function entrenamiento_page_loop() {


			?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php entrenamiento_single_page_main(); ?>
					</div>
				</div>
			</div>
			<div class="main-sec">
				<div class="container">
					<?php
						the_post();
					?>
					<div class="row single-page-article">
						<div class="col-md-8">
							<article <?php echo post_class("article"); ?> itemscope
							                                              itemtype="https://schema.org/CreativeWork">
								<header class="content-header standard-header">
									<h1 class="content-hed standard-hed">
										<?php the_title(); ?>
									</h1>
									<h2 class="content-dek standard-dek">
										<?php the_excerpt() ?>
									</h2>
									<div class="content-info standard-info">
									</div>


								</header>
								<div class="content-feature-img">
									<?php if(has_post_thumbnail()){
										the_post_thumbnail(  'post-thumbnail', array("class"=> "img-fluid") );
									} ?>
								</div>
								<div class="single-page-content">
									<?php the_content(); ?>
								</div>
							</article>
						</div>
						<?php
							if (checkSiderBar()):
								?>
								<aside class="col-md-4 sidebar ">
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
							<?php
							endif;
						?>
					</div>


				</div>
			</div>

			<?php

			do_action('genesis_after_endwhile');


		}

	}


	add_action('genesis_after_endwhile', 'entrenamiento_comments');

	function entrenamiento_comments() {
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
						entrenamiento_single_page_width_1();
					?>
				</div>
				<div class="col-md-12">
					<?php
						genesis_get_comments_template();
					?>
				</div>
				<div class="col-md-12">
					<?php
						entrenamiento_single_page_width_2();
					?>
				</div>
				<div class="col-md-12">
					<?php
						entrenamiento_single_page_width_3();
					?>
				</div>
			</div>
		</div>
		<?php
	}

	//* Run the Genesis loop
	genesis();