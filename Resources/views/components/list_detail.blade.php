<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.workspace.projects', $row->id)}}" label="projetos" teal/>

        <x-button href="{{route('admin.workspace.posts', $row->id)}}" label="posts" teal/>

        <x-button href="{{route('admin.workspace.links', $row->id)}}" label="links" teal/>

        <x-button href="{{route('admin.workspace.participants', $row->id)}}" label="participants" teal/>

        <x-button href="{{route('admin.workspace.chats', $row->id)}}" label="chats" teal/>

        <x-button href="{{route('admin.workspace.tags', $row->id)}}" label="tags" teal/>
    </div>
    <div>Descrição: {{$row->description}}</div>
</div>
