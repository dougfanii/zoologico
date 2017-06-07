<?php
return call_user_func(
    function () {
        $visitanteCollection = new \Phalcon\Mvc\Micro\Collection();

        $visitanteCollection
            ->setPrefix('/v1/visitantes')
            ->setHandler('\App\Visitantes\Controllers\VisitanteController')
            ->setLazy(true);

        $visitanteCollection->get('/', 'getVisitantes');

        $visitanteCollection->get('/{id:\d+}', 'getVisitante');

        $visitanteCollection->post('/', 'addVisitante');

        $visitanteCollection->put('/{id:\d+}', 'editVisitante');

        $visitanteCollection->delete('/{id:\d+}', 'deleteVisitante');
        return $visitanteCollection;

    }

);
