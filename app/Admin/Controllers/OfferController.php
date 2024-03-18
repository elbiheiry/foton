<?php

namespace App\Admin\Controllers;

use App\Models\Offer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OfferController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Offer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Offer);

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
        $grid->offertranslations('Title')->display(function($translations){
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
        $grid->column('price', __('Price'));
        $grid->column('date', __('Date'));
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
        $show = new Show(Offer::findOrFail($id));

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
        $show->gallery(__('Gallery'))->image();
        $show->field('price', __('Price'));
        $show->field('date', __('Date'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->offertranslations('Translations', function ($translation) {
            $translation->locale();
            $translation->title();
            $translation->description();
            $translation->warranty();
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
        $form = new Form(new Offer);

        $form->switch('active', __('Active'))->default(1);
        $form->switch('featured', __('Featured'));
        $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :175x160');
        $form->image('cover',__('Cover'))->uniqueName()->creationRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Optional <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :175x160');
        $form->multipleImage('gallery', 'Gallery')->rules('nullable')->removable()->help('Optional <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :175x160');
        $form->ckeditor('price', __('Price'))->rules('required')->help('Required')->attribute(['data-ckeditor' => true]);
        $form->date('date', __('Date'))->rules('required')->help('Required');
        $form->hasMany('offertranslations','Translations', function (Form\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->textarea('description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->text('warranty')->rules('nullable|max:255')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->textarea('seo_description')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string');
        });

        return $form;
    }
}
