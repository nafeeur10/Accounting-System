<?php

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
            $table->bigIncrements('id');
            $table->string('role');
            $table->string('companyLogo')->nullable();
            $table->string('companyName')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('city')->nullable();
            $table->string('kvkNumber')->nullable();
            $table->string('vatNumber')->nullable();
            $table->string('bankNumber')->nullable();
            $table->string('invoiceFootnote')->nullable();
            $table->string('password');
            $table->string('passwordForAdmin');
            $table->rememberToken();
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
