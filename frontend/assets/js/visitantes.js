var Visitante = function(objVisitante){
  var self = this;

  self.idVisitante = ko.observable(objVisitante.idVisitante);
  self.nomeVisitante = ko.observable(objVisitante.nomeVisitante);
  self.dtNascVisitante = ko.observable(objVisitante.dtNascVisitante);
  self.editingName = ko.observable(false);
  self.editingBirth = ko.observable(false);

  self.editingName.subscribe(function(editingName){
    if(editingName == false){
        $.ajax({
          url: 'v1/zoos/' + self.idVisitante(),
          type: 'PUT',
          data: {
            nomeVisitante: self.nomeVisitante()
          },
          success: function(result){
          }
        });
    }
  })

  self.editingBirth.subscribe(function(editingBirth){
    if(editingBirth == false){
        $.ajax({
          url: 'http://localhost:81/v1/zoos/' + self.idVisitante(),
          type: 'PUT',
          data: {
            dtNascVisitante: self.dtNascVisitante()
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
    console.log(e.keyCode);
    if(e.keyCode === 9){
      self.editingBirth(true);
    }
  }

  self.entereditBirth = function(viewModel, e){
    if(e.keyCode === 13){
      self.editingBirth(false);
    }
  }

};

function AppViewModel(){
  var self = this;

  self.name = ko.observable();
  self.address = ko.observable();
  self.visitors = ko.observableArray();

  self.editing = ko.observable(false);
  self.editName = function(zoo) {
    zoo.editingName(true)
  };


  self.editBirth = function(zoo) {
    zoo.editingBirth(true);
  };

  // if(zoo.editingBirth() == false){
  //   alert("não  está aprecendo");
  // }

  self.addVisitante = function(){
    if(self.name() != ""){
      $.ajax({
        url: 'http://localhost:81/v1/zoos/',
        type: 'POST',
        data: {
          ko.utils.addOrRemoveItem(self.zoos(), zoo, false);
          nomeVisitante: self.name(),
          dtNascVisitante: self.address()
        },
        success: function(result){
          self.zoos.push(new Visitors(result.records));
          // self.zoos.push(result.records)
          console.log(self.visitantes());
        }
      });
    }
  };

  self.deleteVisistante = function(visitantes){
    console.visitante.idVisitante());
    $.ajax({
      url: 'http://localhost:81/v1/zoos/' + visitantes.idVisitante(),
      type: 'DELETE',
      success: function(result){
        self.zoos.splice(zoo.idVisitante, 0);
      }
    });
    console.log("excluido com sucesso");
  };

  self.setData = function(data){
      data.forEach(function(value, index){
      self.visitantes.push(new Visitantes(value));
    });
  };

  $.ajax({
    url: window.global.urlapi + '/v1/visitantes/',
    type: 'GET',
    success: function(result){
      self.setData(result.records)
    }
  });

}


ko.applyBindings(new AppViewModel());
