<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MultiSelectBox extends Component
{
    public $name;
    public $label;
    public $options;
    public $selected;
    public $id;
    public $required;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $name,
        $label,
        $options = [],
        $selected = [],
        $id = null,
        $required = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = is_array($selected) ? $selected : explode(',', $selected);
        $this->id = $id ?? $name;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.multi-select-box');
    }
}
