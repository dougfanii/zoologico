          <div id="app" class="container conteudo">
            <h1>Cadastro de Visitante</h1>
            <div class="row formReg">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nome do visitante</label>
                        <input class="form-control input-sm" data-bind="textInput: name">
                    </div>
                    <div class="form-group">
                        <label>Data de nascimento</label>
                        <input type="date" class="form-control input-sm" data-bind="textInput: dateNasc">
                    </div>
                    <button class="btn btn-info btn-sm pull-left" data-bind="click: addZoo">Cadastrar</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Visitantes cadastrados
                        </div>
                        <table class="table table-bordered tableZoos">
                          <thead>
                            <tr>
                              <th class="tableCollumns">Nome</th>
                                <th class="tableCollumns">Data de nascimento</th>
                              <th class="acoes">Ações</th>
                            </tr>
                          </thead>
                          <tbody data-bind="foreach: visitantes">
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
