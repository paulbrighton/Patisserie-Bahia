<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header role="banner" class="c-header__main">
    <div class="c-header o-container u-flex u-align-justify u-align-middle">

      <div class="c-header__logo o-row__column o-row__column--span-4">
        <?php if (has_custom_logo()) {
          the_custom_logo();
        } else { ?>
          <a class="c-header__blogname" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html(bloginfo('name')); ?></a>
        <?php } ?>
      </div>

      <div class="c-header__nav o-row__column o-row__column--span-8">

        <div class="c-header__nav--mobile">
          <a class="openbtn"><i class="fas fa-bars"></i></a>
          <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn"><i class="fas fa-times"></i></a>
            <div class="overlay-content">
              <nav>
                <?php if (has_nav_menu('primary')) {
                  wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu'
                  ));
                }
                ?>
              </nav>
            </div>
          </div>
        </div>

        <div class="c-header__nav--desktop">
          <?php if (has_nav_menu('primary')) {
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'menu_class' => 'nav-menu--desktop'
            ));
          }
          ?>
        </div>

      </div>
    </div>
  </header>

  <main id="content" role="main">
    