<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\Thread\ThreadEntityModel;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $p = ThreadEntityModel::props(null, true);

            $table->id();

            $table->foreignId($p->parent_id)
                ->nullable()
                ->references('id')->on('threads')
                ->cascadeOnUpdate()->nullOnDelete();

            $table->foreignId($p->record_id)->references('id')->on('app_records')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->string($p->content);

            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

            $table->comment('generic messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
};
