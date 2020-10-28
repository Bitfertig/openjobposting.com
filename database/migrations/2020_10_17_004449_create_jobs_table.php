<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('title', 255)->nullable(); // Pflicht
            $table->text('description')->nullable(); // Pflicht
            $table->timestamp('date_posted')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Stelle ausgeschrieben am'); // Pflicht
            $table->timestamp('valid_through')->nullable()->comment('Bewerbungsfrist bis');
            $table->string('organization_name', 255)->nullable(); // Pflicht
            $table->string('organization_url', 255)->nullable();
            $table->string('organization_logo', 255)->nullable()->comment('Logo');
            $table->string('employment_type', 255)->nullable();
            $table->string('location_street', 255)->nullable()->comment('Straße'); // Pflicht
            $table->string('location_postal_code', 255)->nullable()->comment('PLZ'); // Pflicht
            $table->string('location_locality', 255)->nullable()->comment('Stadt'); // Pflicht
            $table->string('location_region', 255)->nullable()->comment('Bundesland'); // Pflicht
            $table->string('location_country', 255)->nullable()->comment('Land'); // Pflicht
            $table->float('salary_quantitative', 8, 2, true)->nullable()->comment('Lohn');
            $table->string('salary_unit', 50)->nullable()->comment('Einheit');
            $table->string('salary_currency', 50)->nullable()->comment('Währung');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
