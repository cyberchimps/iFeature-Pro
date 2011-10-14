<?php

function v($arr,$key, $default='')
  {
    if(!isset($arr[$key])) return $default;
    return $arr[$key];
  }
  
 /*
This is the master function that gets called from everywhere you want to allow theme hooks.

By default, it searches the child theme folder for a file with the same name as the filter. But after that, it calls the filter so in theory other plugins can override theme content if necessary.
*/
  
function chimp_yield($filter_name)
{
  $fname = dirname(__FILE__)."/child_themes/pro/$filter_name.php";
  $default_content = '';
  if(file_exists($fname))
  {
    ob_start();
    require($fname);
    $default_content = ob_get_clean();
  } 
  return apply_filters($filter_name, $default_content);
}

?>