<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTableMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('merchant_id');	
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->text('tag')->nullable();
            $table->string('time_process')->nullable();
            $table->boolean('status')->nullable();	
            $table->boolean('free_deliv')->nullable();	
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE menus ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
