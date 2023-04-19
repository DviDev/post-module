<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment_votes', function (Blueprint $table) {
            $table->id();

            $prop = PostCommentVoteEntityModel::props(null, true);
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->comment_id)
                ->references('id')->on('post_comments')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean($prop->up_vote)->nullable();
            $table->boolean($prop->down_vote)->nullable();
            $table->timestamp($prop->created_at)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comment_votes');
    }
};
