@extends('layouts.report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('STANJE SVIH EVIDENCIJA NORMI') }}</div>
                    <div class="col align-self-end p-3">
                        <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Pretraži po šifri ili nazivu"
                                aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-primary">Pretraži</button>
                        </div>
                    </div>
                    <div class="container">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <th style="" scope="col">Ime</th>
                                        <th style="" scope="col">Prezime</th>
                                        <th style="" scope="col">Proizvod</th>
                                        <th style="text-align: center" scope="col">Operacija</th>
                                        <th style="text-align: center" scope="col">Količina</th>
                                        <th style="text-align: center" scope="col">Sati</th>
                                        <th style="text-align: center" scope="col">Škart</th>
                                        <th style="text-align: center" scope="col">Mašina</th>
                                        <th style="text-align: center" scope="col">Izmjena</th>
                                        <th style="text-align: center" scope="col">Brisanje</th>
                                        {{--       <th style="text-align: center" scope="col">Izlaz</th> --}}

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stanje as $key => $data)
                                        <tr class="list-unstyled">
                                            <td scope="row" class="text-truncate">{{ $data->first_name }}</td>
                                            <td scope="row" class="text-truncate">{{ $data->last_name }}</td>
                                            <td style="" scope="row">{{ $data->product_name}}
                                            </td>
                                            <td style="text-align: center" scope="row">{{ $data->operation}}
                                            </td>
                                            <td style="text-align: center" scope="row">{{ $data->amount}}
                                            </td>
                                            <td style="text-align: center" scope="row">{{ $data->hours}}
                                            </td>
                                            <td style="text-align: center" scope="row">{{ $data->scrap}}
                                            </td>
                                            <td style="text-align: center" scope="row">{{ $data->machine_no}}
                                            </td>
                                            <td style="text-align: center" scope="row"><a href="{{ route('records_edit',$data->id)}}" class="btn btn-warning">Izmjeni</a></td>
                                            <td style="text-align: center" scope="row"><a href="{{ route('records_delete',$data->id)}}" class="btn btn-warning">Izbriši</a></td>

                                            {{--    <td style="text-align: center">{{$data->izkol}}</td> --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <span>{{ $stanje->links('pagination::bootstrap-4') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
