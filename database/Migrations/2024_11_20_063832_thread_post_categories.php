<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\PostCategory\PostCategoryEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thread_post_categories', function (Blueprint $table) {
            $p = PostCategoryEntityModel::props(null, true);
            $table->id();
            $table->foreignId($p->post_id)->references('id')->on('thread_posts')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId($p->created_by_user_id)->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string($p->name, 50)->unique();
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
        Schema::dropIfExists('');
    }
};
