
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
    }
  }
})

