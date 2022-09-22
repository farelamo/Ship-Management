<?php

namespace App\Services\EngineOps;

use Alert;
use App\Models\RobEngine;
use App\Http\Requests\EngineOps\RobEngineRequest;

class RobEngineService
{
    public function index()
    {
        return view('workshop.link');
    }

    public function store(RobEngineRequest $request)
    {
        try {
            $data = [
                'noon_desc' => [
                    'ship_name'   => $request->ship_name,
                    'no_voyagae'  => $request->no_voyage,
                    'date_report' => $request->date,
                    'ship_from'   => $request->ship_from,
                    'ship_to'     => $request->ship_to,
                ],
                'navigation' => [
                    'current_position' => [
                        'latitude'   => $request->latitude,
                        'longtitude' => $request->longtitude,
                    ],
                    'n2n_distance'      => $request->n2n_distance,
                    'distance_to_go'    => $request->distance_to_go,
                    'average_speed'     => $request->average_speed,
                    'eta_date'          => $request->eta_date,
                    'weather_condition' => $request->weather_condition,
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
                    'mfo'      => $request->mfo,
                    'mdo'      => $request->mdo,
                    'hsd'      => $request->hsd,
                    'lub_oil'  => $request->lub_oil,
                    'fw'       => $request->fw,
                ]
            ];

            RobEngine::create($data);
            Alert::success('success', 'Berhasil Membuat Noon Report');
            return redirect()->back();
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function update($id, RobEngineRequest $request)
    {
        try {
            $data = RobEngine::find($id);
            $data->update($request->all());
            Alert::success('Success', 'Link berhasil diupdate');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        try {
            Link::findOrFail($id)->delete();
            Alert::success('Success', 'Link berhasil dihapus');
        } catch(Exception $e){
            Alert::error('Maaf', 'terjadi kesalahan');
            return redirect()->back()->withInput();
        }
    }
}

?>