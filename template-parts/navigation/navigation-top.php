<nav class="nav-menu-mobile">
    <ul id="nav-menu-mobile" class="menu nav-menu-mobile__list">
        <li data-menuanchor="home" class="nav-menu-mobile__item"><a class="nav-menu__link" href="#home">Главная</a></li>
        <li data-menuanchor="about-me" class="nav-menu-mobile__item"><a class="nav-menu__link" href="#about-me">Обо
                мне</a></li>
        <li data-menuanchor="photo" class="nav-menu-mobile__item"><a class="nav-menu__link" href="#photo">Фото</a></li>
        <li data-menuanchor="video" class="nav-menu-mobile__item"><a class="nav-menu__link" href="#video">Видео</a></li>
        <li data-menuanchor="reviews" class="nav-menu-mobile__item"><a class="nav-menu__link" href="#reviews">Отзывы</a>
        </li>
        <li data-menuanchor="calendar" class="nav-menu-mobile__item"><a class="nav-menu__link" href="#calendar">Календарь</a>
        </li>
        <li data-menuanchor="contact" class="nav-menu-mobile__item"><a class="nav-menu__link"
                                                                       href="#contact">Контакты</a></li>
    </ul>
</nav>

<?php if ( ! is_page( 'agreement-page' ) && ! is_page( 'confidentiality-page' ) ) : ?>
    <nav class="menu nav-dots hidden-sm hidden-xs">
        <ul class="dots-list">
            <li class="dots-list__item"><a class="dots-list__link" href="#home"></a></li>
            <li class="dots-list__item"><a class="dots-list__link" href="#about-me"></a></li>
            <li class="dots-list__item"><a class="dots-list__link" href="#photo"></a></li>
            <li class="dots-list__item"><a class="dots-list__link" href="#video"></a></li>
            <li class="dots-list__item"><a class="dots-list__link" href="#reviews"></a></li>
            <li class="dots-list__item"><a class="dots-list__link" href="#contact"></a></li>
        </ul>
    </nav>
<?php endif; ?>

<header class="header">
    <div class="logo left">
        <ul class="logo__list">
            <li class="logo__item logo__phone"><img class="img-responsive"
                                                    src="<?php echo get_template_directory_uri() ?>/assets/img/smartphone-call.svg"
                                                    alt=""></li>
            <li class="logo__item logo__number"><?php echo get_theme_mod( 'phoneNumberBY_settings' ); ?></li>
        </ul>
    </div>
	<?php if ( ! is_page( 'agreement-page' ) && ! is_page( 'confidentiality-page' ) ) : ?>
        <nav class="nav-menu left hidden-sm hidden-xs">
            <ul id="nav-menu" class="menu nav-menu__list">
                <li class="nav-menu__item"><a class="nav-menu__link" href="#home">Главная</a></li>
                <li class="nav-menu__item"><a class="nav-menu__link" href="#about-me">Обо мне</a></li>
				<?php
				$countPost = get_category_by_slug( 's_gallery' )->category_count;
				if ( $countPost != 0 ) :
					?>
                    <li class="nav-menu__item"><a class="nav-menu__link" href="#photo">Фото</a></li>
				<?php endif; ?>
				<?php
				$countPost = get_category_by_slug( 's_video' )->category_count;
				if ( $countPost != 0 ) :
					?>
                    <li class="nav-menu__item"><a class="nav-menu__link" href="#video">Видео</a></li>
				<?php endif; ?>
				<?php
				$countPost = get_category_by_slug( 's_reviews' )->category_count;
				if ( $countPost != 0 ) :
					?>
                    <li class="nav-menu__item"><a class="nav-menu__link" href="#reviews">Отзывы</a></li>
				<?php endif; ?>
                <li class="nav-menu__item"><a class="nav-menu__link" href="#contact">Контакты</a></li>
            </ul>
        </nav>
	<?php else : ?>
        <nav class="nav-menu left hidden-sm hidden-xs">
            <ul id="nav-menu" class="menu nav-menu__list">
                <li class="nav-menu__item"><a class="nav-menu__link" href="<?php echo get_home_url(); ?>#home">Главная</a></li>
                <li class="nav-menu__item"><a class="nav-menu__link" href="<?php echo get_home_url(); ?>#about-me">Обо мне</a></li>
                <?php
                $countPost = get_category_by_slug( 's_gallery' )->category_count;
                if ( $countPost != 0 ) :
                    ?>
                    <li class="nav-menu__item"><a class="nav-menu__link" href="<?php echo get_home_url(); ?>#photo">Фото</a></li>
                <?php endif; ?>
                <?php
                $countPost = get_category_by_slug( 's_video' )->category_count;
                if ( $countPost != 0 ) :
                    ?>
                    <li class="nav-menu__item"><a class="nav-menu__link" href="<?php echo get_home_url(); ?>#video">Видео</a></li>
                <?php endif; ?>
                <?php
                $countPost = get_category_by_slug( 's_reviews' )->category_count;
                if ( $countPost != 0 ) :
                    ?>
                    <li class="nav-menu__item"><a class="nav-menu__link" href="<?php echo get_home_url(); ?>#reviews">Отзывы</a></li>
                <?php endif; ?>
                <li class="nav-menu__item"><a class="nav-menu__link" href="<?php echo get_home_url(); ?>#contact">Контакты</a></li>
            </ul>
        </nav>
	<?php endif; ?>
    <div class="social-icons left hidden-sm hidden-xs">
        <ul class="social-icons__list">
            <li class="social-icons__item">
                <a href="http://instagram.com/kolesnichenko" target="_blank" class="social-icons__link instagram">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;"
                         xml:space="preserve">


								<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57"
                                                x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                    <stop offset="0" style="stop-color:#E09B3D"></stop>
                                    <stop offset="0.3" style="stop-color:#C74C4D"></stop>
                                    <stop offset="0.6" style="stop-color:#C21975"></stop>
                                    <stop offset="1" style="stop-color:#7024C4"></stop>
                                </linearGradient>
                        <path class="SVGID_1"
                              d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722   c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156   C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156   c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722   c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"></path>

                        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517"
                                        y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                            <stop offset="0" style="stop-color:#E09B3D"></stop>
                            <stop offset="0.3" style="stop-color:#C74C4D"></stop>
                            <stop offset="0.6" style="stop-color:#C21975"></stop>
                            <stop offset="1" style="stop-color:#7024C4"></stop>
                        </linearGradient>
                        <path class="SVGID_2"
                              d="M275.517,133C196.933,133,133,196.933,133,275.516s63.933,142.517,142.517,142.517   S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6c-48.095,0-87.083-38.988-87.083-87.083   s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083C362.6,323.611,323.611,362.6,275.517,362.6z"></path>

                        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="418.31" y1="4.57" x2="418.31"
                                        y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                            <stop offset="0" style="stop-color:#E09B3D"></stop>
                            <stop offset="0.3" style="stop-color:#C74C4D"></stop>
                            <stop offset="0.6" style="stop-color:#C21975"></stop>
                            <stop offset="1" style="stop-color:#7024C4"></stop>
                        </linearGradient>
                        <circle class="SVGID_3" cx="418.31" cy="134.07" r="34.15"></circle>
						</svg>
                </a>
            </li>
            <li class="social-icons__item">
                <a href="http://vk.com/kolesnichenko_andrey" target="_blank" class="social-icons__link vk">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px"
                         width="548.358px" height="548.358px" viewBox="0 0 548.358 548.358"
                         style="enable-background:new 0 0 548.358 548.358;"
                         xml:space="preserve">

						<path class="vk" d="M545.451,400.298c-0.664-1.431-1.283-2.618-1.858-3.569c-9.514-17.135-27.695-38.167-54.532-63.102l-0.567-0.571
							l-0.284-0.28l-0.287-0.287h-0.288c-12.18-11.611-19.893-19.418-23.123-23.415c-5.91-7.614-7.234-15.321-4.004-23.13
							c2.282-5.9,10.854-18.36,25.696-37.397c7.807-10.089,13.99-18.175,18.556-24.267c32.931-43.78,47.208-71.756,42.828-83.939
							l-1.701-2.847c-1.143-1.714-4.093-3.282-8.846-4.712c-4.764-1.427-10.853-1.663-18.278-0.712l-82.224,0.568
							c-1.332-0.472-3.234-0.428-5.712,0.144c-2.475,0.572-3.713,0.859-3.713,0.859l-1.431,0.715l-1.136,0.859
							c-0.952,0.568-1.999,1.567-3.142,2.995c-1.137,1.423-2.088,3.093-2.848,4.996c-8.952,23.031-19.13,44.444-30.553,64.238
							c-7.043,11.803-13.511,22.032-19.418,30.693c-5.899,8.658-10.848,15.037-14.842,19.126c-4,4.093-7.61,7.372-10.852,9.849
							c-3.237,2.478-5.708,3.525-7.419,3.142c-1.715-0.383-3.33-0.763-4.859-1.143c-2.663-1.714-4.805-4.045-6.42-6.995
							c-1.622-2.95-2.714-6.663-3.285-11.136c-0.568-4.476-0.904-8.326-1-11.563c-0.089-3.233-0.048-7.806,0.145-13.706
							c0.198-5.903,0.287-9.897,0.287-11.991c0-7.234,0.141-15.085,0.424-23.555c0.288-8.47,0.521-15.181,0.716-20.125
							c0.194-4.949,0.284-10.185,0.284-15.705s-0.336-9.849-1-12.991c-0.656-3.138-1.663-6.184-2.99-9.137
							c-1.335-2.95-3.289-5.232-5.853-6.852c-2.569-1.618-5.763-2.902-9.564-3.856c-10.089-2.283-22.936-3.518-38.547-3.71
							c-35.401-0.38-58.148,1.906-68.236,6.855c-3.997,2.091-7.614,4.948-10.848,8.562c-3.427,4.189-3.905,6.475-1.431,6.851
							c11.422,1.711,19.508,5.804,24.267,12.275l1.715,3.429c1.334,2.474,2.666,6.854,3.999,13.134c1.331,6.28,2.19,13.227,2.568,20.837
							c0.95,13.897,0.95,25.793,0,35.689c-0.953,9.9-1.853,17.607-2.712,23.127c-0.859,5.52-2.143,9.993-3.855,13.418
							c-1.715,3.426-2.856,5.52-3.428,6.28c-0.571,0.76-1.047,1.239-1.425,1.427c-2.474,0.948-5.047,1.431-7.71,1.431
							c-2.667,0-5.901-1.334-9.707-4c-3.805-2.666-7.754-6.328-11.847-10.992c-4.093-4.665-8.709-11.184-13.85-19.558
							c-5.137-8.374-10.467-18.271-15.987-29.691l-4.567-8.282c-2.855-5.328-6.755-13.086-11.704-23.267
							c-4.952-10.185-9.329-20.037-13.134-29.554c-1.521-3.997-3.806-7.04-6.851-9.134l-1.429-0.859c-0.95-0.76-2.475-1.567-4.567-2.427
							c-2.095-0.859-4.281-1.475-6.567-1.854l-78.229,0.568c-7.994,0-13.418,1.811-16.274,5.428l-1.143,1.711
							C0.288,140.146,0,141.668,0,143.763c0,2.094,0.571,4.664,1.714,7.707c11.42,26.84,23.839,52.725,37.257,77.659
							c13.418,24.934,25.078,45.019,34.973,60.237c9.897,15.229,19.985,29.602,30.264,43.112c10.279,13.515,17.083,22.176,20.412,25.981
							c3.333,3.812,5.951,6.662,7.854,8.565l7.139,6.851c4.568,4.569,11.276,10.041,20.127,16.416
							c8.853,6.379,18.654,12.659,29.408,18.85c10.756,6.181,23.269,11.225,37.546,15.126c14.275,3.905,28.169,5.472,41.684,4.716h32.834
							c6.659-0.575,11.704-2.669,15.133-6.283l1.136-1.431c0.764-1.136,1.479-2.901,2.139-5.276c0.668-2.379,1-5,1-7.851
							c-0.195-8.183,0.428-15.558,1.852-22.124c1.423-6.564,3.045-11.513,4.859-14.846c1.813-3.33,3.859-6.14,6.136-8.418
							c2.282-2.283,3.908-3.666,4.862-4.142c0.948-0.479,1.705-0.804,2.276-0.999c4.568-1.522,9.944-0.048,16.136,4.429
							c6.187,4.473,11.99,9.996,17.418,16.56c5.425,6.57,11.943,13.941,19.555,22.124c7.617,8.186,14.277,14.271,19.985,18.274
							l5.708,3.426c3.812,2.286,8.761,4.38,14.853,6.283c6.081,1.902,11.409,2.378,15.984,1.427l73.087-1.14
							c7.229,0,12.854-1.197,16.844-3.572c3.998-2.379,6.373-5,7.139-7.851c0.764-2.854,0.805-6.092,0.145-9.712
							C546.782,404.25,546.115,401.725,545.451,400.298z">
                        </path>
					</svg>
                </a>
            </li>
            <li class="social-icons__item">
                <a href="http://facebook.com/KolesnichenkoAndrey" target="_blank" class="social-icons__link facebook">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px"
                         width="96.124px" height="96.123px" viewBox="0 0 96.124 96.123"
                         style="enable-background:new 0 0 96.124 96.123;"
                         xml:space="preserve">
							<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
								c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
								c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
								c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z">

                            </path>
						</svg>
                </a>
            </li>
            <li class="social-icons__item">
                <a href="https://www.youtube.com/channel/UC9Oj7hQf1dc3poSDJBqARPQ" target="_blank"
                   class="social-icons__link youtube">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         id="Capa_1" x="0px" y="0px" width="96.875px" height="96.875px" viewBox="0 0 96.875 96.875"
                         style="enable-background:new 0 0 96.875 96.875;" xml:space="preserve">
						<g>
                            <path d="M95.201,25.538c-1.186-5.152-5.4-8.953-10.473-9.52c-12.013-1.341-24.172-1.348-36.275-1.341   c-12.105-0.007-24.266,0-36.279,1.341c-5.07,0.567-9.281,4.368-10.467,9.52C0.019,32.875,0,40.884,0,48.438   C0,55.992,0,64,1.688,71.336c1.184,5.151,5.396,8.952,10.469,9.52c12.012,1.342,24.172,1.349,36.277,1.342   c12.107,0.007,24.264,0,36.275-1.342c5.07-0.567,9.285-4.368,10.471-9.52c1.689-7.337,1.695-15.345,1.695-22.898   C96.875,40.884,96.889,32.875,95.201,25.538z M35.936,63.474c0-10.716,0-21.32,0-32.037c10.267,5.357,20.466,10.678,30.798,16.068   C56.434,52.847,46.23,58.136,35.936,63.474z"></path>
                        </g>
</svg>
                </a>
            </li>
            <li class="social-icons__item">
                <a href="https://web.telegram.org/#/im?p=@kolesnichenko_by" target="_blank"
                   class="social-icons__link telegram">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         id="Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;"
                         xml:space="preserve">
								<g>
                                    <path id="XMLID_497_"
                                          d="M5.299,144.645l69.126,25.8l26.756,86.047c1.712,5.511,8.451,7.548,12.924,3.891l38.532-31.412   c4.039-3.291,9.792-3.455,14.013-0.391l69.498,50.457c4.785,3.478,11.564,0.856,12.764-4.926L299.823,29.22   c1.31-6.316-4.896-11.585-10.91-9.259L5.218,129.402C-1.783,132.102-1.722,142.014,5.299,144.645z M96.869,156.711l135.098-83.207   c2.428-1.491,4.926,1.792,2.841,3.726L123.313,180.87c-3.919,3.648-6.447,8.53-7.163,13.829l-3.798,28.146   c-0.503,3.758-5.782,4.131-6.819,0.494l-14.607-51.325C89.253,166.16,91.691,159.907,96.869,156.711z"></path>
                                </g>
							</svg>
                </a>
            </li>
        </ul>
    </div>
	<?php if ( ! is_page( 'agreement-page' ) && ! is_page( 'confidentiality-page' ) ) : ?>
        <div class="calendar-icon menu left hidden-sm hidden-xs">
            <a href="#calendar" class="calendar-icon__link" title="Календарь событий">
                <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px"
                     viewBox="0 0 174 179" style="enable-background:new 0 0 174 179;" xml:space="preserve">
                            <path d="M174,179H0V15h174V179z M8,171h158V23H8V171z"></path>
                    <path d="M42,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C46,36.2,44.2,38,42,38z"></path>
                    <path d="M72,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C76,36.2,74.2,38,72,38z"></path>
                    <path d="M102,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C106,36.2,104.2,38,102,38z"></path>
                    <path d="M132,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C136,36.2,134.2,38,132,38z"></path>
                    <rect x="36.5" y="68" width="11" height="11"></rect>
                    <rect x="66.5" y="68" width="11" height="11"></rect>
                    <rect x="96.5" y="68" width="11" height="11"></rect>
                    <rect x="126.5" y="68" width="11" height="11"></rect>
                    <rect x="36.5" y="98" width="11" height="11"></rect>
                    <rect x="66.5" y="98" width="11" height="11"></rect>
                    <rect x="96.5" y="98" width="11" height="11"></rect>
                    <rect x="126.5" y="98" width="11" height="11"></rect>
                    <rect x="36.5" y="128" width="11" height="11"></rect>
                    <rect x="66.5" y="128" width="11" height="11"></rect>
                    <rect x="96.5" y="128" width="11" height="11"></rect>
                        </svg>
            </a>
        </div>
    <?php else : ?>
        <div class="calendar-icon menu left hidden-sm hidden-xs">
            <a href="<?php echo get_home_url(); ?>#calendar" class="calendar-icon__link" title="Календарь событий">
                <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px"
                     viewBox="0 0 174 179" style="enable-background:new 0 0 174 179;" xml:space="preserve">
                                <path d="M174,179H0V15h174V179z M8,171h158V23H8V171z"></path>
                    <path d="M42,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C46,36.2,44.2,38,42,38z"></path>
                    <path d="M72,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C76,36.2,74.2,38,72,38z"></path>
                    <path d="M102,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C106,36.2,104.2,38,102,38z"></path>
                    <path d="M132,38c-2.2,0-4-1.8-4-4V4c0-2.2,1.8-4,4-4s4,1.8,4,4v30C136,36.2,134.2,38,132,38z"></path>
                    <rect x="36.5" y="68" width="11" height="11"></rect>
                    <rect x="66.5" y="68" width="11" height="11"></rect>
                    <rect x="96.5" y="68" width="11" height="11"></rect>
                    <rect x="126.5" y="68" width="11" height="11"></rect>
                    <rect x="36.5" y="98" width="11" height="11"></rect>
                    <rect x="66.5" y="98" width="11" height="11"></rect>
                    <rect x="96.5" y="98" width="11" height="11"></rect>
                    <rect x="126.5" y="98" width="11" height="11"></rect>
                    <rect x="36.5" y="128" width="11" height="11"></rect>
                    <rect x="66.5" y="128" width="11" height="11"></rect>
                    <rect x="96.5" y="128" width="11" height="11"></rect>
                            </svg>
            </a>
        </div>
	<?php endif; ?>
    <a href="#" class="toggle-mnu right hidden-md hidden-lg"><span></span></a>
</header>
