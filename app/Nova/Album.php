<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Album extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Album::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name_en';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name_en', 'name_kr',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Artist')
                ->sortable(),

            BelongsTo::make('Subunit')
                ->sortable()
                ->nullable(),

            Boolean::make('Spotify ID', function () {
                return $this->spotify_id;
            }),

            Boolean::make('Spotify Image', function () {
                return $this->spotify_image;
            }),

            Image::make('Cover Art')
                ->nullable()
                ->hideFromIndex()
                ->disk('s3'),

            Image::make('Album Image')
                ->nullable()
                ->hideFromIndex()
                ->disk('s3'),

            Text::make('Name (English)', 'name_en')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Name (Korean)', 'name_kr')
                ->sortable()
                ->rules('max:255')
                ->hideFromIndex(),

            Textarea::make('Description')
                ->nullable()
                ->hideFromIndex(),

            Date::make('Release Date')
                ->sortable()
                ->rules('required'),

            Text::make('Version')
                ->sortable()
                ->nullable(),

            Boolean::make('Primary Version')
                ->sortable()
                ->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
