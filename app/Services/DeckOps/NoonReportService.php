<?php

namespace App\Services\DeckOps;

use Alert;
use App\Models\NoonReport;
use Illuminate\Http\Request;
use App\Http\Requests\DeckOps\NoonReportRequest;
use Illuminate\Support\Facades\DB;

class NoonReportService
{
    public function payload($request)
    {
        $noon_report = [
            'noon_desc' => [
                'ship_name'     => $request->ship_name,
                'no_voyage'     => $request->no_voyage,
                'date_report'   => $request->date_report,
                'ship_from'     => $request->ship_from,
                'ship_to'       => $request->ship_to,
            ],
            'passage_plan' => [
                'paralex_index'     => $request->paralex_index,
                'current_position'  => [
                    'latitude'   => $request->latitude,
                    'longtitude' => $request->longtitude,
                ],
                'eta_date'          => $request->eta_date,
                'main_engine_pitch' => $request->main_engine_pitch,
                'speed'             => $request->speed,
                'track'             => $request->track,
                'current'           => [
                    'set'   => $request->current_set,
                    'rate'  => $request->current_rate,
                ],
                // Jrk tegak yg diukur dr lunas kpl s/d dasar laut / sungai
                'min_ukc'           => $request->min_ukc,
                'distance'          => $request->distance,
                'ket'               => $request->ket, //keterangan
            ],
            'engine' => [
                'rpm'                       => $request->rpm,
                'exhaust_gas_temperature'   => $request->exhaust_gas_temperature,
                'turbocharger_inlet'        => $request->turbocharger_inlet,
                'turbocharger_outlet'       => $request->turbocharger_outlet,
                'fw_cooler_air_inlet'       => $request->fw_cooler_air_inlet,
                'fw_cooler_air_outlet'      => $request->fw_cooler_air_outlet,
            ],
            'current_rob' => [
                'mfo'       => $request->mfo, //Marine Full Oil
                'mdo'       => $request->mdo, //Marine Diesel Oil
                'hsd'       => $request->hsd, //High Speed Diesel
                'lub_oil'   => $request->lub_oil,
                'fw'        => $request->fw,
            ],
            'consumption_rate' => [
                'mfo_consum'       => $request->mfo_consum, 
                'mdo_consum'       => $request->mdo_consum, 
                'hsd_consum'       => $request->hsd_consum,
                'lub_oil_consum'   => $request->lub_oil_consum,
                'fw_consum'        => $request->fw_consum,
            ],
            'empty_desc'        => false,
            'empty_passage'     => false,
            'empty_engine'      => false,
            'empty_current'     => false,
            'empty_consumption' => false,
        ];

        $noon_desc          = $noon_report['noon_desc'] != array_filter($noon_report['noon_desc']);
        $passage_plan       = $noon_report['passage_plan'] != array_filter($noon_report['passage_plan']);
        $engine             = $noon_report['engine'] != array_filter($noon_report['engine']);
        $current_rob        = $noon_report['current_rob'] != array_filter($noon_report['current_rob']);
        $consumption_rate   = $noon_report['consumption_rate'] != array_filter($noon_report['consumption_rate']);

        if($noon_desc === true){
            $noon_report['empty_desc'] = true;
        }

        if($passage_plan === true){
            $noon_report['empty_passage'] = true;
        }    

        if($engine === true){
            $noon_report['empty_engine'] = true;
        }

        if($current_rob === true){
            $noon_reportnoon_report['empty_current'] = true;
        }

        if($consumption_rate === true){
            $noon_report['empty_consumption'] = true;
        }

        return $noon_report;
    }

    public function queryIndex($check, $search)
    {
            $data = NoonReport::select(DB::raw(
                        "id, noon_desc, JSON_UNQUOTE(JSON_EXTRACT(noon_desc, '$.ship_name')), 
                        passage_plan, engine, current_rob, consumption_rate, empty_desc, empty_passage,
                        empty_engine, empty_current, empty_consumption"
                    ));

            $data = $data->whereRaw(
                                (!is_null($check) ? $check . ' = true AND ' : '') . 
                                ("JSON_UNQUOTE(JSON_EXTRACT(noon_desc, '$.ship_name')) LIKE '%" . (!is_null($search) ? $search : '') . "%'")
                            )
                            ->orderByDesc('id');
            return $data;
    }

    public function tabCondition($tab, $search)
    {

        $normal             = $this->queryIndex(null, $search);
        $noon_desc          = $this->queryIndex('empty_desc', $search);
        $passage_plan       = $this->queryIndex('empty_passage', $search);
        $engine             = $this->queryIndex('empty_engine', $search);
        $current_rob        = $this->queryIndex('empty_current', $search);
        $consumption_rate   = $this->queryIndex('empty_consumption', $search);

        if ($tab == 'noon-desc'){
            $noon_report = $noon_desc->paginate(5);
        }else if ($tab == 'passage-plan'){
            $noon_report = $passage_plan->paginate(5);
        }else if ($tab == 'engine'){
            $noon_report = $engine->paginate(5);
        }else if ($tab == 'current-rob'){
            $noon_report = $current_rob->paginate(5);
        }else if ($tab == 'consumption-rate'){
            $noon_report = $consumption_rate->paginate(5);
        }else {
            $noon_report = $normal->paginate(5);
        }

        $count = [
            'all'               => count($normal->get()),
            'noon_desc'         => count($noon_desc->get()),
            'passage_plan'      => count($passage_plan->get()),
            'engine'            => count($engine->get()),
            'current_rob'       => count($current_rob->get()),
            'consumption_rate'  => count($consumption_rate->get()),
        ];

        return [
            'noon_report' => $noon_report,
            'count'       => $count,
        ];
    }

    public function search(Request $request)
    {
        $noon_report  = $this->tabCondition($request->query('tab'), $request->query('search'));
        $noon_report  = $data['noon_report'];
        $count        = $data['count'];

        return view('pages.noon-report.index', compact('noon_report', 'count'));
    }

    public function index(Request $request)
    {
        $data         = $this->tabCondition($request->query('tab'), $request->query('search'));
        $noon_report  = $data['noon_report'];
        $count        = $data['count'];

        return view('pages.noon-report.index', compact('noon_report', 'count'));
    }

    public function show($id)
    {
        return view('pages.noon-report.print');
    }

    public function create()
    {
        return view('pages.noon-report.create');
    }

    public function store(Request $request)
    {
        try {

            NoonReport::create($this->payload($request));

            Alert::success('success', 'Berhasil Membuat Noon Report');
            return redirect()->route('noon-report.index');
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $noon_report = NoonReport::findOrFail($id);
        return view('pages.noon-report.edit', compact('noon_report'));
    }

    public function update($id, Request $request)
    {
        try {

            $data = NoonReport::findOrFail($id);

            DB::transaction(function () use (&$data, $request){
                $data->update($this->payload($request));
            });

            Alert::success('Success', 'Noon Report Berhasil Diupdate');
            return redirect()->route('noon-report.index');
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->route('noon-report.edit')->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            NoonReport::findOrFail($id)->delete();

            Alert::success('Success', 'Noon Report berhasil Dihapus');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back();
        }
    }
}
