Vue.config.devtools = true;
let app = new Vue({
  el: '#main_menu',
  data:{
    restaurant: {},
    currentUrl: window.location.href,
    dishes: [],
    slug: '',
    cart: [],
    actualCart: [],
    completeButton: false,
  },
  created(){



    let stringSplitted = this.currentUrl.split('/');
    // console.log(stringSplitterd[4]);
    this.slug = stringSplitted[4];

    this.restaurantBySlug();

    axios.get(`http://localhost:8000/api/dishes/${this.slug}`,{
    }).then((response)=>{
      let dishes = response.data.data;
      dishes.forEach((item, i) => {
      dishes[i].quantity = 0;
      dishes[i].restaurantSlug = this.slug;
      this.dishes.push(dishes[i])
      });
      // console.log(this.dishes);
    });

    // let totalCart = JSON.parse(sessionStorage.getItem)
    // console.log(sessionStorage.getItem('session'));

    if (sessionStorage.length != 0) {
      this.cart = JSON.parse(sessionStorage.getItem('session'));
      this.cart.forEach((dish, i) => {
        if (dish.restaurantSlug == this.slug) {
          this.completeButton = true;
        }
      });
    }

    console.log(this.dishes);


  },

  methods: {
    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantBySlug: function(){
      axios.get(`http://localhost:8000/api/restaurants/slug/${this.slug}`,{
      }).then((response)=>{
        this.restaurant = response.data.data;
        console.log(response.data.data);
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


      //Togliere dal carrello
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

    completeOrder: function() {
      sessionStorage.setItem('slug', this.slug);

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
      // sessionStorage.clear();
      // this.cart.forEach((dish, i) => {
      //   sessionStorage.setItem(`${cart[i]}`, dish);
      // });
      // sessionStorage.setItem('slug', this.slug);
      //
      // sessionStorage.setItem('session', JSON.stringify(this.cart));
    }
  }

});
