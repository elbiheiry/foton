<?php

namespace App\Admin\Controllers;

use App\Models\TestDrive;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestDriveController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Test Drive';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TestDrive);

        $grid->column('id', __('Id'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('vehicle_id', __('Vehicle'))->display(function($type){
            $typeTranslations = \App\Models\VehicleTranslation::where('vehicle_id',$type)->get();
            if(count($typeTranslations) != 0){
                foreach ($typeTranslations as $typeTranslation) {
                    if($typeTranslation['locale'] == 'en'){
                        return $typeTranslation['title'];
                    }
                }
                return $typeTranslation['title'];
            }else{
                return 'No Vehicle Type Selected';
            }
        });
        $grid->column('phone', __('Phone'));
        $grid->column('email', __('Email'));
        $grid->column('state_id', __('Governarate'))->display(function($state){
            $State = \App\Models\State::find($state);
            return $State->name?$State->name:'No Governarate Selected';
        });
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
        $show = new Show(TestDrive::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('vehicle_id', __('Vehicle'))->as(function($type){
            $typeTranslations = \App\Models\VehicleTranslation::where('vehicle_id',$type)->get();
            if(count($typeTranslations) != 0){
                foreach ($typeTranslations as $typeTranslation) {
                    if($typeTranslation['locale'] == 'en'){
                        return $typeTranslation['title'];
                    }
                }
                return $typeTranslation['title'];
            }else{
                return 'No Vehicle Type Selected';
            }
        });
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('state_id', __('Governarate'))->as(function($state){
            $State = \App\Models\State::find($state);
            return $State->name?$State->name:'No Governarate Selected';
        });
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
        $form = new Form(new TestDrive);

        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->number('vehicle_id', __('Vehicle id'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->number('state_id', __('State id'));

        return $form;
    }
}
