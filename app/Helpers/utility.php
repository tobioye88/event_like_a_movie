<?php

function getImageUrl($path)
{
  if (!$path) {
    return asset($default ?? 'assets/images/mbp-user-1.png');
  }
  if (str_starts_with($path, 'http')) {
    return $path;
  }
  if (str_starts_with($path, '/storage/')) {
    return asset($path);
  }
  return asset('storage/' . $path);
}
