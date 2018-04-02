<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddImageProfileFieldsToEmployeesTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function(Blueprint $table) {

            $table->string('image_profile_file_name')->nullable();
            $table->integer('image_profile_file_size')->nullable()->after('image_profile_file_name');
            $table->string('image_profile_content_type')->nullable()->after('image_profile_file_size');
            $table->timestamp('image_profile_updated_at')->nullable()->after('image_profile_content_type');

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function(Blueprint $table) {

            $table->dropColumn('image_profile_file_name');
            $table->dropColumn('image_profile_file_size');
            $table->dropColumn('image_profile_content_type');
            $table->dropColumn('image_profile_updated_at');

        });
    }

}