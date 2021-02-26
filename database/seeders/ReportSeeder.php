<?php

namespace Database\Seeders;

use App\Models\BookReport;
use App\Models\ReplyReport;
use App\Models\Report;
use App\Models\Review;
use Database\Factories\ReplyReportFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookReport::factory()->times(30)->create();
        ReplyReport::factory()->times(30)->create();
    }
}
