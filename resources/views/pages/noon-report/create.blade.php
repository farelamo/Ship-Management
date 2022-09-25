@extends('app')

@section('title', 'Create Noon Report')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Noon Report</h1>
            </div>

            <div class="section-body">
                <form action="{{ route('noon-report.store') }}" method="post">
                    @csrf
                    
                    {{-- Noon Description --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Noon Description</h4>
                            <div class="card-header-action">
                                <a data-collapse="#noon-description" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse" id="noon-description">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ship_name">Ship Name</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="ship_name" id="ship_name"
                                            placeholder="ship name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">.com</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="no_voyage">Voyage Number</label>
                                        <input type="number" class="form-control" id="no_voyage" name="no_voyage"
                                            placeholder="no voyage">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_report">Date Report</label>
                                        <input type="date" class="form-control" id="date_report" name="date_report"
                                            placeholder="date report">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ship_from">Ship From</label>
                                        <input type="text" class="form-control" id="ship_from" name="ship_from"
                                            placeholder="ship from">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ship_from">Ship To</label>
                                        <input type="text" class="form-control" id="ship_from" name="ship_from"
                                            placeholder="ship to">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pessage Plan --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Pessage Plan</h4>
                            <div class="card-header-action">
                                <a data-collapse="#pessage-plan" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="collapse" id="pessage-plan">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="paralex_index">Paralex Index</label>
                                    <input type="text" class="form-control" name="paralex_index" id="paralex_index"
                                        placeholder="paralex index">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="latitude">Current Position (Latitude)</label>
                                        <input type="number" class="form-control" id="latitude" name="latitude"
                                            placeholder="latitude">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="longtitude">Current Position (Longtitude)</label>
                                        <input type="number" class="form-control" id="longtitude" name="longtitude"
                                            placeholder="longtitude">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="eta_date">Estimate Date</label>
                                        <input type="date" class="form-control" id="eta_date" name="eta_date"
                                            placeholder="eta_date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="main_engine_pitch">Main Engine Pitch</label>
                                        <input type="text" class="form-control" id="main_engine_pitch"
                                            name="main_engine_pitch" placeholder="main engine pitch">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="speed">Speed</label>
                                        <input type="text" class="form-control" id="speed" name="speed"
                                            placeholder="speed">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="track">Track</label>
                                        <input type="text" class="form-control" id="track" name="track"
                                            placeholder="track">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="current_set">Current Set</label>
                                        <input type="text" class="form-control" id="current_set" name="current_set"
                                            placeholder="current set">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="current_rate">Current Rate</label>
                                        <input type="text" class="form-control" id="current_rate" name="current_rate"
                                            placeholder="current rate">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="min_ukc">Min. UKC</label>
                                        <input type="text" class="form-control" id="min_ukc" name="min_ukc"
                                            placeholder="min ukc">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="distance">Distance</label>
                                        <input type="text" class="form-control" id="distance" name="distance"
                                            placeholder="distance">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <textarea class="summernote" id="ket" name="ket"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Engine --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Engine</h4>
                            <div class="card-header-action">
                                <a data-collapse="#engine" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="collapse" id="engine">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="rpm">RPM</label>
                                    <input type="number" class="form-control" name="rpm" id="rpm"
                                        placeholder="rotation per minute">
                                </div>
                                <div class="form-group">
                                    <label for="exhaust_gas_temperature">Exhaust Gas Temperature</label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control" name="exhaust_gas_temperature"
                                            id="exhaust_gas_temperature" placeholder="exhaust gas temperature">
                                        <div class="input-group-append">
                                            <div class="input-group-text">℃</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="turbocharger_inlet">Turbocharger (Inlet)</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="turbocharger_inlet"
                                                name="turbocharger_inlet" placeholder="turbocharger inlet">
                                            <div class="input-group-append">
                                                <div class="input-group-text">℃</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="turbocharger_outlet">Turbocharger (Outlet)</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="turbocharger_outlet"
                                                name="turbocharger_outlet" placeholder="turbocharger outlet">
                                            <div class="input-group-append">
                                                <div class="input-group-text">℃</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fw_cooler_air_inlet">FW Cooler Air (Inlet)</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="fw_cooler_air_inlet"
                                                name="fw_cooler_air_inlet" placeholder="FW Cooler Air Inlet">
                                            <div class="input-group-append">
                                                <div class="input-group-text">℃</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fw_cooler_air_outlet">FW Cooler Air (Outlet)</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="fw_cooler_air_outlet"
                                                name="fw_cooler_air_outlet" placeholder="FW Cooler Air outlet">
                                            <div class="input-group-append">
                                                <div class="input-group-text">℃</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Current ROB --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Current ROB</h4>
                            <div class="card-header-action">
                                <a data-collapse="#current-rob" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="collapse" id="current-rob">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="mfo">MFO</label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control" name="mfo"
                                            id="mfo" placeholder="mfo">
                                        <div class="input-group-append">
                                            <div class="input-group-text">MT</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="mdo">MDO</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" name="mdo"
                                                id="mdo" placeholder="mdo">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hsd">HSD</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="hsd"
                                                name="hsd" placeholder="hsd">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="lub_oil">Lub Oil</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="lub_oil"
                                                name="lub_oil" placeholder="lub_oil">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fw">FW</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="fw"
                                                name="fw" placeholder="fw">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Consumption Rate --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Consumption Rate</h4>
                            <div class="card-header-action">
                                <a data-collapse="#consumption-rate" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="collapse" id="consumption-rate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="mfo_consum">MFO Consumption Rate</label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control" name="mfo_consum"
                                            id="mfo_consum" placeholder="mfo_consum">
                                        <div class="input-group-append">
                                            <div class="input-group-text">MT/DAY</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="mdo_consum">MDO Consumption Rate</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" name="mdo_consum"
                                                id="mdo_consum" placeholder="mdo_consum">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT/DAY</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="hsd_consum">HSD Consumption Rate</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="hsd_consum"
                                                name="hsd_consum" placeholder="hsd_consum">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT/DAY</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="lub_oil_consum">Lub Oil Consumption Rate</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="lub_oil_consum"
                                                name="lub_oil_consum" placeholder="lub_oil_consum">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT/DAY</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fw_consum">FW Consumption Rate</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" id="fw_consum"
                                                name="fw_consum" placeholder="fw_consum">
                                            <div class="input-group-append">
                                                <div class="input-group-text">MT/DAY</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"><Button class="btn btn-primary" type="submit">Create Noon Report</Button></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
