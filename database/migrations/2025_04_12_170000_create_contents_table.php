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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['videos', 'pdf', 'audios', 'articles']); // pour filtrer facilement
            $table->string('slug')->unique();

            // Stockage du fichier (MediaLibrary va gérer les fichiers associés)
            $table->string('path')->nullable(); // ou `url` pour les vidéos YouTube
    
            $table->decimal('price', 8, 2)->default(0); // 0 = gratuit
            $table->boolean('is_free')->default(false);
            $table->boolean('is_active')->default(true);
            $table->enum('status', ['draft', 'published'])->default('draft')->index();


            // Relation auteur
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // créateur

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
