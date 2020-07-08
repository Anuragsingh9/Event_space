<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class AlterEventConversationMember extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('event_info', function ($table) {
            $table->uuid('event_key')->nullable();
            $table->unique('event_key');
            $table->json('bluejeans_settings')->default('{}')->after('event_key');
            $table->json('event_fields')->default('{}')->after('bluejeans_settings');
        });
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE event_info CHANGE COLUMN type type ENUM('int', 'ext', 'virtual') NOT NULL");
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('event_info', function ($table) {
            $table->dropColumn('event_key');
            $table->dropColumn('bluejeans_settings');
            $table->dropColumn('event_fields');
        });
    }
}


// added to tenant connection to codes.
// created api for space list for a particular event
// setup all migrations files and imported sql file of project.