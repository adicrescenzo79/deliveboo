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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/welcome.js":
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
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
  el: '#main-welcome',
  data: {
    restaurants: [],
    skip: 0,
    categories: [],
    restaurant: 4,
    dishes: [],
    categoryIndex: '',
    categorySelected: [],
    more: true,
    active: false
  },
  created: function created() {
    var _this = this;

    this.allRestaurants();
    axios.get('http://localhost:8000/api/categories', {}).then(function (response) {
      _this.categories = response.data.data;
    });
  },
  methods: {
    prova: function prova() {
      console.log(sessionStorage);
      window.sessionStorage.clear();
      console.log(sessionStorage);
    },
    //al click vediamo tutti i ristoranti della categoria selezionata
    restaurantByCategory: function restaurantByCategory(category) {
      var _this2 = this;

      this.active = true;
      console.log(this.active);
      this.restaurants = [];
      this.more = false; // let cat_obj = {cat: category}

      if (this.categorySelected.includes(category)) {
        this.categorySelected.splice(this.categorySelected.indexOf(category), 1);
      } else {
        this.categorySelected.push(category);
      }

      var categorySelectedJson = JSON.stringify(this.categorySelected); // console.log(categorySelectedJson);

      axios.get("http://localhost:8000/api/restaurants/".concat(categorySelectedJson), {}).then(function (response) {
        // console.log(response.data.data);
        var categoryResponse = response.data.data;
        categoryResponse.forEach(function (item, i) {
          item.restaurants.forEach(function (restaurant, j) {
            _this2.restaurants.push(restaurant); // console.log(restaurant);

          });
        });
      });

      if (!this.categorySelected.length) {
        this.allRestaurants();
      }
    },
    //al click vediamo tutti i ristoranti
    allRestaurants: function allRestaurants() {
      var _this3 = this;

      this.active = true;
      this.categorySelected = [];
      this.restaurants = [];
      this.skip = 0;
      this.more = true;
      axios.get("http://localhost:8000/api/restaurants/nr/".concat(this.skip), {}).then(function (response) {
        // this.restaurants.push(response.data.data);
        _this3.restaurants = [].concat(_toConsumableArray(_this3.restaurants), _toConsumableArray(response.data.data)); //console.log(this.restaurants);
      });
      this.skip += 8;
    },
    //al click carichiamo altri ristoranti
    allRestaurantsPlus: function allRestaurantsPlus() {
      var _this4 = this;

      this.more = true;
      axios.get("http://localhost:8000/api/restaurants/nr/".concat(this.skip), {}).then(function (response) {
        // this.restaurants.push(response.data.data);
        _this4.restaurants = [].concat(_toConsumableArray(_this4.restaurants), _toConsumableArray(response.data.data)); //console.log(this.restaurants);
      });
      this.skip += 8;
    }
  }
});

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/welcome.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/nico/Desktop/Boolean/Esercitazioni/deliveboo/resources/js/welcome.js */"./resources/js/welcome.js");


/***/ })

/******/ });