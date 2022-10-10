

<?php

/**ADD THEME SUPPORT */

add_theme_support( 'custom-logo' );

/**ADD SCRIPTS AND STYLES */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('styles', get_stylesheet_uri());
    wp_enqueue_style('main-styles', get_stylesheet_directory_uri() . '/dist/main.css');
    wp_enqueue_style('favicon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/dist/main.js', [], '1.0.0', true);
});



/**REGISTER KONZERT POST TYPE */

function ap_post_types()
{
    register_post_type('Konzert', array(
        'map_meta_cap' => true,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'konzerte'),
        'menu_icon' => 'dashicons-calendar-alt',
        'labels' => array(
            'name' => 'Konzerte',
            'add_new_item' => 'Neues Konzert',
            'edit_item' => 'Konzert bearbeiten',
            'all_items' => 'Alle Konzerte',
            'singular_name' => 'Konzert'
        )

    ));
}

add_action('init', 'ap_post_types');



/**	ACF Admin Columns */

function add_acf_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'title' => __('Venue'),
        'city' => __('City'),
        'date_of_concert' => __('Konzertdatum'),
    );
    return $columns;
} add_filter('manage_konzert_posts_columns', 'add_acf_columns');




function my_column_register_sortable($columns) {
    $columns['date_of_concert'] = 'Konzertdatum';
    return $columns;
} add_filter("manage_edit-konzert_sortable_columns", "my_column_register_sortable");




function custom_field_konzert_columns($column, $post_id){
    if ('city' == $column) {
        the_field("city", $post_id, true);
    }
    if ('date_of_concert' == $column) {
        $the_date = get_field('date_of_concert', $post_id);
        $concertDate = DateTime::createFromFormat("Ymd", $the_date);
        echo $concertDate->format('d.m.Y');
    }
} add_action('manage_konzert_posts_custom_column', 'custom_field_konzert_columns', 10, 2);




add_action('pre_get_posts', function ($query) {
    global $pagenow;

    if (!is_admin() || $pagenow !== 'edit.php') {
        return;
    }

    $post_type = $query->get('post_type');
    $order_by = $query->get('orderby');

    if ($post_type == 'konzert') {
        if (empty($order_by))
            $order_by = 'date_of_concert';

        switch ($order_by) {
            case 'date_of_concert':
                $query->set('meta_key', 'date_of_concert');
                $query->set('orderby', 'meta_value_num');
                break;
        }
    }
});
