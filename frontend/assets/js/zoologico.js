var Zoo = function(objZoo){
  var self = this;

  self.idVisitante = ko.observable(objZoo.idVisitante);
  self.nomeVisitante = ko.observable(objZoo.nomeVisitante);
  self.dtNascVisitante = ko.observable(objZoo.dtNascVisitante);
  self.editingName = ko.observable(false);
  self.editingAddress = ko.observable(false);

  self.editingName.subscribe(function(editingName){
    if(editingName == false){
        $.ajax({
          url: 'http://localhost:81/v1/zoos/' + self.idZoo(),
          type: 'PUT',
          data: {
            nomeZoo: self.nomeZoo()
          },
          success: function(result){
          }
        });
    }
  })

  self.editingAddress.subscribe(function(editingAddress){
    if(editingAddress == false){
        $.ajax({
          url: 'http://localhost:81/v1/zoos/' + self.idZoo(),
          type: 'PUT',
          data: {
            enderecoZoo: self.enderecoZoo()
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
      self.editingAddress(true);
    }
  }

  self.enterEditAddress = function(viewModel, e){
    if(e.keyCode === 13){
      self.editingAddress(false);
    }
  }

};

function AppViewModel(){
  var self = this;

  self.name = ko.observable();
  self.address = ko.observable();
  self.zoos = ko.observableArray();

  self.editing = ko.observable(false);
  self.editName = function(zoo) {
    zoo.editingName(true)
  };


  self.editAddress = function(zoo) {
    zoo.editingAddress(true);
  };

  // if(zoo.editingAddress() == false){
  //   alert("não  está aprecendo");
  // }

  self.addZoo = function(){
    console.log("entrou");
    if(self.name() != ""){
      $.ajax({
        url: 'http://localhost:81/v1/zoos/',
        type: 'POST',
        data: {
          nomeZoo: self.name(),
          enderecoZoo: self.address()
        },
        success: function(result){
          self.zoos.push(new Zoo(result.records));
          // self.zoos.push(result.records)
          console.log(self.zoos());
        }
      });
    }
  };

  self.deleteZoo = function(zoo){
    console.log(zoo.idZoo());
    $.ajax({
      url: 'http://localhost:81/v1/zoos/' + zoo.idZoo(),
      type: 'DELETE',
      success: function(result){
        ko.utils.addOrRemoveItem(self.zoos(), zoo, false);
        self.zoos.splice(zoo.idZoo, 0);
      }
    });
    console.log("excluido com sucesso");
  };

  self.setData = function(data){
    data.forEach(function(value, index){
      self.zoos.push(new Zoo(value));
    });
  };

  $.ajax({
    url: 'http://localhost:81/v1/zoos/',
    type: 'GET',
    success: function(result){
      self.setData(result.records)
    }
  });

}


ko.applyBindings(new AppViewModel());
