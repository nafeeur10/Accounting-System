<?php

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
            $table->string('companyLogo')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('city')->nullable();
            $table->string('kvkNumber')->nullable();
            $table->string('vatNumber')->nullable();
            $table->string('bankNumber')->nullable();
            $table->string('invoiceFootnote')->nullable();
            $table->string('password');
            $table->string('passwordForAdmin')->nullable();
            $table->string('remember_token')->nullable();

            $table->timestamps();

        });
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
