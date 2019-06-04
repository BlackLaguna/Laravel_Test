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

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.save_employee').on('click', function () {
    var id = this.dataset.id;
    var name = $('#name' + id).val();
    var surname = $('#surname' + id).val();
    var post = $("#select" + id + " option:selected").val();
    $.ajax({
      url: 'http://localhost/Company/Test/public/save_employee',
      type: "POST",
      data: {
        'name': name,
        'surname': surname,
        'post': post,
        'id': id
      },
      success: function success() {
        alert("+");
      },
      error: function error(response) {
        alert("-");
      }
    });
  });
  $('.select_class').on('change', function () {
    var val = $(this).find('option:selected')[0].dataset.salary;
    var id = $(this)[0].dataset.id;
    $('#salary' + id).text(val);
  });
  $('.delete_employee').on('click', function () {
    var id = this.dataset.id;
    $.ajax({
      url: 'http://localhost/Company/Test/public/delete_employee',
      type: "POST",
      data: {
        'id': id
      },
      success: function success() {
        $('#tr' + id).remove().end();
      },
      error: function error(response) {
        alert("-");
      }
    });
  });
  $('.add_employee').on('click', function () {
    var id = this.dataset.id;
    var name = $('#new_name').val();
    var surname = $('#new_surname').val();
    var post = $('#select_new').find('option:selected')[0].dataset.id;
    $.ajax({
      url: 'http://localhost/Company/Test/public/add_employee',
      type: "POST",
      data: {
        'name': name,
        'surname': surname,
        'post': post
      },
      success: function success() {
        alert("+");
      },
      error: function error(response) {
        alert("-");
      }
    });
  });
  $('#new_coment').on('click', function () {
    var body = $('#body_coment').val();
    var id = $('#body_coment')[0].dataset.id;
    $.ajax({
      url: 'http://localhost/Company/Test/public/add_coment',
      type: "POST",
      data: {
        'body': body,
        'id': id
      },
      success: function success(response) {
        $('#coment_list').append('<li class="media">\n' + '                <div class="media-body">\n' + '                    <div class="media-heading">\n' + '                        <div class="author">' + response['name'] + '</div>\n' + '                        <div class="metadata">\n' + '                            <span class="date">' + response['time'] + '</span>\n' + '                        </div>\n' + '                    </div>\n' + '                    <div class="media-text text-justify">' + response['body'] + '</div>\n' + '                </div>\n' + '            </li><hr>');
        console.log(response);
      },
      error: function error(response) {
        console.log(response);
        alert('12');
      }
    });
  });
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/script.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\Company\Test\resources\js\script.js */"./resources/js/script.js");


/***/ })

/******/ });