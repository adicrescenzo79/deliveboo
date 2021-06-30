Vue.config.devtools = true;
let app = new Vue({
  el: '#main_checkout',
  data:{
    restaurant: {},
    // currentUrl: window.location.href,
    dishes: [],
    cart: [],
    slug: '',
    actualCart: [],
    validationcustomer_name: null,
    validationcustomer_email: null,
    validationdelivery_address: null,
    validationcustomer_telephone: null,
    validationdelivery_time: null,
    orderForm: {
      customer_name: '',
      customer_email: '',
      customer_telephone: '',
      delivery_address: '',
      delivery_time: '',
      delivery_notes: '',
      total_paid: null, //prima di creare il json per l'api, calcolare il totale
      restaurant_id: null,
      credit_card:{
        card_number: '4111111111111111',
        cvv: '123',
        expirationDate: '12/29'
      },



    },
    // this.cart: sessionStorage.getItem('cart'),
  },
  created(){
    this.actualCart = JSON.parse(sessionStorage.getItem('session'));
    // console.log(this.actualCart);
    this.slug = sessionStorage.getItem('slug');

    this.cart = this.actualCart.filter(obj => obj.restaurantSlug == this.slug);


    this.orderForm.restaurant_id = this.cart[0].restaurant_id;

    this.total();

    // sessionStorage.removeItem('slug');

    // console.log(this.slug, this.cart);
    // console.log(this.cart[0].restaurant_id);

    //RICORDARSI DI TOGLIERE DALLA SESSION STORAGE I PIATTI CHE PAGIAMO E ANCHE DI RIMUOVERE LO SLUG DEI PIATTI CHE PAGHIAMO
  },

  methods: {
    total: function(){
      // this.cart.forEach((dish, i) => {
      //   dish.price = dish.price.toFixed(2);
      //   console.log(dish.price);
      // });

      let total = 0;
      this.cart.forEach((dish, i) => {
        total += (dish.price * dish.quantity);
      });
      this.orderForm.total_paid = total.toFixed(2);
      return this.orderForm.total_paid;

    },
    sendData: function(){
      const dati = JSON.stringify({
        'cart': this.cart,
        'orderForm': this.orderForm
      })
      // console.log(dati);
      // gestire la chiamata axios post per scrivere nella tabella ordini e nella tabella pivot del database
      // axios.post('http://localhost:8000/api/order', dati)
      // .thien(risposta) => {
      //
      // }

    },

    pay: function(){
      this.total();

      this.validationcustomer_name = null
      this.validationcustomer_email = null
      this.validationdelivery_address = null
      this.validationcustomer_telephone = null
      this.validationdelivery_time = null
      let pay = JSON.stringify({
        'customer_name': this.orderForm.customer_name,
        'customer_email': this.orderForm.customer_email,
        'delivery_address' : this.orderForm.delivery_address,
        'customer_telephone': this.orderForm.customer_telephone,
        'delivery_time': this.orderForm.delivery_time,
        'delivery_notes': this.orderForm.delivery_notes,
        'total_paid': this.orderForm.total_paid,
        'restaurant_id': this.orderForm.restaurant_id,
        'creditCard' : {
          card_name: this.orderForm.customer_name,
          card_number: this.orderForm.credit_card.card_number,
          cvv: this.orderForm.credit_card.cvv,
          expirationDate: this.orderForm.credit_card.expirationDate,
        }
      })
      axios.post('http://localhost:8000/api/checkout', pay)
      .then((risposta) => {
        console.log(risposta.data);
        if (risposta.data.success){
          // this.sendData();
        } else {
          if (risposta.data.validation){
            let validate = risposta.data.validation

            if (validate.customer_name){
              this.validationcustomer_name = validate.customer_name[0]

            }
            if (validate.customer_telephone){
              this.validationcustomer_telephone = validate.customer_telephone[0]
            }
            if (validate.customer_email){
              this.validationcustomer_email = validate.customer_email[0]
            }
            if (validate.delivery_address){
              this.validationdelivery_address = validate.delivery_address[0]
            }
            if (validate.delivery_time){
              this.validationdelivery_time = validate.delivery_time[0]
            }

          }

          if(risposta.data.errors){
            alert("Pagamento rifiutato, ricontrolla i dati della carta di credito")
          }

        }
      })
    },

    // payForm: function(){
    //   this.orderForm.restaurant_id = this.cart[0].restaurant_id;
    //   this.orderForm.total_paid = this.total();
    //
    //   sessionStorage.setItem('order', JSON.stringify(this.orderForm));
    //   console.log(sessionStorage);
    // },
    //al click vediamo tutti i ristoranti della categoria selezionata
    // restaurantBySlug: function(){
    //   axios.get(`http://localhost:8000/api/restaurants/slug/${this.slug}`,{
    //   }).then((response)=>{
    //     this.restaurant = response.data.data;
    //     // console.log(response.data.data);
    //   });
    //
    // },
    //al click vediamo tutti i ristoranti
    // allRestaurants: function() {
    //   this.filteredRestaurants = [];
    //   this.unfiltered = true;
    //   this.categoryIndex = '';
    //   axios.get(`http://localhost:8000/api/restaurants/nr/${this.skip}`,{
    //   }).then((response)=>{
    //     // this.restaurants.push(response.data.data);
    //     this.restaurants = [...this.restaurants, ...response.data.data];
    //     //console.log(this.restaurants);
    //   });
    //   this.skip += 8;
    // },

    //Aggiunta al carrello
    addCart: function(dish) {
      let cartDish = dish;

      if (!this.cart.includes(cartDish)) {
        //Pusho il contenuto nell'array
        this.cart.push(cartDish);
        // console.log(this.cart);
      }

      //Aumento la quantità del piatto
      this.cart[this.cart.indexOf(cartDish)].quantity += 1;

      //Controllo per attivazione bottone
      this.cart.forEach((dish, i) => {
        if (dish.restaurantSlug == this.slug) {
          this.completeButton = true;
        }
      });

      //Aggiorna local Storage
      sessionStorage.setItem('session', JSON.stringify(this.cart));
      // console.log(sessionStorage);
    },

    minusCart: function(dish) {
      let cartDish = dish;

      // console.log(this.cart);
      //Diminuisco la quantità del piatto
      this.cart[this.cart.indexOf(cartDish)].quantity -= 1;

      if (cartDish.quantity == 0) {
        this.cart.splice(this.cart.indexOf(cartDish), 1);
      }

      //Aggiorna local Storage
      sessionStorage.setItem('session', JSON.stringify(this.cart));
      // console.log(sessionStorage);

    },



  }

});
