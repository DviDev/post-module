<?php

namespace Modules\Post\Entities\PostCommentVote;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\PostCommentVoteModel;
use Modules\Post\Repositories\PostCommentVoteRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostCommentVoteModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method PostCommentVoteRepository repository()
 */
class PostCommentVoteEntityModel extends BaseEntityModel
{
    use PostCommentVoteProps;

    protected function repositoryClass(): string
    {
        return PostCommentVoteRepository::class;
    }
}
