@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('TREBOVANJE PO KORISNICIMA') }}</div>
                    <div class="container">

                        <div class="row">
                            <form action="izvjestaj2" method="post">
                                
                                <div class="row">
                                    <div class="col">
                                        <label>Datum početka: </label>
                                  
                                    </div>
                                    <div class="col">
                                        <label>Datum kraja: </label>
                                        <div id="datepicker2" class="input-group date" data-date-format="dd.mm.yyyy">
                                            <input name="kraj" class="form-control" type="text" readonly />
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                     
                                    </div>
                                    <div class="col">
                                        <label></label>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success">Prikaži podatke</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div id="datepicker" class="input-group date" data-date-format="dd.mm.yyyy">
                        <input name="pocetak" class="form-control" type="text" readonly />
                        <span class="input-group-addon"><i
                                class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
@endsection
