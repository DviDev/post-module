<?php

namespace Modules\Post\Entities\PostVote;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\PostVoteModel;
use Modules\Post\Repositories\PostVoteRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostVoteModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method PostVoteRepository repository()
 */
class PostVoteEntityModel extends BaseEntityModel
{
    use PostVoteProps;

    protected function repositoryClass(): string
    {
        return PostVoteRepository::class;
    }
}
