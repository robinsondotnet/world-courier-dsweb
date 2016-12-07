<?php

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/clientes' route");

    return $response->withRedirect('/clientes');
});

$app->get('/login', function ($request, $response, $args) {
    
    $this->logger->info("World Courier -- Login Page");

    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->post('/login', function ($request, $response, $args) {

    $this->logger->info("Iniciando Sesion");

    return $response->withRedirect('/');

});

$app->get('/logout', function ($request, $response, $args) {

    $this->logger->info("User Logged out");

    return $response->withRedirect('/login');
});

// CLIENTES

$app->get('/clientes', function ($request, $response, $args) {

    $this->logger->info("Cargando Clientes");

    $clientes = $this->db->table('cliente')->get();

    return $this->renderer->render($response, 'clientes/index.phtml', ['clientes' => json_decode($clientes, true)]);
});

$app->get('/clientes/json', function ($request, $response, $args) {


    $clientes = $this->db->table('cliente')->get();
        //var_dump($clientes);
    echo json_encode($clientes);
});

$app->get('/empleados/json', function ($request, $response, $args) {


    $clientes = $this->db->table('empleado')->get();
        //var_dump($clientes);
    echo json_encode($clientes);
});

$app->get('/clientes/create', function ($request, $response, $args) {

    $this->logger->info("Creando Cliente");

    return $this->renderer->render($response, 'clientes/create.phtml',$args);
});

$app->post('/clientes/create', function ($request, $response, $args) {
    
    $this->logger->info("Creando Cliente");
    $parsedBody = $request->getParsedBody();
    $parsedBody["ClienteID"] = substr(uniqid('', true), -4);
    //var_dump($parsedBody);
    $cliente = $this->db->table('cliente')->insert($parsedBody);

    return $response->withRedirect('/clientes');
});

$app->get('/clientes/{id}/edit', function ($request, $response, $args) {

    $this->logger->info("Editando Cliente");
    $cliente = $this->db->table('cliente')->where('ClienteID', $args['id'])->first();

    return $this->renderer->render($response, 'clientes/edit.phtml', ['cliente' => $cliente]);
});

$app->post('/clientes/{id}/edit', function ($request, $response, $args) {

    $this->logger->info("Editando Cliente");
    $parsedBody = $request->getParsedBody();
    $cliente = $this->db->table('cliente')->where('ClienteID', $args['id'])->update($parsedBody);

    return $response->withRedirect('/clientes');
});

$app->get('/clientes/{id}/delete', function ($request, $response, $args) {

    $this->logger->info("Editando Cliente");
    $cliente = $this->db->table('cliente')->where('ClienteID', $args['id'])->first();

    return $this->renderer->render($response, 'clientes/delete.phtml', ['cliente' => $cliente]);
});

$app->post('/clientes/{id}/delete', function ($request, $response, $args) {

    $this->logger->info("Editando Cliente");
    $cliente = $this->db->table('cliente')->where('ClienteID', $args['id'])->delete();

    return $response->withRedirect('/clientes');
});

// EMPLEADOS

$app->get('/empleados', function ($request, $response, $args) {

    $empleados = $this->db->table('empleado')->get();

    return $this->renderer->render($response, 'empleados/index.phtml', ['empleados' => json_decode($empleados, true)]);
});

$app->get('/empleados/create', function ($request, $response, $args) {

    return $this->renderer->render($response, 'empleados/create.phtml',$args);
});

$app->post('/empleados/create', function ($request, $response, $args) {

    $this->logger->info("Creando Empleado");
    $parsedBody = $request->getParsedBody();
    $parsedBody["EmpleadoID"] = substr(uniqid('', true), -4);
    $cliente = $this->db->table('empleado')->insert($parsedBody);

    return $response->withRedirect('/empleados');
});
$app->get('/empleados/{id}/edit', function ($request, $response, $args) {

    $empleado = $this->db->table('empleado')->where('EmpleadoID', $args['id'])->first();

    return $this->renderer->render($response, 'empleados/edit.phtml', ['empleado' => $empleado]);
});


$app->post('/empleados/{id}/edit', function ($request, $response, $args) {

    $parsedBody = $request->getParsedBody();
    $empleado = $this->db->table('empleado')->where('EmpleadoID', $args['id'])->update($parsedBody);

    return $response->withRedirect('/empleados');
});

$app->get('/empleados/{id}/delete', function ($request, $response, $args) {

    $empleado = $this->db->table('empleado')->where('EmpleadoID', $args['id'])->first();

    return $this->renderer->render($response, 'empleados/delete.phtml', ['empleado' => $empleado]);
});

$app->post('/empleados/{id}/delete', function ($request, $response, $args) {

    $empleado = $this->db->table('empleado')->where('EmpleadoID', $args['id'])->delete();

    return $response->withRedirect('/empleados');
});

// TARIFAS

$app->get('/tarifas', function ($request, $response, $args) {

    $tarifas = $this->db->table('tarifas')->get();

    return $this->renderer->render($response, 'tarifas/index.phtml', ['tarifas' => json_decode($tarifas, true)]);
});

$app->get('/tarifas/create', function ($request, $response, $args) {

    return $this->renderer->render($response, 'tarifas/create.phtml',$args);
});

$app->post('/tarifas/create', function ($request, $response, $args) {

    $this->logger->info("Creando Tarifa");
    $parsedBody = $request->getParsedBody();
    $parsedBody["TarifaID"] = substr(uniqid('', true), -4);
    $tarifa = $this->db->table('tarifas')->insert($parsedBody);

    return $response->withRedirect('/tarifas');
});
$app->get('/tarifas/{id}/edit', function ($request, $response, $args) {

    $tarifa = $this->db->table('tarifas')->where('TarifaID', $args['id'])->first();

    return $this->renderer->render($response, 'tarifas/edit.phtml', ['tarifa' => $tarifa]);
});


$app->post('/tarifas/{id}/edit', function ($request, $response, $args) {

    $parsedBody = $request->getParsedBody();
    $tarifa = $this->db->table('tarifa')->where('TarifaID', $args['id'])->update($parsedBody);

    return $response->withRedirect('/tarifas');
});

$app->get('/tarifas/{id}/delete', function ($request, $response, $args) {

    $tarifa = $this->db->table('tarifas')->where('TarifaID', $args['id'])->first();

    return $this->renderer->render($response, 'tarifas/delete.phtml', ['tarifa' => $tarifa]);
});

$app->post('/tarifas/{id}/delete', function ($request, $response, $args) {

    $tarifa = $this->db->table('tarifas')->where('TarifaID', $args['id'])->delete();

    return $response->withRedirect('/tarifas');
});



// PEDIDOS

$app->get('/pedidos', function ($request, $response, $args) {

    $pedidos = $this->db->table('pedido')->get();

    return $this->renderer->render($response, 'pedidos/index.phtml', ['pedidos' => json_decode($pedidos, true)]);
});

$app->get('/pedidos/create', function ($request, $response, $args) {

    return $this->renderer->render($response, 'pedidos/create.phtml',$args);
});

$app->post('/pedidos/create', function ($request, $response, $args) {

    $this->logger->info("Creando Tarifa");
    $parsedBody = $request->getParsedBody();
    $parsedBody["PedidoID"] = substr(uniqid('', true), -4);
    $pedido = $this->db->table('pedido')->insert($parsedBody);

    return $response->withRedirect('/pedidos');
});
$app->get('/pedidos/{id}/edit', function ($request, $response, $args) {

    $pedido = $this->db->table('pedido')->where('PedidoID', $args['id'])->first();

    return $this->renderer->render($response, 'pedidos/edit.phtml', ['pedido' => $pedido]);
});


$app->post('/pedidos/{id}/edit', function ($request, $response, $args) {

    $parsedBody = $request->getParsedBody();
    $pedido = $this->db->table('pedido')->where('PedidoID', $args['id'])->update($parsedBody);

    return $response->withRedirect('/pedidos');
});

$app->get('/pedidos/{id}/delete', function ($request, $response, $args) {

    $pedido = $this->db->table('pedido')->where('PedidoID', $args['id'])->first();

    return $this->renderer->render($response, 'pedidos/delete.phtml', ['pedido' => $pedido]);
});

$app->post('/pedidos/{id}/delete', function ($request, $response, $args) {

    $pedido = $this->db->table('pedido')->where('PedidoID', $args['id'])->delete();

    return $response->withRedirect('/pedidos');
});


// STATUS

$app->get('/status', function ($request, $response, $args) {

    $status = $this->db->table('status_pedido')->get();

    return $this->renderer->render($response, 'status/index.phtml', ['status' => json_decode($status, true)]);
});

$app->get('/status/create', function ($request, $response, $args) {

    return $this->renderer->render($response, 'status/create.phtml',$args);
});

$app->post('/status/create', function ($request, $response, $args) {

    $this->logger->info("Creando Status");
    $parsedBody = $request->getParsedBody();
    $parsedBody["StatusID"] = substr(uniqid('', true), -4);
    $pedido = $this->db->table('status_pedido')->insert($parsedBody);

    return $response->withRedirect('/status');
});
