<?php
    /*
     *  Plugin Name: Instagram Posts
    *   Plugin URI: http://wearefx.co.uk
    *   Description: Imports Instagram photos to a hidden custom post type called fx_instagram.
    *   Version: 1.0
    *   Author: FX Digital Ltd
    *   Author URI: http://wearefx.co.uk
    *   License: GPL2
     *
    */

//register_activation_hook( __FILE__, 'fx_create_import_schedule' );

// Schedule a wp cron to check the instagram feed daily on plugin activation.

function fx_create_import_schedule(){

    $timestamp = wp_next_scheduled( 'instagram-auto-fetch' );

    if( $timestamp == false ){
        //Schedule the event for right now, then to repeat daily using the hook 'wi_create_daily_backup'
        wp_schedule_event( time(), 'hourly', 'instagram-auto-fetch');
    }

}

add_action( 'instagram-auto-fetch', 'fx_posts_from_instagram' );

// App specific variables

function fx_instagram_posts_init() {
    $args = array(
            'description' => 'Internal post type to keep track of a specified instagram account.',
            'exclude_from_search' => true,
            'labels' => array(
                'name' => 'Instagram Photos',
                'singular_name' => 'Instagram',
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'comments' )
        );
    register_post_type('fx_instagram', $args);
    // Dont do this on every page load - fx_posts_from_instagram();
    // fx_create_import_schedule();
}
add_action('init', 'fx_instagram_posts_init');

function fx_posts_from_instagram() {    

    $client_id = get_option('instagram_footer_client_id');
    $user_id = get_option('instagram_footer_user_id');
    $user_name = get_option('instagram_footer_user_username');
    $access_token = get_option('instagram_footer_access_token');

    // Get photos from Instagram
    $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?client_id='.$client_id.'&access_token='.$access_token; 
    // echo $url;
    $args = stream_context_create(
        array('http'=>
            array(
                'timeout' => 2500,
                'ignore_errors' => false
            )
        )
    );
    $json_feed = file_get_contents( $url, false, $args );
    $json_feed = json_decode( $json_feed );

    print_r($json_feed);
    // die('hello');

    // Import each post as a fx_instagram post. Images are referenced in the post content. 
    foreach ($json_feed->data as $post) {
        $post_user_id = $post->user->id;
        if( !slug_exists($post->id) && $post_user_id == $user_id ) {
            $new_post = wp_insert_post( array(
                'post_type'     => 'fx_instagram',
                'post_content'  => '<a href="'. esc_url( $post->link ) .'" target="_blank"><img src="'. esc_url( $post->images->low_resolution->url ) .'" alt="'. $post->caption->text .'" /></a>',
                'post_excerpt'  => htmlentities($post->caption->text),
                'post_date'     => date("Y-m-d H:i:s", $post->created_time),
                'post_date_gmt' => date("Y-m-d H:i:s", $post->created_time),
                'post_status'   => 'publish',
                'post_title'    => $post->id,
                'post_name'     => $post->id,
            ), true );
        }
    }

}    

// Conditional used to check if the post exists before we add it.
function slug_exists($post_name) {
   global $wpdb;
   if($wpdb->get_row("SELECT post_name FROM " . $wpdb->prefix . "posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A'))  {
       return true;
   } else {
       return false;
   }
}

register_deactivation_hook( __FILE__, 'prefix_deactivation' );

// On deactivation, remove all functions from the scheduled action hook.

function prefix_deactivation() {
    wp_clear_scheduled_hook( 'instagram-auto-fetch' );
    clear_settings();
}



/////////

function clear_settings() {
    delete_option('instagram_footer_client_id');
    delete_option('instagram_footer_client_secret');
    delete_option('instagram_footer_access_token');
    delete_option('instagram_footer_user_id');
    delete_option('instagram_footer_user_username');
    delete_option('instagram_footer_user_full_name');
    delete_option('instagram_footer_user_profile_picture');
}

// Function to define settings necessary for admin page
global $plugin_url;
function admin_init() {

    // Set plugin url
    $plugin_url = get_admin_url( null, 'options-general.php?page=instagram_footer_options_page' );

    // Check if reset button has been clicked
    if( isset($_GET['ig_action']) ) {
        if('unlink' == $_GET['ig_action']) {

            clear_settings();
            wp_redirect($plugin_url);
        }
    }

    // Create a settings group to store each setting in
    add_settings_section('instagram_footer_settings', 'Setting up the Instagram footer', 'render_settings_general', 'instagram_footer_options_page');

    // Define setting for the client ID
    add_settings_field('instagram_footer_client_id', 'Instagram Client Details', 'render_client_id', 'instagram_footer_options_page', 'instagram_footer_settings');
    register_setting('instagram_footer_settings', 'instagram_footer_client_id', 'validate_client_id' );

    // Define setting for the client ID
    register_setting('instagram_footer_settings', 'instagram_footer_client_secret', 'validate_client_secret' );

    // Define setting for the access token
    register_setting('instagram_footer_settings', 'instagram_footer_access_token', 'validate_access_token' );


    // Create a settings group to store user details
    add_settings_section('instagram_user_details', 'Connected account', 'render_user_details', 'instagram_footer_options_page');

    // Define settings for the user details (username, user ID, full name, profile image)
    register_setting('instagram_user_details', 'instagram_footer_user_id', 'validate_access_token' );
    register_setting('instagram_user_details', 'instagram_footer_user_username', 'validate_access_token' );
    register_setting('instagram_user_details', 'instagram_footer_user_full_name', 'validate_access_token' );
    register_setting('instagram_user_details', 'instagram_footer_user_profile_picture', 'validate_access_token' );


    // Get auth_code from code, if set
    if( isset($_REQUEST['code']) && $_REQUEST[ 'page' ] === 'instagram_footer_options_page' ) {
        $client_id = get_option('instagram_footer_client_id');
        $client_secret = get_option('instagram_footer_client_secret');

        if($client_id && $client_secret) {
            $response = post('https://api.instagram.com/oauth/access_token', [
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'code' => $_REQUEST['code'],
                'redirect_uri' => get_admin_url( null, 'options-general.php?page=instagram_footer_options_page' ),
                'grant_type' => 'authorization_code',
            ]);

            if(!is_object($response)) {
                global $niw_instagram_message;
                $niw_instagram_message = array('type' => 'error', 'msg' => 'Error linking account: ' . $response);
            } else {
                // Success, save user data
                update_option('instagram_footer_access_token', $response->access_token ?: '', true);
                update_option('instagram_footer_user_id', $response->user->id ?: '', true);
                update_option('instagram_footer_user_username', $response->user->username ?: '', true);
                update_option('instagram_footer_user_full_name', $response->user->full_name ?: '', true);
                update_option('instagram_footer_user_profile_picture', $response->user->profile_picture ?: '', true);

                // $this->clear_cache();
            }
        }

        wp_redirect($plugin_url);
    }
}

    // Functions to validate settings
    function validate_client_id($input) {
        $output = sanitize_text_field ( strip_tags( stripslashes( $input ) ) );

        return $output;
    }
    function validate_client_secret($input) {
        $output = sanitize_text_field ( strip_tags( stripslashes( $input ) ) );

        return $output;
    }
    function validate_access_token($input) {
        $output = sanitize_text_field ( strip_tags( stripslashes( $input ) ) );

        return $output;
    }


// Options page
function admin_menu() {
    add_options_page( 'Instagram Footer Options', 'Instagram Footer Options', 'manage_options', 'instagram_footer_options_page', 'render_options_page' );
}

function render_options_page() {

    ?>
        <div class="wrap">
            <h1>Instagram Footer Options</h1>

            <form method="post" action="options.php">
                <?php
                    settings_fields('instagram_footer_settings');
                    do_settings_sections('instagram_footer_options_page');
                ?>

                <?php
                    submit_button();
                ?>
            </form>
        </div>
    <?php

}

// Render each settings section on page
function render_settings_general() {
    $plugin_url = get_admin_url( null, 'options-general.php?page=instagram_footer_options_page' );

    echo 'Before grabbing your Instagram photos to put in the photo footer, you must first authenticate your account. To do this, you will need to create an Instagram app and then login with your Instagram account. Just follow the instructions below!';

    ?>

    <h3 style="margin-top: 40px;">Step One: Register a new application client</h3>
    <p>You will need to head over to the <a href="https://www.instagram.com/developer/clients/manage/" target="_blank">Instagram Developer Portal</a> and click the <span style="color:#3d8b5f;border:1px dotted #3d8b5f;">Register a New Client</span> button. You may have to login with your Instagram account first.</p>
    <p>Fill in all the details the form asks for and click register. In the box for <strong>Valid redirect URIs</strong> you will need to include the following URI: <input value="<?php echo $plugin_url; ?>" type="text" readonly="readonly" style="display:block;margin:15px;width: 50%;padding:0.5em;"/></p>
    <p>Click <span style="color:#3d8b5f;border:1px dotted #3d8b5f;">Register</span> to finish creating the app, after which you will be taken to the Manage Clients screen.</p>

    <h3 style="margin-top: 40px;">Step Two: Configure client</h3>
    <p>From the <a href="https://www.instagram.com/developer/clients/manage/" target="_blank">Manage Clients</a> screen, click <strong>Manage</strong> on the app you just created.</p>
    <p>Next go the <strong>Migrations</strong> tab and ensure that you <strong>uncheck</strong> the box labelled <em>Non square media</em>.</p>

    <h3 style="margin-top: 40px;">Step Three: Get client app details</h3>
    <p>From the <a href="https://www.instagram.com/developer/clients/manage/" target="_blank">Manage Clients</a> screen, click <strong>Manage</strong> on the app you just created. If you completed the previous step, the details you need will still be at the top of the page.</p>
    <p>You will be presented with some details in the form of long alphanumeric codes that we will use to contact Instagram.</p>
    <p>Copy and paste the <strong>Client ID</strong> and <strong>Client Secret</strong> into the respective boxes below.</p>
    <p>Next click the <span style="color:gray;border:1px dotted gray;">Submit client details</span> button below which will refresh this page and cause the <span style="color:gray;border:1px dotted gray;">Login with Instagram</span> button to appear below the Client ID and Secret.</p>
    <p>Click this button and login with your Instagram account. You will then be redirected back to this page, and everything will be all set-up!</p>

    <?php
}

// Display API details
function render_client_id() {
    global $niw_instagram_message;
    $plugin_url = get_admin_url( null, 'options-general.php?page=instagram_footer_options_page' );
    $client_id = get_option('instagram_footer_client_id');
    $client_secret = get_option('instagram_footer_client_secret');
    $access_token = get_option('instagram_footer_access_token');
    $auth_url = 'https://api.instagram.com/oauth/authorize/?client_id=' . $client_id . '&redirect_uri=' . $plugin_url . '&response_type=code';


    // Display and grab client ID input
    echo '<span style="display:inline-block;width: 125px;">Client ID:</span> <input name="instagram_footer_client_id" type="text" value="' . get_option('instagram_footer_client_id') . '" style="width:50%;padding: 0.4em;" /><br>';
    // Display and grab client secret input
    echo '<span style="display:inline-block;width: 125px;">Client secret:</span> <input name="instagram_footer_client_secret" type="text" value="' . get_option('instagram_footer_client_secret') . '" style="width:50%;padding: 0.4em;" /><br>';

    if(!$client_id) {
        submit_button(
            __( 'Submit client details', 'plugin_domain' ),
            'secondary',
            'submit'
        );
    }

    if($client_id && !$access_token) {

        echo '<a class="button button-secondary" href="'.$auth_url.'" style="margin:0.5rem 0;">Login with Instagram</a><br><br>';
    }

    if($access_token) {
        echo '<span style="display:inline-block;width: 128.5px;">Access Token:</span><input name="instagram_footer_access_token" type="text" value="' . get_option('instagram_footer_access_token') . '" style="width:50%;padding: 0.4em;" /><br>';
    }

    if($niw_instagram_message) {
        echo '<p style="color: #FF0000;">' . $niw_instagram_message['msg'] . '</p>';
    }

}

// Display user details
function render_user_details() {
    $plugin_url = get_admin_url( null, 'options-general.php?page=instagram_footer_options_page' );
    $user_username = get_option('instagram_footer_user_username');
    $user_full_name = get_option('instagram_footer_user_full_name');
    $user_profile_picture = get_option('instagram_footer_user_profile_picture');

    $reset_url = $plugin_url . '&ig_action=unlink';

    $image = '<img src="'.$user_profile_picture.'" />';

    if($user_username) {

        echo    '<table style="" cellpadding="4">
                <tbody>
                <tr style="">
                <td style="" rowspan="2">'.$image.'</td>
                </tr>
                <tr style="">
                <td style=""><h3 style="margin:0.4em 0;font-weight:bold;">'.$user_username.'</h3><p style="margin:0;color:gray;">'.$user_full_name.'</p>
                <p style="margin:1em 0;"><a href="'.$reset_url.'" style="color:red;">Disconnect account</a></p></td>
                </tr>
                </tbody>
                </table>';

        // Grab images
        fx_create_import_schedule();
        // fx_posts_from_instagram();

    } else {
        echo '<p>No account connected</p>';
    }

}



function post($endpoint, $params = array()) {
    $response = wp_remote_post( $endpoint, array(
        'body' => $params
    ));

    if ( ! is_wp_error( $response ) ) {
        // The request went through successfully, check the response code against
        // what we're expecting
        if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
            // Do something with the response
            $body = wp_remote_retrieve_body( $response );
            // $headers = wp_remote_retrieve_headers( $response );
            return json_decode($body);
        } else {
            // The response code was not what we were expecting, record the message
            $error_message = wp_remote_retrieve_response_message( $response );
            return $error_message;
        }
    } else {
        // There was an error making the request
        $error_message = $response->get_error_message();
        return $error_message;
    }
}

add_action( 'admin_init', 'admin_init');
add_action( 'admin_menu', 'admin_menu');