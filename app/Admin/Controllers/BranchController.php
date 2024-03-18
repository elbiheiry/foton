<?php

namespace App\Admin\Controllers;

use App\Models\Branch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BranchController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Branch';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Branch);

        $grid->column('id', __('Id'));
        $grid->column('active', __('Active'))->display(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $grid->branchtranslations('Title')->display(function($translations){
            if(count($translations) != 0){
                foreach ($translations as $translation) {
                    if($translation['locale'] == 'en'){
                        return $translation['title'];
                    }
                }
                return $translation['title'];
            }else{
                return 'No Translations';
            }
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Branch::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('active', __('Active'))->as(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $show->field('map',__('Map Location'));
        $show->images(__('Images'))->image();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->branchtranslations('Translations', function ($translation) {
            $translation->locale();
            $translation->title();
            $translation->address();
            $translation->working_hour();
            $translation->disableCreateButton();
            $translation->disableActions();
        });

        // $show->workinghours('Working Hours', function ($translation) {
        //     $translation->day();
        //     $translation->from();
        //     $translation->to();
        //     $translation->disableCreateButton();
        //     $translation->disableActions();
        // });

        $show->contacts('Contacts', function ($translation) {
            $translation->phone();
            $translation->disableCreateButton();
            $translation->disableActions();
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
        $form = new Form(new Branch);

        $form->tab('Basic Info',function($form){

            $form->switch('active', __('Active'))->default(1);
            $form->textarea('map', __('Map Location'))->rules('nullable')->help('Optional');
            $form->multipleImage('images', 'Images')->rules('nullable')->removable()->help('Optional <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> Width x Hight :400x320');

        })->tab('Translations',function($form){

            $form->hasMany('branchtranslations','Translations', function (Form\NestedForm $form) {
                $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
                $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->text('address')->rules('nullable|max:255')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->ckeditor('working_hour')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string')->attribute(['data-ckeditor' => true]);
            });

        // })->tab('Working Hours',function($form){

        //     $form->hasMany('workinghours','Working Hours', function (Form\NestedForm $form) {
        //         $form->select('day')->options(['sat' => 'Saturday', 'sun' => 'Sunday', 'mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday', 'thur' => 'Thursday', 'fri' => 'Friday'])->rules('required')->help('Required');
        //         $form->time('from')->rules('required')->help('Required');
        //         $form->time('to')->rules('required')->help('Required');
        //     });

        })->tab('Contact',function($form){

            $form->hasMany('contacts','Contacts', function (Form\NestedForm $form) {
                $form->hidden('field')->value('phone');
                $form->mobile('phone')->rules('required')->help('Required');
            });

        });

        return $form;
    }
}
