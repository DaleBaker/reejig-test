
var header = new Vue({
  el: '#header',
  data: {
    message: 'Some header.'
  }
});

var app6 = new Vue({
  el: '#app-6',
  data: {
    name: 'a!',
    gender: 'b!',
    city: 'c!',
  },
  methods: {
    search: function () {
		console.log(this.name);
		console.log(this.gender);
		console.log(this.city);
		$.get( "http://127.0.0.1:8000/getContacts/", function( data ) {
			console.log(data);
		});
    }
  }
})

