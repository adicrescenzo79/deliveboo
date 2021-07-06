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
    background: '',
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

    // let totalCart = JSON.parse(sessionStor\age.getItem)
    // console.log(sessionStorage.getItem('session'));

    if (sessionStorage.length != 0) {
      this.cart = JSON.parse(sessionStorage.getItem('session'));
      this.cart.forEach((dish, i) => {
        if (dish.restaurantSlug == this.slug) {
          this.completeButton = true;
        }
      });
    }

    // console.log(this.dishes);


  },

  methods: {
    total: function(){
      let cart = this.cart.filter(obj => obj.restaurantSlug == this.slug);

      let total = 0;
      cart.forEach((dish, i) => {
        total += (dish.price * dish.quantity);
      });
      return total;

    },

    totDishes: function(){
      let cart = this.cart.filter(obj => obj.restaurantSlug == this.slug);

      let tot = 0;
      cart.forEach((dish, i) => {
        tot += dish.quantity;
        // console.log(dish.quantity);
      });
      sessionStorage.setItem('session', JSON.stringify(this.cart));
      return tot;

    },

    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantBySlug: function(){
      axios.get(`http://localhost:8000/api/restaurants/slug/${this.slug}`,{
      }).then((response)=>{
        this.restaurant = response.data.data;
        // console.log(response.data.data);
        console.log(this.restaurant);
        this.background = 'background-image: url(' + this.restaurant.cover_image + ')'

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
    },


      //Togliere dal carrello
    minusCart: function(dish) {
      let cartDish = dish;
      this.cart[this.cart.indexOf(cartDish)].quantity -= 1;
      if (cartDish.quantity == 0) {
        this.cart.splice(this.cart.indexOf(cartDish), 1);
      }
      sessionStorage.setItem('session', JSON.stringify(this.cart));
    },

    completeOrder: function() {
      sessionStorage.setItem('slug', this.slug);
    }
  }

});
