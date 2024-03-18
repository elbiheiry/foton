<?php

namespace App\Admin\Controllers;

use App\Models\FooterFeture;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FooterFeturesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Footer Features';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FooterFeture);

        $grid->column('id', __('Id'));
        $grid->feturestranslation('title')->display(function($translations){
            
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
        $grid->column('icon', __('Icon'));
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
        $show = new Show(FooterFeture::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->icon('icon', __('Icon'))->image();
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
        $form = new Form(new FooterFeture);
        $form->text('link',__('Link'))->rules('required')->help('Required');
        $form->image('icon', __('Icon'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :1300x500');
        $form->hasMany('feturestranslation','Translations', function (Form\NestedForm $form) {
        $form->select('locale')->options(['ar' => 'Arabic', 'en' => 'English' ]);
        $form->text('title', __('Title'))->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string');
        $form->text('description', __('Description'))->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string');
        });
        

        return $form;
    }
}
