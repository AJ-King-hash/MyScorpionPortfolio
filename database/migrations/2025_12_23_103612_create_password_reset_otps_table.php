<?php
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('password_reset_otps', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->string('otp'); // e.g. 6-digit code
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('password_reset_otps');
    }
};