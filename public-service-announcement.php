<?php
/******************************************************************************
Plugin Name: Public Service Announcement
Plugin URI: http://burobjorn.nl
Description: Display a public service announcement page and show this once to a visitor (uses cookies)
Version: 1.0
Author: Bjorn Wijers <burobjorn at burobjorn dot nl>
Author URI: http://burobjorn.nl
License: GPLv2 or later
******************************************************************************/

/*  Copyright 2021
Tag Pages is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

Tag Pages is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if( ! class_exists( 'PSA' ) ) {
  class PSA {

    // Set the cookie name
    const COOKIE_NAME        = 'psa'; 
    
    // Set the directory name used for announcements
    // if you change this you need to change the directory name of this 
    // directory in the plugin as well.  
    const PSA_FILES_DIRNAME  = 'announcements'; 

    // Keep a reference to the plugin path
    private $plugin_path;   
    
    
    public function __construct() {
    
    }

    public function init() {
      $this->plugin_path = plugin_dir_path( __FILE__ );
      $this->setActionsFilters(); 
    }


    public function setActionsFilters(){
      add_filter( 'template_include', array($this, 'hasAnnouncement'), ''  ); 
    }

    /** 
     * Set a cookie to prevent visitors from seeing the 
     * Public Service Announcement multiple times 
     */ 
    private function setCookie(){
      $value       = 'saw_psa';
      $expire      = time()+60*60*24*7; // 7 days from now
      $secure      = ( is_ssl() ) ? true : false; 
      $domain      = 'one.wordpress.test';   
      $path        = '/';
      $httponly    = true;
      $samesite    = 'lax'; 

      // Samesite lacks in php 7.2 so we need a dirty hack 
      // to fix this in PHP versions below 7.3
      // https://stackoverflow.com/a/59654832
      if ( version_compare(phpversion(), '7.3', '<') ) {
        setcookie(
        self::COOKIE_NAME, 
          $value, 
          $expire, 
          $path . '; samesite=' . $samesite, 
          $domain, 
          $secure, 
          $httponly
        );
      } else {
        setcookie(
          self::COOKIE_NAME, 
          $value, [
          'expires'   => $expire,
          'path'      => $path,
          'domain'    => $domain,
          'samesite'  => $samesite,
          'secure'    => $secure,
          'httponly'  => $httponly,
        ]);
      } 
    }


    /** 
     * check if the cookie is available 
     */    
    private function hasCookie(){
      return isset($_COOKIE[ self::COOKIE_NAME ] );  
    }


    /** 
     * Check if an announcement should be shown
     * and select the corresponding template 
     */ 
    public function hasAnnouncement( $template ) {
      if( $this->hasCookie() ) {
        return $template; 
      } else {
        $this->setCookie();
        $path      = $this->plugin_path . DIRECTORY_SEPARATOR . self::PSA_FILES_DIRNAME . DIRECTORY_SEPARATOR;   
        $filename  = 'index.html'; 
        $template  = $path . $filename;  
        return $template;  
      } 
    }
  }
  $public_service_announcement = new PSA; 
  $public_service_announcement->init(); 
} else {
  error_log( 'Could not initialize PSA class' );  
}
?>
