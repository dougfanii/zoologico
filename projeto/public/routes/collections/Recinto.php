<?php
return call_user_func(
    function () {
        $recinto = new \Phalcon\Mvc\Micro\Collection();

        $recinto
            ->setPrefix('/v1/recintos')
            ->setHandler('\App\Zoos\Controllers\RecintoController')
            ->setLazy(true);

        $recinto->get('/', 'getRecintos');

        $recinto->get('/{id:\d+}', 'getRecinto');

        $recinto->post('/', 'addRecinto');

        $recinto->put('/{id:\d+}', 'editRecinto');

        $recinto->delete('/{id:\d+}', 'deleteRecinto');

        return $recinto;
    }
);
