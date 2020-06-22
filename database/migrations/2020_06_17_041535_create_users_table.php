<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('role')->default(0); //0:normal; 1:admin
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')
                  ->references('id')
                  ->on('positions')
                  ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
         // insert default admin user
         DB::table('users')->insert(
            array(
                'firstName' => "admin",
                'lastName' => "user",
                'email' => "admin.example@gmail.com",
                'position_id' => 1,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            )
        );
        DB::table('users')->insert(
            array(
                'firstName' => "normal",
                'lastName' => "user",
                'email' => "normal.example@gmail.com",
                'position_id' => 4,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            )
        );
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
