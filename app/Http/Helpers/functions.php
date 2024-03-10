<?php

function get_poster($source, string $size)
{
    return is_null($source) ? 'https://via.placeholder.com/' . $size : asset('storage') . '/' . $source;
}
