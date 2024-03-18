<?php

namespace App\Admin\Controllers;

use App\Models\Country;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CountryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Country';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Country);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('name_ar', __('Arabic Name'));
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
        $show = new Show(Country::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('name_ar', __('Arabic Name'));
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
        $form = new Form(new Country);

        $form->text('name', __('Name'))->rules('required')->help('Requird');
        $form->text('name_ar', __('Name ar'))->rules('required')->help('Requird');

        return $form;
    }
}
