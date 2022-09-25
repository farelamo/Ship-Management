<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NoonReport;

class NoonReportFactory extends Factory
{
    protected $model = NoonReport::class;

    public function definition()
    {
            return [
                'noon_desc'         =>  $this->faker->sentence(),
                'passage_plan'      =>  $this->faker->sentence(),
                'engine'            =>  $this->faker->sentence(),
                'current_rob'       =>  $this->faker->sentence(),
                'consumption_rate'  =>  $this->faker->sentence(),
            ];
    }
}
