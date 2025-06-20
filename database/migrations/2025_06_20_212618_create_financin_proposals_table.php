<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('financing_proposals', function (Blueprint $table) {
            $table->id();

            // Dados do veículo
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->integer('vehicle_year');
            $table->decimal('vehicle_price', 10, 2);

            // Dados pessoais
            $table->string('full_name');
            $table->string('cpf', 11);
            $table->string('email');
            $table->string('phone', 11);
            $table->date('birth_date');

            // Dados financeiros
            $table->decimal('monthly_income', 10, 2);
            $table->string('profession');
            $table->decimal('down_payment', 10, 2)->default(0);
            $table->integer('installments');

            // Controle LGPD
            $table->boolean('marketing_consent')->default(false);

            // Status da proposta
            $table->enum('status', ['pending', 'approved', 'rejected', 'under_review'])->default('pending');

            // Dados adicionais
            $table->text('notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->string('reviewed_by')->nullable();

            $table->timestamps();

            // Índices
            $table->index(['status', 'created_at']);
            $table->index('cpf');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financing_proposals');
    }
};
