<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Test;
use Illuminate\Support\Facades\Log;  // Add the Log facade import

class TestSeeder extends Seeder
{
    public function run(): void
    {
       Test::factory()->count(6)->create();

        
    }
}

