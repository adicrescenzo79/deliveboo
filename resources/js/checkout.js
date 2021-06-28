Vue.config.devtools = true;
let app = new Vue({
  el: '#main_menu',
  data:{
    restaurant: {},
    currentUrl: window.location.href,
    dishes: [],
    cart: [],
    slug: '',
    actualCart: [],
    // cart: sessionStorage.getItem('cart'),
  },
  created(){
    this.actualCart = JSON.parse(sessionStorage.getItem('session'));
    console.log(this.actualCart);
    this.slug = sessionStorage.getItem('slug');

    this.cart = this.actualCart.filter(obj => obj.restaurantSlug == this.slug);

    // sessionStorage.removeItem('slug');

    console.log(this.slug, this.cart);

    //RICORDARSI DI TOGLIERE DALLA SESSION STORAGE I PIATTI CHE PAGIAMO E ANCHE DI RIMUOVERE LO SLUG DEI PIATTI CHE PAGHIAMO
  },

  methods: {
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

    },


    prova: function() {
      // let products = JSON.stringify(this.cart, this.slug);
      // axios.post(`http://localhost:8000/api/restaurants/`)
      // axios({
      //   method: 'post',
      //   url: 'http://localhost:8000/api/checkout/',
      //   data: {
      //     cart: this.cart,
      //     slug: this.slug
      //   }
      // });

    }
  }

});
