<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/riverswan/
 * @since      1.0.0
 *
 * @package    Mmb_Quiz
 * @subpackage Mmb_Quiz/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mmb_Quiz
 * @subpackage Mmb_Quiz/admin
 * @author     Paul Swan <designer.lebedev@gmail.com>
 */
class Mmb_Quiz_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mmb_Quiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mmb_Quiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mmb-quiz-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mmb_Quiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mmb_Quiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mmb-quiz-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function replace_default_menu( $args ) {

		if ( is_page( 'tests' ) || is_singular( 'quiz' ) || is_tax( 'quiz-taxonomy' ) ) {
			$args['menu'] = 'quiz menu';
		}
		return $args;
	}

	public function mmb_quiz_post_types() {

		$labels = array(
			'name'                  => _x( 'Quiz', 'Post type general name', MMB_QUIZ_TEXT_DOMAIN ),
			'singular_name'         => _x( 'Quiz Post', 'Post type singular name', MMB_QUIZ_TEXT_DOMAIN ),
			'menu_name'             => _x( 'Quiz', 'Admin Menu text', MMB_QUIZ_TEXT_DOMAIN ),
			'name_admin_bar'        => _x( 'Quiz', 'Add New on Toolbar', MMB_QUIZ_TEXT_DOMAIN ),
			'add_new'               => __( 'Add New', MMB_QUIZ_TEXT_DOMAIN ),
			'add_new_item'          => __( 'Add New Quiz Post', MMB_QUIZ_TEXT_DOMAIN ),
			'new_item'              => __( 'New Quiz Post', MMB_QUIZ_TEXT_DOMAIN ),
			'edit_item'             => __( 'Edit Quiz Post', MMB_QUIZ_TEXT_DOMAIN ),
			'view_item'             => __( 'View Quiz Post', MMB_QUIZ_TEXT_DOMAIN ),
			'all_items'             => __( 'All Quiz Posts', MMB_QUIZ_TEXT_DOMAIN ),
			'search_items'          => __( 'Search Quiz Post', MMB_QUIZ_TEXT_DOMAIN ),
			'parent_item_colon'     => __( 'Parent Quiz Post:', MMB_QUIZ_TEXT_DOMAIN ),
			'not_found'             => __( 'No quiz posts found.', MMB_QUIZ_TEXT_DOMAIN ),
			'not_found_in_trash'    => __( 'No quiz posts found in Trash.', MMB_QUIZ_TEXT_DOMAIN ),
			'featured_image'        => _x( 'Quiz Post Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'archives'              => _x( 'Quiz Posts archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'insert_into_item'      => _x( 'Insert into Quiz Post', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'uploaded_to_this_item' => _x( 'Uploaded to this quiz post', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'filter_items_list'     => _x( 'Filter Quiz Posts list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'items_list_navigation' => _x( 'Quiz Posts list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'items_list'            => _x( 'Quiz Posts list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'quiz',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'taxonomies'         => array( 'quiz-taxonomy' ),
			'menu_icon'          => 'dashicons-editor-ol',
		);

		register_post_type( 'quiz', $args );
	}

	public function mmb_quiz_taxonomy() {
		register_taxonomy(
			'quiz-taxonomy',
			array( 'quiz' ),
			array(
				'hierarchical'          => true,
				'labels'                => array(
					'name'                       => __( 'Quiz categories', MMB_QUIZ_TEXT_DOMAIN ),
					'singular_name'              => __( 'Категорія тестів ', MMB_QUIZ_TEXT_DOMAIN ),
					'search_items'               => __( 'Find Quiz Category', MMB_QUIZ_TEXT_DOMAIN ),
					'popular_items'              => __( 'Popular Quiz Categories', MMB_QUIZ_TEXT_DOMAIN ),
					'all_items'                  => __( 'All Quiz Categories', MMB_QUIZ_TEXT_DOMAIN ),
					'parent_item'                => null,
					'parent_item_colon'          => null,
					'edit_item'                  => __( 'Edit Quiz Categorie', MMB_QUIZ_TEXT_DOMAIN ),
					'update_item'                => __( 'Updated Quiz Categorie', MMB_QUIZ_TEXT_DOMAIN ),
					'add_new_item'               => __( 'Add new Quiz Categorie', MMB_QUIZ_TEXT_DOMAIN ),
					'new_item_name'              => __( 'New Quiz Category Name', MMB_QUIZ_TEXT_DOMAIN ),
					'separate_items_with_commas' => __( 'Separate by commas', MMB_QUIZ_TEXT_DOMAIN ),
					'add_or_remove_items'        => __( 'Add/Remove Quiz Categorie', MMB_QUIZ_TEXT_DOMAIN ),
					'choose_from_most_used'      => __( 'Choose most popular', MMB_QUIZ_TEXT_DOMAIN ),
					'menu_name'                  => __( 'Quiz Categories', MMB_QUIZ_TEXT_DOMAIN ),
				),
				'public'                => true,
				'show_in_nav_menus'     => true,
				'show_ui'               => true,
				'show_tagcloud'         => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var'             => true,
				'rewrite'               => array(
					'slug'         => 'tematika',
					'hierarchical' => false,
//					'slug'       => '/',
					'with_front' => false,

				),
			)
		);
	}

}
