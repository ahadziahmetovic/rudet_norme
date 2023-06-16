@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KREIRANJE EVIDENCIJE RADNIKA') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col col-md-3">
                                {{--  <label for="narudzbenica">Id</label>
                                    <input style="text-align: center" type="text" id="id" name="id" class="form-control" value="{{$stanje->id}}" > --}}
                                <label for="narudzbenica">Nalog</label>
                                <select id="listaNaloga" class="form-select" required>
                                    <option value="">Izaberi nalog</option>
                                    @foreach ($stanje as $nalog)
                                        <option value="{{ $nalog->id }}">{{ $nalog->order_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col col-md-4">
                                <label for="narudzbenica">Proizvod</label>
                                <select id="listaProizvoda" class="form-select">
                                    <option value="">Izaberite proizvod...</option>
                               {{--      @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col col-md-5">
                                <label for="sifra">Uposlenik</label>
                                <input type="text" id="search" name="search" class="form-control" placeholder="" required>
                            </div>
                            <div class="col col-md-3">
                                <label for="operations">Operacija</label>
                                <select id="operations" class="form-select">
                                    @foreach ($operations as $operation)
                                        <option value="{{ $operation->id }}">{{ $operation->operation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col col-md-2">
                                <label for="kolicina">Količina</label>
                                <input type="number" id="kolicina" name="kolicina" class="form-control" placeholder="" value="0">
                            </div>
                            <div class="col col-md-2">
                                <label for="kolicina">Sati</label>
                                <input step="0.01" type="number" id="sati" name="sati" class="form-control" placeholder="" value="0">
                            </div>
                            <div class="col col-md-2">
                                <label for="kolicina">Skart</label>
                                <input type="number" id="skart" name="skart" class="form-control" placeholder=""
                                    value="0">
                            </div>
                            <div class="col col-md-3">
                                <label for="kolicina">Serija</label>
                                <select id="series" class="form-select">
                                    @foreach ($series as $serie)
                                        <option value="{{ $serie->id }}">{{ $serie->num_of_serie }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col col-md-3">
                                <label for="masina">Mašina</label>
                                <select id="masina" class="form-select">
                                  
                                        <option value="0">Nema mašine</option>
                                        <option value="1">Mašina 1</option>
                                        <option value="2">Mašina 2</option>
                                        <option value="3">Mašina 3</option>
                                        <option value="4">Mašina 4</option>
                                        <option value="5">Mašina 5</option>

                                 
                                </select>
                            </div>

                            <div id="datepicker" class="col col-md-3 date" data-date-format="dd.mm.yyyy">
                                <label for="kolicina">Datum</label>
                                <input id="calendrier" name="datum" class="form-control" type="text" readonly />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                           
                            <div class="col-md-6 text-end mt-4">
                                <button type="button" class="btn btn-success" id="unesi">Unesi radnika</button>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    @if (session('test'))
                        <div class="alert alert-success">
                            {{ session('test') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <table id='tabelaUnosa' class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Ime i Prezime</th>
                                    <th>Proizvod</th>
                                    <th align='center'>Količina</th>
                                    <th align='center'>Sati</th>
                                    <th align='center'>Škart</th>
                                    <th align='center'>Mašina</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div id="slanje" class="slanje"></div>
                    </div>
                    <br>
                    <hr>
                
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                  
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <button type="button" class="btn btn-dark justify-content-md-end mx-4 my-4">Izlaz</button></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('js/records.js') }}" defer></script>
    {{--  <script type="text/javascript" src="{{ URL::asset('js/datepicker.js') }}"></script>  --}}
    {{--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var path = "{{ url('autocomplete-search') }}";
        $('#search').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    term: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
