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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            // Informations de l’élève
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->enum('sexe', ['Masculin', 'Féminin']);
            $table->string('niveau'); // Maternelle, Primaire, Collège, Lycée

            // Informations du parent
            $table->string('parent_nom');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->text('adresse')->nullable();

            // Informations d’inscription
            $table->string('annee_scolaire')->default('2026/2027');

            // Document upload
            $table->string('document_path')
                            ->nullable()
                            ->default('no_document.pdf');// مسار الوثيقة المرفوعة

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};