<?php

namespace BAKD\Manage;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Uuid;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Trix;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Bounty extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'BAKD\Bounty';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'Bounties';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'uuid', 'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $typeOptions = [];
        $typeOptions = \BAKD\BountyType::all()->pluck('name', 'id');

        return [
            ID::make('ID', 'id')->sortable()->onlyOnDetail(),
            Avatar::make('Logo', 'image')->sortable(),
            Text::make('Name', 'name')->sortable()->rules('required'),
            Select::make('BountyType', 'type_id')->options($typeOptions)->displayUsingLabels(),
            Trix::make('Description', 'description')->withFiles('/uploads/bounty')->rules('required'),
            Number::make('Reward Amount', 'reward')->min(0)->max(1000000)->step(10)->rules('required'),
            Number::make('Max Reward Amount', 'reward_total')->min(0)->step(100)->rules('required'),
            DateTime::make('Starts Date', 'start_date'),
            DateTime::make('Ends Date', 'end_date'),
            Text::make('Bounty UUID', 'uuid')->sortable()->exceptOnForms(),
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
