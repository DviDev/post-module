<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;

class CreatePostVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_votes', function (Blueprint $table) {
            $table->id();

            $prop = PostVoteEntityModel::props(null, true);
            $table->bigInteger($prop->user_id)->unsigned();
            $table->bigInteger($prop->post_id)->unsigned();
            $table->boolean($prop->up_vote);
            $table->boolean($prop->down_vote);
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
        Schema::dropIfExists('post_votes');
    }
}
