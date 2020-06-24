var header = new Vue({
  el: '#headerRenamed',
  data: {
    message: 'Some header.'
  }
});

var app6 = new Vue({
  el: '#app-6',
  data: {
    name: '',
    gender:'',
    city: '',
    data: ''
  },
  methods: {
    search: function () {
      let blanValueString = "blankValue";

      var name = (this.name == '')
        ? blanValueString
        : this.name;
      var gender = (this.gender == '')
        ? blanValueString
        : this.gender;
      var city = (this.city == '')
        ? blanValueString
        : this.city;

      let url = "http://127.0.0.1:8000/getContacts/" + name + "/" + gender + "/" + city;

      let that = this;
  		$.get(url, function( data ) {
        that.data = data;
  		});
    }
  }
})

