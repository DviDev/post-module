<?php

namespace Modules\Post\Http\Livewire\Form;

use Modules\Base\Http\Livewire\BaseComponent;
use Modules\Base\Models\BaseModel;

class PostForm extends BaseComponent
{
    public BaseModel $model;

    //Todo esta classe deve ser uma classe base para componentes formulario livewire
    //Se a view de um componente livewire pode ficar em outra pasta(acredito que não)
    //entao a view deveria ser movida para o modulo base, mas como nao deve ser possivel
    //entao a view deve permanecer em sua sua pasta de origem, porem a classe de formulário
    //não precisa existir, quem quiser carregar um formulário base, basta chama-lo e usar.
    //fazer o teste com a pagina de cadastro/edicao de workspace
    //Renomear a view post-form para base-form
    //rota para carregar uma página essa página
    //--rota->pagina que deve carregar um componente livewire
    //--rota->pagina->componente que deve extender do componente base
    //--rota->pagina->componente->view  que deve ser a view base-form
    //repetir este processo para todas as paginas que precisam de um formulário
//    public function render()
//    {
//        parent::render();
//
//        return view('livewire.base.base-form');
//    }
}
