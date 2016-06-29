<?php
/**
 * Created by PhpStorm.
 * User: alexchavet
 * Date: 21/06/2016
 * Time: 7:34 PM
 */
// Add sticky class in article title to style sticky posts differently

function cpt_sticky_class($classes) {
    if ( is_sticky() ) :
        $classes[] = 'sticky-post';
        return $classes;
    endif;
    return $classes;
}
add_filter('post_class', 'cpt_sticky_class');


function change_post_object_label()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;

    $labels->name = 'Articles';
    $labels->singular_name = 'Article';
    $labels->add_new = 'Add Article';
    $labels->add_new_item = 'Add Article';
    $labels->edit_item = 'Edit Article';
    $labels->new_item = 'Article';
    $labels->all_items = 'All Articles';
    $labels->view_item = 'View Articles';
    $labels->search_items = 'Search Articles';
    $labels->not_found = 'No Articles found';
    $labels->not_found_in_trash = 'No Articles found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
function displayCategory() {
    $post_type = get_post_type_object( get_post_type($post) );
    echo '<span class="news--category--title">Category:&nbsp;</span>';
    echo '<a href="'. get_post_type_archive_link($post_type->name).'">';
    echo '<span class="news--category--category '.$post_type->name.'">';
    echo $post_type->labels->name ;
    echo '</span>';
    echo '</a>';

}

add_action( 'bhr_category_name', 'displayCategory' );

function listCategoryButton() {
    $lists = array('post','news','review');
    $template_post_type= get_post_type_object( get_post_type($post) );

    foreach ($lists as $value) {
        $post_type = get_post_type_object( $value );
        //define post on home
        if(is_home()){
            $template_post_type= get_post_type_object( 'post' );

        }
        //Change post to article

            $name= $post_type->labels->name;

        //Add active class
        if($template_post_type->name === $post_type->name && ! is_page( 'news-reviews' )){
            $isactive= ' active';
        }
        else{
            $isactive= ' ';
        }
        echo '<a class="category--button hollow button  '.$value.$isactive.'" href="'. get_post_type_archive_link($post_type->name).'">'.$name.'</a>';
    }
}
add_action( 'list_category_name', 'listCategoryButton' );


