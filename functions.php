<?php 
	
	if ( function_exists('add_theme_support') ) {
    	add_theme_support('post-thumbnails');
	}

	// подключение css файлов
	function wptuts_styles_with_the_lot()
	{
		wp_register_style('slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1', 'all' );
		wp_register_style('slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', array(), '1', 'all' );
		wp_register_style('style-css', get_template_directory_uri() . '/css/style.css', array(), '1', 'all' );
		wp_enqueue_style('slick-css');
		wp_enqueue_style('slick-theme-css');
		wp_enqueue_style('style-css');
	}
	add_action('wp_enqueue_scripts', 'wptuts_styles_with_the_lot');

	// подключение js файлов
	function wptuts_scripts_important()
	{
		wp_register_script('waterwheelCarousel', get_template_directory_uri() . '/js/jquery.waterwheelCarousel.js', array(), '2', true );
		wp_enqueue_script('waterwheelCarousel');
		wp_register_script('slick-js', get_template_directory_uri() . '/js/slick.js', array(), '2', true );
		wp_enqueue_script('slick-js');
		wp_register_script('maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array(), '2', true );
		wp_enqueue_script('maskedinput');
		wp_register_script('js', get_template_directory_uri() . '/js/js.js', array(), '2', true );
		wp_enqueue_script('js');
	}
	add_action('wp_enqueue_scripts', 'wptuts_scripts_important');

	// настройка меню
	register_nav_menus( array(
		'top' => __('Menu', 'logotype'),
	) );

	$gost = array(
	   "Є"=>"EH","І"=>"I","і"=>"i","№"=>"#","є"=>"eh",
	   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
	   "Е"=>"E","Ё"=>"JO","Ж"=>"ZH",
	   "З"=>"Z","И"=>"I","Й"=>"JJ","К"=>"K","Л"=>"L",
	   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
	   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
	   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
	   "Ы"=>"Y","Ь"=>"","Э"=>"EH","Ю"=>"YU","Я"=>"YA",
	   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
	   "е"=>"e","ё"=>"jo","ж"=>"zh",
	   "з"=>"z","и"=>"i","й"=>"jj","к"=>"k","л"=>"l",
	   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
	   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
	   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
	   "ы"=>"y","ь"=>"","э"=>"eh","ю"=>"yu","я"=>"ya",
	   "—"=>"-","«"=>"","»"=>"","…"=>""
	  );

	$iso = array(
	   "Є"=>"YE","І"=>"I","Ѓ"=>"G","і"=>"i","№"=>"#","є"=>"ye","ѓ"=>"g",
	   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
	   "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
	   "З"=>"Z","И"=>"I","Й"=>"J","К"=>"K","Л"=>"L",
	   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
	   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"X",
	   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
	   "Ы"=>"Y","Ь"=>"","Э"=>"E","Ю"=>"YU","Я"=>"YA",
	   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
	   "е"=>"e","ё"=>"yo","ж"=>"zh",
	   "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
	   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
	   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"x",
	   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
	   "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
	   "—"=>"-","«"=>"","»"=>"","…"=>""
	  );
	 
	function sanitize_title_with_translit($title) {
		global $gost, $iso;
		$rtl_standard = get_option('rtl_standard');
		switch ($rtl_standard) {
			case 'off':
			    return $title;		
			case 'gost':
			    return strtr($title, $gost);
			default: 
			    return strtr($title, $iso);
		}
	}
	add_action('sanitize_title', 'sanitize_title_with_translit', 0);

	function register_menu_page_setting(){
		add_menu_page('Настройки темы', 'Основные данные сайта', 6, 'settings_page.php', 'themes_settings');
	}

	add_action('admin_menu', 'register_menu_page_setting');

	function themes_settings(){
		?>
		<div class="wrap">
			<h2>Основные данные сайта</h2>
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php settings_fields( 'nedw-settings-group' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Логотип</th>
						<td><input type="text" name="logo" value="<?php echo get_option('logo'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Телефон</th>
						<td><input type="text" name="tel" value="<?php echo get_option('tel'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Адрес: город</th>
						<td><input type="text" name="city" value="<?php echo get_option('city'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Адрес: улица, дом</th>
						<td><input type="text" name="street" value="<?php echo get_option('street'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Телефон офиса (дополнительный)</th>
						<td><input type="text" name="tel-office" value="<?php echo get_option('tel-office'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">e-mail</th>
						<td><input type="text" name="email" value="<?php echo get_option('email'); ?>"></td>
					</tr>
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>">
				</p>
			</form>
		</div>

	<?php }

	add_action('admin_init', 'register_nedwsettings' );
	function register_nedwsettings(){
		register_setting('nedw-settings-group', 'logo');
		register_setting('nedw-settings-group', 'tel');
	 	register_setting('nedw-settings-group', 'city');
		register_setting('nedw-settings-group', 'street'); 
		register_setting('nedw-settings-group', 'tel-office');
		register_setting('nedw-settings-group', 'email');
	}

	function validate_setting($plugin_options) { 
		$keys = array_keys($_FILES); 
		$i = 0; 
		foreach ( $_FILES as $image ) {   // if a files was upload   
		if ($image['size']) {     // if it is an image     
		if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {       
		$override = array('test_form' => false);       // save the file, and store an array, containing its location in $file       
		$file = wp_handle_upload( $image, $override );       
		$plugin_options = $file['url'];     } else {       // Not an image.        
		$options = get_option('logo');       
		$plugin_options = $options;       // Die and let the user know that they made a mistake.       
		wp_die('No image was uploaded.');     }   }   // Else, the user didn't upload a file.   // Retain the image that's already on file.   
		else {     $options = get_option('logo');     
		$plugin_options = $options;   }   
		$i++; } 
		return $plugin_options;
	}



	add_action( 'init', 'create_post_type' );
	function create_post_type() {	
	// второй экран
	register_post_type( 'second-screen',array('labels' => array('name' => __( 'Второй экран' ),'singular_name' => __( 'Блок' ),'add_new' => 'Добавить новый блок' ,'add_new_item' => 'Новый блок',), 'rewrite' => true,'public' => true,'has_archive' => true,'supports' => array('title', 'thumbnail'),));
	// блок о компании
	register_post_type( 'about-company',array('labels' => array('name' => __( 'Блок о компании' ),'singular_name' => __( 'Фото' ),'add_new' => 'Добавить новое фото' ,'add_new_item' => 'Новое фото',), 'rewrite' => true,'public' => true,'has_archive' => true,'supports' => array('title', 'thumbnail'),));
	// наши гарантии
	register_post_type( 'garanties',array('labels' => array('name' => __( 'Наши гарантии' ),'singular_name' => __( 'Блок' ),'add_new' => 'Добавить новый блок' ,'add_new_item' => 'Новый блок',), 'rewrite' => true,'public' => true,'has_archive' => true,'supports' => array('title', 'thumbnail'),));
	// почему мы
	register_post_type( 'whywe',array('labels' => array('name' => __( 'Почему мы' ),'singular_name' => __( 'Блок' ),'add_new' => 'Добавить новый блок' ,'add_new_item' => 'Новый блок',), 'rewrite' => true,'public' => true,'has_archive' => true,'supports' => array('title', 'thumbnail'),));
	// отзывы наших клиентов
	register_post_type( 'rewievs',array('labels' => array('name' => __( 'Oтзывы клиентов' ),'singular_name' => __( 'Блок' ),'add_new' => 'Добавить новый блок' ,'add_new_item' => 'Новый блок',), 'rewrite' => true,'public' => true,'has_archive' => true,'supports' => array('title', 'thumbnail'),));
	}

	function register_menu_page_setting1(){
		add_menu_page('Заголовки секций', 'Заголовки секций', 6, 'settings_page1.php', 'themes_settings1');
	}

	add_action('admin_menu', 'register_menu_page_setting1');

	function themes_settings1(){
		?>
		<div class="wrap">
			<h2>Заголовки секций</h2>
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php settings_fields( 'nedw-settings-group1' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">О компании</th>
						<td><input type="text" name="about-company" value="<?php echo get_option('about-company'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Гарантии</th>
						<td><input type="text" name="our-garanties" value="<?php echo get_option('our-garanties'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Почему мы</th>
						<td><input type="text" name="why-we" value="<?php echo get_option('why-we'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Калькулятор</th>
						<td><input type="text" name="calculator" value="<?php echo get_option('calculator'); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Отзывы клиентов</th>
						<td><input type="text" name="client-rewievs" value="<?php echo get_option('client-rewievs'); ?>"></td>
					</tr>
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>">
				</p>
			</form>
		</div>

	<?php }

	add_action('admin_init', 'register_nedwsettings1' );
	function register_nedwsettings1(){
		register_setting('nedw-settings-group1', 'about-company');
		register_setting('nedw-settings-group1', 'our-garanties');
	 	register_setting('nedw-settings-group1', 'why-we');
		register_setting('nedw-settings-group1', 'calculator'); 
		register_setting('nedw-settings-group1', 'client-rewievs');
	}
?>