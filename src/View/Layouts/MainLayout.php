<?php
namespace Permittedleader\Tiffey\View\Layouts;

use Illuminate\View\Component;

class MainLayout extends Component
{
    public function render()
    {
        return view('tiffey::components.layouts.main');
    }
}