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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();                                  // ID (主キー)
            $table->integer('user_id');                    // ユーザーID（外部キー）
            $table->string('title',100);                   // タスク名
            $table->string('detail', 250)->nullable();     // 詳細
            $table->timestamp('deadline')->nullable();     // 締切日
            $table->integer('finish_flg')->default(0);     // 完了フラグ(0:未完了 | 1:完了)
            $table->timestamp('finish_date')->nullable();  // 完了日
            $table->timestamps();                          // created_at・updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
