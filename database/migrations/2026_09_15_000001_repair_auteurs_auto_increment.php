<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (! in_array(DB::getDriverName(), ['mysql', 'mariadb'], true)) {
            return;
        }

        $nextId = ((int) DB::table('auteurs')->max('id')) + 1;

        DB::statement('ALTER TABLE `auteurs` AUTO_INCREMENT = ' . $nextId);
    }

    public function down(): void
    {
        // The auto-increment counter does not need to be restored.
    }
};
