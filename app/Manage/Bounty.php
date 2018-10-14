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
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\BelongsTo;
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
    public static $title = 'name';

    /**
     * Eager loading
     *
     * @var string
     */
     public static $with = ['claims', 'bountyRewardType', 'type'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'uuid', 'name', 'description'
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
            ID::make('ID', 'id')->sortable()->onlyOnDetail(),
            Avatar::make('Logo', 'image')->sortable(),
            Text::make('Name', 'name')->sortable()->rules('required'),
            DateTime::make('Start Date', 'start_date')->hideFromIndex()->sortable(),
            DateTime::make('End Date', 'end_date')->hideFromIndex()->sortable(),
            BelongsTo::make('Bounty Type', 'type'),
            BelongsTo::make('Bounty Reward Type', 'bountyRewardType'),
            Number::make('Reward Amount', 'reward')->min(0)->step(1)->rules('required')->sortable(),
            Number::make('Total Reward Pool', 'reward_total')->min(0)->step(1)->rules('required')->sortable(),
            Markdown::make('Description', 'description')->rules('required'),
            Text::make('Bounty UUID', 'uuid')->sortable()->onlyOnDetail(),
            HasMany::make('Bounty Claims', 'claims'),
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

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Bounties';
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return 'Bounty';
    }

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        return 'BAKD Bounty Programs';
    }
}
