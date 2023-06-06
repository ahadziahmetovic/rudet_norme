@extends('layouts.report3')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('NORME PO DATUMIMA - DETALJNO') }}</div>
                    <div class="container">

                        <div class="row">
                            <form action="reports" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label>Datum početka: </label>
                                        <div id="datepicker" class="input-group date" data-date-format="dd.mm.yyyy">
                                            <input name="pocetak" class="form-control" type="text" readonly />
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
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


                    <div class="card-body">
                        {{-- Početak datuma --}}

<div class="text-center alert-success fs-5">@if (isset($kraj))
    Od {{date('d.m.Y',strtotime($pocetak))}} Do {{date('d.m.Y',strtotime($kraj))}}
@else

@endif</div>


                        {{-- Kraj datuma --}}
                        {{-- Tabela početak --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Ime</th>
                                    <th scope="col">Prezime</th>
                                    <th scope="col" style="text-align: center">Operacija</th>
                                    <th scope="col" style="text-align: center">Sati</th>
                                    <th scope="col" style="text-align: center">Urađeno</th>
                                    <th scope="col" style="text-align: center">Norma</th>
                                    <th scope="col" style="text-align: center">Procentualno</th>
                                 
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($employees))
                                    @foreach ($employees as $key => $data)
                                        <tr>
                                            <td scope="row">{{ $data->first_name }}</td>
                                            <td scope="row">{{ $data->last_name }}</td>
                                            <td scope="row" style="text-align: center">{{ $data->operation }}</td>
                                            <td scope="row" style="text-align: center">{{ $data->hours }}</td>
                                            <td scope="row" style="text-align: center">{{ $data->amount }}</td>
                                            <td scope="row" style="text-align: center">{{ $data->norm }}</td>
                                            <td scope="row" style="text-align: center">{{ $data->percentage }}%</td>
                                         
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="text-center alert alert-success">
                                        Potrebno je da izaberete vremenski raspon.
                                    </div>
                                @endif
                            </tbody>
                        </table>
                    {{--    <span>@if (isset($stanje))
                            {{ $stanje->links('pagination::bootstrap-4') }}
                            
                        @endif</span>   --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--     <script src="{{ asset('js/records.js') }}" defer></script>
<script src="{{ asset('js/datepicker.js') }}" defer></script>
    <script src="{{ asset('js/reports.js') }}" defer></script>
    <link href="{{ asset('css/reports.css') }}" rel="stylesheet"> --}}
@endsection
