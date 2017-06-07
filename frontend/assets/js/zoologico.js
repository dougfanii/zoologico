var Zoo = function(objZoo){
  var self = this;

  self.idZoo = ko.observable(objZoo.idZoo);
  self.nomeZoo = ko.observable(objZoo.nomeZoo);
  self.enderecoZoo = ko.observable(objZoo.enderecoZoo);
  self.editingName = ko.observable(false);
  self.editingAddress = ko.observable(false);
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

  self.addZoo = function(){
    if(self.name() != ""){
      $.ajax({
        url: 'http://localhost:81/v1/zoos/',
        type: 'POST',
        data: {
          nomeZoo: self.name(),
          enderecoZoo: self.address()
        },
        success: function(result){
          self.zoos.push(result.records);
          console.log(result.records);
        }
      });
    }
  };

  self.deleteZoo = function(zoo){
    $.ajax({
      url: 'http://localhost:81/v1/zoos/' + zoo.idZoo,
      type: 'DELETE',
      success: function(result){
        ko.utils.addOrRemoveItem(self.zoos(), zoo, false);
        self.zoos.splice(zoo.idZoo, 0);
      }
    });
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
