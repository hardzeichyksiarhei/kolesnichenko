<?php

function kolesnichenko_setup() {

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );

}
add_action('after_setup_theme', 'kolesnichenko_setup');

function remove_menus(){
	remove_menu_page( 'edit-comments.php' );    //Комментарии
	remove_menu_page( 'users.php' );            //Пользователи
}

add_action( 'admin_menu', 'remove_menus' );


// Customize
function kolesnichenko_preloader($wp_customize) {
	$wp_customize->add_setting( 'preloader_settings' , array(
		'default'   => __('Прелоадер не выбран'),
		'transport' => 'refresh',
	) );

	$wp_customize->add_section( 'preloader_section' , array(
		'title'      => __( 'Прелоадер', 'kolesnichenko' ),
		'priority'   => 30,
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'preloader',
			array(
				'label'      => __( 'Загрузить прелоадер', 'kolesnichenko' ),
				'section'    => 'preloader_section',
				'settings'   => 'preloader_settings'
			)
		)
	);
}
function kolesnichenko_bgImage($wp_customize) {
	$wp_customize->add_setting( 'bgImageHome_settings' , array(
		'default'   => __('Фоновое изображение не выбрано'),
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'bgImageAboutMe_settings' , array(
		'default'   => __('Фоновое изображение не выбрано'),
		'transport' => 'refresh',
	) );

	$wp_customize->add_section( 'bgImage_section' , array(
		'title'      => __( 'Фоновые изображения', 'kolesnichenko' ),
		'priority'   => 30,
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bgImageHome',
			array(
				'label'      => __( 'Загрузить фоновое изображение секции "Главная"', 'kolesnichenko' ),
				'section'    => 'bgImage_section',
				'settings'   => 'bgImageHome_settings'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bgImageAboutMe',
			array(
				'label'      => __( 'Загрузить фоновое изображение секции "Обо мне"', 'kolesnichenko' ),
				'section'    => 'bgImage_section',
				'settings'   => 'bgImageAboutMe_settings'
			)
		)
	);
}
function kolesnichenko_navPhoneNumber($wp_customize) {
	$wp_customize->add_setting( 'phoneNumberBY_settings' , array(
		'default'   => '+375(29) 354-34-84',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'phoneNumberRU_settings' , array(
		'default'   => '+7(967) 053-50-65',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'phoneNumberUK_settings' , array(
		'default'   => '+380(93) 258-78-55',
		'transport' => 'refresh',
	) );

	$wp_customize->add_section( 'phoneNumber_section' , array(
		'title'      => __( 'Номер телефона', 'kolesnichenko' ),
		'priority'   => 30,
	) );

	$wp_customize->add_control(
		'phoneNumberBY',
		array(
			'label'    => __( 'Введите номер телефона (Беларусь)', 'kolesnichenko' ),
			'section'  => 'phoneNumber_section',
			'settings' => 'phoneNumberBY_settings'
		)
	);

	$wp_customize->add_control(
		'phoneNumberRU',
		array(
			'label'    => __( 'Введите номер телефона (Россия)', 'kolesnichenko' ),
			'section'  => 'phoneNumber_section',
			'settings' => 'phoneNumberRU_settings'
		)
	);

	$wp_customize->add_control(
		'phoneNumberUK',
		array(
			'label'    => __( 'Введите номер телефона (Украина)', 'kolesnichenko' ),
			'section'  => 'phoneNumber_section',
			'settings' => 'phoneNumberUK_settings'
		)
	);
}

function kolesnichenko_customize_register( $wp_customize ) {

	kolesnichenko_preloader($wp_customize);
	kolesnichenko_bgImage($wp_customize);
	kolesnichenko_navPhoneNumber($wp_customize);

}

add_action( 'customize_register', 'kolesnichenko_customize_register' );

// Send E-mail
function kolesnichenko_send_mail(){

	if( !wp_verify_nonce($_POST['nonce'], 'send_form'))
		return;

	$c = true;
	$message = '';

	$project_name = trim($_POST["project_name"]);
	$admin_email  = trim($_POST["admin_email"]);
	$form_subject = trim($_POST["form_subject"]);
	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" && $key != "action" && $key != "nonce" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
		}
	}

	$message = "<table style='width: 100%;'>$message</table>";;

	function adopt($text) {
		return '=?UTF-8?B?'.base64_encode($text).'?=';
	}
	$headers = "MIME-Version: 1.0" . PHP_EOL .
	           "Content-Type: text/html; charset=utf-8" . PHP_EOL .
	           $project_name.' '.$admin_email.'<'.$admin_email.'>';

	$response = json_encode([
		'status' => 'success',
		'msg' => 'Ваше сообщение успешно отправлено!'
	]);

	if (!mail($admin_email, $form_subject, $message, $headers )) {
		$response = json_encode([
			'status' => 'error',
			'msg' =>'Ваше сообщение не было отправлено!'
		]);
	}

	echo($response);
	wp_die();

}

add_action( 'wp_ajax_kolesnichenko_send_mail', 'kolesnichenko_send_mail' );
add_action( 'wp_ajax_nopriv_kolesnichenko_send_mail', 'kolesnichenko_send_mail' );

function kolesnichenko_events_data() {

	if( !wp_verify_nonce($_POST['nonce'], 'calendar'))
		return;

	echo json_encode([
		'dataSource' => kolesnichenko_getDataEvents(),
		'dataCategory' => kolesnichenko_getDataCategoriesEvents()
	]);

	wp_die();

}

function kolesnichenko_getDataEvents() {
	$eventsData = query_posts(['post_type' => 'event']);
	$dataSource = [];

	foreach ( $eventsData as $eventData ) {

		$locationID = eo_get_venue( $eventData->ID );
		$locationAddress = eo_get_venue_address($locationID);
		$locationName = eo_get_venue_name($locationID);
		$eventCategorySlug = get_the_terms( $eventData->ID, 'event-category' )[0]->slug;
		$categoryColor = eo_get_event_color( $eventData->ID );

		array_push( $dataSource, [
			'title'     => $eventData->post_title,
			'location'  => $locationName,
			'address'   => $locationAddress['address'],
			'country'   => $locationAddress['country'],
			'city'      => $locationAddress['city'],
			'text'      => $eventData->post_content,
			'startTime'      => substr(
				$eventData->StartTime,
				0,
				strlen( $eventData->StartTime ) - 3
			),
			'endTime'      => substr(
				$eventData->FinishTime,
				0,
				strlen( $eventData->FinishTime ) - 3
			),
			'startDate' => $eventData->StartDate,
			'endDate'   => $eventData->EndDate,
			'color'     => $categoryColor,
			'thumbURL'  => get_the_post_thumbnail_url($eventData->ID, 'medium'),
			'eventCategorySlug' => $eventCategorySlug,
			'phone'     => get_post_meta($eventData->ID, 'phone', true)
		] );

	}
	return $dataSource;
}
function kolesnichenko_getDataCategoriesEvents() {
	$dataCategory = [];
	$categoriesData = get_terms( 'event-category' );

	foreach ($categoriesData as $category){
		array_push($dataCategory, [
			'name' => $category->name,
			'color' => $category->color
		]);
	}

	return $dataCategory;
}

add_action( 'wp_ajax_kolesnichenko_events_data', 'kolesnichenko_events_data' );
add_action( 'wp_ajax_nopriv_kolesnichenko_events_data', 'kolesnichenko_events_data' );