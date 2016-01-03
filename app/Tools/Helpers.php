<?php
/**
 *function view, renders a view and the layout select
 * @param string $template
 * @param string layout
 * @param array $parameters
 */
function view($template, $parameters = array(), $layout = 'base')
{
    extract($parameters);
    $content = '../resource' . DS . 'views' . DS . $template . '.tpl.php';
    include ROOT .'../'.  'resource' . DS . 'views' . DS . 'layout' . DS . $layout . '.tpl.php';
}

/**
 * The redirect function, redirect to a specific path
 * @param $route
 */
function redirect($route)
{
    $route = BASE_URL . '/' . $route;
    header('Location: ' . $route);
}

function style($route)
{
    echo "<link rel='stylesheet' href='" . BASE_URL . "/public/" . $route . "'>";
}

function script($route)
{
    echo "<script src='" . BASE_URL . "/public/" . $route . "'></script>";
}

function route($route, $title, $id = null, $attributes = null)
{
    if (!$id == null) {
        $tpl = "<a href='" . BASE_PUBLIC . "/" . $route . $id . "'";
    } else {
        $tpl = "<a href='" . BASE_PUBLIC . "/" . $route . "'";
    }
    if (is_array($attributes)) {
        foreach ($attributes as $clave => $valor) {
            $tpl .= $clave . "= '" . $valor . "'";
        }
    }
    $tpl .= ">" . $title . "</a>";
    echo $tpl;
}

function newFlashMessage($name, $message)
{
    $_SESSION[$name] = $message;
}

function getFlashMessage($name)
{
    if (!isset($_SESSION[$name])) {
        return false;
    }
    return true;
}

function printFlashMessage($name, $type = 'news')
{
    $chip = "<div class='chip ". $type. "'>" . $_SESSION[$name] . "<i class='material-icons'>close</i></div>";
    echo $chip;
    unset($_SESSION[$name]);
}

