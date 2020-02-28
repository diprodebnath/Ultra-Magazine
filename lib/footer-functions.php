<?php

	remove_action( 'genesis_footer', 'genesis_do_footer' );
	add_action( 'genesis_footer', 'entrenamiento_do_footer' );
	/**
	 * Echo the contents of the footer including processed shortcodes.
	 *
	 * Applies `genesis_footer_creds_text` and `genesis_footer_output` filters.
	 *
	 * @since 3.0.0 Removed `[footer_backtotop]` shortcode and `genesis_footer_backtotop_text` filter.
	 * @since 1.0.1
	 */
	function entrenamiento_do_footer() {
		$footer_credit ='';
		if ( get_theme_mod( 'entrenamiento_footer_credit_stngs' ) ) {
			$footer_credit = get_theme_mod( 'entrenamiento_footer_credit_stngs' );
		}
		$creds_text = <<<HTML
				Copyright © 2019 . <a class="footer-credit-link" href="//www.entrenamiento.com">$footer_credit</a>
HTML;

		/**
		 * Adjust footer credit text.
		 *
		 * @since 1.0.1
		 *
		 * @param string The credit text.
		 */
		$creds_text = apply_filters( 'genesis_footer_creds_text', $creds_text );

		$output = '<p>' . genesis_strip_p_tags( $creds_text ) . '</p>';

		/**
		 * Adjust full footer output.
		 *
		 * @since 1.0.1
		 *
		 * @param string The footer output.
		 * @param string Unused. Was $backtotop_text, maintained for backwards compatibility.
		 * @param string The credit text.
		 */
		$output = apply_filters( 'genesis_footer_output', $output, '', $creds_text );

		echo wp_kses_post( $output );

	}
