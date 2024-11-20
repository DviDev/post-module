<?php

namespace Modules\Post\Services\Message;

use Modules\Base\Models\RecordModel;
use Modules\Base\Models\RecordRelationModel;
use Modules\Post\Models\MessageModel;

trait HasMessage
{
    public function addMessage(MessageModel $comment): MessageModel
    {
        if (!$this->record_id) {
            $this->record_id = RecordModel::create()->id;
            $this->save();
        }

        $commentItem = RecordModel::create();
        RecordRelationModel::create(['record1' => $this->record_id, 'record2' => $commentItem->id]);

        $comment->record_id = $commentItem->id;
        $comment->save();
        return $comment;
    }
}
