<?php
return call_user_func(
    function () {
        $especie = new \Phalcon\Mvc\Micro\Collection();

        $especie
            ->setPrefix('/v1/especies')
            ->setHandler('\App\Zoos\Controllers\EspecieController')
            ->setLazy(true);

        $especie->get('/', 'getEspecies');

        $especie->get('/{id:\d+}', 'getEspecie');

        $especie->post('/', 'addEspecie');

        $especie->put('/{id:\d+}', 'editEspecie');

        $especie->delete('/{id:\d+}', 'deleteEspecie');

        return $especie;
    }
);
