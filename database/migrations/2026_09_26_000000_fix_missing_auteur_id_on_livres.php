<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('livres', 'auteur_id')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->foreignId('auteur_id')->nullable()->constrained('auteurs')->cascadeOnDelete();
            });

            $firstAuteur = DB::table('auteurs')->value('id');

            if ($firstAuteur !== null) {
                DB::table('livres')
                    ->whereNull('auteur_id')
                    ->update(['auteur_id' => $firstAuteur]);
            }

            Schema::table('livres', function (Blueprint $table) {
                $table->foreignId('auteur_id')->nullable(false)->change();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('livres', 'auteur_id')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->dropConstrainedForeignId('auteur_id');
            });
        }
    }
};
