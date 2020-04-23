<?php

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
class Mmb_Quiz_Custom_Post {

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
		if ( is_singular( 'onlinetest' ) || is_tax( 'tematika' ) || is_post_type_archive( 'onlinetest' ) ) {
			$args['menu'] = 'quiz menu';
		}
		return $args;
	}

	public function mmb_quiz_post_types() {
		$labels = array(
			'name'                  => _x( 'Онлайн Тести', 'Post type general name', MMB_QUIZ_TEXT_DOMAIN ),
			'singular_name'         => _x( 'Онлайн Тест', 'Post type singular name', MMB_QUIZ_TEXT_DOMAIN ),
			'menu_name'             => _x( 'Тести', 'Admin Menu text', MMB_QUIZ_TEXT_DOMAIN ),
			'name_admin_bar'        => _x( 'Тести', 'Add New on Toolbar', MMB_QUIZ_TEXT_DOMAIN ),
			'add_new'               => __( 'Додати новий', MMB_QUIZ_TEXT_DOMAIN ),
			'add_new_item'          => __( 'Додати новий тест', MMB_QUIZ_TEXT_DOMAIN ),
			'new_item'              => __( 'Новий тест', MMB_QUIZ_TEXT_DOMAIN ),
			'edit_item'             => __( 'Редагувати тест', MMB_QUIZ_TEXT_DOMAIN ),
			'view_item'             => __( 'Переглянути всі', MMB_QUIZ_TEXT_DOMAIN ),
			'all_items'             => __( 'Всі тести', MMB_QUIZ_TEXT_DOMAIN ),
			'search_items'          => __( 'Знайти тест', MMB_QUIZ_TEXT_DOMAIN ),
			'parent_item_colon'     => __( 'Батьківський тест:', MMB_QUIZ_TEXT_DOMAIN ),
			'not_found'             => __( 'Тестів не знайдено', MMB_QUIZ_TEXT_DOMAIN ),
			'not_found_in_trash'    => __( 'Тестів в кошику не знайдено', MMB_QUIZ_TEXT_DOMAIN ),
			'featured_image'        => _x( 'Зображення тесту', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'set_featured_image'    => _x( 'Встановити зображення', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'remove_featured_image' => _x( 'Видалити зображення', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'use_featured_image'    => _x( 'Використати зображення', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', MMB_QUIZ_TEXT_DOMAIN ),
			'archives'              => _x( 'Тести', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'insert_into_item'      => _x( 'Вставити в тест', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'uploaded_to_this_item' => _x( 'Завантажено в цей тест', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'filter_items_list'     => _x( 'Фильтрація', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'items_list_navigation' => _x( 'Навігація', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
			'items_list'            => _x( 'Список тестів', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', MMB_QUIZ_TEXT_DOMAIN ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'onlinetest',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 4,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'taxonomies'         => array( 'tematika' ),
			'menu_icon'          => 'dashicons-editor-ol',
		);

		register_post_type( 'onlinetest', $args );
	}

	public function mmb_quiz_taxonomy() {
		register_taxonomy(
			'tematika',
			array( 'onlinetest' ),
			array(
				'hierarchical'          => true,
				'labels'                => array(
					'name'                       => __( 'Категорія тестів', MMB_QUIZ_TEXT_DOMAIN ),
					'singular_name'              => __( 'Категорія тестів ', MMB_QUIZ_TEXT_DOMAIN ),
					'search_items'               => __( 'Знайти категорію', MMB_QUIZ_TEXT_DOMAIN ),
					'popular_items'              => __( 'Популярні категорії тестів', MMB_QUIZ_TEXT_DOMAIN ),
					'all_items'                  => __( 'Всі категорії тестів', MMB_QUIZ_TEXT_DOMAIN ),
					'parent_item'                => null,
					'parent_item_colon'          => null,
					'edit_item'                  => __( 'Редагувати категорію тесту', MMB_QUIZ_TEXT_DOMAIN ),
					'update_item'                => __( 'Оновити категорію тесту', MMB_QUIZ_TEXT_DOMAIN ),
					'add_new_item'               => __( 'Додати нову категорію тесту', MMB_QUIZ_TEXT_DOMAIN ),
					'new_item_name'              => __( 'Нове ім\'я категорії', MMB_QUIZ_TEXT_DOMAIN ),
					'separate_items_with_commas' => __( 'Розділити комами', MMB_QUIZ_TEXT_DOMAIN ),
					'add_or_remove_items'        => __( 'Додати/видалити', MMB_QUIZ_TEXT_DOMAIN ),
					'choose_from_most_used'      => __( 'Оберіть найпопулярнішу', MMB_QUIZ_TEXT_DOMAIN ),
					'menu_name'                  => __( 'Категорія тестів', MMB_QUIZ_TEXT_DOMAIN ),
				),
				'public'                => true,
				'show_in_nav_menus'     => true,
				'show_ui'               => true,
				'show_tagcloud'         => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var'             => true,
				'show_admin_column'     => true,
				'rewrite'               => array(
					'slug' => 'tematika',
				),
			)
		);
	}

	public function mmb_archive_to_main_page() {
		if ( is_post_type_archive( 'onlinetest' ) ) {
			wp_redirect( home_url( '/' ), 301 );
			exit();
		}
	}

	public function mmb_compare_url() {
		if (is_singular('onlinetest')){
			if ( strcmp(get_permalink(),home_url( $_SERVER['REQUEST_URI'])) !== 0 ){
				wp_redirect( get_permalink(), 301 );
			}
		}

		echo "<pre>";
		print_r($_COOKIE);
		echo "</pre>";
	}
}
