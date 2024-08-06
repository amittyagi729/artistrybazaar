<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FeatureControlsComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $exportUrl;
    public function __construct($exportUrl)
    {
        $this->exportUrl = $exportUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feature-controls-component');
    }
}
