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
            $table->id();

            $prop = PostCommentEntityModel::props(null, true);
            $table->foreignId($prop->post_id)
                ->references('id')->on('posts')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->parent_id)
                ->nullable()
                ->references('id')->on('post_comments')
                ->cascadeOnUpdate()->nullOnDelete();

            $table->text($prop->content);
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamps();
            $table->softDeletes();
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
