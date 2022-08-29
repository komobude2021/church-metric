<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('email');
            $table->string('password');
            $table->char('gender', 1);
            $table->date('dob');
            $table->char('reg_level', 1);
            $table->tinyInteger('church_group_id')->nullable();
            $table->text('address')->nullable();
            $table->char('phone_number', 20)->nullable();
            $table->char('whatsapp', 20)->nullable();
            $table->dateTime('email_verified_at')->nullable();
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
        Schema::dropIfExists('members');
    }
}
