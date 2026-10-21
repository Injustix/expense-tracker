<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('expenses')) {
            Schema::create('expenses', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->decimal('amount', 10, 2);
                $table->timestamps();
            });
    
            return;
        }
    
        Schema::table('expenses', function (Blueprint $table) {
            if (! Schema::hasColumn('expenses', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
    
            if (! Schema::hasColumn('expenses', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
