<?php

namespace App\Admin\Controllers;

use App\Models\ContactUs;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContactUsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Contact Us';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ContactUs);

        $grid->column('id', __('Id'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('full_name', __('full name'))->display(function(){
            return $this->first_name.' '.$this->last_name;
        });
        $grid->column('mobile', __('Mobile'));
        $grid->column('email', __('Email'));
        $grid->column('call_time', __('Call time'));
        $grid->column('message', __('Message'));
        $grid->column('created_at', __('Sent at'));
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
        $show = new Show(ContactUs::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('last_name', __('full name'))->as(function(){
            return $this->first_name.' '.$this->last_name;
        });
        $show->field('mobile', __('Mobile'));
        $show->field('email', __('Email'));
        $show->field('call_time', __('Call time'));
        $show->field('message', __('Message'));
        $show->field('created_at', __('Sent at'));
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
        $form = new Form(new ContactUs);

        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->mobile('mobile', __('Mobile'));
        $form->email('email', __('Email'));
        $form->text('call_time', __('Call time'));
        $form->textarea('message', __('Message'));

        return $form;
    }
}
