<?php

namespace App\Admin\Controllers;

use App\Models\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use DB;

class CityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'City';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new City);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('name_ar', __('Arabic name'));
        $grid->state('state')->display(function($state){
            return $state['name'];
        });
        $grid->country('country')->display(function($country){
            return $country['name'];
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('name', 'name');


        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('name_ar', __('Arabic Name'));
        $show->state('state')->as(function($state){
            return $state['name'];
        });
        $show->country('country')->as(function($country){
            return $country['name'];
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new City);

        $form->text('name', __('Name'))->rules('required')->help('Requird');
        $form->text('name_ar', __('Arabic Name'))->rules('required')->help('Requird');

        if(request()->route()->parameter('city') != null){
            $city = \App\Models\City::find(request()->route()->parameter('city'));
            $state = \App\Models\State::find($city->state_id);
            $country = \App\Models\Country::find($city->country_id);

            if($state){
                $form->select('state_id', __('Governarate'))->options([$state->id => $state->name])->ajax(route('searchState'))->rules('required')->help('Requird');
            }else {
                $form->select('state_id', __('Governarate'))->ajax(route('searchState'))->rules('required')->help('Requird');
            }

            if($country){
                $form->select('country_id', __('Country'))->options([$country->id => $country->name])->ajax(route('searchCountry'))->rules('required')->help('Requird');
            }else {
                $form->select('country_id', __('Country'))->ajax(route('searchCountry'))->rules('required')->help('Requird');
            }
        }else {
            $form->select('state_id', __('Governarate'))->ajax(route('searchState'))->rules('required')->help('Requird');
            $form->select('country_id', __('Country'))->ajax(route('searchCountry'))->rules('required')->help('Requird');
        }

        // $form->number('state_id', __('Governarate'));
        // $form->number('country_id', __('Country'));

        return $form;
    }

    function states(Request $request)
    {
        $q = $request->get('q');

        return \App\Models\State::where('states.name', 'like', '%'.$q.'%')->leftJoin('countries','countries.id','=','states.country_id')->paginate(null, ['states.id', DB::raw('CONCAT(states.name, ", ", countries.name) as text')]);
    }

    function country(Request $request)
    {
        $q = $request->get('q');

        return \App\Models\Country::where('name', 'like', '%'.$q.'%')->paginate(null, ['id', 'name as text']);
    }
}
