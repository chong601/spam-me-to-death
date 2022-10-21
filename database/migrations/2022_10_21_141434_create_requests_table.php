<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('ipAddress');
            $table->string('userAgent')->nullable();
            $table->dateTime('requestMadeAt');
            $table->json('headers');
            $table->timestamps();
            $table->index('ipAddress', 'ip_address_idx');
            $table->index('userAgent', 'user_agent_idx');
            $table->index('requestMadeAt', 'request_made_at_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
