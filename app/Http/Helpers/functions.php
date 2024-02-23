<?php

function get_poster($source, string $size)
{
    return asset('storage') . '/' . $source ?? 'https://via.placeholder.com/' . $size;
}
