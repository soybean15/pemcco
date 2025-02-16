<?php

use App\Models\User;
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
        Schema::create('user_governments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('tin')->nullable(); // Tax Identification Number
            $table->string('sss')->nullable(); // Social Security System number
            $table->string('philhealth')->nullable(); // PhilHealth number
            $table->string('pagibig')->nullable(); // Pag-IBIG Fund number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_governments');
    }
};
