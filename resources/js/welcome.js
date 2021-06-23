Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data:{
    restaurants: [],
    categories: [],
    restaurant: 4,
    dishes: [],
    categoryIndex: '',

  },
  created(){
    axios.get('http://localhost:8000/api/restaurants',{
    }).then((response)=>{
      this.restaurants = response.data.data;
      // console.log(response.data.data);
    });

    axios.get('http://localhost:8000/api/categories',{
    }).then((response)=>{
      this.categories = response.data.data;
      // console.log(response.data.data);
    });

    axios.get(`http://localhost:8000/api/dishes/${this.restaurant}`,{
    }).then((response)=>{
      this.dishes = response.data.data;
      // console.log(response.data.data);
    });

    // Inizializzazione Slick
    $(document).ready(function(){
      $('.responsive').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
    });

  },
  methods: {
    restaurantByCategory: function(category){
      console.log('ciao');
      this.categoryIndex = category;
      axios.get(`http://localhost:8000/api/restaurants/${this.categoryIndex}`,{
      }).then((response)=>{
        this.restaurants = response.data.data;
        // console.log(response.data.data);
      });

    }
  }

});
