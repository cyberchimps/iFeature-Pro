<?php

function v($arr,$key, $default='')
  {
    if(!isset($arr[$key])) return $default;
    return $arr[$key];
  }
