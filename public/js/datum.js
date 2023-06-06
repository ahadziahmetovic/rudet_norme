/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/datum.js ***!
  \*******************************/
$(function () {
  $("#calendrier").datepicker({
    dateFormat: "dd-mm-yy"
  });
  //set date as current
  $("#calendrier").datepicker('setDate', new Date());

  //get date in a varoable
  var date_choisie = $('#calendrier').datepicker('getDate');
  var formatDate = $.datepicker.formatDate("dd-mm-yy", date_choisie);
  console.log(formatDate); //2020-09-20
});
/******/ })()
;