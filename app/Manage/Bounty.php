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
        $typeOptions = \BAKD\BountyType::all()->pluck('name', 'id');
        $rewardOptions = \BAKD\BountyRewardType::all()->pluck('name', 'id');

        return [
            ID::make('ID', 'id')->sortable()->onlyOnDetail(),
            Avatar::make('Logo', 'image')->sortable(),
            Text::make('Name', 'name')->sortable()->rules('required'),
            Select::make('Category', 'type_id')->options($typeOptions)->displayUsingLabels()->rules('required'),
            Select::make('Reward Type', 'bounty_reward_type_id')->options($rewardOptions)->displayUsingLabels()->rules('required'),
            Number::make('Reward Amount', 'reward')->min(0)->step(1)->rules('required'),
            Number::make('Reward Pool', 'reward_total')->min(0)->step(1)->rules('required'),
            DateTime::make('Start Date', 'start_date')->sortable(),
            DateTime::make('End Date', 'end_date')->sortable(),
            Markdown::make('Description', 'description')->rules('required'),
            Text::make('Bounty UUID', 'uuid')->sortable()->onlyOnDetail(),
            HasOne::make('Bounty Type', 'type'),
            HasOne::make('Bounty Reward Type', 'rewardType'),
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
