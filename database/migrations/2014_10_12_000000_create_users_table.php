<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->string('jobTitle',50);
            $table->string('email',100)->unique();
            $table->string('password', 100);
            $table->string('role', 20)->default('user');
            $table->string('gender', 20)->default('female');
            $table->string('img')->default('/images/default-profile.jpg');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'firstName' => 'Islam',
            'lastName' => 'Harby',
            'email' => 'admin@gmail.com',
            'jobTitle' => 'Full-stack web developer',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'gender' => 'male'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
