<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->foreignId('theatres_id')->constrained();
            $table->timestamps();
        });

        // $theatres = DB::table('theatres')->get();
        // foreach ($theatres as $theatre) {
        //     $dates = explode(',', $theatre->theatre_dates);
        //     foreach ($dates as $date) {
        //         DB::table('dates')->insert([
        //             'theatres_id' => $theatre->id,
        //             'date' => $date,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }


        //USE TO REDUCE REDUNDANCIES
        // Schema::table('theatres', function (Blueprint $table) {
        //     $table->dropColumn('theatre_dates');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dates');
    }
};
