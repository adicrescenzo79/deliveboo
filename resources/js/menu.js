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
  },
  created(){

    let stringSplitted = this.currentUrl.split('/');
    // console.log(stringSplitterd[4]);
    this.slug = stringSplitted[4];

    this.restaurantBySlug();

    // axios.get('http://localhost:8000/api/categories',{
    // }).then((response)=>{
    //   this.categories = response.data.data;
    //   // console.log(response.data.data);
    // });

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

    if (sessionStorage.length != 0) {
      this.cart = JSON.parse(sessionStorage.getItem('session'));
    }
    
    // this.cart = this.actualCart.filter(obj => obj.restaurantSlug == this.slug);
    // this.actualCart = this.actualCart.filter(obj => obj.restaurantSlug != this.slug);
    // // console.log(this.cart);
    // console.log(sessionStorage);
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

      //Aggiorna local Storage
      // sessionStorage.clear();
      sessionStorage.setItem('session', JSON.stringify(this.cart));
      // console.log(sessionStorage);
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
