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
  },
  created(){

    this.allRestaurants();

    axios.get('http://localhost:8000/api/categories',{
    }).then((response)=>{
      this.categories = response.data.data;
      // console.log(response.data.data);
    });


  },

  methods: {
    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantByCategory: function(category){
      this.restaurants = [];
      if (this.categorySelected.includes(category)) {
        this.categorySelected.splice(this.categorySelected.indexOf(category), 1);
      } else {
        this.categorySelected.push(category);
      }

      let categorySelectedJson = JSON.stringify(this.categorySelected);

      console.log(categorySelectedJson);

      axios.get(`http://localhost:8000/api/restaurants/${categorySelectedJson}`,{
      }).then((response)=>{
        this.restaurants = [...this.restaurants, ...response.data.data];
        // console.log(response.data.data);
      });

    },
    //al click vediamo tutti i ristoranti
    allRestaurants: function() {
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
