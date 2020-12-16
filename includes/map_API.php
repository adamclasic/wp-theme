<?php
function university_map_key($api)
{
  global $apiKey;
  $api['key'] = $apiKey;
  return $api;
}