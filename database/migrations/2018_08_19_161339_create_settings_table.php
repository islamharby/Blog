<?php

use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('value')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->default('text');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Setting::create([
            'name' => 'MAIN_COLOR',
            'value' => '#00796b',
            'title' => 'Main color',
            'type' => 'color',
        ]);

        Setting::create([
            'name' => 'DARK_COLOR',
            'value' => '#455a64',
            'title' => 'Dark color',
            'type' => 'color',
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
