<?php

namespace App\View\Components;

use App\Models;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppSelect extends Component
{
    public $model;
    public $displayMember;
    public $valueMember;
    public $selected;
    public function __construct($model, $displayMember, $valueMember = "id", $selected = null)
    {
        $this->model = $model;
        $this->displayMember = $displayMember;
        $this->valueMember = $valueMember;
        $this->selected = $selected;
    }

    public function render(): View|Closure|string
    {
        $data = call_user_func("App\\Models\\$this->model::all");
        return view('components.app-select')
            ->with('data', $data);
    }
}
