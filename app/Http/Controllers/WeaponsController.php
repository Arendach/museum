<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\View\View;

class WeaponsController extends Controller
{
    public function index(Weapon $weapon): View
    {
        $title = $weapon->t('title');
        $breadcrumbs = [[$title]];

        return view('pages.weapon', compact('weapon', 'title', 'breadcrumbs'));
    }
}
