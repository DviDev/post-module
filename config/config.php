<?php

declare(strict_types=1);

return [
    'name' => 'Post',
    'SEED_POST_COMMENT_VOTES_COUNT' => env('SEEDER_DEFAULT', 3),
    'SEED_POST_COMMENTS_COUNT' => env('SEEDER_DEFAULT', 3),
    'SEED_POST_TAGS_COUNT' => env('SEEDER_DEFAULT', 3),
    'SEED_POST_VOTES_COUNT' => env('SEEDER_DEFAULT', 3),
    'SEED_POSTS_COUNT' => env('SEEDER_DEFAULT', 3),
];
