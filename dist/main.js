/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/***/ (() => {

eval("/*Navbar Show/Hide*/\nconst menu = document.querySelector('.menu');\nconst menupoints = document.querySelectorAll('.nav-point');\nmenu.addEventListener('click', () => {\n  menu.classList.toggle(\"change\");\n  document.querySelector(\".navbar\").classList.toggle(\"change\");\n});\nmenupoints.forEach(function (elem) {\n  elem.addEventListener(\"click\", () => {\n    menu.classList.toggle(\"change\");\n    document.querySelector(\".navbar\").classList.toggle(\"change\");\n  });\n});\n/*Scroll Function*/\n\nconst openModalButtons = document.querySelectorAll('[data-modal-target]');\nconst closeModalButtons = document.querySelectorAll('[data-close-button]');\nconst overlay = document.getElementById('overlay');\nopenModalButtons.forEach(button => {\n  button.addEventListener('click', () => {\n    const modal = document.querySelector(button.dataset.modalTarget);\n    document.body.scrollTop = 0; // For Safari\n\n    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera\n\n    openModal(modal);\n  });\n});\noverlay.addEventListener('click', () => {\n  const modals = document.querySelectorAll('.modal.active');\n  modals.forEach(modal => {\n    closeModal(modal);\n  });\n});\ncloseModalButtons.forEach(button => {\n  button.addEventListener('click', () => {\n    const modal = button.closest('.modal');\n    closeModal(modal);\n  });\n});\n\nfunction openModal(modal) {\n  if (modal == null) return;\n  modal.classList.add('active');\n  overlay.classList.add('active');\n}\n\nfunction closeModal(modal) {\n  if (modal == null) return;\n  modal.classList.remove('active');\n  overlay.classList.remove('active');\n}\n/*Sticky Navbar*/\n\n\nwindow.addEventListener(\"scroll\", function () {\n  let navbar = document.getElementById(\"nav\");\n  navbar.classList.toggle(\"sticky\", window.scrollY > 0);\n});\n\n//# sourceURL=webpack://motte_theme/./src/js/main.js?");

/***/ }),

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://motte_theme/./src/scss/main.scss?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_modules__["./src/scss/main.scss"](0, {}, __webpack_require__);
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/js/main.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;