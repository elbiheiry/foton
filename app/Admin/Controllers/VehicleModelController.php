<?php

namespace App\Admin\Controllers;

use App\Models\VehicleModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use DB;

class VehicleModelController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vehicle Model';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VehicleModel);

        $grid->column('id', __('Id'));
        $grid->column('active', __('Active'))->display(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $grid->vehiclemodeltranslations('Title')->display(function($translations){
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

        $grid->column('vehicle_id', __('Vehicle'))->display(function($vehicle){
            $vehicleTranslations = \App\Models\VehicleTranslation::where('vehicle_id',$vehicle)->get();
            if(count($vehicleTranslations) != 0){
                foreach ($vehicleTranslations as $vehicleTranslation) {
                    if($vehicleTranslation['locale'] == 'en'){
                        return $vehicleTranslation['title'];
                    }
                }
                return $vehicleTranslation['title'];
            }else{
                return 'No Vehicle Selected';
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
        $show = new Show(VehicleModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('active', __('Active'))->as(function($active){
            if($active){
                return 'Yes';
            }
            return 'No';
        });
        $show->field('vehicle_id', __('Vehicle'))->as(function($vehicle){
            $vehicleTranslations = \App\Models\VehicleTranslation::where('vehicle_id',$vehicle)->get();
            if(count($vehicleTranslations) != 0){
                foreach ($vehicleTranslations as $vehicleTranslation) {
                    if($vehicleTranslation['locale'] == 'en'){
                        return $vehicleTranslation['title'];
                    }
                }
                return $vehicleTranslation['title'];
            }else{
                return 'No Vehicle Selected';
            }
        });
        $show->image(__('Image'))->image();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->vehiclemodeltranslations('Translations', function ($translation) {
            $translation->locale();
            $translation->title();
            $translation->disableCreateButton();
            $translation->disableActions();
        });

        $show->specs('Specs', function ($translation) {
            $translation->spec()->localized(__('Spec'))->get('title');
            $translation->value_en(__('English Value'));
            $translation->value_ar(__('Arabic Value'));
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
        $vehicles = \App\Models\Vehicle::where('active',true)->leftJoin('vehicle_translations as trans1',function($query){
            $query->on('vehicles.id','=','trans1.vehicle_id');
            $query->where('trans1.locale','en');
        });
        $vehicles->leftJoin('vehicle_translations as trans2',function($query){
            $query->on('vehicles.id','=','trans2.vehicle_id');
            $query->where('trans2.locale','ar');
        });
        $vehicles->select(['vehicles.id',DB::raw('(case when trans1.title is null then trans2.title else trans1.title end) as title')]);
        $vehicles = $vehicles->get()->pluck('title','id');

        $specs = \App\Models\Spec::where('active',true)->leftJoin('spec_translations as trans1',function($query){
            $query->on('specs.id','=','trans1.spec_id');
            $query->where('trans1.locale','en');
        });
        $specs->leftJoin('spec_translations as trans2',function($query){
            $query->on('specs.id','=','trans2.spec_id');
            $query->where('trans2.locale','ar');
        });
        $specs->select(['specs.id',DB::raw('(case when trans1.title is null then trans2.title else trans1.title end) as title')]);
        $specs = $specs->get()->pluck('title','id');


        $form = new Form(new VehicleModel);

        $form->tab('Basic Info',function($form) use ($vehicles){

            $form->switch('active', __('Active'))->default(1);
            $form->select('vehicle_id', __('Vehicle'))->options($vehicles)->rules('required')->help('Required');
            $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> Width x Hight :350x250');

        })->tab('Translations',function($form){

            $form->hasMany('vehiclemodeltranslations','Translations', function (Form\NestedForm $form) {
                $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
                $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            });

        })->tab('Specs',function($form) use ($specs){

            $form->hasMany('specs','Specs', function (Form\NestedForm $form) use ($specs) {
                $form->select('spec_id', __('Spec'))->options($specs)->rules('required')->help('Required');
                $form->text('value_en', __('English Value'))->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->text('value_ar', __('Arabic Value'))->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            });

        });

        return $form;
    }
}
