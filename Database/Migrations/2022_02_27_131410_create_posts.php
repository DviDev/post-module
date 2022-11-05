<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\Post\PostEntityModel;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $prop = PostEntityModel::props(null, true);
            $table->bigInteger($prop->user_id)->unsigned();
            $table->string($prop->title);
            $table->text($prop->content);
            $table->string($prop->thumbnail_image_path)->nullable();
            $table->bigInteger($prop->poll_id)->unsigned()->nullable();
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
        Schema::dropIfExists('posts');
    }
}
