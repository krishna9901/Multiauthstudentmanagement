<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('roll_no');
                // $table->string('first_name');
                $table->string('first_name')->unique();
                $table->string('middle_name')->nullable();
                $table->string('last_name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->date('dob');
                $table->string('student_image')->nullable();
                $table->string('phone_number');
                $table->unsignedBigInteger('class_id')->default(01);
                $table->unsignedBigInteger('section_id')->default(01);
                $table->integer('role_id')->default(2);
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('students');
    }
}
