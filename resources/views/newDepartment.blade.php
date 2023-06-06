@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KREIRANJE NOVOG ODJELA') }}</div>
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{ url('createDepartment') }}" method="post">
                            {{ csrf_field() }}
                      
                            <div class="col-md-7">
                                <label for="dept_name" class="form-label">Naziv odjela</label>
                                <input type="text" class="form-control" id="dept_name" name="dept_name" required>
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
                             
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button type="button" class="btn btn-dark justify-content-md-end mx-4 my-4">Izlaz</button></a>
    
                    </div>

                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Naziv odjela</th>
                    
                          
                         {{--    <th scope="col" class="d-flex justify-content-center">Izlaz</th> --}}
                 
                         
                        </tr>
                    </thead>
                    <tbody>
    {{--               {{dd($employees)}}  --}}
                        @if (isset($departments))
                            @foreach ($departments as $department => $value)
                                <tr>
                                    <td scope="row">{{ $value->dept_name }}</td>
                                    <td style="text-align: center" scope="row"><a href="{{ route('departments_delete',$value->id)}}" class="btn btn-warning">Izbriši</a></td>
                                  
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
