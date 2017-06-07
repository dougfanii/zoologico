<?php
return call_user_func(
    function () {
        $animal = new \Phalcon\Mvc\Micro\Collection();

        $animal
            ->setPrefix('/v1/animais')
            ->setHandler('\App\Zoos\Controllers\AnimalController')
            ->setLazy(true);

        $animal->get('/', 'getAnimais');

        $animal->get('/{id:\d+}', 'getAnimal');

        $animal->post('/', 'addAnimal');

        $animal->put('/{id:\d+}', 'editAnimal');

        $animal->delete('/{id:\d+}', 'deleteAnimal');

        return $animal;
    }
);
