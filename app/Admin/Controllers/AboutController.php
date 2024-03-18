<?php

namespace App\Admin\Controllers;

use App\Models\About;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AboutController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'About';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new About);

        $grid->column('id', __('Id'));
        $grid->column('slug', __('Slug'))->display(function($slug){
            if($slug == 'foton'){
                return 'Foton';
            }
            return 'AMG';
        });
        $grid->abouttranslations('Title')->display(function($translations){
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
        $grid->image(__('Image'))->image();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });
        $grid->disableCreateButton();

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
        $show = new Show(About::findOrFail($id));

        $show->field('id', __('Id'));
        $show->image(__('Image'))->image();
        $show->field('slug', __('Slug'))->as(function($slug){
            if($slug == 'foton'){
                return 'Foton';
            }
            return 'AMG';
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->abouttranslations('Translations', function ($translation) {
            $translation->locale();
            $translation->title();
            $translation->description();
            $translation->warranty();
            $translation->disableCreateButton();
            $translation->disableActions();
        });

        $show->panel()->tools(function ($tools) {
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
        $form = new Form(new About);

        $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :540x300');
        $form->hasMany('abouttranslations','Translations', function (Form\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->ckeditor('description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string')->attribute(['data-ckeditor' => true]);
        });

        $form->tools(function (Form\Tools $tools) {
            // Disable `Delete` btn.
            $tools->disableDelete();
        });

        return $form;
    }
}
