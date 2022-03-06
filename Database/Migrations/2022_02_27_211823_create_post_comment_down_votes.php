<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Post\Entities\PostCommentDownVoteEntityModel;

class CreatePostCommentDownVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment_down_votes', function (Blueprint $table) {
            $table->id();

            $prop = PostCommentDownVoteEntityModel::props(null, true);
            $table->bigInteger($prop->comment_id)->unsigned();
            $table->bigInteger($prop->user_id)->unsigned();
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
        Schema::dropIfExists('post_comment_down_votes');
    }
}
