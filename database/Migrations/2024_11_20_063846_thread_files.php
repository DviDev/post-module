<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\ThreadFile\ThreadFileEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thread_files', function (Blueprint $table) {
            $p = ThreadFileEntityModel::props(null, true);
            $table->id();
            $table->foreignId($p->thread_id)->references('id')->on('threads')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($p->file_path);

            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thread_files');
    }
};
