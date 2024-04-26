<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_otps', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('otp');
            $table->text('details');
            $table->enum('status', ['is_confirm', 'is_cancel', 'is_verify', 'is_expired', 'is_error','is_pending','is_resend'])->nullable()->default('is_pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_otps');
    }
}
