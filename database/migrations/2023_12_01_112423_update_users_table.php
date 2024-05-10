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
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->after('id');
            $table->string('cognome', 25)->after('name');
            $table->dropColumn("email_verified_at");
            $table->dropColumn("remember_token");
            $table->string('rfid_token', 15)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function($table) {
            $table->dropColumn("uuid");
            $table->string("email_verified_at")->after('email');
            $table->string("remember_token")->after('password');
            $table->dropColumn("rfid_token");
        });
    }
};
