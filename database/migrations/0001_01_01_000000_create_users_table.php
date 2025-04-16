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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
    
            // Infos d'identité
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
    
            // Auth
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
    
            // Avatar ou photo de profil
            $table->string('avatar')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            // Rôle par défaut avec Spatie
            $table->string('role')->default('user'); // non utilisé directement si Spatie est géré via modèle
    
            // Paiements / statut premium
            $table->boolean('is_premium')->default(false);
            $table->timestamp('premium_expires_at')->nullable();
    
            // Social login (optionnel à activer plus tard)
            $table->string('provider')->nullable(); // ex: google, facebook
            $table->string('provider_id')->nullable();
    
            // Statuts / tracking
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
            //index recherche optimisation
            $table->index(['email', 'phone']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
