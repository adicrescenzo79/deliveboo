
Vue.config.devtools = true;
let app = new Vue({
  el: '#statistics_index_main',
  data:{
    currentUrl: window.location.href,
    restaurant_id: '',
    labels: [],
    months: [
      'Gennaio',
      'Febbraio',
      'Marzo',
      'Aprile',
      'Maggio',
      'Giugno',
      'Luglio',
      'Agosto',
      'Settembre',
      'Ottobre',
      'Novembre',
      'Dicembre',
    ],
    orders: [],
    startArray: [],
    total_paids: [],
    years: [],
    yearChosen: '',
    orderByYear: [],
  },
  mounted(){

    let stringSplitted = this.currentUrl.split('/');

    this.restaurant_id = parseInt(stringSplitted[5]);



    let id = JSON.stringify(this.restaurant_id);




    axios.get(`http://localhost:8000/api/orders/${id}`, {
    }).then((response)=>{
      this.orders = response.data.data;

      this.orders.forEach((order, i) => {
        let month = order.created_at.split('-')[1];
        let year = order.created_at.split('-')[0];
        if (!this.years.includes(year)) {

          this.years.push(year);
        }
        this.years = this.years.sort();
        switch (month) {
          case '01':
          order.created_at = 'Gennaio';
           break;
          case '02':
          order.created_at = 'Febbraio';
           break;
          case '03':
          order.created_at = 'Marzo';
           break;
          case '04':
          order.created_at = 'Aprile';
           break;
          case '05':
          order.created_at = 'Maggio';
           break;
          case '06':
          order.created_at = 'Giugno';
           break;
          case '07':
          order.created_at = 'Luglio';
           break;
          case '08':
          order.created_at = 'Agosto';
           break;
          case '09':
          order.created_at = 'Settembre';
           break;
          case '10':
          order.created_at = 'Ottobre';
           break;
          case '11':
          order.created_at = 'Novembre';
           break;
          case '12':
          order.created_at = 'Dicembre';
           break;
          }
      });
      let ordersNew = [];
      this.orders.forEach((order, i) => {
        let orderNew = {
          created_at: order.created_at,
          total_paid: order.total_paid,
          year: order.updated_at.split('-')[0],
        }
        ordersNew.push(orderNew);
      });
      this.orders = ordersNew;
    });

// scelta dell'anno



  },
  methods: {
    scelta: function(year){
      console.log(year);

      this.yearChosen = year;
      console.log(this.orders);

      this.orderByYear = this.orders.filter(obj => obj.year == this.yearChosen);

      console.log(this.orderByYear);


      var helper = {};
      var result = this.orderByYear.reduce(function(r, o) {
        var key = o.created_at;

        if(!helper[key]) {
          helper[key] = Object.assign({}, o); // create a copy of o
          r.push(helper[key]);
        } else {
          helper[key].total_paid += o.total_paid;
        }

        return r;
      }, []);

      this.orderByYear = result;

      var result = [];
      var helper = {};
      this.months.forEach((month, i) => {
        helper = {
          created_at: month,
          total_paid: 0,
          monthNr: i+1,

        }
        result.push(helper);
      });

      this.startArray = result;

      var result = [];
      var helper = {};

      this.startArray.forEach((start, i) => {
        this.orderByYear.forEach((order, j) => {
          if (start.created_at == order.created_at) {
            start.total_paid = order.total_paid;
          }
        });

      });

      this.orderByYear = this.startArray;

      this.orderByYear.forEach((order, i) => {
        this.total_paids.push(order.total_paid);
      });






    this.labels = this.months;

    this.carica();

  },
    carica: function(){
      if (myChart) {
        myChart.destroy();
      }
      const data = {
        labels: this.months,
        datasets: [{
          label: 'Incasso mensile',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: this.total_paids,
        }]
      };
      const config = {
        type: 'line',
        data,
        options: {}
      };



      var myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

    }
  }

});
