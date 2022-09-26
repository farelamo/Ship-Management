<?php

namespace Database\Factories;

use App\Models\NoonReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoonReportFactory extends Factory
{
    protected $model = NoonReport::class;

    public function definition()
    {
        return [
            'noon_desc' => [
                'ship_name'     => $this->faker->name(),
                'no_voyage'     => $this->faker->numberBetween(0, 10000),
                'date_report'   => $this->faker->date(),
                'ship_from'     => $this->faker->state(),
                'ship_to'       => $this->faker->state(),
            ],
            'passage_plan' => [
                'paralex_index' => $this->faker->numberBetween(0, 10000),
                'current_position' => [
                    'latitude'    => $this->faker->numberBetween(0, 10000),
                    'longtitude'  => $this->faker->numberBetween(0, 10000),
                ],
                'eta_date'          => $this->faker->date(),
                'main_engine_pitch' => $this->faker->numberBetween(0, 10000),
                'speed'             => $this->faker->numberBetween(0, 1000),
                'track'             => $this->faker->numberBetween(0, 1000),
                'current'           => [
                    'set'   => $this->faker->numberBetween(0, 1000),
                    'rate'  => $this->faker->numberBetween(0, 1000),
                ],
                // Jrk tegak yg diukur dr lunas kpl s/d dasar laut / sungai
                'min_ukc'   => $this->faker->numberBetween(0, 1000),
                'distance'  => $this->faker->numberBetween(0, 1000),
                'ket'       => $this->faker->sentence(4), //keterangan
            ],
            'engine' => [
                'rpm'                       => $this->faker->numberBetween(0, 1000),
                'exhaust_gas_temperature'   => $this->faker->numberBetween(0, 1000),
                'turbocharger_inlet'        => $this->faker->numberBetween(0, 1000),
                'turbocharger_outlet'       => $this->faker->numberBetween(0, 1000),
                'fw_cooler_air_inlet'       => $this->faker->numberBetween(0, 1000),
                'fw_cooler_air_outlet'      => $this->faker->numberBetween(0, 1000),
            ],
            'current_rob' => [
                'mfo'       => $this->faker->numberBetween(0, 100), //Marine Full Oil
                'mdo'       => $this->faker->numberBetween(0, 100), //Marine Diesel Oil
                'hsd'       => $this->faker->numberBetween(0, 100), //High Speed Diesel
                'lub_oil'   => $this->faker->numberBetween(0, 100),
                'fw'        => $this->faker->numberBetween(0, 100),
            ],
            'consumption_rate' => [
                'mfo_consum'        => $this->faker->numberBetween(0, 100),
                'mdo_consum'        => $this->faker->numberBetween(0, 100),
                'hsd_consum'        => $this->faker->numberBetween(0, 100),
                'lub_oil_consum'    => $this->faker->numberBetween(0, 100),
                'fw_consum'         => $this->faker->numberBetween(0, 100),
            ],
        ];
    }
}
