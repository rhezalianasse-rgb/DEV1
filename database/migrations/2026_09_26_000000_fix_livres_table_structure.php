<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('livres')) {
            return;
        }

        if (! Schema::hasColumn('livres', 'titre')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->string('titre', 200)->after('auteur_id');
            });
        }

        if (! Schema::hasColumn('livres', 'isbn')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->string('isbn', 20)->unique()->after('titre');
            });
        }

        if (! Schema::hasColumn('livres', 'prix')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->decimal('prix', 10, 2)->after('isbn');
            });
        }

        if (! Schema::hasColumn('livres', 'stock')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->integer('stock')->after('prix');
            });
        }

        if (! Schema::hasColumn('livres', 'date_publication')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->date('date_publication')->after('stock');
            });
        }

        if (! Schema::hasColumn('livres', 'disponible')) {
            Schema::table('livres', function (Blueprint $table) {
                $table->boolean('disponible')->default(true)->after('date_publication');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('livres')) {
            return;
        }

        foreach (['titre', 'isbn', 'prix', 'stock', 'date_publication', 'disponible'] as $column) {
            if (Schema::hasColumn('livres', $column)) {
                Schema::table('livres', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }
};
