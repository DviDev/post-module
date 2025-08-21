<?php

namespace Modules\Post\Listeners;

use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Models\PostModel;
use Modules\Project\Events\EntityAttributesCreatedEvent;
use Modules\Project\Models\ProjectEntityAttributeModel;

class DefineSearchableAttributes
{
    private EntityAttributesCreatedEvent $event;

    public function handle(EntityAttributesCreatedEvent $event): void
    {
        $this->event = $event;
        if ($event->entity->module->name !== config('post.name')) {
            return;
        }

        foreach ($event->entity->entityAttributes as $attribute) {
            $this->default($attribute);
        }
    }

    protected function default(ProjectEntityAttributeModel $attribute): void
    {
        if ($this->event->entity->name !== PostModel::table()) {
            return;
        }
        $p = PostEntityModel::props();
        if (in_array($attribute->name, [
            $p->id,
        ])) {
            $attribute->update(['searchable' => true]);
        }
    }
}
