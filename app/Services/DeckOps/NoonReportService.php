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

    public function index(Request $request)
    {
        $normal             = NoonReport::paginate(5);
        $noon_desc          = NoonReport::where('empty_desc', '=', true)->paginate(5);
        $passage_plan       = NoonReport::where('empty_passage', '=', true)->paginate(5);
        $engine             = NoonReport::where('empty_engine', '=', true)->paginate(5);
        $current_rob        = NoonReport::where('empty_current', '=', true)->paginate(5);
        $consumption_rate   = NoonReport::where('empty_consumption', '=', true)->paginate(5);

        if ($request->query('tab') == 'noon-desc'){
            $noon_report = $noon_desc;
        }else if ($request->query('tab') == 'passage-plan'){
            $noon_report = $passage_plan;
        }else if ($request->query('tab') == 'engine'){
            $noon_report = $engine;
        }else if ($request->query('tab') == 'current-rob'){
            $noon_report = $current_rob;
        }else if ($request->query('tab') == 'consumption-rate'){
            $noon_report = $consumption_rate;
        }else {
            $noon_report = $normal;
        }

        $count = [
            'all'               => count($normal),
            'noon_desc'         => count($noon_desc),
            'passage_plan'      => count($passage_plan),
            'engine'            => count($engine),
            'current_rob'       => count($current_rob),
            'consumption_rate'  => count($consumption_rate),
        ];
        
        return view('pages.noon-report.index', compact('noon_report', 'count'));
    }

    public function show()
    {
        return view('pages.noon-report.show');
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
