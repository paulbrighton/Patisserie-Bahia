<form role="search" method="get" class="search-form__search-page" action="<?php esc_url( home_url( '/' ) ); ?>">
  <div class="search-container">
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search …', 'placeholder', '_themename') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label', '_themename') ?>" />
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', '_themename') ?>" />
  </div>
</form>