<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="projetos" url="{{route('admin.workspace.projects', $row->id)}}" teal class="px-2 py-1 rounded-l-md"/>
        <x-dvui::link text="posts" url="{{route('admin.workspace.posts', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="links" url="{{route('admin.workspace.links', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="participants" url="{{route('admin.workspace.participants', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="chats" url="{{route('admin.workspace.chats', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="tags" url="{{route('admin.workspace.tags', $row->id)}}" teal class="px-2 py-1 rounded-r-md"/>
    </x-dvui::button.group>
    <div>Descrição: {{$row->description}}</div>
</div>
