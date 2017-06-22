
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});

var Usuarios = function(objUser){
  var self = this;

  self.idUsuario = ko.observable(objUser.idUsuario);
  self.loginUsuario = ko.observable(objUser.loginUsuario);
  self.senhaUsuario = ko.observable(objUser.senhaUsuario);
  self.permissaoUsuario = ko.observable(objUser.permissaoUsuario);
  self.Funcionario_cdFuncionario = ko.observable(objUser.Funcionario_cdFuncionario);
}

function AppViewModel(){
  var self = this;
  self.loginUser = ko.observable();
  self.passwordUser = ko.observable();
  self.permissionUser = ko.observable();
  self.Funcionario_cdFuncionarioUser = ko.observable();
  self.usuarios = ko.observableArray();

  self.setData = function(data){
    data.forEach(function(value){
      self.usuarios.push(new Usuarios(value));
    });
  }

  $.ajax({
    url: window.global.urlapi + '/v1/usuarios/',
    type: 'GET',
    success: function(result){
      self.setData(result.records);
      console.log(result.records);
    }
  })

}

ko.applyBindings(new AppViewModel());
