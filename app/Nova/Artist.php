<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Artist extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Artist::class;

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

            Text::make('Name (English)', 'name_en')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Name (Korean)', 'name_kr')
                ->sortable()
                ->rules('max:255'),

            Boolean::make('Spotify ID', function () {
                return $this->spotify_id;
            }),

            Boolean::make('Spotify Image', function () {
                return $this->spotify_image;
            }),

            Image::make('Image')
                ->nullable()
                ->hideFromIndex()
                ->disk('s3'),

            Image::make('Logo')
                ->nullable()
                ->hideFromIndex()
                ->disk('s3'),

            Textarea::make('Description')
                ->hideFromIndex(),

            Text::make('Twitter', function () {
                $username = $this->twitter;

                return "<a href='https://twitter.com/{$username}'>@{$username}</a>";
            })->asHtml()->hideFromIndex(),

            Text::make('Facebook', function () {
                $username = $this->facebook;

                return "<a href='https://facebook.com/{$username}'>/{$username}</a>";
            })->asHtml()->hideFromIndex(),

            Text::make('Instagram', function () {
                $username = $this->instagram;

                return "<a href='https://instagram.com/{$username}'>@{$username}</a>";
            })->asHtml()->hideFromIndex(),

            Text::make('Youtube', function () {
                $username = $this->youtube;

                return "<a href='https://youtube.com/c/{$username}'>/{$username}</a>";
            })->asHtml()->hideFromIndex(),

            Text::make('Daum', function () {
                $username = $this->daum;

                return "<a href='https://cafe.daum.net/{$username}'>/{$username}</a>";
            })->asHtml()->hideFromIndex(),
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
