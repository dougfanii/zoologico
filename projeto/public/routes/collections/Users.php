<?php
return call_user_func(
    function () {
        $userCollection = new \Phalcon\Mvc\Micro\Collection();

        $userCollection
            ->setPrefix('/v1/users')
            ->setHandler('\App\Zoo\Controllers\UsersController')
            ->setLazy(true);

        $userCollection->get('/', 'getUsers');
        $userCollection->get('/{id:\d+}', 'getUser');

        $userCollection->post('/', 'addUser');

        $userCollection->put('/{id:\d+}', 'editUser');

        $userCollection->delete('/{id:\d+}', 'deleteUser');

        return $userCollection;
    }
);
