<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('national_id');
            $table->string('password'); // ToDo:encript 
            $table->string('slug');
            $table->integer('status_account');// unactive= 0 , active = 1

            $table->integer('active_card')->nullable(); // unactive= 0 , otherwise active 
            $table->integer('status_card_requeste')->nullable(); // emp=0 , hr=1 , hr_manegar=2 , hr_manegar_approve = 3 
            
            $table->string('department')->nullable();
            $table->string('employee_image')->nullable();
            $table->timestamp('card_requested_at')->nullable();

            // Hr
            $table->timestamp('activate_account_at')->nullable();// hr active employee account 


            $table->timestamp('hr_maneger_approve_at')->nullable();
            $table->timestamp('card_expire_date_at')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
