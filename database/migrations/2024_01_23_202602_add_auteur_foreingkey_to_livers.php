<?php

use App\Models\Auteur;
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
        Schema::table('livers', function (Blueprint $table) {
            $table->foreignIdFor(Auteur::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livers', function (Blueprint $table) {
            $table->dropColumn((new Auteur())->getForeignKey()); // get the forieng key of The model not hard coding "auteur_id"
        });
    }
};
