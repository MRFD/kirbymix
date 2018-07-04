<?php 

if (!c::get('kirbymix')) {
    return;
}

load([
    'kirby\\kirbymix\\css' => __DIR__ . DS . 'lib' . DS . 'css.php',
    'kirby\\kirbymix\\js' => __DIR__ . DS . 'lib' . DS . 'js.php'
]);

kirby()->set('component', 'css', 'Kirby\\Kirbymix\\CSS');
kirby()->set('component', 'js', 'Kirby\\Kirbymix\\JS');
