<?php
/**
 * Created by PhpStorm.
 * User: alexchavet
 * Date: 21/06/2016
 * Time: 7:34 PM
 */


function displayCategory() {
    $post_type = get_post_type_object( get_post_type($post) );
    echo '<span class="news--category--title">Category:&nbsp;</span>';
    echo '<a href="'. get_post_type_archive_link($post_type->name).'">';
    echo '<span class="news--category--category '.$post_type->name.'">';
    echo $post_type->label ;
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
        if($value === 'post'){
            $name= 'articles';
        }
        else{
            $name= $post_type->labels->name;
        }
        //Add active class
        if($template_post_type->name === $post_type->name){
            $isactive= ' active';
        }
        else{
            $isactive= ' ';
        }
        echo '<a class="category--button hollow button  '.$value.$isactive.'" href="'. get_post_type_archive_link($post_type->name).'">'.$name.'</a>';
    }
}
add_action( 'list_category_name', 'listCategoryButton' );
