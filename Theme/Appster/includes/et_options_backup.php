<?php
/* ================================================================
	IMPORT & EXPORT THEME OPTIONS
================================================================ */

add_action( 'init', 'register_options_pages' );

function register_options_pages() {


  if ( is_admin() && function_exists( 'ot_register_settings' ) ) {

    ot_register_settings( 
      array(
        array( 
          'id'              => 'import_export',
          'pages'           => array(
            array(
              'id'              => 'import_export',
              'parent_slug'     => 'themes.php',
              'page_title'      => 'Theme Options Backup/Restore',
              'menu_title'      => 'Options Backup',
              'capability'      => 'edit_theme_options',
              'menu_slug'       => 'tmq-theme-backup',
              'icon_url'        => null,
              'position'        => null,
              'updated_message' => 'Options updated.',
              'reset_message'   => 'Options reset.',
              'button_text'     => 'Save Changes',
              'show_buttons'    => false,
              'screen_icon'     => 'themes',
              'contextual_help' => null,
              'sections'        => array(
                array(
                  'id'          => 'tmq_import_export',
                  'title'       => __( 'Import/Export', 'yourtextdomain' )
                )
              ),
              'settings'        => array(
                array(
                    'id'          => 'import_data_text',
                    'label'       => 'Import Theme Options',
                    'desc'        => __( 'Theme Options', 'yourtextdomain' ),
                    'std'         => '',
                    'type'        => 'import-data',
                    'section'     => 'tmq_import_export',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'class'       => ''
                  ),
                  array(
                    'id'          => 'export_data_text',
                    'label'       => 'Export Theme Options',
                    'desc'        => __( 'Theme Options', 'yourtextdomain' ),
                    'std'         => '',
                    'type'        => 'export-data',
                    'section'     => 'tmq_import_export',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'class'       => ''
                  )
              )
            )
          )
        )
      )
    );
  }
}

if ( ! function_exists( 'ot_type_import_data' ) ) {

  function ot_type_import_data() {

    echo '<form method="post" id="import-data-form">';


      wp_nonce_field( 'import_data_form', 'import_data_nonce' );


      echo '<div class="format-setting type-textarea has-desc">';


        echo '<div class="description">';

          if ( OT_SHOW_SETTINGS_IMPORT ) echo '<p>' . __( 'Only after you\'ve imported the Settings should you try and update your Theme Options.', 'option-tree' ) . '</p>';

          echo '<p>' . __( 'To import your Theme Options copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Import Theme Options" button.', 'option-tree' ) . '</p>';
 
          echo '<button class="option-tree-ui-button blue right hug-right">' . __( 'Import Theme Options', 'option-tree' ) . '</button>';
        echo '</div>';

 
        echo '<div class="format-setting-inner">';
          echo '<textarea rows="10" cols="40" name="import_data" id="import_data" class="textarea"></textarea>';
        echo '</div>';
      echo '</div>';
    echo '</form>';

  }

}

if ( ! function_exists( 'ot_type_export_data' ) ) {

  function ot_type_export_data() {


    echo '<div class="format-setting type-textarea simple has-desc">';


      echo '<div class="description">';
        echo '<p>' . __( 'Export your Theme Options data by highlighting this text and doing a copy/paste into a blank .txt file. Then save the file for importing into another install of WordPress later. Alternatively, you could just paste it into the <code>OptionTree->Settings->Import</code> <strong>Theme Options</strong> textarea on another web site.', 'option-tree' ) . '</p>';
      echo '</div>';


      $data = get_option( 'option_tree' );
      $data = ! empty( $data ) ? ot_encode( serialize( $data ) ) : '';

      echo '<div class="format-setting-inner">';
        echo '<textarea rows="10" cols="40" name="export_data" id="export_data" class="textarea">' . $data . '</textarea>';
      echo '</div>';
    echo '</div>';
  }
}
?>