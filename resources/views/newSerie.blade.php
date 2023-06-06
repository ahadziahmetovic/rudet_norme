@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KREIRANJE NOVE SERIJE') }}</div>
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{ url('createSerie') }}" method="post">
                            {{ csrf_field() }}
                      
                            <div class="col-md-7">
                                <label for="num_of_serie" class="form-label">Naziv serije</label>
                                <input type="text" class="form-control" id="num_of_serie" name="num_of_serie" required>
                                <div class="invalid-feedback">
                                    Unesite naziv serije.
                                  </div>
                            </div>
                            <div class="col-2 p-3 mt-5 pt-1 ">
                                <div class="form-check">
                                   <label class="form-check-label" for="gridCheck">
                                        Aktiviraj
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="status" name ="status" value="1" checked required>
                                </div>
                            </div>
                                                   
                            <div id="datepicker" class="col col-md-3 date text-center" data-date-format="dd.mm.yyyy">
                                <label for="kolicina" class="form-label">Datum</label>
                                <input id="calendrier" name="datum" class="form-control text-center" type="text" readonly />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                          {{--   <div class="col-md-4">
                                <label for="inputState" class="form-label">Status</label>
                                <select id="inputState" class="form-select" disabled>
                                    <option selected>Izaberi...</option>
                                    <option>...</option>
                                </select>
                            </div> --}}
                       
                     
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Snimi</button>
                            </div>
                        </form>
                        <hr>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                             
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Broj serije</th>
                                        <th scope="col" style="text-align: center">Datum</th>
                                        <th scope="col" style="text-align: center">Deaktiviraj</th>
                                
                                      
                                     {{--    <th scope="col" class="d-flex justify-content-center">Izlaz</th> --}}
                             
                                     
                                    </tr>
                                </thead>
                                <tbody>
                {{--               {{dd($employees)}}  --}}
                                    @if (isset($series))
                                        @foreach ($series as $serie => $value)
                                            <tr>
                                                <td scope="row">{{ $value->num_of_serie }}</td>
                                                <td scope="row" style="text-align: center">{{ $value->created_at }}</td>
                                                <td style="text-align: center" scope="row"><a href="{{ route('series_deactivate',$value->id)}}" class="btn btn-warning">Deaktivacija</a></td>
                                               
                                              
                                                {{-- <td scope="row" class="d-flex justify-content-center">@if($data->izkol != NULL){{ $data->izkol }}@else {{0}}@endif</td> --}}
                                             
                                            </tr>
                                        @endforeach
                              
                                    @endif
                                </tbody>
                            </table>
    
                    </div>

                    </div>
                </div>
                
            </div>
        </div>
        <script src="{{ asset('js/datum.js') }}" defer></script>

    @endsection
