@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KREIRANJE NALOGA') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                       
                            <div class="col col-md-2">
                                <label for="workorder">Nalog</label>
                                <input type="text" id="workorder" name="workorder" class="form-control" placeholder="">
                            </div>
                            <div class="col col-md-5">
                                <label for="products">Proizvod</label>
                                <select id="products" class="form-select">
                                    <option value="">Izaberite proizvod...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col col-md-2 text-center">
                                <label for="amount">Količina</label>
                                <input type="text" id="amount" name="amount" class="form-control text-center" placeholder="">
                            </div>
                            

                            <div id="datepicker" class="col col-md-3 date text-center" data-date-format="dd.mm.yyyy">
                                <label for="kolicina">Datum</label>
                                <input id="calendrier" name="datum" class="form-control text-center" type="text" readonly />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                         
                            <div class="col-md-12 text-end mt-4">
                                <button type="button" class="btn btn-success" id="unesi">Unesi proizvod</button>
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
                                    <th>Nalog</th>
                                    <th>Proizvod</th>
                                    <th style="text-align:center">Količina</th>
                                    <th style="text-align:center">Datum</th>
                                    <th style="text-align:center">Opcija</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div id="slanje" class="slanje"></div>
                    </div>
                    <br>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Broj naloga</th>
                                <th scope="col">Datum</th>
                                <th scope="col" style="text-align: center">Detaljno</th>
                                <th scope="col">Brisanje</th>
                        
                              
                             {{--    <th scope="col" class="d-flex justify-content-center">Izlaz</th> --}}
                     
                             
                            </tr>
                        </thead>
                        <tbody>
        {{--               {{dd($employees)}}  --}}
                            @if (isset($workorders))
                                @foreach ($workorders as $workorder => $value)
                                    <tr>
                                        <td scope="row">{{ $value->order_number }}</td>
                                        <td scope="row">{{ $value->date }}</td>
                                        <td style="text-align: center" scope="row"><a href="{{ route('workorder_detail',$value->id)}}" class="btn btn-warning">Detaljno</a></td>
                                        <td>
                                            <form method="POST" action="{{ route('workorders.destroy', $value->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" class="btn btn-danger">Briši</button>
                                            </form>
                                        </td>
                                      
                                        {{-- <td scope="row" class="d-flex justify-content-center">@if($data->izkol != NULL){{ $data->izkol }}@else {{0}}@endif</td> --}}
                                     
                                    </tr>
                                @endforeach
                      
                            @endif
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <button type="button" class="btn btn-primary justify-content-md-end mx-3 my-4"
                            onclick="location.href='{{ url('/') }}'">Početak</button>
                        <button type="button" class="btn btn-dark justify-content-md-end mx-4 my-4"
                            onclick="location.href='{{ url('/logout') }}'">Izlaz</button>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('js/workorder.js') }}" defer></script>
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
