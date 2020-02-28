<?php

	$category = get_queried_object();
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$featured_posts = new WP_Query(
		array(
			'meta_key' => 'featured_post',
			'meta_value' => '1',
			'category_name' => $category->name,
			'posts_per_page' => 5,
			'paged' => $paged
		)
	);
	$posts = array();
	if ($featured_posts->have_posts()) {
		$n = 0;
		while ($featured_posts->have_posts()) {
			$featured_posts->the_post();
			if($n == 0) {
				$posts[] = array(
					'title' => get_the_title(),
					'link' => get_the_permalink(),
					'thumbnail' => get_the_post_thumbnail(get_the_ID(), 'cat-big-featured', array('class' => 'img-fluid')),
					'cat' => $category->name,
					'excerpt' => get_the_excerpt()
				);
			} else{
				$posts[] = array(
					'title' => get_the_title(),
					'link' => get_the_permalink(),
					'thumbnail' => get_the_post_thumbnail(get_the_ID(), 'cat-item-featured', array('class' => 'img-fluid')),
					'cat' => $category->name,
					'excerpt' => get_the_excerpt()
				);
			}
			$n++;
		}
		wp_reset_query();
	}

	if ($featured_posts->post_count > 1):
		?>
		<div class="col-md-12 cat-featured-post">
			<div class="row">
				<div class="col-md-6 list-header-big-item">
					<a href="<?php echo $posts[0]['link']; ?>">
						<div class="feature-item-image-inner">
							<?php echo $posts[0]['thumbnail']; ?>
							<h1 class="feature-item-feed-title feed-title"><?php echo $posts[0]['cat']; ?> </h1>
						</div>
					</a>
					<a class="item-title" href="<?php echo $posts[0]['link']; ?>">
						<?php echo $posts[0]['title']; ?>
					</a>
				</div>
				<div class="col-md-6 list-header-simple-items">
					<div class="simple-item list-header-item list-header-small-item">
						<div class="row">
				<?php
					 $length = count($posts);

					for ($i = 1; $i < $length; $i++):
						?>

									<a class="col-md-6 item-image" href="<?php echo $posts[$i]['link']; ?>">
										<?php echo $posts[$i]['thumbnail']; ?>
									</a>
									<div class="col-md-6 list-header-small-item-wrap">
										<a class="simple-item-title" href="<?php echo $posts[$i]['link']; ?>">
											<?php echo $posts[$i]['title']; ?>
										</a>
										<div class="simple-item-dek item-dek">
											<?php echo $posts[$i]['excerpt']; ?>
										</div><!-- shared/byline -->
									</div>

					<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endif;

	?>