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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js"); // require('froala-editor');
// import FroalaEditor from 'froala-editor'
// // new FroalaEditor('textarea');
// let editor = new FroalaEditor('div#froala-editor', {
//     toolbarInline: true,
//     dragInline: true,
// }, function(){
//     console.log(editor.html.get())
// });
// $('#test').click(function(){
//     console.log(editor.html.get())
// });
// import Vue from 'vue';
// import App from './components/App.vue';


var start = 0;
var parent = 1;
var getValue = 0;
$('.key-value').each(function () {
  var value = parseInt($(this).val());
  getValue = value > getValue ? value : getValue;
});
getValue = getValue + 1;

if (getValue) {
  start = getValue;
}

var parentidCurrent = parseInt($('.parentidCurrent').last().val());

if (parentidCurrent) {
  parent = parentidCurrent + 1;
}

$('#add_page').on('click', function () {
  console.log('onclick1');
  $('.list_pages').append('<label class="parent">Strona: <input required type="text" name="page_name[' + start + ']" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input required type="text" name="page_title[' + start + ']" placeholder="Nazwa strony" class="mr-2"><input hidden required type="text" name="parents_items[' + start + ']" value="' + parent + '" class="mr-2"><input hidden type="text" name="page_parent[' + start + ']" value="" placeholder="rodzica brak wiec null" class="mr-2"><input hidden type="text" placeholder="numer = null"  name="page_number[' + start + ']" class="number" value="" class="mr-2"><input type="button" class="test" data-id="' + parent + '" value="add sub page"></label><br>');
  start = start + 1;
  parent = parent + 1;
});
$('.list_pages').on('click', '.test', function () {
  var number = $(this).closest('.parent').find('.number').last().val(); // var number = $(this).closest('.parent').children('label:last').find('.number').val();
  // console.log( $(this).closest('.parent'))
  // if(!number) { number = $('.child-test', this).children('input')}
  // console.log(number) 

  if (!number) {
    number = 0;
  }

  number++;
  $(this).closest('.parent').append('<br><label class="child-test' + start + '" value="' + start + '">Podstrona: <input required type="text" name="page_name[' + start + ']" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input required type="text" name="page_title[' + start + ']" placeholder="Nazwa strony" class="mr-2"><input hidden type="text" name="parents_items[' + start + ']" value="" placeholder="1 = rodzic" class="mr-5"><input hidden required type="text" name="page_parent[' + start + ']" value="' + $(this).data('id') + '" placeholder="ukryty parent i1d"  class="mr-2"><input hidden required type="text" name="page_number[' + start + ']"  class="number" value="' + number + '" class="mr-2" placeholder="numer 1,2 itd."></label>');
  start = start + 1;
}); // ---------------------
// edit
// ---------------------
// const app = new Vue({
//     el: '#apps',
//     components: { App },
//     template: '<app></app>',
//     data: {
//         items: [
//           { message: 'Foo' },
//           { message: 'Bar' }
//         ]
//       }
// });
// var start = 1;
// $('#add_page').on('click', function(){
//     $('.list_pages').append('<div class="parent"><label>Strona: <input required type="text" name="page_name['+start+']" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input required type="text" name="page_title['+start+']" placeholder="Nazwa strony" class="mr-2"><input type="button" data-id="'+start+'" onClick="add_subpage()" value="add sub page"></label></div><br>')
//     start = start+1;
// });
// function add_subpage(){
//     console.log($(this).parent(".parent"));
//         $('.list_pages').append('<div class="parent"><label>Strona: <input required type="text" name="page_name['+start+']" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input required type="text" name="page_title['+start+']" placeholder="Nazwa strony" class="mr-2"><input type="button" data-id="'+start+'" onClick="" value="add sub page"></label></div><br>')
// };
// headroom

$('.headroom').headroom({
  offset: 100
});
var swiper = new Swiper('.swiper-home', {
  loop: true,
  grabCursor: true,
  autoplay: {
    delay: 4000
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  pagination: {
    el: '.swiper-pagination',
    dynamicBullets: true
  }
});
var slider_product_homepage = new Swiper('.swiper-gallery', {
  slidesPerView: 3,
  centeredSlides: true,
  spaceBetween: 30,
  loop: true,
  grabCursor: true,
  autoplay: {
    delay: 4000
  },
  navigation: {
    nextEl: '.swiper-next',
    prevEl: '.swiper-prev'
  },
  pagination: {
    el: '.swiper-pag',
    dynamicBullets: true
  },
  breakpoints: {
    576: {
      slidesPerView: 1,
      centeredSlides: true
    },
    767: {
      slidesPerView: 2,
      centeredSlides: false
    }
  }
}); // Menu offcanvas

function toggleOpen() {
  $('.burger_menu').toggleClass('open');
  $('.nav-icon').toggleClass('open');
}

function removeOpen() {
  $('.burger_menu').removeClass('open');
  $('.nav-icon').removeClass('open');
}

$('#toggleMenu').on('click', function (e) {
  toggleOpen();
  e.stopPropagation();
});
$('.wrapper').on('click', function () {
  removeOpen();
});
$(document).scroll(function () {
  removeOpen();
}); //ukryj menu powyżej mobile

$(window).resize(function () {
  if (window.innerWidth >= 767) {
    removeOpen();
  }
});
$('#toggleMenuRWD').on('click', function () {
  $('#opener').toggleClass('opener');
});
setTimeout(function () {
  $('.custom_alert').fadeOut();
}, 5000);

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./resources/sass/admin/panel.scss":
/*!*****************************************!*\
  !*** ./resources/sass/admin/panel.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/admin/panel.scss ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/html/prywatne/Gamex/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /var/www/html/prywatne/Gamex/resources/sass/app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! /var/www/html/prywatne/Gamex/resources/sass/admin/panel.scss */"./resources/sass/admin/panel.scss");


/***/ })

/******/ });