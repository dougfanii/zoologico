 /* INÍCIO DA ViewModel */

var Funcionarios = function(objFunc){

  var self = this;

  self.cdFuncionario = ko.observable(objFunc.cdFuncionario);
  self.cpfFuncionario = ko.observable(objFunc.cpfFuncionario);
  self.nomeFuncionario = ko.observable(objFunc.nomeFuncionario);
  self.dtNascFuncionario = ko.observable(objFunc.dtNascFuncionario);
  self.dtInicioFuncionario = ko.observable(objFunc.dtInicioFuncionario);
  // self.editingField = ko.observableArray([
  //   { turn: false, key: '', value: '' }
  // ]);
  self.editingCpf = ko.observable(false);
  self.editingName = ko.observable(false);
  self.editingDateBirth = ko.observable(false);
  self.editingDateAdmission = ko.observable(false);
  //
  // self.editingField.subscribe(function(editingField){
  //   if(editingField[turn] == false){
  //     $.ajax({
  //       url: window.global.urlapi + '/v1/funcionarios/' + self.cdFuncionario(),
  //       type: 'PUT',
  //       data: {
  //         editingField[key]: editingField[value]
  //       },
  //       success: function(result){
  //       }
  //     });
  //   }
  // })

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

  self.editingName.subscribe(function(editingName){
    if(editingName == false){
      console.log(self.nomeFuncionario());
      $.ajax({
        url: window.global.urlapi + '/v1/funcionarios/' + self.cdFuncionario(),
        type: 'PUT',
        data: {
          nomeFuncionario: self.nomeFuncionario()
        },
        success: function(result){
        }
      });
    }
  })

  self.editingDateBirth.subscribe(function(editingDateBirth){
    if(editingDateBirth == false){
      $.ajax({
        url: window.global.urlapi + '/v1/funcionarios/' + self.cdFuncionario(),
        type: 'PUT',
        data: {
          dtNascFuncionario: self.dtNascFuncionario()
        },
        success: function(result){
        }
      });
    }
  })

  self.editingDateAdmission.subscribe(function(editingDateAdmission){
    if(editingDateAdmission == false){
      $.ajax({
        url: window.global.urlapi + '/v1/funcionarios/' + self.cdFuncionario(),
        type: 'PUT',
        data: {
          dtInicioFuncionario: self.dtInicioFuncionario()
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


/* Exibir aviso de que não há registros no banco */



 /* INÍCIO DA ViewModel */

function AppViewModel(){

  var self = this;
  self.funcionarios = ko.observableArray();
  self.cpf = ko.observable();
  self.name = ko.observable();
  self.dateBirth = ko.observable();
  self.dateAdmission = ko.observable();
  self.showEmpty = ko.observable(false);
  

  self.funcionarios.subscribe(function(){
    if(self.funcionarios().length < 1 || self.funcionarios() == undefined){
      self.showEmpty(true);
      return;
    }
    self.showEmpty(false);
  })

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
        return;
      }
      self.showEmpty(true);
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

  self.editName = function(funcionario){
    funcionario.editingName(true);
  };

  self.editDateBirth = function(funcionario){
    funcionario.editingDateBirth(true);
  };

  self.editDateAdmission = function(funcionario){
    funcionario.editingDateAdmission(true);
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
