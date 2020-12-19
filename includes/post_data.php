<?php

function post_data($data)
{

  if ($data['post_type'] == 'note' AND $data['post_status'] != 'trash') {
    # code...
  }
  $data['post_status'] = 'private';
  return $data;
}