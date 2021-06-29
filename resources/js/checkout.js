Vue.config.devtools = true;
let app = new Vue({
  el: '#main_checkout',
  data:{
    restaurant: {},
    currentUrl: window.location.href,
    dishes: [],
    cart: [],
    slug: '',
    actualCart: [],
    orderForm: {
      customer_name: '',
      customer_email: '',
      customer_telephone: '',
      delivery_address: '',
      delivery_time: '',
      delivery_notes: '',
      total_paid: null, //prima di creare il json per l'api, calcolare il totale
      restaurant_id: null,


    },
    // this.cart: sessionStorage.getItem('cart'),
  },
  created(){
    this.actualCart = JSON.parse(sessionStorage.getItem('session'));
    // console.log(this.actualCart);
    this.slug = sessionStorage.getItem('slug');

    this.cart = this.actualCart.filter(obj => obj.restaurantSlug == this.slug);

    // sessionStorage.removeItem('slug');

    // console.log(this.slug, this.cart);
    // console.log(this.cart[0].restaurant_id);

    //RICORDARSI DI TOGLIERE DALLA SESSION STORAGE I PIATTI CHE PAGIAMO E ANCHE DI RIMUOVERE LO SLUG DEI PIATTI CHE PAGHIAMO
  },

  methods: {
    total: function(){
      let total = 0;
      this.cart.forEach((dish, i) => {
        total += (dish.price * dish.quantity);
      });
      return total;

    },

    payForm: function(){
      this.orderForm.restaurant_id = this.cart[0].restaurant_id;
      this.orderForm.total_paid = this.total();

      sessionStorage.setItem('order', JSON.stringify(this.orderForm));
      console.log(sessionStorage);
    },
    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantBySlug: function(){
      axios.get(`http://localhost:8000/api/restaurants/slug/${this.slug}`,{
      }).then((response)=>{
        this.restaurant = response.data.data;
        // console.log(response.data.data);
      });

    },
    //al click vediamo tutti i ristoranti
    allRestaurants: function() {
      this.filteredRestaurants = [];
      this.unfiltered = true;
      this.categoryIndex = '';
      axios.get(`http://localhost:8000/api/restaurants/nr/${this.skip}`,{
      }).then((response)=>{
        // this.restaurants.push(response.data.data);
        this.restaurants = [...this.restaurants, ...response.data.data];
        //console.log(this.restaurants);
      });
      this.skip += 8;
    },

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
