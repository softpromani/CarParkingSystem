<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputBox extends Component
{
    public string $type;
    public string $name;
    public string $label;
    public string $id;
    public ?string $value;
    public bool $required;
    public ?string $pattern;
    public bool $checked;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name = '',
        string $label = '',
        string $type = 'text',
        string $id = '',
        ?string $value = '',
        bool $required = false,
        ?string $pattern = null,
        bool $checked = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->id = $id ?: $name; // If no ID is provided, use the name
        $this->value = $value;
        $this->required = $required;
        $this->pattern = $pattern;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-box');
    }
}
