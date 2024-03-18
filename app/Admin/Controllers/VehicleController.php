<?php

namespace App\Admin\Controllers;

use App\Models\Vehicle;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use DB;

class VehicleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vehicle';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vehicle);

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
        $grid->vehicletranslations('Title')->display(function($translations){
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
        $grid->column('vehicle_type_id', __('Vehicle Type'))->display(function($type){
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
        $show = new Show(Vehicle::findOrFail($id));

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
        $show->field('vehicle_type_id', __('Vehicle Type'))->as(function($type){
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
        $show->image(__('Image'))->image();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->vehicletranslations('Translations', function ($translation) {
            $translation->locale();
            $translation->title();
            $translation->description();
            $translation->disableCreateButton();
            $translation->disableActions();
        });

        $show->maintenances('Maintenances', function ($translation) {
            $translation->locale();
            $translation->km();
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
        $vehicleTypes = \App\Models\VehicleType::where('active',true)->leftJoin('vehicle_type_translations as trans1',function($query){
            $query->on('vehicle_types.id','=','trans1.vehicleType_id');
            $query->where('trans1.locale','en');
        });
        $vehicleTypes->leftJoin('vehicle_type_translations as trans2',function($query){
            $query->on('vehicle_types.id','=','trans2.vehicleType_id');
            $query->where('trans2.locale','ar');
        });
        $vehicleTypes->select(['vehicle_types.id',DB::raw('(case when trans1.title is null then trans2.title else trans1.title end) as title')]);
        $vehicleTypes = $vehicleTypes->get()->pluck('title','id');


        $form = new Form(new Vehicle);

        $form->tab('Basic Info',function($form) use ($vehicleTypes){

            $form->switch('active', __('Active'))->default(1);
            $form->switch('featured', __('Featured'));
            $form->select('vehicle_type_id', __('Vehicle Type'))->options($vehicleTypes)->rules('required')->help('Required');
            $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :320x250');

        })->tab('Translations',function($form){

            $form->hasMany('vehicletranslations','Translations', function (Form\NestedForm $form) {
                $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
                $form->radio('dir', 'Text Direction')->options(['left' => 'Left', 'center' => 'Center', 'right' => 'Right'])->default('center');
                $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->textarea('featured_description')->rules('nullable|max:255')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->ckeditor('description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string')->attribute(['data-ckeditor' => true]);
                $form->textarea('seo_description')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string');
            });

        })->tab('Maintenances',function($form){

            $form->hasMany('maintenances','Maintenances', function (Form\NestedForm $form) {
                $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
                $form->number('km')->rules('required')->help('Required');
                $form->textarea('description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string');
            });

        });

        return $form;
    }
}
