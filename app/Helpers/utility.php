<?php

function getImageUrl($path)
{
  if (!$path) {
    return asset($default ?? 'assets/images/mbp-user-1.png');
  }
  if (str_starts_with($path, 'http')) {
    return $path;
  }
  return asset('storage/' . $path);
}
