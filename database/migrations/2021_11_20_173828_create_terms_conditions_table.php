<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_type_id')->unsigned();
            $table->bigInteger('sec_type_id')->unsigned();
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->foreign('sec_type_id')->references('id')->on('section_types')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms_conditions');
        $table->dropForeign('user_types_user_type_id_foreign');
        $table->dropIndex('user_types_user_type_id_index');
        $table->dropColumn('user_type_id');
        $table->dropForeign('user_types_sec_type_id_foreign');
        $table->dropIndex('user_types_sec_type_id_index');
        $table->dropColumn('sec_type_id');
    }
}
