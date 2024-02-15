<?php
namespace Permittedleader\Tiffey\View\Layouts;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    public function render()
    {
        return view('tiffey::components.layouts.guest');
    }
}