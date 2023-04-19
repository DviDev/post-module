<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.post.comments', $row->id)}}" label="comments" teal/>
        <x-button href="{{route('admin.post.tags', $row->id)}}" label="tags" teal/>
        <x-button href="{{route('admin.post.votes', $row->id)}}" label="votes" teal/>
    </div>
    @if(isset($row->description))
        <div>Descrição: {{e($row->description)}}</div>
    @endif
</div>
