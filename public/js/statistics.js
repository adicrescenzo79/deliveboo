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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/statistics.js":
/*!************************************!*\
  !*** ./resources/js/statistics.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Vue.config.devtools = true;
var app = new Vue({
  el: '#statistics_index_main',
  data: {
    currentUrl: window.location.href,
    restaurant_id: '',
    labels: [],
    months: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
    orders: [],
    startArray: [],
    total_paids: [],
    years: [],
    yearChosen: '',
    orderByYear: []
  },
  mounted: function mounted() {
    var _this = this;

    var stringSplitted = this.currentUrl.split('/');
    this.restaurant_id = parseInt(stringSplitted[5]);
    var id = JSON.stringify(this.restaurant_id);
    axios.get("http://localhost:8000/api/orders/".concat(id), {}).then(function (response) {
      _this.orders = response.data.data;

      _this.orders.forEach(function (order, i) {
        var month = order.created_at.split('-')[1];
        var year = order.created_at.split('-')[0];

        if (!_this.years.includes(year)) {
          _this.years.push(year);
        }

        _this.years = _this.years.sort();

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

      var ordersNew = [];

      _this.orders.forEach(function (order, i) {
        var orderNew = {
          created_at: order.created_at,
          total_paid: order.total_paid,
          year: order.updated_at.split('-')[0]
        };
        ordersNew.push(orderNew);
      });

      _this.orders = ordersNew;
    }); // scelta dell'anno
  },
  methods: {
    scelta: function scelta(year) {
      var _this2 = this;

      console.log(year);
      this.yearChosen = year;
      console.log(this.orders);
      this.orderByYear = this.orders.filter(function (obj) {
        return obj.year == _this2.yearChosen;
      });
      console.log(this.orderByYear);
      var helper = {};
      var result = this.orderByYear.reduce(function (r, o) {
        var key = o.created_at;

        if (!helper[key]) {
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
      this.months.forEach(function (month, i) {
        helper = {
          created_at: month,
          total_paid: 0,
          monthNr: i + 1
        };
        result.push(helper);
      });
      this.startArray = result;
      var result = [];
      var helper = {};
      this.startArray.forEach(function (start, i) {
        _this2.orderByYear.forEach(function (order, j) {
          if (start.created_at == order.created_at) {
            start.total_paid = order.total_paid;
          }
        });
      });
      this.orderByYear = this.startArray;
      this.orderByYear.forEach(function (order, i) {
        _this2.total_paids.push(order.total_paid);
      });
      this.labels = this.months;
      this.carica();
    },
    carica: function carica() {
      if (myChart) {
        myChart.destroy();
      }

      var data = {
        labels: this.months,
        datasets: [{
          label: 'Incasso mensile',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: this.total_paids
        }]
      };
      var config = {
        type: 'line',
        data: data,
        options: {}
      };
      var myChart = new Chart(document.getElementById('myChart'), config);
    }
  }
});

/***/ }),

/***/ 6:
/*!******************************************!*\
  !*** multi ./resources/js/statistics.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\adicr\Documents\Boolean\deliveboo\resources\js\statistics.js */"./resources/js/statistics.js");


/***/ })

/******/ });