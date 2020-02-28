<?php
	if (is_single()) {
		//*    Add widget support for homepage if widgets are being used
		remove_action('genesis_loop', 'genesis_do_loop');
		add_action('genesis_loop', 'entrenamiento_single_loop');
		function entrenamiento_single_loop() {


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
						<?php entrenamiento_single_page_main(); ?>
					</div>
				</div>
			</div>
			<?php
			if(genesis_site_layout() === 'full-width-content'){
				echo get_template_part('include/single-content');
			}else if (genesis_site_layout() === 'content-sidebar'){
				echo get_template_part('include/single-content-sidbar');
			}





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
				<?php
				if(genesis_site_layout() === 'full-width-content'):
					?>
					<div class="col-md-8 offset-md-2">
					<?php
						genesis_get_comments_template();
					?>
				</div>
					<?php elseif (genesis_site_layout() === 'content-sidebar'): ?>
					<div class="col-md-8 ">
						<?php
							genesis_get_comments_template();
						?>
					</div>
					<?php endif; ?>

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