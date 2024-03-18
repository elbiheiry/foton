<?php

namespace App\Admin\Controllers;

use App\Models\SparePart;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use DB;

class SparePartController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Spare Part';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SparePart);

        $grid->column('id', __('Id'));
        $grid->column('active', __('Active'))->display(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $grid->spareparttranslations('Title')->display(function($translations){
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
        $grid->column('vehicleType_id', __('Vehicle Type'))->display(function($type){
            $typeTranslations = \App\Models\VehicleTypeTranslation::where('vehicleType_id',$type)->get();
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
        $grid->column('price', __('Price'));
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
        $show = new Show(SparePart::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('active', __('Active'))->as(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $show->field('vehicleType_id', __('Vehicle Type'))->as(function($type){
            $typeTranslations = \App\Models\VehicleTypeTranslation::where('vehicleType_id',$type)->get();
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
        $show->field('price', __('Price'));
        $show->image(__('Image'))->image();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->spareparttranslations('Translations', function ($translation) {
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
        $data = \App\Models\VehicleType::where('active',true)->leftJoin('vehicle_type_translations as trans1',function($query){
            $query->on('vehicle_types.id','=','trans1.vehicleType_id');
            $query->where('trans1.locale','en');
        });
        $data->leftJoin('vehicle_type_translations as trans2',function($query){
            $query->on('vehicle_types.id','=','trans2.vehicleType_id');
            $query->where('trans2.locale','ar');
        });
        $data->select(['vehicle_types.id',DB::raw('(case when trans1.title is null then trans2.title else trans1.title end) as title')]);
        $data = $data->get()->pluck('title','id');

        $form = new Form(new SparePart);

        $form->switch('active', __('Active'))->default(1);
        $form->select('vehicleType_id', __('Vehicle Type'))->options($data)->rules('required')->help('Required');
        $form->number('price', __('Price'))->rules('required')->help('Required');
        $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> Width x Hight :300x165');
        $form->hasMany('spareparttranslations','Translations', function (Form\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
        });

        return $form;
    }
}
