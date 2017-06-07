<?php
return call_user_func(
    function () {
        $visitaCollection = new \Phalcon\Mvc\Micro\Collection();

        $visitaCollection
            ->setPrefix('/v1/visitas')
            ->setHandler('\App\Visitantes\Controllers\VisitaController')
            ->setLazy(true);


        $visitaCollection->get('/', 'getVisitas');


        $visitaCollection->get('/{id:\d+}', 'getVisita');

        $visitaCollection->post('/', 'addVisita');

        $visitaCollection->put('/{id:\d+}', 'editVisita');

        $visitaCollection->delete('/{id:\d+}', 'deleteVisita');
        return $visitaCollection;

    }

);
