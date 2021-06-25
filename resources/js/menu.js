Vue.config.devtools = true;
let app = new Vue({
  el: '#main_menu',
  data:{
    restaurant: {},
    currentUrl: window.location.href,
    dishes: [],
    slug: '',
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
      this.dishes = response.data.data;
      console.log(response.data.data);
    });

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
    }
  }

});