          <div id="app" class="container conteudo .text-center">
            <h1 class="formReg">Cadastro de Usuários</h1>
            <div class="row col-md-6 col-md-offset-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Login</label>
                  <input class="form-control input-sm" data-bind="textInput: name">
                </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input class="form-control input-sm" data-bind="textInput: address">
                </div>
                <div class="form-group">
                  <label>Funcionário</label>
                  <option value="AL">Alabama</option>
                  <select class="form-control input-sm js-example-basic-single" data-bind= "options: matriculas, optionsText: 'nomeMatricula', optionsValue: 'matriculaAluno', value: Aluno_idAluno, optionsCaption: 'Selecione um aluno'">
                      ...
                    <option value="WY">Wyoming</option>
                  </select>
                </div>
                <button class="btn btn-info btn-sm pull-left col-md-6 col-md-offset-3" data-bind="click: addZoo">Cadastrar</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default showData">
                  <div class="panel-heading">
                    Usuários Cadastrados
                  </div>
                  <table class="table table-bordered tableZoos">
                    <thead>
                      <tr>
                        <th class="tableCollumns">Login</th>
                        <th class="tableCollumns">Senha</th>
                        <th class="acoes">Ações</th>
                      </tr>
                    </thead>
                    <tbody data-bind="foreach: zoos">
                      <tr>
                        <td>
                          <div data-bind="visible: !editingName(), text: nomeZoo, click: $root.editName"></div>
                          <!-- <input type="text" class="form-con trol input-sm inputTable" data-bind="visible: editingName, value: nomeZoo, hasFocus: editingName, event: {keyup: enterEditName}"/> -->
                        </td>
                          <td>
                            <div data-bind="visible: !editingAddress(), text: enderecoZoo, click: $root.editAddress"></div>
                            <!-- <input type="text" class="form-control input-sm" data-bind="visible: editingAddress, value: enderecoZoo, hasFocus: editingAddress, event: {keyup: enterEditAddress}"/> -->
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
