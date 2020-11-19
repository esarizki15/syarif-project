<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $globalAttribute;
    public $label;
    public $type;
    public $defaultValue;
    public $customAttribute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($globalAttribute, $label, $type="text", $defaultValue, $customAttribute="")
    {
        $this->globalAttribute = $globalAttribute;
        $this->label = $label;
        $this->type = $type;
        $this->defaultValue = $defaultValue;
        $this->customAttribute = $customAttribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
