<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\PostTag\PostTagEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('thread_post_tags', function (Blueprint $table): void {
            $table->id();

            $prop = PostTagEntityModel::props(null, true);
            $table->foreignId($prop->post_id)
                ->references('id')->on('thread_posts')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($prop->tag, 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('thread_post_tags');
    }
};
