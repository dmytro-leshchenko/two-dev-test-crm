<?php

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = explode( '/', $requestUri);

$moduleName = isset($uri[1]) ? $uri[1] : false;
$param = false;
if (isset($uri[2])) {
    $param = (int) $uri[2];
}
if(!file_exists(__DIR__ . 'src' . DS . 'Api' . DS . ucfirst($moduleName) . '.php')) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$action = '';
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $action = empty($param) ? 'getCollection' : 'getEntityById';
        break;
    case 'POST':
        $action = 'createEntity';
        break;
    case 'PUT':
        $action = 'updateEntity';
        break;
    case 'DELETE':
        $action = 'deleteEntity';
        break;
    default:
        // error
        break;
}

$controller = new $moduleName();
if($param) {
    $result = $controller->{$action}($param);
} else {
    $result = $controller->{$action}();
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);
