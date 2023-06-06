@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KREIRANJE NALOGA') }}</div>

                    
               
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Broj naloga</th>
                                <th scope="col">Naziv proizvoda</th>
                                <th scope="col">Iznos</th>
                                <th scope="col">Datum</th>
                        
                              
                             {{--    <th scope="col" class="d-flex justify-content-center">Izlaz</th> --}}
                     
                             
                            </tr>
                        </thead>
                        <tbody>
        {{--               {{dd($employees)}}  --}}
                            @if (isset($workOrderList))
                                @foreach ($workOrderList as $workorder => $value)
                                    <tr>
                                        <td scope="row">{{ $value->order_number }}</td>
                                        <td scope="row">{{ $value->product_name }}</td>
                                        <td scope="row">{{ $value->amount }}</td>
                                        <td scope="row">{{ $value->date }}</td>
                                       
                                       
                                      
                                        {{-- <td scope="row" class="d-flex justify-content-center">@if($data->izkol != NULL){{ $data->izkol }}@else {{0}}@endif</td> --}}
                                     
                                    </tr>
                                @endforeach
                      
                            @endif
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <button type="button" class="btn btn-dark justify-content-md-end mx-4 my-4">Izlaz</button></a>
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
