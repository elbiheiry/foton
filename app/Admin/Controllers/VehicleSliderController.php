<?php

namespace App\Admin\Controllers;

use App\Models\VehicleSlider;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use DB;

class VehicleSliderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vehicle Slider';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VehicleSlider);

        $grid->column('id', __('Id'));
        $grid->vehicleslidertranslations('Title')->display(function($translations){
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
        $show = new Show(VehicleSlider::findOrFail($id));

        $show->field('id', __('Id'));
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

        $show->vehicleslidertranslations('Translations', function ($translation) {
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


        $form = new Form(new VehicleSlider);

        $form->tab('Basic Info',function($form) use ($vehicles){

            $form->select('vehicle_id', __('Vehicle'))->options($vehicles)->rules('required')->help('Required');
            $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :1300x500');

        })->tab('Translations',function($form){

            $form->hasMany('vehicleslidertranslations','Translations', function (Form\NestedForm $form) {
                $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
                $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->textarea('description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string');
            });

        });
        return $form;
    }
}
