<?php

class PikList_Add_On
{
  public static $available_add_ons = array();
  
  public static function _construct()
  {    
    add_action('init', array('piklist_add_on', 'init'), 0);
  }

  public static function init()
  {    
    self::include_add_ons();
  }
  
  public static function include_add_ons()
  { 
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    
    $plugins = get_option('active_plugins');
    foreach ($plugins as $plugin)
    {
      $path = WP_CONTENT_DIR . '/plugins/' . $plugin;
      $data = get_file_data($path, array(
                'type' => 'Plugin Type'
              ));
      if ($data['type'] && strtolower($data['type']) == 'piklist')
      {
        piklist::$paths[basename(dirname($plugin))] = dirname($path);
      }
    }
    
    // piklist::pre(piklist::$paths); die;
    
    $paths = array();
    foreach (piklist::$paths as $from => $path)
    {
      if ($from != 'theme')
      {
        array_push($paths, $path  . '/add-ons');
        if ($from != 'plugin')
        {
          array_push($paths, $path);
        }
      }
    }

    foreach ($paths as $path)
    {
      if (is_dir($path))
      {
        if (strstr($path, 'add-ons'))
        {
          $add_ons = piklist::get_directory_list($path);
          foreach ($add_ons as $add_on)
          {
            $file = file_exists($path . '/' . $add_on . '/' . $add_on . '.php') ? $path . '/' . $add_on . '/' . $add_on . '.php' : $path . '/' . $add_on . '/plugin.php';
            self::register_add_on($add_on, $file, $path);
          }
        }
        else
        {
          $add_on = basename($path);
          $file = file_exists($include) ? $include : $path . '/' . $add_on . '.php';
          self::register_add_on($add_on, $file, $path, true);
        }
      }
    }

    do_action('piklist_activate_add_on');
  }

  private static function register_add_on($add_on, $file, $path, $plugin = false)
  {
    if (file_exists($file))
    {
      $active_add_ons = piklist::get_settings('piklist', 'add-ons');
      
      $data = get_plugin_data($file);
      $data['plugin'] = $plugin;
      
      self::$available_add_ons[$add_on] = $data;

      if (in_array($add_on, is_array($active_add_ons) ? $active_add_ons : array($active_add_ons)))
      {
        include_once($file);

        $class_name = str_replace('pik_', 'piklist_', piklist::slug($add_on));

        if (class_exists($class_name) && method_exists($class_name, '_construct') && !is_subclass_of($class_name, 'WP_Widget'))
        {
          call_user_func(array($class_name, '_construct'));
        }
  
        piklist::$paths[$add_on] = $path . (!$plugin ? '/' . $add_on : '');
      }
    }
  }
}
?>