<?php

namespace App\Admin\Controllers;

use App\Models\VehicleType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VehicleTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vehicle Type';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VehicleType);

        $grid->column('id', __('Id'));
        $grid->column('active', __('Active'))->display(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $grid->vehicletypetranslations('Title')->display(function($translations){
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
        $show = new Show(VehicleType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('active', __('Active'))->as(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->vehicletypetranslations('Translations', function ($translation) {
            $translation->locale();
            $translation->title();
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
        $form = new Form(new VehicleType);

        $form->switch('active', __('Active'))->default(1);
        $form->hasMany('vehicletypetranslations','Translations', function (Form\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
        });

        return $form;
    }
}
