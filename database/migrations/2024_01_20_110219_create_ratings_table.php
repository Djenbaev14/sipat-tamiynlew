<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('point');
            $table->string('rating_ru');
            $table->string('rating_eng');
            $table->timestamps();
        });

        
        DB::table('ratings')->insert([
            'point'=>2,
            'rating_ru'=>'Плохо',
            'rating_eng'=>'sad'
        ]);
        
        DB::table('ratings')->insert([
            'point'=>3,
            'rating_ru'=>'Не понравилось',
            'rating_eng'=>'ok'
        ]);
        
        DB::table('ratings')->insert([
            'point'=>4,
            'rating_ru'=>'Хорошо',
            'rating_eng'=>'good'
        ]);
        
        DB::table('ratings')->insert([
            'point'=>5,
            'rating_ru'=>'Отлично',
            'rating_eng'=>'happy'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
