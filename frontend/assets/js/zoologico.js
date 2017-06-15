/* INÍCIO DA CLASSE ZOO */


var Zoo = function(objZoo){

  var self = this;

  self.idZoo = ko.observable(objZoo.idZoo);
  self.nomeZoo = ko.observable(objZoo.nomeZoo);
  self.enderecoZoo = ko.observable(objZoo.enderecoZoo);
  self.editingName = ko.observable(false);
  self.editingAddress = ko.observable(false);

  self.editingName.subscribe(function(editingName){
    console.log(self.editingName());
    if(editingName == false){
        $.ajax({
          url: window.global.urlapi + 'v1/zoos/' + self.idZoo(),
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
          url: window.global.urlapi + '/v1/zoos/' + self.idZoo(),
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
  }

  self.enterEditAddress = function(viewModel, e){
    if(e.keyCode === 13){
      self.editingAddress(false);
    }
  }

};

/* FIM DA CLASSE ZOO */


 /* INÍCIO DA ViewModel */

function AppViewModel(){

  var self = this;
  self.name = ko.observable();
  self.address = ko.observable();
  self.zoos = ko.observableArray();
  self.editing = ko.observable(false);
  self.showRows = ko.observable(false);


  self.showRows.subscribe(function(editingName){
    console.log(self.showRows());
    if(editingName == false){
        $.ajax({
          url: window.global.urlapi + 'v1/zoos/' + self.idZoo(),
          type: 'PUT',
          data: {
            nomeZoo: self.nomeZoo()
          },
          success: function(result){
          }
        });
    }
  })


  /* Exibir aviso de que não há registros no banco */


  /* GET API */

  self.setData = function(data){
      data.forEach(function(value){
        self.zoos.push(new Zoo(value));
    });
  };

  $.ajax({
    url: window.global.urlapi + '/v1/zoos/',
    type: 'GET',
    success: function(result){
      if(!$.isEmptyObject(result.records)){
        console.log(result.records);
        self.setData(result.records);
      }
    }
  });

  /* ADD */

  self.addZoo = function(){
    if(self.name() != ""){
      $.ajax({
        url: window.global.urlapi + '/v1/zoos/',
        type: 'POST',
        data: {
          nomeZoo: self.name(),
          enderecoZoo: self.address()
        },
        success: function(result){
          self.zoos.push(new Zoo(result.records));
        }
      });
    }
  };

  /* PUT */

  self.editName = function(zoo) {
    console.log('nao chama');
    zoo.editingName(true)
  };


  self.editAddress = function(zoo) {
    zoo.editingAddress(true);
  };

  self.occultRows = function(teste) {

  }

  /* DELETE */

  self.deleteZoo = function(zoo){
    $.ajax({
      url: window.global.urlapi + '/v1/zoos/' + zoo.idZoo(),
      type: 'DELETE',
      success: function(result){
        ko.utils.addOrRemoveItem(self.zoos(), zoo, false);
        self.zoos.splice(zoo.idZoo, 0);
      }
    });
  };

}

/* FIM DA VIEWMODEL */


ko.applyBindings(new AppViewModel());
