<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectBox extends Component
{
    public string $name;
    public string $label;
    public string $id;
    public array $options;
    public ?string $selected;
    public bool $required;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name = '',
        string $label = '',
        string $id = '',
        array $options = [],
        ?string $selected = null,
        bool $required = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id ?: $name; // Default to name if no ID is provided
        $this->options = $options;
        $this->selected = $selected;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-box');
    }
}
