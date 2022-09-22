<?php

namespace App\Services\EngineOps;

use Alert;
use App\Http\Requests\EngineOps\NoonReportRequest;
use App\Models\NoonReport;

class NoonReportService
{
    public function index()
    {
        return view('workshop.link');
    }

    public function store(NoonReportRequest $request)
    {
        try {
            $data = [
                'noon_desc' => [
                    'ship_name'     => $request->ship_name,
                    'no_voyage'     => $request->no_voyage,
                    'date_report'   => $request->date,
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
                    'exhaust_gas_temperature'   => $request->exhaust_gas_temperature . ' ℃',
                    'turbocharger_inlet'        => $request->turbocharger_inlet . ' ℃',
                    'turbocharger_outlet'       => $request->turbocharger_outlet . ' ℃',
                    'fw_cooler_air_inlet'       => $request->fw_cooler_air_inlet . ' ℃',
                    'fw_cooler_air_outlet'      => $request->fw_cooler_air_outlet . ' ℃',
                ],
                'current_rob' => [
                    'mfo'       => $request->mfo . ' MT', //Marine Full Oil
                    'mdo'       => $request->mdo . ' MT', //Marine Diesel Oil
                    'hsd'       => $request->hsd . ' MT', //High Speed Diesel
                    'lub_oil'   => $request->lub_oil . ' MT',
                    'fw'        => $request->fw . ' MT',
                ],
                'consumption_rate' => [
                    'mfo'       => $request->mfo_consum . ' MT/DAY', 
                    'mdo'       => $request->mdo_consum . ' MT/DAY', 
                    'hsd'       => $request->hsd_consum . ' MT/DAY',
                    'lub_oil'   => $request->lub_oil_consum . ' MT/DAY',
                    'fw'        => $request->fw_consum. ' MT/DAY',
                ]
            ];

            NoonReport::create($data);
            Alert::success('success', 'Berhasil Membuat Noon Report');
            return redirect()->back();
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function update($id, NoonReportRequest $request)
    {
        try {

            $data = NoonReport::find($id);

            $data->update($request->all());
            Alert::success('Success', 'Noon Report Berhasil Diupdate');
        } catch (Exception $e) {
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
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

    // 'navigation' => [
    //     'current_position' => [
    //         'latitude'   => $request->latitude,
    //         'longtitude' => $request->longtitude,
    //     ],
    //     'n2n_distance'      => $request->n2n_distance . ' NM', //jarak yang ditempuh
    //     'distance_to_go'    => $request->distance_to_go . ' NM',
    //     'average_speed'     => $request->average_speed . ' KNOT',
    //     'eta_date'          => $request->eta_date,
    //     'weather_condition' => $request->weather_condition,
    // ],
}
