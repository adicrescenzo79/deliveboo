Vue.config.devtools = true;
let app = new Vue({
  el: '#main-welcome',
  data:{
    restaurants: [],
    categories: [],

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
    })

  }
});
