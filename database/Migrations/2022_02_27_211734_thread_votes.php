<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\ThreadVote\ThreadVoteEntityModel;

return new class extends Migration
{

    public function up()
    {
        Schema::create('thread_votes', function (Blueprint $table) {
            $table->id();

            $p = ThreadVoteEntityModel::props(null, true);

            $table->foreignId($p->thread_id)->references('id')->on('threads')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($p->user_id)->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->boolean($p->like)->unsigned()->nullable();
            $table->boolean($p->dislike)->unsigned()->nullable();
            $table->timestamp($p->created_at)->useCurrent();
        });
    }


    public function down()
    {
        Schema::dropIfExists('thread_votes');
    }
};
