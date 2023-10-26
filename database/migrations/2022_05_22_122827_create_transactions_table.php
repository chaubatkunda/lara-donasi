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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')
                ->constrained('users')
                ->references('id');
            $table->foreignUuid('campaign_id')
                ->constrained('campaigns')
                ->references('id')
                ->cascadeOnDelete();
            $table->string('invoice');
            $table->double('nominal');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('url_pay');
            $table->string('status')->default('waiting');
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};
