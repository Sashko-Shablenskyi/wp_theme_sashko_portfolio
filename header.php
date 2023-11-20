<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sashko_Sh
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="format-detection" content="telephone=no" />
    <link rel="shortcut icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?php
			if (is_front_page()) {
				bloginfo('name');
				echo ' | ';
				bloginfo('description');
			} else {
				wp_title('');
			}
		?>
    </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <header class="header">
            <div class="header__container">
                <div class="header__inner">
                    <div class="header__logo">
                        <?php echo get_custom_logo(); ?>
                    </div>

                    <div class="header__menu menu" id="menu">
                        <div class="menu__bg"></div>
                        <nav class="menu__body">
                            <ul class="menu__list">
                                <?php
								if (function_exists('pll_current_language')) {
									$current_language = pll_current_language(); // Отримати поточну мову

									if ($current_language === 'en') {
										// wp_nav_menu(array('menu' => 'english-menu')); // Вивести англійське меню
								 		custom_menu_with_data_attributes('main_usa');

									} elseif ($current_language === 'uk') {
										// wp_nav_menu(array('menu' => 'ukrainian-menu')); // Вивести українське меню
										custom_menu_with_data_attributes('main_ua');
									}
								}
								?>
                                <div class="switcher">
                                    <?php custom_language_switcher(); ?>
                                    <!-- <div class="switcher__selector"></div>s -->
                                </div>
                            </ul>
                        </nav>
                    </div>

                    <div class="header__right">
                        <button type="button" class="icon-menu">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>