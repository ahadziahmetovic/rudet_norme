@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KREIRANJE NOVOG PROIZVODA') }}</div>
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{ url('createProduct') }}" method="post">
                            {{ csrf_field() }}
                      
                            <div class="col-md-12">
                                <label for="product_name" class="form-label">Puni naziv proizvoda</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                                <div class="invalid-feedback">
                                    Please choose a product name.
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <label for="color" class="form-label">Boja</label>
                                <input type="text" class="form-control" id="color" name="color" required>
                            </div>
                            <div class="col-3">
                                <label for="conductor_length" class="form-label">Dužina provodnika</label>
                                <input type="text" class="form-control" id="conductor_length" placeholder="" name="conductor_length" required>
                            </div>
                            <div class="col-3">
                                <label for="packaging" class="form-label">Pakovanje</label>
                                <input type="text" class="form-control" id="packaging" placeholder="" name="packaging" required>
                            </div>
                            <div class="col-3">
                                <label for="certificate" class="form-label">Atest paketa</label>
                                <input type="text" class="form-control" id="certificate" placeholder="" name="certificate" required>
                            </div>
                            <div class="col-2">
                                <label for="CE_mark" class="form-label">CE Oznaka  </label>
                                <input type="text" class="form-control" id="CE_mark" placeholder="" name="CE_mark" required>
                            </div>
                            <div class="col-3">
                                <label for="hazard_class" class="form-label">Klasa opasnosti</label>
                                <input type="text" class="form-control" id="hazard_class" placeholder="" name="hazard_class" required>
                            </div>
                            <div class="col-2">
                                <label for="un_no" class="form-label">UN broj</label>
                                <input type="text" class="form-control" id="un_no" placeholder="" name="un_no" required>
                            </div>
                            <div class="col-2 p-3 mt-5 pt-1 ">
                                <div class="form-check">
                                   <label class="form-check-label" for="gridCheck">
                                        Aktiviraj
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="status" name ="status" value="1" checked required>
                                </div>
                            </div>
                       
                          {{--   <div class="col-md-3">
                                <label for="inputCity" class="form-label">Datum</label>
                                <input type="text" class="form-control" id="inputCity" disabled>
                            </div> --}}
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
                                        <th scope="col">Naziv proizvoda</th>
                                        <th scope="col">Boja</th>
                                
                                      
                                     {{--    <th scope="col" class="d-flex justify-content-center">Izlaz</th> --}}
                             
                                     
                                    </tr>
                                </thead>
                                <tbody>
                {{--               {{dd($employees)}}  --}}
                                    @if (isset($products))
                                        @foreach ($products as $product => $value)
                                            <tr>
                                                <td scope="row">{{ $value->product_name }}</td>
                                                <td scope="row">{{ $value->color }}</td>
                                               
                                              
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
