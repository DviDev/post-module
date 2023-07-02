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

            $p = PostVoteEntityModel::props(null, true);
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->post_id)
                ->references('id')->on('posts')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean($p->up_vote)->nullable();
            $table->boolean($p->down_vote)->nullable();

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
        Schema::dropIfExists('post_votes');
    }
};
