<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $p = PostCommentEntityModel::props(null, true);

            $table->id();

            $table->unsignedBigInteger($p->entity_item_id);

//            $table->foreignId($p->post_id)->nullable()
//                ->references('id')->on('posts')
//                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->parent_id)
                ->nullable()
                ->references('id')->on('post_comments')
                ->cascadeOnUpdate()->nullOnDelete();

            $table->text($p->content);
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

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
        Schema::dropIfExists('post_comments');
    }
};
