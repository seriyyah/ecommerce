<?php

function presentPrice(int $price): string
{
    return money_format('$%i', $price / 100);
}

function productImg(string $path): string
{
    return ($path !== null) && file_exists('storage/' . $path) ? asset('storage/' . $path) : asset('img/not-found.jpg');
}
