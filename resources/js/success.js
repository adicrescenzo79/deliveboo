Vue.config.devtools = true;
let app = new Vue({
  el: '#main_success',
  data:{
    countdown: '',
  },
  created(){
    window.sessionStorage.clear();

    this.conto();

    setTimeout(function(){
      window.location.href = '/';
    }, 3000);

  },

  methods: {
    conto: function() {
      var self = this;
      self.countdown = 3;
      setInterval(function() {
        self.countdown --;
      }, 1000);

    }
  }


});
