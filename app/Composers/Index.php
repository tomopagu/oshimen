<?php namespace App\Composers;

use Auth;
use Illuminate\View\View;

class Index
{
    /**
	 * Compose some data to the view.
	 *
	 * @param  View   $view
	 * @return void
	 */
	public function compose(View $view)
	{
        $data = $view->getData();
        if (isset($data['user'])) {
            $userColor = $data['user']->color;
        } else {
            $userColor = 'red';
        }

        $view->with('userColor', $userColor);
    }
}
