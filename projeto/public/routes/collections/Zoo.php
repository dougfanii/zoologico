<?php
return call_user_func(
    function () {
        $zooCollection = new \Phalcon\Mvc\Micro\Collection();

        $zooCollection
            ->setPrefix('/v1/zoos')
            ->setHandler('\App\Zoos\Controllers\ZooController')
            ->setLazy(true);
            //

        $zooCollection->get('/', 'getZoos');
        $zooCollection->get('/{id:\d+}', 'getZoo');

        $zooCollection->post('/', 'addZoo');


        $zooCollection->put('/{id:\d+}', 'editZoo');

        $zooCollection->delete('/{id:\d+}', 'deleteZoo');
        return $zooCollection;

    }

);
