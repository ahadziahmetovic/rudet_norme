@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('UNOS NOVOG UPOSLENIKA') }}</div>
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{ url('createEmployee') }}" method="post">
                            {{ csrf_field() }}
                      
                            <div class="col-md-5">
                                <label for="first_name" class="form-label">Ime</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                                <div class="invalid-feedback">
                                    Please choose a product name.
                                  </div>
                            </div>
                            <div class="col-md-7">
                                <label for="last_name" class="form-label">Prezime</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                                <div class="invalid-feedback">
                                    Please choose a product name.
                                  </div>
                            </div>
                            <div class="col-md-5">
                                <label for="dept_id" class="form-label">Odjel</label>
                                <select id="dept_id" name="dept_id" class="form-select" required>
                                    <option disabled selected> -- select an option -- </option>
                                    @foreach ($departments as $department)
                                        <option value="1">{{ $department->dept_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <label for="code" class="form-label text-center" >Code</label>
                                <input type="text" class="form-control text-center" id="code" name="code" value="{{rand(100000,999999)}}">
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
                             
                            <button type="button" class="btn btn-primary justify-content-md-end mx-3 my-4" onclick="location.href='{{ url('/records') }}'">Unos normi</button>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button type="button" class="btn btn-dark justify-content-md-end mx-4 my-4">Izlaz</button></a>
    
                    </div>

                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Ukloni</th>
                          
                         {{--    <th scope="col" class="d-flex justify-content-center">Izlaz</th> --}}
                 
                         
                        </tr>
                    </thead>
                    <tbody>
    {{--               {{dd($employees)}}  --}}
                        @if (isset($employees))
                            @foreach ($employees as $employee => $value)
                                <tr>
                                    <td scope="row">{{ $value->first_name }}</td>
                                    <td scope="row">{{ $value->last_name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('employees.destroy', $value->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Briši</button>
                                        </form>
                                    </td>
                                    {{-- <td scope="row" class="d-flex justify-content-center">@if($data->izkol != NULL){{ $data->izkol }}@else {{0}}@endif</td> --}}
                                 
                                </tr>
                            @endforeach
                        @else
                            <div class="text-center alert alert-success">
                                Potrebno je da izaberete vremenski raspon.
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
            
        </div>
        <script src="{{ asset('js/datum.js') }}" defer></script>
    @endsection
