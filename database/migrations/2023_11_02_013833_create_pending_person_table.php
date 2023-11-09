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
        Schema::create('PendingPerson', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->string('username', 60);
            $table->string('name', 60);
            $table->string('name_of_record');
            $table->string('job_title');
            $table->string('email', 100);
            $table->string('alias_email',100);
            $table->string('phone', 14);
            $table->string('location', 100);
            $table->string('fax', 14);
            $table->string('website', 200);
            $table->boolean('publishable');
            $table->dateTime('lastApprovedAt');
            $table->unsignedBigInteger('lastApprovedBy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_person');
    }
};