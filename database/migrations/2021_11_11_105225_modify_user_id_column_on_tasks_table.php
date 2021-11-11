<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserIdColumnOnTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `tasks` MODIFY `user_id` BIGINT UNSIGNED NOT NULL;');
        DB::statement('ALTER TABLE Tasks ADD CONSTRAINT FK_UserTask FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE Tasks DROP CONSTRAINT FK_UserTask; ');
    }
}
