<?php
	function entrenamiento_front_page_1() {
		if ( is_active_sidebar( 'front-page-1' ) ) {
			genesis_widget_area('front-page-1', array(
				'before' => '<div class="front-page-1-widget"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}
	function entrenamiento_front_page_ad_area() {
		if ( is_active_sidebar( 'front-page-2' ) ) {
			genesis_widget_area('front-page-2', array(
				'before' => '<div class="front-page-ad-area"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}
	function entrenamiento_front_page_side_ad_area() {
		if ( is_active_sidebar( 'front-page-3' ) ) {
			genesis_widget_area('front-page-3', array(
				'before' => '<div class="front-page-side-ad-area"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}
	function entrenamiento_front_page_bottom_ad_area() {
		if ( is_active_sidebar( 'front-page-4' ) ) {
			genesis_widget_area('front-page-4', array(
				'before' => '<div class="front-page-ad-area"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}


	function entrenamiento_single_page_main() {
		if ( is_active_sidebar( 'single-page-main' ) ) {
			genesis_widget_area('single-page-main', array(
				'before' => '<div class="single-page-main"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}

	function entrenamiento_single_page_side_1() {
		if ( is_active_sidebar( 'single-page-side-1' ) ) {
			genesis_widget_area('single-page-side-1', array(
				'before' => '<div class="single-page-side-1"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}

	function entrenamiento_single_page_side_2() {
		if ( is_active_sidebar( 'single-page-side-2' ) ) {
			genesis_widget_area('single-page-side-2', array(
				'before' => '<div class="single-page-side-2"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}

	function entrenamiento_single_page_side_3() {
		if ( is_active_sidebar( 'single-page-side-3' ) ) {
			genesis_widget_area('single-page-side-3', array(
				'before' => '<div class="single-page-side-3"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}

	function entrenamiento_single_page_side_4() {
		if ( is_active_sidebar( 'single-page-side-4' ) ) {
			genesis_widget_area('single-page-side-4', array(

				'before' => '<div class="single-page-side-4"><div class="wrap">',
				'after' => '</div></div>',
			));
		}


	}

	function entrenamiento_single_page_side_5() {
		if ( is_active_sidebar( 'single-page-side-5' ) ) {
			genesis_widget_area('single-page-side-5', array(
				'before' => '<div class="single-page-side-5"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}

	function entrenamiento_single_page_side_6() {
		if ( is_active_sidebar( 'single-page-side-6' ) ) {
			genesis_widget_area('single-page-side-6', array(
				'before' => '<div class="single-page-side-6"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}

	function entrenamiento_single_page_width_1() {
		if ( is_active_sidebar( 'single-page-width-1' ) ) {
			genesis_widget_area('single-page-width-1', array(
				'before' => '<div class="single-page-width-1"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}


	function entrenamiento_single_page_width_2() {
		if ( is_active_sidebar( 'single-page-width-2' ) ) {
			genesis_widget_area('single-page-width-2', array(
				'before' => '<div class="single-page-width-2"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}

	function entrenamiento_single_page_width_3() {
		if ( is_active_sidebar( 'single-page-width-3' ) ) {
			genesis_widget_area('single-page-width-3', array(
				'before' => '<div class="single-page-width-3"><div class="wrap">',
				'after' => '</div></div>',
			));
		}
	}



	function entrenamiento_register_widgets() {
		genesis_register_sidebar(array(
			'id' => 'front-page-1',
			'name' => __('Homepage Top Widget', 'entrenamiento'),
			'description' => __('This is a widget that goes on the front page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'front-page-2',
			'name' => __('Homepage Main ad Area', 'entrenamiento'),
			'description' => __('This is a widget that goes on the front page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'front-page-3',
			'name' => __('Homepage Side ad Area', 'entrenamiento'),
			'description' => __('This is a widget that goes on the front page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'front-page-4',
			'name' => __('Homepage Bottom ad Area', 'entrenamiento'),
			'description' => __('This is a widget that goes on the front page.', 'entrenamiento'),
		));


		genesis_register_sidebar(array(
			'id' => 'single-page-main',
			'name' => __('Single Page Top Widget', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-side-1',
			'name' => __('Single Page Side Widget 1', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-side-2',
			'name' => __('Single Page Side Widget 2', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-side-3',
			'name' => __('Single Page Side Widget 3', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-side-4',
			'name' => __('Single Page Side Widget 4', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-side-5',
			'name' => __('Single Page Side Widget 5', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-side-6',
			'name' => __('Single Page Side Widget 6', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-width-1',
			'name' => __('Single Page Full Width Widget 1', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-width-2',
			'name' => __('Single page full width Widget 2', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
		genesis_register_sidebar(array(
			'id' => 'single-page-width-3',
			'name' => __('Single Page Full Width Widget 3', 'entrenamiento'),
			'description' => __('This is a widget that goes on the single page.', 'entrenamiento'),
		));
	}

	entrenamiento_register_widgets();


	function checkSiderBar() {

		$sidebar_arr = array('single-page-side-1',
			'single-page-side-2',
			'single-page-side-3',
			'single-page-side-4',
			'single-page-side-5',
			'single-page-side-6');
		$checksidebar = false;
		foreach ($sidebar_arr as $value) {
			if ( is_active_sidebar(  $value ) ) {
				$checksidebar = true;
			}
		}
		return $checksidebar;
	}