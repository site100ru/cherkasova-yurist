<?php
	
	/***** REGISTER POST TYPE *****/
	add_action( 'init', 'register_post_types' );
	function register_post_types(){
		register_post_type( 'service', [ // Post type name
			'label'  => null,
			'labels' => [
				'name'               => 'Услуги', // основное название для типа записи
				'singular_name'      => 'Услуга', // название для одной записи этого типа
				'add_new'            => 'Добавить услугу', // для добавления новой записи
				'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
				'new_item'           => 'Новая услуга', // текст новой записи
				'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
				'search_items'       => 'Искать услугу', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Услуги', // название меню
			],
			'description'         => '',
			'public'              => true,
			// 'publicly_queryable'  => null, // зависит от public
			// 'exclude_from_search' => null, // зависит от public
			// 'show_ui'             => null, // зависит от public
			// 'show_in_nav_menus'   => null, // зависит от public
			'show_in_menu'        => null, // показывать ли в меню адмнки
			// 'show_in_admin_bar'   => null, // зависит от show_in_menu
			'show_in_rest'        => null, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => null,
			'menu_icon'           => null,
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [],
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );
		
		register_post_type( 'won-case', [ // Post type name
			'label'  => null,
			'labels' => [
				'name'               => 'Выигранные дела', // основное название для типа записи
				'singular_name'      => 'Выигранное дело', // название для одной записи этого типа
				'add_new'            => 'Добавить выигранное дело', // для добавления новой записи
				'add_new_item'       => 'Добавление выигранного дела', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование выигранного дела', // для редактирования типа записи
				'new_item'           => 'Новое выигранное дело', // текст новой записи
				'view_item'          => 'Смотреть выигранное дело', // для просмотра записи этого типа.
				'search_items'       => 'Искать выигранное дело', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Выигранные дела', // название меню
			],
			'description'         => '',
			'public'              => true,
			// 'publicly_queryable'  => null, // зависит от public
			// 'exclude_from_search' => null, // зависит от public
			// 'show_ui'             => null, // зависит от public
			// 'show_in_nav_menus'   => null, // зависит от public
			'show_in_menu'        => null, // показывать ли в меню адмнки
			// 'show_in_admin_bar'   => null, // зависит от show_in_menu
			'show_in_rest'        => null, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => null,
			'menu_icon'           => null,
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [],
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );
	}
	
	/***** REGISTER TAXONOMY *****/
	add_action( 'init', 'create_taxonomy' );
	function create_taxonomy(){
		register_taxonomy( 'service-tax', [ 'service' ], [ 
			'label'                 => '', // определяется параметром $labels->name
			'labels'                => [
				'name'              => 'Категории',
				'singular_name'     => 'Категория',
				'search_items'      => 'Найти категорию',
				'all_items'         => 'Все категории',
				'view_item '        => 'Смотреть категорию',
				'parent_item'       => 'Радительская категория',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Редактировать категорию',
				'update_item'       => 'Обновить категорию',
				'add_new_item'      => 'Добавить категорию',
				'new_item_name'     => 'Имя новой категории',
				'menu_name'         => 'Категории услуг',
			],
			'description'           => '', // описание таксономии
			'public'                => true,
			// 'publicly_queryable'    => null, // равен аргументу public
			// 'show_in_nav_menus'     => true, // равен аргументу public
			// 'show_ui'               => true, // равен аргументу public
			// 'show_in_menu'          => true, // равен аргументу show_ui
			// 'show_tagcloud'         => true, // равен аргументу show_ui
			// 'show_in_quick_edit'    => null, // равен аргументу show_ui
			'hierarchical'          => true,

			'rewrite'               => true,
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'          => array(),
			'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
			'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
			'show_in_rest'          => null, // добавить в REST API
			'rest_base'             => null, // $taxonomy
			// '_builtin'              => false,
			//'update_count_callback' => '_update_post_term_count',
		] );
		
		register_taxonomy( 'won-case-cat', [ 'won-case' ], [ 
			'label'                 => '', // определяется параметром $labels->name
			'labels'                => [
				'name'              => 'Категории',
				'singular_name'     => 'Категория',
				'search_items'      => 'Найти категорию',
				'all_items'         => 'Все категории',
				'view_item '        => 'Смотреть категорию',
				'parent_item'       => 'Радительская категория',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Редактировать категорию',
				'update_item'       => 'Обновить категорию',
				'add_new_item'      => 'Добавить категорию',
				'new_item_name'     => 'Имя новой категории',
				'menu_name'         => 'Категории дел',
			],
			'description'           => '', // описание таксономии
			'public'                => true,
			// 'publicly_queryable'    => null, // равен аргументу public
			// 'show_in_nav_menus'     => true, // равен аргументу public
			// 'show_ui'               => true, // равен аргументу public
			// 'show_in_menu'          => true, // равен аргументу show_ui
			// 'show_tagcloud'         => true, // равен аргументу show_ui
			// 'show_in_quick_edit'    => null, // равен аргументу show_ui
			'hierarchical'          => true,

			'rewrite'               => true,
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'          => array(),
			'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
			'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
			'show_in_rest'          => null, // добавить в REST API
			'rest_base'             => null, // $taxonomy
			// '_builtin'              => false,
			//'update_count_callback' => '_update_post_term_count',
		] );
	}
	
	/* Добавляем ссылку в конце привьюшки */
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	function new_excerpt_more( $more ){
		global $post;
		return ' <a href="'. get_permalink( $post ) . '">Читать полное описание дела.</a>';
	}
	
	/* Сокращаем размер привьюшки */
	add_filter( 'excerpt_length', function(){
		return 50;
	} );
	

	/***** DOING CATEGORIES DESCRIPTION *****/
	remove_filter( 'pre_term_description', 'wp_filter_kses' );
	remove_filter( 'term_description', 'wp_kses_data' );
	 
	function mayak_category_description($container = ''){
		$content = is_object($container) && isset($container->description) ? html_entity_decode($container->description) : '';
		$editor_id = 'tag_description';
		$settings = 'description';     
		?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="description">Описание</label></th>
		<td><?php wp_editor($content, $editor_id, array(
					'textarea_name' => $settings,
					'editor_css' => '<style> .html-active .wp-editor-area{border:0;}</style>',
		)); ?><br />
		<span class="description">Описание по умолчанию не отображается, однако некоторые темы могут его показывать.</span></td>
		</tr>
		<?php   
	}
	add_filter('edit_category_form_fields', 'mayak_category_description');
	add_filter('edit_tag_form_fields', 'mayak_category_description');
	
	function mayak_remove_category_description(){
		if ( $mk_description->id == 'edit-category' or 'edit-tag' ){
		?>
			<script type="text/javascript">
			jQuery(function($) {
			$('textarea#description').closest('tr.form-field').remove();
			});
			</script>
		<?php
		}
	}
	add_action('admin_head', 'mayak_remove_category_description');
	// End doing categories description
	
	// Doing coloms of images and categories in admin panel
	add_filter( 'manage_materials_posts_columns', function( $columns ) {
		$my_columns = [
			'category' => 'Категория',
			'image' => 'Миниатюра'
		];
		return array_slice( $columns, 0, 2 ) + $my_columns + $columns;
	});
	
	add_filter( 'manage_materials_posts_custom_column', function( $column_name, $post_cat ) {
		if ( $column_name === 'image' ) {
			the_post_thumbnail('thumbnail');
		}
		if ( $column_name === 'category' ) {
			$category = get_the_terms($post->ID, 'categories');
			echo $category[0]->name;
		}
		return $column_name;
	}, 10, 2);
	
?>