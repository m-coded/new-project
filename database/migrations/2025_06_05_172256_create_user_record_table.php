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
        Schema::create('user_record', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->date('due_date');
            $table->decimal('amount', 10, 2); // max 99999999.99
            $table->string('account_status');
            $table->text('description')->nullable();
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->foreignId('user_id')->constrained('users'); // Assuming you have a users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
};
