<div id="app" class="container conteudo .text-center">
  <h1 class="formReg">Cadastro de Zoológico</h1>
  <div class="row col-md-6 col-md-offset-3">
    <div class="col-md-12">
      <div class="form-group">
        <label>Nome</label>
        <input class="form-control input-sm" data-bind="textInput: name">
      </div>
        <div class="form-group">
          <label>Endereço</label>
          <input class="form-control input-sm" data-bind="textInput: address">
        </div>
        <button class="btn btn-info btn-sm pull-left col-md-6 col-md-offset-3" data-bind="click: addZoo">Cadastrar</button>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default showData">
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
          <tr data-bind="visible: showEmpty">
            <td colspan="3" align='center'>Não há zoológicos cadastrados</td>
          </tr>
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
