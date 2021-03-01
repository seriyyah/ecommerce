<?php

function presentPrice($price)
{
    return money_format('$%i', $price / 100);
}
function productimg($path)
{
    return ($path != null) && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

?>
