<?php


if ( ! function_exists('menu'))
{
    function menu($menu)
    {
        return Menu::make($menu);
    }
}


if ( ! function_exists('price'))
{
    function price($price)
    {
        // todo currency conversion service
        return '$'.number_format($price, 2);
    }
}