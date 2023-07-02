<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\Post\PostEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $p = PostEntityModel::props(null, true);
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($p->title);
            $table->text($p->content);
            $table->string($p->thumbnail_image_path)->nullable();

            $table->unique([$p->user_id, $p->title]);

            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
