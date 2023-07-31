@php
    use Modules\View\Models\ElementModel;
    use Modules\View\Models\ElementPropertyModel;

@endphp
<div class="text-gray-400">
    <div>{{$page->name}}</div>

    @if(session()->has('success'))
        <x-dvui::toast :success="true" title="Post" title2="{{now()->diffForHumans()}}" :label="session('success')"/>
    @endif
    <div class="space-y-3">
        @php
            /**@var ElementModel $row*/
        @endphp
        @foreach($this->getElements() as $row)
            <div>
                @php
                    @endphp
                @foreach($row->columns as $columnD)
                    @php
                        $component_ = $columnD->components->with('attribute')->first();
                    @endphp

                    <div class="p-1" wire:key="{{$columnD->id}}">
                        @php
                            $collection = collect($component_->properties);
                            $properties = $collection->pluck('value', 'name')->all();

                            $properties['value'] = $model->{$properties['name']};
                            $attributes_ = $collection
                                ->map(fn(ElementPropertyModel $p) => $p->name.'="'.$p->value.'"')
                                ->join(' ');
                        @endphp

                        @if($component_->type->name == 'TEXT' && str($properties['name'])->contains('image_path'))
                            <x-dvui::form.fileinput :label="$properties['label']" :attr="$properties"/>
                        @elseif($component_->type->name == 'TEXT')
                            @php
                                $input = "dvui::form.input";
                            @endphp
                            <x-dvui::form.input :attr="$properties" wire:model.defer="model.title"/>
                        @endif
                        @if($component_->type->name == 'COMBO')
                            @php
                                $combo = "select";
                            @endphp
                            <x-dvui::form.select :label="$properties['label']"
                                                 wire:model.defer="model.{{$properties['id']}}">
                                @foreach($this->getReferencedTableData($component_) as $item)
                                    <x-dvui::form.select.item :value="$item->id"
                                                              :selected="$model->{$properties['id']} == $item->id"
                                    >
                                        {{$item->value}}
                                    </x-dvui::form.select.item>
                                @endforeach
                            </x-dvui::form.select>
                        @endif

                        @if($component_->type->name == 'TEXT_MULTILINE')
                            <x-dvui::form.textarea :attrs="$properties" wire:model="model.{{$properties['id']}}"/>
                        @endif
                        @if($component_->type->name == 'NUMBER')
                            <x-dvui::form.input label="{{$properties['label']}}" type="number"
                                                wire:model="model.{{$properties['id']}}"/>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="border-t">
        <x-dvui::button label="Salvar" wire:click="save"/>
    </div>
</div>
