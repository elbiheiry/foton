<?php

namespace App\Admin\Controllers;

use App\Models\State;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Governarate';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new State);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('name_ar', __('Arabic Name'));
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
        $show = new Show(State::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('name_ar', __('Arabic Name'));
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
        $form = new Form(new State);

        $form->text('name', __('Name'))->rules('required')->help('Requird');
        $form->text('name_ar', __('Arabic Name'))->rules('required')->help('Requird');
        if(request()->route()->parameter('state') != null){
            $state = \App\Models\State::find(request()->route()->parameter('state'));
            $country = \App\Models\Country::find($state->country_id);

            if($country){
                $form->select('country_id', __('Country'))->options([$country->id => $country->name])->ajax(route('searchCountry'))->rules('required')->help('Requird');
            }else {
                $form->select('country_id', __('Country'))->ajax(route('searchCountry'))->rules('required')->help('Requird');
            }
        }else {
            $form->select('country_id', __('Country'))->ajax(route('searchCountry'))->rules('required')->help('Requird');
        }

        return $form;
    }
}
