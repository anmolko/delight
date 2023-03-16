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
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('title')->after('name')->nullable();
            $table->string('salary')->nullable()->change();
            $table->string('required_number')->nullable()->change();
            $table->string('min_qualification')->nullable()->change();
            $table->longText('description')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->string('slug')->nullable()->change();
            $table->string('category_ids')->nullable();
            $table->string('client_ids')->nullable();
            $table->string('extra_company')->nullable();
            $table->unsignedBigInteger('job_category_id')->nullable()->change();
            $table->unsignedBigInteger('client_id')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->string('required_number')->nullable(false)->change();
            $table->string('salary')->nullable(false)->change();
            $table->string('min_qualification')->nullable(false)->change();
            $table->longText('description')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
            $table->string('slug')->nullable(false)->change();
            $table->dropColumn('category_ids');
            $table->dropColumn('client_ids');
            $table->dropColumn('extra_company');
            $table->unsignedBigInteger('job_category_id')->nullable(false)->change();
            $table->unsignedBigInteger('client_id')->nullable(false)->change();
        });
    }
};
