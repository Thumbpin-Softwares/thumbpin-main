<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('real_estate_leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('email');
            $table->string('contact', 20);
            $table->string('requirement', 1000);
            $table->string('marketing_budget', 100);
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('real_estate_leads');
    }
}
