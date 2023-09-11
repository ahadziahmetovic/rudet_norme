/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/records.js ***!
  \*********************************/
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

$('#listaNaloga').change(function () {
  var nalog = String($('#listaNaloga').val().trim());
  console.log(nalog);
  listaProizvoda(nalog);
});
$("#unesi").click(function () {
  // var nalog_id = String($('#listaNaloga').val().trim());
  var nalog_id = 15;
  var proizvod_id = $('#listaProizvoda').find(":selected").val();
  var proizvod_id = 18;
  var proizvod = $('#listaProizvoda').find(":selected").text();
  var uposlenik = String($('#search').val().trim());
  $("#search").val('');
  var kolicina = String($('#kolicina').val().trim());
  $("#kolicina").val(0);
  var sati = String($('#sati').val().trim());
  $("#sati").val(0);
  var skart = String($('#skart').val().trim());
  $("#skart").val(0);
  var series_id = $('#series').find(":selected").val();
  var operation_id = $('#operations').find(":selected").val();
  var masina = $('#masina').find(":selected").val();
  var date_ = $('#calendrier').datepicker('getDate');
  var datum = $.datepicker.formatDate("yy-mm-dd", date_);
  console.log('Nalog_id:' + nalog_id);
  console.log('Proizvod:' + proizvod_id);
  console.log('Uposlenik:' + uposlenik);
  console.log('Kolicina:' + kolicina);
  console.log('Sati:' + sati);
  console.log('Škart:' + skart);
  console.log('Serija_id:' + series_id);
  console.log('Datum:' + datum);

  //Unesi u tabelu
  var tr_str = "<tr>" + "<td style='display:none;'>" + nalog_id + "</td>" + "<td >" + uposlenik + "</td>" + "<td align='center' style='display:none;'>" + proizvod_id + "</td>" + "<td align='center'>" + proizvod + "</td>" + "<td align='center'>" + kolicina + "</td>" + "<td align='center'>" + sati + "</td>" + "<td align='center'>" + skart + "</td>" + "<td align='center' style='display:none;'>" + datum + "</td>" + "<td align='center' style='display:none;'>" + series_id + "</td>" + "<td align='center' style='display:none;'>" + operation_id + "</td>" + "<td align='center'>" + masina + "</td>" + "<td><button id='editbtn' class='btn btn-primary d-flex justify-content-end'>Briši</button></td>" + "</tr>";
  $("#tabelaUnosa tbody").append(tr_str);
  var rowCount = $('#slanje').length;
  var dugme = $('#posalji').length;
  if (rowCount > 0 && dugme < 1) {
    var r = $('<input type="button" id="posalji" value="Pošalji"/>');
    $("#slanje").append(r);
  }
});
function listaProizvoda(nalog) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: "vrati_proizvode",
    dataType: "json",
    type: "POST",
    data: JSON.stringify({
      order_id: nalog
    }),
    contentType: false,
    processData: false,
    success: function success(response) {
      console.log(response);
      var proizvod = "";
      for (var index = 0; index < response.length; index++) {
        proizvod += "<option value='" + response[index].id + "'>" + response[index].product_name + "</option>";
      }
      $("#listaProizvoda").html(proizvod);
    }
  });
}

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
  keys = ['nalog_id', 'fullname', 'product_id', 'product', 'amount', 'hours', 'scrap', 'datum', 'series_id', 'operation_id', 'masina', 'brisanje'];
  url = 'unesi';

  //var nalog_id = String($('#listaNaloga').val().trim());
  var nalog_id = 15;
  //var proizvod_id = $('#listaProizvoda').find(":selected").val();
  var proizvod_id = 18;
  var uposlenik_id = String($('#search').val().trim());
  var kolicina = String($('#kolicina').val().trim());
  var sati = String($('#sati').val().trim());
  var skart = String($('#skart').val().trim());
  //var series_id = $('#series').find(":selected").val();
  var series_id = 1;
  var masina = $('#masina').find(":selected").val();
  var date_ = $('#calendrier').datepicker('getDate');
  var masina = $('#masina').find(":selected").val();
  var datum = $.datepicker.formatDate("dd-mm-yy", date_);
  var proizvod = $('#listaProizvoda').find(":selected").text();
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
    url: 'import_records',
    dataType: 'json',
    type: 'POST',
    //nalog_id:nalog_id,proizvod_id:proizvod_id,uposlenik_id:uposlenik_id,series_id:series_id,datum:datum
    data: JSON.stringify({
      podaci: myData
    }),
    contentType: false,
    processData: false,
    success: function success(response) {
      console.log('Ovo ba radi');
      // console.log(response[0]['id']);
      console.log(response);
      if (response.status == "RADI") {
        alert('radi!!!!!');
        $("#tabelaUnosa tbody tr").remove();
        $("#posalji").remove();
        //Uposlenik je u search zbog pretrage
        $("#search").val("");
      }
      //window.location.reload(); 
    }
  });
  //window.location.reload(); 
});
// KRAJ SLANJA PODATAKA -------------------------------------------------
/******/ })()
;