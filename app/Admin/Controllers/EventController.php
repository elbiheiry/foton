<?php

namespace App\Admin\Controllers;

use App\Models\Event;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Event';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Event);

        $grid->column('id', __('Id'));
        $grid->column('active', __('Active'))->display(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $grid->column('featured', __('Featured'))->display(function($featured){
            if($featured){
                return 'Yes';
            }
            return 'No';
        });
        $grid->eventtranslations('Title')->display(function($translations){
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
        $grid->column('from', __('From'));
        $grid->column('to', __('To'));
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
        $show = new Show(Event::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('active', __('Active'))->as(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $show->field('featured', __('Featured'))->as(function($featured){
            if($featured){
                return 'Yes';
            }
            return 'No';
        });
        $show->image(__('Image'))->image();
        $show->cover(__('Cover'))->image();
        $show->gallary('gallary', __('Gallary'))->image();
        $show->field('from', __('From'));
        $show->field('to', __('To'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->eventtranslations('Translations', function ($translation) {
            $translation->locale();
            $translation->title();
            $translation->description();
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
        $form = new Form(new Event);

        $form->switch('active', __('Active'))->default(1);
        $form->switch('featured', __('Featured'));
        $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :1300x500');
        $form->image('cover',__('Cover'))->uniqueName()->creationRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Optional <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :1300x500');
        $form->multipleImage('gallary', 'Gallery')->rules('nullable')->removable()->help('Optional <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :1100x365');
        $form->datetime('from', __('From'))->help('Optional');
        $form->datetime('to', __('To'))->help('Optional');
        $form->hasMany('eventtranslations','Translations', function (Form\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->textarea('featured_description')->rules('nullable|max:255')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->radio('dir', 'Text Direction')->options(['left' => 'Left', 'center' => 'Center', 'right' => 'Right'])->default('center');
            $form->ckeditor('description')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string')->attribute(['data-ckeditor' => true]);
            $form->textarea('seo_description')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string');
        });

        return $form;
    }
}
