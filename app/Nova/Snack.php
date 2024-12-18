<?php

namespace App\Nova;

use Illuminate\Http\Request;
use KirschbaumDevelopment\NovaComments\Commenter;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class Snack extends Resource {
    public static $model = \App\Models\Snack::class;
    public static $title = 'name';
    public static $search = ['name'];
    public static $group = "Staff";

    public function fields(Request $request) {
        return [
            Text::make('Name')->sortable()->rules('required', 'max:255'),

            Number::make('Stock'),

            Number::make('Price')->displayUsing(fn($value) => $value . ' AZN')->step(0.01),

            new Commenter(),
            HasMany::make('Comments', 'comments')->hideFromDetail()->hideFromIndex(),
        ];
    }
}
