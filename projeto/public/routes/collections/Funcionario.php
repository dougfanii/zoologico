<?php
return call_user_func(
    function () {
        $funcionario = new \Phalcon\Mvc\Micro\Collection();

        $funcionario
            ->setPrefix('/v1/funcionarios')
            ->setHandler('\App\Zoos\Controllers\FuncionarioController')
            ->setLazy(true);

        $funcionario->get('/', 'getFuncionarios');

        $funcionario->get('/{id:\d+}', 'getFuncionario');

        $funcionario->post('/', 'addFuncionario');

        $funcionario->put('/{id:\d+}', 'editFuncionario');

        $funcionario->delete('/{id:\d+}', 'deleteFuncionario');

        return $funcionario;
    }
);
