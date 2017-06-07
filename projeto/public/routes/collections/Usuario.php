<?php
return call_user_func(
    function () {
        $usuario = new \Phalcon\Mvc\Micro\Collection();

        $usuario
            ->setPrefix('/v1/usuarios')
            ->setHandler('\App\Zoos\Controllers\UsuarioController')
            ->setLazy(true);

        $usuario->get('/', 'getUsuarios');

        $usuario->get('/{id:\d+}', 'getUsuario');

        $usuario->post('/', 'addUsuario');

        $usuario->put('/{id:\d+}', 'editUsuario');

        $usuario->delete('/{id:\d+}', 'deleteUsuario');

        return $usuario;
    }
);
