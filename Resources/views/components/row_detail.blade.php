<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="comments" url="{{route('admin.post.comments', $row->id)}}" teal
                      class="rounded-l-md px-2 py-1"/>
        <x-dvui::link text="tags" url="{{route('admin.post.tags', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="votes" url="{{route('admin.post.votes', $row->id)}}" teal class="rounded-r-md px-2 py-1"/>
    </x-dvui::button.group>
    @if(isset($row->description))
        <div>Descrição: {{e($row->description)}}</div>
    @endif
</div>
