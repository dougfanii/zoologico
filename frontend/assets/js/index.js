function AppViewModel(){
  var self = this;

  self.person = ko.observable();

  self.pessoas =  ko.observableArray([]);

  self.addPerson = function(pessoa){
    console.log(self.person());
    if(self.person() != ""){
      self.pessoas.push(self.person());
      self.person("");
    }
  }

  self.newPerson = function(viewModel, e){
    // console.log(viewModel, e);
    if(e.keyCode === 13){
      self.addPerson();
    }
  }

  self.arrAnimals = ko.observableArray();
  self.setData = function(data){
    console.log(data[0].Animal.NomeAnimal);
  };

  $.ajax({
    url: 'http://localhost:81/v1/animais',
    type: 'GET',
    success: function(result){
      // console.log(result);
      self.setData(result.records)
    }
  });



}


ko.applyBindings(new AppViewModel());
