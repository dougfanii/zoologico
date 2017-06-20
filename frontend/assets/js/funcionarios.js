 /* INÍCIO DA ViewModel */

var Funcionarios = function(objFunc){

  var self = this;

  self.cdFuncionario = ko.observable(objFunc.cdFuncionario);
  self.cpfFuncionario = ko.observable(objFunc.cpfFuncionario);
  self.nomeFuncionario = ko.observable(objFunc.nomeFuncionario);
  self.dtNascFuncionario = ko.observable(objFunc.dtNascFuncionario);
  self.dtInicioFuncionario = ko.observable(objFunc.dtInicioFuncionario);
  self.editingCpf = ko.observable(false);
  self.editingName = ko.observable(false);
  self.editingDateBirth = ko.observable(false);
  self.editingDateAdmission = ko.observable(false);

  self.editingCpf.subscribe(function(editingCpf){
    if(editingCpf == false){
      console.log(self.cpfFuncionario());
      $.ajax({
        url: window.global.urlapi + '/v1/funcionarios/' + self.cdFuncionario(),
        type: 'PUT',
        data: {
          cpfFuncionario: self.cpfFuncionario()
        },
        success: function(result){
        }
      });
    }
  })

  self.enterEditName = function(viewModel, e){
    if(e.keyCode === 13){
      self.editingName(false);
    }
  }

}

/* FIM DA CLASSE FUNCIONARIOS */


 /* INÍCIO DA ViewModel */

function AppViewModel(){

  var self = this;
  self.funcionarios = ko.observableArray();
  self.cpf = ko.observable();
  self.name = ko.observable();
  self.dateBirth = ko.observable();
  self.dateAdmission = ko.observable();

  /* GET API */

  self.setData = function(data){
    data.forEach(function(value){
      self.funcionarios.push(new Funcionarios(value));
    });
  };

  $.ajax({
    url: window.global.urlapi + '/v1/funcionarios',
    type: 'GET',
    success: function(result){
      if(!$.isEmptyObject(result.records)){
        self.setData(result.records);
      }
    }
  });

  /* ADD */

  self.addFunc = function(){
    $.ajax({
      url: window.global.urlapi + '/v1/funcionarios',
      type: 'POST',
      data: {
        cpfFuncionario: self.cpf(),
        nomeFuncionario: self.name(),
        dtNascFuncionario: self.dateBirth(),
        dtInicioFuncionario: self.dateAdmission()
      },
        success: function(result){
          self.funcionarios.push(new Funcionarios(result.records));
      }
    });
  };

/* PUT */

  self.editCpf = function(funcionario){
    funcionario.editingCpf(true);
  };

/* DELETE */

  self.deleteFunc = function(func){
    $.ajax({
      url: window.global.urlapi + '/v1/funcionarios/' + func.cdFuncionario(),
      type: 'DELETE',
      success: function(result){
        ko.utils.addOrRemoveItem(self.funcionarios(), func, false);
        self.funcionarios.splice(func.cdFuncionario, 0);
      }
    });
  };

}

ko.applyBindings(new AppViewModel());
