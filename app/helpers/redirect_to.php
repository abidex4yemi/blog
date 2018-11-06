<?php

/**
 * redirect
 *
 * @param  string $page
 *
 * @return void
 */
function redirect($page)
{
    header('Location: ' . URL_ROOT . '/' . $page);
}