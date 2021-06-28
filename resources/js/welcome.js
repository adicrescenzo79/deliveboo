Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data:{
    restaurants: [],
    skip: 0,
    categories: [],
    restaurant: 4,
    dishes: [],
    categoryIndex: '',
    categorySelected: [],
    more: true,
  },
  created(){

    this.allRestaurants();

    axios.get('http://localhost:8000/api/categories',{
    }).then((response)=>{
      this.categories = response.data.data;
    });


  },

  methods: {
    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantByCategory: function(category){
      this.restaurants = [];
      this.more = false;
      // let cat_obj = {cat: category}
      if (this.categorySelected.includes(category)) {
        this.categorySelected.splice(this.categorySelected.indexOf(category), 1);
      } else {
        this.categorySelected.push(category);
      }

      let categorySelectedJson = JSON.stringify(this.categorySelected);

      // console.log(categorySelectedJson);

      axios.get(`http://localhost:8000/api/restaurants/${categorySelectedJson}`,{
      }).then((response)=>{
        // console.log(response.data.data);
        let categoryResponse = response.data.data;

        categoryResponse.forEach((item, i) => {
          item.restaurants.forEach((restaurant, j) => {
            this.restaurants.push(restaurant);
            // console.log(restaurant);
          });
        });

      });
    },
    //al click vediamo tutti i ristoranti
    allRestaurants: function() {
      this.categorySelected = [];
      this.restaurants = [];
      this.skip = 0;
      this.more = true;
      axios.get(`http://localhost:8000/api/restaurants/nr/${this.skip}`,{
      }).then((response)=>{
        // this.restaurants.push(response.data.data);
        this.restaurants = [...this.restaurants, ...response.data.data];
        //console.log(this.restaurants);
      });
      this.skip += 8;
    },

    //al click carichiamo altri ristoranti
    allRestaurantsPlus: function() {
      this.more = true;
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
