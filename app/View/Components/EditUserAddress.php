<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditUserAddress extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $url;
    public $id;
    public $i;
    public function __construct($title, $url, $id, $i)
    {
        $this->title = $title;
        $this->url = $url;
        $this->id = $id;
        $this->i = $i;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-user-address');
    }
}
