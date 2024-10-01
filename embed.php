<?php
echo ddd( $video['video_url'] );
function ddd( $iframe ){
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];
    $path = explode('?', $src);
    $link_array = explode('/',$path[0]);
    $playlist_id = end($link_array);
    
    $params = array(
        'playlist' => $playlist_id,
        'loop'  => 1
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);
    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
    return $iframe;
}
