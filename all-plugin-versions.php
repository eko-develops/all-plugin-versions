<?php
/*
Plugin Name: All Plugin Versions
Version: 1.0
Description: Adds a sub-menu under settings to view the current version of all plugins in a list.
Author: j
*/
if(is_admin()){
    function plugin_versions_option_page() {
        add_options_page(
            'Plugin Versions', // page title
            'Plugin Versions', // menu title
            'manage_options', // capability to access the page
            'plugin-versions', // menu slug
            'plugin_versions_cb', // callback function
            5 // position
        );
    }
    add_action( 'admin_menu', 'plugin_versions_option_page' );
    
    function plugin_versions_cb() {
    
      $all_plugins = get_plugins();
    
      echo '<table width="100%">';
      echo '<thead>';
      echo '<tr>';
      echo '<th width="30%" style="text-align:left">Plugin</th>';
      echo '<th width="20%" style="text-align:left">Installed Version</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
    
        foreach($all_plugins as $key => $value) {
              echo '<tr>';
              echo "<td>{$value['Name']}</td>";
              echo "<td>{$value['Version']}</td>";
              echo '</tr>';
      }
    
      echo '</tbody>';
      echo '</table>';
    
    }
}
