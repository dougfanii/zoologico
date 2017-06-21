<div id="app" class="container conteudo .text-center">
  <h1 class="formReg">Cadastro de Funcionário</h1>
  <div class="row col-md-6 col-md-offset-3">
    <div class="col-md-12">
      <div class="form-group campCpf">
        <label>CPF</label>
        <input class="form-control input-sm inpCpf" data-bind="textInput: cpf">
      </div>
      <div class="form-group campNome">
        <label>Nome</label>
        <input class="form-control input-sm inpNome" data-bind="textInput: name">
      </div>
      <div class="form-group campNasc">
        <label>Data de nascimento</label>
          <input type="date" class="form-control input-sm inpNasc" data-bind="textInput: dateBirth">
      </div>
      <div class="form-group campAdmis">
        <label>Data de admissão</label>
        <input type="date" class="form-control input-sm inpAdmis" data-bind="textInput: dateAdmission">
      </div>
      <!-- <div class="form-group">
        <label>Endereço</label>
        <input class="form-control input-sm" data-bind="textInput: address">
      </div> -->
    </div>
    <button class="btn btn-info btn-sm pull-left col-md-6 col-md-offset-3" data-bind="click: addFunc">Cadastrar</button>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default showData">
      <div class="panel-heading">
        Funcionários cadastrados
      </div>
      <table class="table table-bordered tableZoos">
        <thead>
          <tr>
            <th class="tableCollumns">CPF</th>
            <th class="tableCollumns">Nome</th>
            <th class="tableCollumns">Data de nascimento</th>
            <th class="tableCollumns">Data de admissão</th>
            <!-- <th class="tableCollumns">Endereço</th> -->
            <th class="acoes">Ações</th>
          </tr>
        </thead>
        <tr data-bind="visible: showEmpty">
          <td colspan="6" align='center'>Não há zoológicos cadastrados</td>
        </tr>
        <tbody data-bind="foreach: funcionarios">
          <tr>
            <td>
              <div data-bind="visible: !editingCpf(), text: cpfFuncionario, click: $root.editCpf"></div>
              <input type="text" class="form-control input-sm inputTable" data-bind="visible: editingCpf, value: cpfFuncionario, hasFocus: editingCpf"/>
              <!-- <input id = "cpfFuncionario" type="text" class="form-control input-sm inputTable" data-bind="attr {id: cpfFuncionario}, visible: editingField[turn], value: cpfFuncionario, hasFocus: editingField"/> -->
            </td>
            <td>
             <div data-bind="visible: !editingName(), text: nomeFuncionario, click: $root.editName"></div>
              <input type="text" class="form-control input-sm inputTable" data-bind="visible: editingName, value: nomeFuncionario, hasFocus: editingName"/>
              </td>
            <td>
              <div data-bind="visible: !editingDateBirth(), text: dtNascFuncionario, click: $root.editDateBirth"></div>
              <input type="date" class="form-control input-sm inputTable" data-bind="visible: editingDateBirth, value: dtNascFuncionario, hasFocus: editingDateBirth"/>
            </td>
            <td>
              <div data-bind="visible: !editingDateAdmission(), text: dtInicioFuncionario, click: $root.editDateAdmission"></div>
              <input type="date" class="form-control input-sm inputTable" data-bind="visible: editingDateAdmission, value: dtInicioFuncionario, hasFocus: editingDateAdmission"/>
            </td>
            <!-- <td>
              <div data-bind="visible: !editingAddress(), text: enderecoZoo, click: $root.editAddress"></div>
              <input type="text" class="form-control input-sm" data-bind="visible: editingAddress, value: enderecoZoo, hasFocus: editingAddress, event: {keyup: enterEditAddress}"/>
            </td> -->
            <td class="acoes">
              <i class="glyphicon glyphicon-edit"></i>
              <i class="glyphicon glyphicon-remove-circle" data-bind="click: $root.deleteFunc"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
