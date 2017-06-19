          <div id="app" class="container conteudo">
            <h1>Cadastro de Funcionário</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nome do zoológico</label>
                        <input class="form-control input-sm" data-bind="textInput: name">
                    </div>
                    <div class="form-group">
                        <label>Endereço do zoológico</label>
                        <input class="form-control input-sm" data-bind="textInput: address">
                    </div>
                    <button class="btn btn-info btn-sm pull-left" data-bind="click: addZoo">Cadastrar</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Zoos Cadastrados
                        </div>
                        <table class="table table-bordered tableZoos">
                          <thead>
                            <tr>
                              <th class="tableCollumns">Nome</th>
                              <th class="tableCollumns">Endereço</th>
                              <th class="acoes">Ações</th>
                            </tr>
                          </thead>
                          <!-- <tr data-bind="visible: naoMostrar()">
                            <td colspan="3">Não há registros cadastrados></td>
                          </tr> -->
                          <tbody data-bind="foreach: zoos">
                            <tr>
                              <td>
                                <div data-bind="visible: !editingName(), text: nomeZoo, click: $root.editName"></div>
                                <input type="text" class="form-control input-sm inputTable" data-bind="visible: editingName, value: nomeZoo, hasFocus: editingName, event: {keyup: enterEditName}"/>
                              </td>
                              <td>
                                <div data-bind="visible: !editingAddress(), text: enderecoZoo, click: $root.editAddress"></div>
                                <input type="text" class="form-control input-sm" data-bind="visible: editingAddress, value: enderecoZoo, hasFocus: editingAddress, event: {keyup: enterEditAddress}"/>
                              </td>
                              <td class="acoes">
                                <i class="glyphicon glyphicon-edit"></i>
                                <i class="glyphicon glyphicon-remove-circle" data-bind="click: $root.deleteZoo"></i>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/vendor/jquery/jquery.js"></script>
        <script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendor/knockout/knockout.js"></script>
        <script type="text/javascript" src="assets/js/zoologico.js"></script>
    </body>
</html>
