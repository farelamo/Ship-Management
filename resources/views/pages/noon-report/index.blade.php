@extends('app')

@section('title', 'Noon Report')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Noon Report</h1>
                <div class="section-header-button">
                    <a href="{{route('noon-report.create')}}" class="btn btn-primary">Add New</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="{{ app('request')->input('tab') == 'all' ? 'nav-link active' : 'nav-link' }}"
                                            href="{{ route('noon-report.index', ['tab' => 'all']) }}">
                                                All
                                            <span
                                                class="{{ app('request')->input('tab') == 'all' ? 'badge badge-white' : 'badge badge-primary' }}">
                                                {{ $count['all'] }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ app('request')->input('tab') == 'noon-desc' ? 'nav-link active' : 'nav-link' }}"
                                            href="{{ route('noon-report.index', ['tab' => 'noon-desc']) }}">
                                                Noon Desc
                                            <span
                                                class="{{ app('request')->input('tab') == 'noon-desc' ? 'badge badge-white' : 'badge badge-primary' }}">
                                                {{ $count['noon_desc'] }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ app('request')->input('tab') == 'passage-plan' ? 'nav-link active' : 'nav-link' }}"
                                            href="{{ route('noon-report.index', ['tab' => 'passage-plan']) }}">
                                                Passage Plan
                                            <span
                                                class="{{ app('request')->input('tab') == 'passage-plan' ? 'badge badge-white' : 'badge badge-primary' }}">
                                                {{ $count['passage_plan'] }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ app('request')->input('tab') == 'engine' ? 'nav-link active' : 'nav-link' }}"
                                            href="{{ route('noon-report.index', ['tab' => 'engine']) }}">
                                                Engine
                                            <span
                                                class="{{ app('request')->input('tab') == 'engine' ? 'badge badge-white' : 'badge badge-primary' }}">
                                                {{ $count['engine'] }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ app('request')->input('tab') == 'current-rob' ? 'nav-link active' : 'nav-link' }}"
                                            href="{{ route('noon-report.index', ['tab' => 'current-rob']) }}">
                                                Current ROB
                                            <span
                                                class="{{ app('request')->input('tab') == 'current-rob' ? 'badge badge-white' : 'badge badge-primary' }}">
                                                {{ $count['current_rob'] }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ app('request')->input('tab') == 'consumption-rate' ? 'nav-link active' : 'nav-link' }}"
                                            href="{{ route('noon-report.index', ['tab' => 'consumption-rate']) }}">
                                                Consumption Rate
                                            <span
                                                class="{{ app('request')->input('tab') == 'consumption-rate' ? 'badge badge-white' : 'badge badge-primary' }}">
                                                {{ $count['consumption_rate'] }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('noon-report.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr align="center">
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        data-checkbox-role="dad" class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Noon Desc</th>
                                            <th>Passage Plan</th>
                                            <th>Engine</th>
                                            <th>Current ROB</th>
                                            <th>Consumption Rate</th>
                                        </tr>
                                        @foreach ($noon_report as $data)
                                            <tr align="center">
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                            class="custom-control-input"
                                                            id="checkbox-{{ $loop->iteration }}">
                                                        <label for="checkbox-{{ $loop->iteration }}"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $data->noon_desc['ship_name'] }}
                                                    <div class="table-links">
                                                        <a href="{{ route('noon-report.show', $data->id) }}" class="text-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <div class="bullet"></div>
                                                        <a href="{{ route('noon-report.edit', $data->id) }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <div class="bullet"></div>
                                                        <a href="#" class="text-danger" data-toggle="modal" 
                                                            data-target="#hapus" onclick='hapus("{{ $data->id }}", "{{ $data->noon_desc["ship_name"] }}")'
                                                        >
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $data->passage_plan['track'] }}
                                                </td>
                                                <td>
                                                    {{ $data->engine['rpm'] }}
                                                </td>
                                                <td>{{ $data->current_rob['mfo'] }}</td>
                                                <td>
                                                    {{ $data->consumption_rate['mfo_consum'] }}
                                                    {{-- <div class="badge badge-primary">Published</div> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {!! $noon_report->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">x</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="formHapus">
                        @csrf
                        @method('DELETE')
                        
                        <div class="form-group">
                            <input type="hidden" class="d-none" id="dId" name="id" required>
                            <p id="dhapus"></p>
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function hapus(id, shipName) {
            console.log(id, shipName)
            document.getElementById("dId").value = id
            document.getElementById("dhapus").textContent = 'Apakah anda yakin ingin menghapus "' + shipName + '"?'
            document.getElementById('formHapus').action = "/noon-report/" + id;
        }
    </script>
@endpush
