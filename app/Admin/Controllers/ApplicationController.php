<?php

namespace App\Admin\Controllers;

use App\Models\Application;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ApplicationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Application';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Application);

        $grid->column('id', __('Id'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('notes', __('Notes'));
        $grid->column('resume', __('Resume'))->downloadable();
        $grid->column('created_at', __('Applyed at'));

        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            $actions->disableEdit();
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
        $show = new Show(Application::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('notes', __('Notes'));
        $show->resume(__('Resume'))->file();
        $show->field('created_at', __('Applayed at'));

        $show->panel()
        ->tools(function ($tools) {
            $tools->disableEdit();
            $tools->disableDelete();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Application);

        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->textarea('notes', __('Notes'));
        $form->file('resume', __('Resume'));

        return $form;
    }
}
