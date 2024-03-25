<?php // Opening PHP tag - nothing should be before this, not even whitespace
//set builder mode to debug
add_action('avia_builder_mode', "builder_set_debug");
function builder_set_debug()
{
	return "debug";
}

// remove the orginal action entirely

remove_action('geodir_detail_page_sidebar', 'geodir_detail_page_sidebar_content_sorting', 1);

// add a new action 

add_action('geodir_detail_page_sidebar', 'geodir_detail_page_sidebar_content_sorting_custom', 1);

// copy the orginal function, rename it and comment the code you wish to hide

function geodir_detail_page_sidebar_content_sorting_custom()

{
	$arr_detail_page_sidebar_content =

	apply_filters('geodir_detail_page_sidebar_content' , 

					array( 

							'geodir_detail_page_google_analytics',

							'geodir_edit_post_link',

							'geodir_detail_page_review_rating',

							'geodir_detail_page_more_info'

						) // end of array 

				); // end of apply filter

	if(!empty($arr_detail_page_sidebar_content))

	{

		foreach($arr_detail_page_sidebar_content as $content_function)

		{

			if(function_exists($content_function))

			{

				add_action('geodir_detail_page_sidebar' , $content_function);	

			}

		}

	}

}
add_action(‘init’ , ‘geodir_redirect_to_default_login’) ;
function geodir_redirect_to_default_login()
{
if(isset( $_REQUEST['geodir_signup']))
{
  wp_redirect(home_url().’/wp-login.php’);
  exit();
}
}

// August Madness Menu
function register_my_menu() {
  register_nav_menu('augustmadness-menu',__( 'August Madness Menu' ));
}
add_action( 'init', 'register_my_menu' );

// August Madness Menu logo swap

add_filter('avf_logo','av_change_logo_url');

function av_change_logo_url($url)
{
   
    if( is_page(array(3363,4692,4694,4697,4703,4696,4701,4705,4699)) )
    {
        $url = "http://bridgeiisports.staging.wpengine.com/wp-content/uploads/2016/08/August-Madness-e1488391270277.png";
    }

    return $url; 

}
