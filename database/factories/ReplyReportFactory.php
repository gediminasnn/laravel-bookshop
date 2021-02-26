<?php

namespace Database\Factories;

use App\Models\ReplyReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReplyReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_report_id' => rand(1,30),
            'user_id' => rand(9,10),
            'reply' => $this->faker->text(100)
        ];
    }
}
