/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/checkout.js":
/*!**********************************!*\
  !*** ./resources/js/checkout.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

Vue.config.devtools = true;
var app = new Vue({
  el: '#main_checkout',
  data: {
    restaurant: '',
    // currentUrl: window.location.href,
    dishes: [],
    cart: [],
    slug: '',
    actualCart: [],
    validationcustomer_name: null,
    validationcustomer_email: null,
    validationdelivery_address: null,
    validationcustomer_telephone: null,
    validationdelivery_time: null,
    wait: false,
    orderForm: {
      customer_name: 'Nicolò Alivernini',
      customer_email: 'alivernininicolo@gmail.com',
      customer_telephone: '076631575',
      delivery_address: 'Via Montenapoleone, 7 20053 Milano (MI)',
      delivery_time: '19:55',
      delivery_notes: 'Scala B, Interno 6',
      total_paid: null,
      //prima di creare il json per l'api, calcolare il totale
      restaurant_id: null,
      credit_card: {
        card_number: '4111111111111111',
        cvv: '123',
        expirationDate: '12/29'
      }
    } // this.cart: sessionStorage.getItem('cart'),

  },
  created: function created() {
    var _this = this;

    this.actualCart = JSON.parse(sessionStorage.getItem('session')); // console.log(this.actualCart);

    this.slug = sessionStorage.getItem('slug');
    this.restaurant = this.slug.replace(/-/g, ' ');
    this.cart = this.actualCart.filter(function (obj) {
      return obj.restaurantSlug == _this.slug;
    });
    console.log(this.restaurant);
    this.orderForm.restaurant_id = this.cart[0].restaurant_id;
    this.total(); // da cancelllare dopo
    // this.cartDelete();
    // cancellazione carrello
    // sessionStorage.removeItem('slug');
    // console.log(this.slug, this.cart);
    // console.log(this.cart[0].restaurant_id);
    //RICORDARSI DI TOGLIERE DALLA SESSION STORAGE I PIATTI CHE PAGIAMO E ANCHE DI RIMUOVERE LO SLUG DEI PIATTI CHE PAGHIAMO
  },
  methods: {
    cartDelete: function cartDelete() {
      var _this2 = this;

      var currentCart = JSON.parse(sessionStorage.getItem('session'));
      currentCart = currentCart.filter(function (obj) {
        return obj.restaurantSlug != _this2.slug;
      });
      console.log(sessionStorage);
      window.sessionStorage.clear();
      sessionStorage.setItem('session', JSON.stringify(currentCart));
    },
    total: function total() {
      var total = 0;
      this.cart.forEach(function (dish, i) {
        total += dish.price * dish.quantity;
      });
      this.orderForm.total_paid = total.toFixed(2);
      return this.orderForm.total_paid;
    },
    sendData: function sendData() {
      var _this3 = this;

      var newCart = [];
      this.cart.forEach(function (item, i) {
        var dish = {
          'dish_id': item.id,
          'dish_quantity': item.quantity
        };
        newCart.push(dish);
      });
      var dish_ids = [];
      var dish_quantities = [];
      this.cart.forEach(function (item, i) {
        dish_ids.push(item.id);
        dish_quantities.push(item.quantity);
      });
      var dati = JSON.stringify({
        'cart': newCart,
        'orderForm': this.orderForm,
        'dish_ids': dish_ids,
        'dish_quantities': dish_quantities
      }); // gestire la chiamata axios post per scrivere nella tabella ordini e nella tabella pivot del database

      axios.post('http://localhost:8000/api/orders', dati).then(function (risposta) {
        console.log(risposta);

        if (risposta.data.success) {
          //Funzione
          _this3.cartDelete;
          window.location.href = '/success';
        }
      });
    },
    pay: function pay() {
      var _this4 = this;

      this.wait = true;
      this.total();
      this.validationcustomer_name = null;
      this.validationcustomer_email = null;
      this.validationdelivery_address = null;
      this.validationcustomer_telephone = null;
      this.validationdelivery_time = null;
      var pay = JSON.stringify({
        'customer_name': this.orderForm.customer_name,
        'customer_email': this.orderForm.customer_email,
        'delivery_address': this.orderForm.delivery_address,
        'customer_telephone': this.orderForm.customer_telephone,
        'delivery_time': this.orderForm.delivery_time,
        'delivery_notes': this.orderForm.delivery_notes,
        'total_paid': this.orderForm.total_paid,
        'restaurant_id': this.orderForm.restaurant_id,
        'creditCard': {
          card_name: this.orderForm.customer_name,
          card_number: this.orderForm.credit_card.card_number,
          cvv: this.orderForm.credit_card.cvv,
          expirationDate: this.orderForm.credit_card.expirationDate
        }
      });
      axios.post('http://localhost:8000/api/checkout', pay).then(function (risposta) {
        if (risposta.data.success) {
          _this4.sendData();
        } else {
          if (risposta.data.validation) {
            var validate = risposta.data.validation;

            if (validate.customer_name) {
              _this4.validationcustomer_name = validate.customer_name[0];
            }

            if (validate.customer_telephone) {
              _this4.validationcustomer_telephone = validate.customer_telephone[0];
            }

            if (validate.customer_email) {
              _this4.validationcustomer_email = validate.customer_email[0];
            }

            if (validate.delivery_address) {
              _this4.validationdelivery_address = validate.delivery_address[0];
            }

            if (validate.delivery_time) {
              _this4.validationdelivery_time = validate.delivery_time[0];
            }
          }

          if (risposta.data.errors) {
            alert("Pagamento rifiutato, ricontrolla i dati della carta di credito");
          }
        }
      });
    },
    //Aggiunta al carrello
    totDishes: function totDishes() {
      var tot = 0;
      this.cart.forEach(function (dish, i) {
        tot += dish.quantity;
      });
      return tot;
    },
    addCart: function addCart(dish) {
      var _this5 = this;

      var cartDish = dish;

      if (!this.cart.includes(cartDish)) {
        //Pusho il contenuto nell'array
        this.cart.push(cartDish); // console.log(this.cart);
      } //Aumento la quantità del piatto


      this.cart[this.cart.indexOf(cartDish)].quantity += 1; //Controllo per attivazione bottone

      this.cart.forEach(function (dish, i) {
        if (dish.restaurantSlug == _this5.slug) {
          _this5.completeButton = true;
        }
      }); //Aggiorna local Storage

      sessionStorage.setItem('session', JSON.stringify(this.cart)); // console.log(sessionStorage);
    },
    minusCart: function minusCart(dish) {
      var cartDish = dish; // console.log(this.cart);
      //Diminuisco la quantità del piatto

      this.cart[this.cart.indexOf(cartDish)].quantity -= 1;

      if (cartDish.quantity == 0) {
        this.cart.splice(this.cart.indexOf(cartDish), 1);
      } //Aggiorna local Storage


      sessionStorage.setItem('session', JSON.stringify(this.cart)); // console.log(sessionStorage);
    }
  }
});

/***/ }),

/***/ 3:
/*!****************************************!*\
  !*** multi ./resources/js/checkout.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Utente\Desktop\progetto_finale\deliveboo\resources\js\checkout.js */"./resources/js/checkout.js");


/***/ })

/******/ });