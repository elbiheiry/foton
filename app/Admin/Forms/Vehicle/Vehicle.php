<?php

namespace App\Admin\Forms\Vehicle;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use DB;
use Encore\Admin\Form as Layout;

class Vehicle extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'Vehicle';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $vehicleTypes = \App\Models\VehicleType::leftJoin('vehicle_type_translations as trans1',function($query){
            $query->on('vehicle_types.id','=','trans1.vehicleType_id');
            $query->where('trans1.locale','en');
        });
        $vehicleTypes->leftJoin('vehicle_type_translations as trans2',function($query){
            $query->on('vehicle_types.id','=','trans2.vehicleType_id');
            $query->where('trans2.locale','ar');
        });
        $vehicleTypes->select(['vehicle_types.id',DB::raw('(case when trans1.title is null then trans2.title else trans1.title end) as title')]);
        $vehicleTypes = $vehicleTypes->get()->pluck('title','id');

        $this->switch('active', __('Active'))->default(1);
        $this->switch('featured', __('Featured'));
        $this->select('vehicle_type_id', __('Vehicle Type'))->options($vehicleTypes)->rules('required')->help('Required');
        $this->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg');

        $this->hasMany('vehiclesliders','Translations', function (Layout\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->text('title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->textarea('description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string');
        });

        $this->hasMany('maintenances','Maintenances', function (Layout\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->number('km')->rules('required')->help('Required');
            $form->textarea('description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string');
        });
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'name'       => 'John Doe',
            'email'      => 'John.Doe@gmail.com',
            'created_at' => now(),
        ];
    }
}
