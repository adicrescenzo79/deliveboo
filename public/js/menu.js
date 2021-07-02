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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/menu.js":
/*!******************************!*\
  !*** ./resources/js/menu.js ***!
  \******************************/
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
    slug: '',
    cart: [],
    actualCart: [],
    completeButton: false,
    background: ''
  },
  created: function created() {
    var _this = this;

    var stringSplitted = this.currentUrl.split('/'); // console.log(stringSplitterd[4]);

    this.slug = stringSplitted[4];
    this.restaurantBySlug();
    axios.get("http://localhost:8000/api/dishes/".concat(this.slug), {}).then(function (response) {
      var dishes = response.data.data;
      dishes.forEach(function (item, i) {
        dishes[i].quantity = 0;
        dishes[i].restaurantSlug = _this.slug;

        _this.dishes.push(dishes[i]);
      }); // console.log(this.dishes);
    }); // let totalCart = JSON.parse(sessionStor\age.getItem)
    // console.log(sessionStorage.getItem('session'));

    if (sessionStorage.length != 0) {
      this.cart = JSON.parse(sessionStorage.getItem('session'));
      this.cart.forEach(function (dish, i) {
        if (dish.restaurantSlug == _this.slug) {
          _this.completeButton = true;
        }
      });
    } // console.log(this.dishes);

  },
  methods: {
    total: function total() {
      var _this2 = this;

      var cart = this.cart.filter(function (obj) {
        return obj.restaurantSlug == _this2.slug;
      });
      var total = 0;
      cart.forEach(function (dish, i) {
        total += dish.price * dish.quantity;
      });
      return total;
    },
    totDishes: function totDishes() {
      var _this3 = this;

      var cart = this.cart.filter(function (obj) {
        return obj.restaurantSlug == _this3.slug;
      });
      var tot = 0;
      cart.forEach(function (dish, i) {
        tot += dish.quantity; // console.log(dish.quantity);
      });
      sessionStorage.setItem('session', JSON.stringify(this.cart));
      return tot;
    },
    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantBySlug: function restaurantBySlug() {
      var _this4 = this;

      axios.get("http://localhost:8000/api/restaurants/slug/".concat(this.slug), {}).then(function (response) {
        _this4.restaurant = response.data.data; // console.log(response.data.data);

        console.log(_this4.restaurant);
        _this4.background = 'background-image: url(' + _this4.restaurant.cover_image + ')';
      });
    },
    //al click vediamo tutti i ristoranti
    allRestaurants: function allRestaurants() {
      var _this5 = this;

      this.filteredRestaurants = [];
      this.unfiltered = true;
      this.categoryIndex = '';
      axios.get("http://localhost:8000/api/restaurants/nr/".concat(this.skip), {}).then(function (response) {
        // this.restaurants.push(response.data.data);
        _this5.restaurants = [].concat(_toConsumableArray(_this5.restaurants), _toConsumableArray(response.data.data)); //console.log(this.restaurants);
      });
      this.skip += 8;
    },
    //Aggiunta al carrello
    addCart: function addCart(dish) {
      var _this6 = this;

      var cartDish = dish;

      if (!this.cart.includes(cartDish)) {
        //Pusho il contenuto nell'array
        this.cart.push(cartDish);
      } //Aumento la quantità del piatto


      this.cart[this.cart.indexOf(cartDish)].quantity += 1; //Controllo per attivazione bottone

      this.cart.forEach(function (dish, i) {
        if (dish.restaurantSlug == _this6.slug) {
          _this6.completeButton = true;
        }
      }); //Aggiorna local Storage

      sessionStorage.setItem('session', JSON.stringify(this.cart));
    },
    //Togliere dal carrello
    minusCart: function minusCart(dish) {
      var cartDish = dish;
      this.cart[this.cart.indexOf(cartDish)].quantity -= 1;

      if (cartDish.quantity == 0) {
        this.cart.splice(this.cart.indexOf(cartDish), 1);
      }

      sessionStorage.setItem('session', JSON.stringify(this.cart));
    },
    completeOrder: function completeOrder() {
      sessionStorage.setItem('slug', this.slug);
    }
  }
});

/***/ }),

/***/ 2:
/*!************************************!*\
  !*** multi ./resources/js/menu.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\cerne\Git_Hub_Progetti\LARAVEL\deliveboo\resources\js\menu.js */"./resources/js/menu.js");


/***/ })

/******/ });