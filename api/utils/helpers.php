<?php


function get_time_elapsed_string($datetime, $full = false) {
    $now = new DateTimeImmutable;
    $ago = new DateTimeImmutable($datetime);
    $diff = $now->diff($ago);

    $string = [
        'year' => $diff->y,
        'month' => $diff->m,
        'week' => floor($diff->d / 7),
        'day' => $diff->d % 7,
        'hour' => $diff->h,
        'minute' => $diff->i,
        'second' => $diff->s,
    ];

    $result = [];
    foreach ($string as $unit => $value) {
        if ($value) {
            $result[] = $value . ' ' . $unit . ($value > 1 ? 's' : '');
        }
    }

    $elapsedString = implode(', ', $result);

    if (!$elapsedString) {
        return 'just now';
    }

    return $elapsedString . ' ago';
}

?>