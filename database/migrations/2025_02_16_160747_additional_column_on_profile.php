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
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->text('birth_place')->nullable()->after('civil_status');
            $table->string('spouse_name')->nullable()->after('birth_place');
            $table->string('spouse_contact')->nullable()->after('spouse_name');
            $table->string('citizenship')->nullable()->after('spouse_contact');
            $table->string('gender')->nullable()->after('citizenship');
            $table->string('father_name')->nullable()->after('gender');
            $table->string('father_occupation')->nullable()->after('father_name');
            $table->string('father_contact')->nullable()->after('father_occupation');
            $table->string('mother_name')->nullable()->after('father_contact');
            $table->string('mother_occupation')->nullable()->after('mother_name');
            $table->string('mother_contact')->nullable()->after('mother_occupation');
        });
        
        Schema::table('user_memberships', function (Blueprint $table) {
            $table->date('termination_date')->nullable();
            $table->decimal('initial_capital_subscription', 10, 2)->nullable();
            $table->decimal('initial_paid_up_capital', 10, 2)->nullable();
            $table->decimal('subscribed_share_capital', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'birth_place',
                'spouse_name',
                'spouse_contact',
                'citizenship',
                'gender',
                'father_name',
                'father_occupation',
                'father_contact',
                'mother_name',
                'mother_occupation',
                'mother_contact',
            ]);
        });

        Schema::table('user_memberships', function (Blueprint $table) {
            $table->dropColumn([
                'termination_date',
                'initial_capital_subscription',
                'initial_paid_up_capital',
                'subscribed_share_capital',
            ]);
        });
    }
};
