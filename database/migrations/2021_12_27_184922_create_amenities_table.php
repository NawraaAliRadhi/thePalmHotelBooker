<?php

use App\Amenity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("description")->nullable();
            $table->string("font")->nullable();
            $table->timestamps();
        });

        Schema::table('amenities', function (Blueprint $table) {
            $arr = [
                [
                    'name' => 'Private Bar',
                    'font' => 'fa fa-glass'
                ],
                [
                    'name' => 'Transport',
                    'font' => 'fa fa-car'
                ],
                [
                    'name' => 'Free Wifi',
                    'font' => 'fa fa-wifi'
                ],
                [
                    'name' => 'Laundry Service',
                    'font' => 'fa fa-bath'
                ],
                [
                    'name' => 'Quick Service',
                    'font' => 'fa fa-cogs'
                ],
                [
                    'name' => 'City Map',
                    'font' => 'fa fa-map-marker'
                ],
                [
                    'name' => 'Swimming Pool',
                    'font' => 'fa fa-life-ring'
                ],
                [
                    'name' => 'Smoking Free',
                    'font' => 'fa fa-bolt'
                ],
            ];

            foreach($arr as $ar) {
                Amenity::create($ar);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenities');
    }
}
