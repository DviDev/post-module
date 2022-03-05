# Post Module
## Simple management of Posts

### Post

```mermaid
graph TD
    Outros[...]-->Post;
    Post-->Tags;
    Post-->Comments;
```

### Post Actions
```mermaid
graph TD
    Post-->PostAdd[add];
    Post-->PostUpdate[update];
    Post-->PostDelete[del];
    Post-->like;
    Post-->dislike;
    Post-->Tags;
    Tags-->TagsAdd[add];
    Tags-->TagsRemove[del];
    Post-->Comments;
    Comments-->CommentAdd[add];
    Comments-->CommentDel[del];
    Comments-->LikeComment[like];
    Comments-->DislikeComment[dislike];
    Comments-->ReplyComment[reply];
```
