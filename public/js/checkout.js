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

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

Vue.config.devtools = true;
var app = new Vue({
  el: '#main_menu',
  data: {
    restaurant: {},
    currentUrl: window.location.href,
    dishes: [],
    cart: [] // slug: localStorage.getItem('slug'),
    // cart: localStorage.getItem('cart'),

  },
  created: function created() {
    // console.log(JSON.parse(localStorage.getItem('session')));
    var actualCart = JSON.parse(localStorage.getItem('session'));
    this.cart = actualCart;
    localStorage.clear(); // let stringSplitted = this.currentUrl.split('/');
    // console.log(stringSplitterd[4]);
    // this.slug = stringSplitted[4];
    // this.restaurantBySlug();
    // axios.get('http://localhost:8000/api/categories',{
    // }).then((response)=>{
    //   this.categories = response.data.data;
    //   // console.log(response.data.data);
    // });
    // axios.get(`http://localhost:8000/api/dishes/${this.slug}`,{
    // }).then((response)=>{
    //   let dishes = response.data.data;
    //   dishes.forEach((item, i) => {
    //   dishes[i].quantity = 0;
    //   this.dishes.push(dishes[i])
    //   });
    //   // console.log(this.dishes);
    // });
  },
  methods: {
    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantBySlug: function restaurantBySlug() {
      var _this = this;

      axios.get("http://localhost:8000/api/restaurants/slug/".concat(this.slug), {}).then(function (response) {
        _this.restaurant = response.data.data; // console.log(response.data.data);
      });
    },
    //al click vediamo tutti i ristoranti
    allRestaurants: function allRestaurants() {
      var _this2 = this;

      this.filteredRestaurants = [];
      this.unfiltered = true;
      this.categoryIndex = '';
      axios.get("http://localhost:8000/api/restaurants/nr/".concat(this.skip), {}).then(function (response) {
        // this.restaurants.push(response.data.data);
        _this2.restaurants = [].concat(_toConsumableArray(_this2.restaurants), _toConsumableArray(response.data.data)); //console.log(this.restaurants);
      });
      this.skip += 8;
    },
    //Aggiunta al carrello
    addCart: function addCart(dish) {
      var cartDish = dish;

      if (!this.cart.includes(cartDish)) {
        //Pusho il contenuto nell'array
        this.cart.push(cartDish); // console.log(this.cart);
      } //Aumento la quantità del piatto


      this.cart[this.cart.indexOf(cartDish)].quantity += 1;
    },
    prova: function prova() {// let products = JSON.stringify(this.cart, this.slug);
      // axios.post(`http://localhost:8000/api/restaurants/`)
      // axios({
      //   method: 'post',
      //   url: 'http://localhost:8000/api/checkout/',
      //   data: {
      //     cart: this.cart,
      //     slug: this.slug
      //   }
      // });
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