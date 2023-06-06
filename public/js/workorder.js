/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/workorder.js ***!
  \***********************************/
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

$("#unesi").click(function () {
  var nalog_naziv = String($('#workorder').val().trim());
  var proizvod_id = $('#products').find(":selected").val();
  var proizvod = $('#products').find(":selected").text();
  var kolicina = String($('#amount').val().trim());
  var date_ = $('#calendrier').datepicker('getDate');
  var datum = $.datepicker.formatDate("dd-mm-yy", date_);
  console.log('Nalog_id:' + nalog_naziv);
  console.log('Proizvod:' + proizvod_id);
  console.log('Kolicina:' + kolicina);
  console.log('Datum:' + datum);

  //Unesi u tabelu
  var tr_str = "<tr>" + "<td>" + nalog_naziv + "</td>" + "<td align='center' style='display:none;'>" + proizvod_id + "</td>" + "<td>" + proizvod + "</td>" + "<td align='center'>" + kolicina + "</td>" + "<td align='center'>" + datum + "</td>" + "<td align='center'><button id='editbtn' class='btn btn-primary d-flex justify-content-end'>Briši</button></td>" + "</tr>";
  $("#tabelaUnosa tbody").append(tr_str);
  var rowCount = $('#slanje').length;
  var dugme = $('#posalji').length;
  if (rowCount > 0 && dugme < 1) {
    var r = $('<input type="button" id="posalji" value="Pošalji"/>');
    $("#slanje").append(r);
  }
});

//BRISANJE REDA
$("#tabelaUnosa").on("click", "#editbtn", function () {
  $(this).closest("tr").remove();
});
//KRAJ BRISANJA REDA

// SLANJE PODATAKA ------------------------------------------------------------------------

$("#slanje").on("click", function (e) {
  e.preventDefault();
  console.log('Kliknnuto');
  var myData = [];
  keys = ['nalog_naziv', 'proizvod_id', 'proizvod', 'kolicina', 'datum', 'brisanje'];
  url = 'unesi';
  var nalog_naziv = String($('#workorder').val().trim());
  var proizvod_id = $('#products').find(":selected").val();
  var proizvod = $('#products').find(":selected").text();
  var kolicina = String($('#amount').val().trim());
  var date_ = $('#calendrier').datepicker('getDate');
  var datum = $.datepicker.formatDate("dd-mm-yy", date_);
  $('#tabelaUnosa').find('tr:gt(0)').each(function (i, row) {
    var oRow = {};
    $(row).find('td').each(function (j, cell) {
      oRow[keys[j]] = $(cell).text();
    });
    myData.push(oRow);
    //myData.push(broj);
    var myDataN = JSON.stringify(myData);
    console.log('Slanje' + myDataN);
  });
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'import_workorder',
    dataType: 'json',
    type: 'POST',
    data: JSON.stringify({
      podaci: myData,
      nalog_naziv: nalog_naziv
    }),
    contentType: false,
    processData: false,
    success: function success(response) {
      console.log('Ovo ba radi');
      // console.log(response[0]['id']);
      console.log(response);
      if (response.status == "NALOG JE UNEŠEN!") {
        alert(response.status);
        window.location.reload();
      } else {
        alert('GREŠKA:' + response.status);
      }

      //window.location.reload(); 
    }
  });
  //window.location.reload(); 
});
// KRAJ SLANJA PODATAKA -------------------------------------------------
/******/ })()
;