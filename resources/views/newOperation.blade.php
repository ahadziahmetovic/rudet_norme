@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KREIRANJE NOVE OPERACIJE') }}</div>
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{ url('createOperation') }}" method="post">
                            {{ csrf_field() }}
                      
                            <div class="col-md-5">
                                <label for="operation" class="form-label">Naziv operacije</label>
                                <input type="text" class="form-control" id="operation" name="operation" required>
                                <div class="invalid-feedback">
                                    Unesite naziv operacije.
                                  </div>
                            </div>
                            <div class="col-md-2">
                                <label for="norm" class="form-label">Norma</label>
                                <input type="number" class="form-control" id="norm" name="norm" required>
                                <div class="invalid-feedback">
                                    Unesite naziv operacije.
                                  </div>
                            </div>
                            <div class="col-2 p-3 mt-5 pt-1 ">
                                <div class="form-check">
                                   <label class="form-label">
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
                             
                            <button type="button" class="btn btn-primary justify-content-md-end mx-3 my-4" onclick="location.href='{{ url('/izlaz') }}'">Početak</button>
                            <button type="button" class="btn btn-dark justify-content-md-end mx-4 my-4" onclick="location.href='{{ url('/logout') }}'">Izlaz</button>
    
                    </div>

                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Naziv operacije</th>
                            <th scope="col">Norma</th>
                    
                          
                         {{--    <th scope="col" class="d-flex justify-content-center">Izlaz</th> --}}
                 
                         
                        </tr>
                    </thead>
                    <tbody>
    {{--               {{dd($employees)}}  --}}
                        @if (isset($operations))
                            @foreach ($operations as $operation => $value)
                                <tr>
                                    <td scope="row">{{ $value->operation }}</td>
                                    <td scope="row">{{ $value->norm }}</td>
                                   
                                  
                                    {{-- <td scope="row" class="d-flex justify-content-center">@if($data->izkol != NULL){{ $data->izkol }}@else {{0}}@endif</td> --}}
                                 
                                </tr>
                            @endforeach
                  
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <script src="{{ asset('js/datum.js') }}" defer></script>

    @endsection
