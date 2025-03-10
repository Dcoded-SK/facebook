<?php
function getReactionIcon($reaction)
{
    $icons = [
        'like' => 'fa-thumbs-up',
        'love' => 'fa-heart',
        'laugh' => 'fa-face-laugh',
        'angry' => 'fa-face-angry'
    ];
    return $icons[$reaction] ?? 'fa-thumbs-up';
}

function getReactionColor($reaction)
{
    $colors = [
        'like' => '#1877f2',
        'love' => '#e0245e',
        'laugh' => '#f7b928',
        'angry' => '#f02849'
    ];
    return $colors[$reaction] ?? '#000';
}
