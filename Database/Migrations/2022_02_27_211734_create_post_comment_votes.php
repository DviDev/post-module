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

            $p = PostCommentVoteEntityModel::props(null, true);
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->comment_id)
                ->references('id')->on('post_comments')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean($p->up_vote)->unsigned()->nullable();
            $table->boolean($p->down_vote)->unsigned()->nullable();
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
        Schema::dropIfExists('post_comment_votes');
    }
};
