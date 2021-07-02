Vue.config.devtools = true;
let app = new Vue({
  el: '#main_success',
  data:{

  },
  created(){
    window.sessionStorage.clear();

    setTimeout(function(){
      window.location.href = '/';
    }, 3000);

  }

});
