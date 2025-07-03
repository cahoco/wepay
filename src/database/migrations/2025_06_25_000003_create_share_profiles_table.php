<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('share_id')->constrained()->onDelete('cascade'); // 所属する共有スペース
            $table->string('nickname_a')->nullable();        // Aさんの名前
            $table->string('nickname_b')->nullable();        // Bさんの名前
            $table->date('birthday_a')->nullable();          // Aさんの誕生日
            $table->date('birthday_b')->nullable();          // Bさんの誕生日
            $table->date('anniversary')->nullable();         // 記念日
            $table->string('profile_image_a')->nullable();   // Aさんのプロフィール画像
            $table->string('profile_image_b')->nullable();   // Bさんのプロフィール画像
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('share_profiles');
    }
}
