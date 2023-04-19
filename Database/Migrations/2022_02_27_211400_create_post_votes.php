<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;

return new class extends Migration
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
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->post_id)
                ->references('id')->on('posts')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean($prop->up_vote)->nullable();
            $table->boolean($prop->down_vote)->nullable();

            $table->timestamps();
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
};
