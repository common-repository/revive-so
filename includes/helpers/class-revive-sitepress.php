<?php
/**
 * The Sitepress helpers.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * Sitepress class.
 */
class REVIVESO_Sitepress {

	/**
	 * Has filter removed.
	 *
	 * @var boolean
	 */
	private $has_get_category = false;

	/**
	 * Has filter removed.
	 *
	 * @var boolean
	 */
	private $has_get_term = false;

	/**
	 * Has filter removed.
	 *
	 * @var boolean
	 */
	private $has_terms_clauses = false;

	/**
	 * Has filter removed.
	 *
	 * @var boolean
	 */
	private $has_get_terms_args = false;

	/**
	 * Has home_url filter removed.
	 *
	 * @var boolean
	 */
	private $has_home_url = false;

	/**
	 * Is global language modified
	 *
	 * @var boolean
	 */
	private $current_lang = false;

	/**
	 * Main instance
	 *
	 * Ensure only one instance is loaded or can be loaded.
	 *
	 * @return REVIVESO_Sitepress
	 */
	public static function get() {
		static $instance;

		if ( is_null( $instance ) && ! ( $instance instanceof REVIVESO_Sitepress ) ) {
			$instance = new REVIVESO_Sitepress();
		}

		return $instance;
	}

	/**
	 * Remove term filters.
	 */
	public function remove_term_filters() {
		if ( ! $this->is_active() ) {
			return;
		}

		$sitepress = $this->get_var();

		$this->has_get_category   = remove_filter( 'category_link', array( $sitepress, 'category_link_adjust_id' ), 1 );
		$this->has_get_term       = remove_filter( 'get_term', array( $sitepress, 'get_term_adjust_id' ), 1 );
		$this->has_terms_clauses  = remove_filter( 'terms_clauses', array( $sitepress, 'terms_clauses' ) );
		$this->has_get_terms_args = remove_filter( 'get_terms_args', array( $sitepress, 'get_terms_args_filter' ) );
	}

	/**
	 * Restore term filters.
	 */
	public function restore_term_filters() {
		if ( ! $this->is_active() ) {
			return;
		}

		$sitepress = $this->get_var();

		if ( $this->has_get_category ) {
			$this->has_get_category = false;
			add_filter( 'category_link', array( $sitepress, 'category_link_adjust_id' ), 1, 1 );
		}

		if ( $this->has_get_term ) {
			$this->has_get_term = false;
			add_filter( 'get_term', array( $sitepress, 'get_term_adjust_id' ), 1, 1 );
		}

		if ( $this->has_terms_clauses ) {
			$this->has_terms_clauses = false;
			add_filter( 'terms_clauses', array( $sitepress, 'terms_clauses' ), 10, 3 );
		}

		if ( $this->has_get_terms_args ) {
			$this->has_get_terms_args = false;
			add_filter( 'get_terms_args', array( $sitepress, 'get_terms_args_filter' ), 10, 2 );
		}
	}

	/**
	 * Remove home_url filter.
	 */
	public function remove_home_url_filter() {
		if ( ! $this->is_active() ) {
			return;
		}

		global $wpml_url_filters;
		$this->has_home_url = remove_filter( 'home_url', array( $wpml_url_filters, 'home_url_filter' ), -10 );
	}

	/**
	 * Restore home_url filter.
	 */
	public function restore_home_url_filter() {
		if ( ! $this->is_active() ) {
			return;
		}

		if ( $this->has_home_url ) {
			global $wpml_url_filters;
			$this->has_home_url = false;
			add_filter( 'home_url', array( $wpml_url_filters, 'home_url_filter' ), -10, 4 );
		}
	}

	/**
	 * Is plugin active.
	 *
	 * @return boolean
	 */
	public function is_active() {
		return isset( $GLOBALS['sitepress'] );
	}

	/**
	 * Get sitepress global variable.
	 *
	 * @return object
	 */
	public function get_var() {
		return $GLOBALS['sitepress'];
	}

	/**
	 * Get WPML active languages.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @return  array Returns an array of active lanuages set in the WPML settings. NOTE: Though 'skip_missing' flag is set, WPML still returns all language codes, regardless if there are no posts using that translation on the website.
	 */
	public function get_languages() {
		$languages = array();
		if ( ! $this->is_active() ) {
			return $languages;
		}

		$active_languages = apply_filters( 'wpml_active_languages', null, array( 'skip_missing' => true ) );

		foreach ( $active_languages as $key => $value ) {
			$languages[] = array(
				'code'  => $key,
				'label' => $value['native_name'],
			);
		}

		return $languages;
	}
}