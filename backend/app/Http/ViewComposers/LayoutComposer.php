<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Group;


class LayoutComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
      // \Debugbar::info($view);
      // dd('test');
      $view->with([
        'groups'=> Group::all(),
      ]);
    }


}


