Vue.config.devtools = true;
let app = new Vue({
  el: '#main_payment',
  data:{
    orderForm: {},

  },
  created(){
    this.orderForm = JSON.parse(sessionStorage.getItem('order'));
    this.orderForm.total_paid = this.orderForm.total_paid.toFixed(2);
    console.log(this.orderForm);


  },

  methods: {
    // requestPaymentMethod: function(err, payload){
    //
    // }
  }
})
