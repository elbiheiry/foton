<?php

namespace App\Admin\Controllers;

use App\Models\Setting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SettingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Settings';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Setting);

        $grid->column('id', __('Id'));
        // $grid->column('logo', __('Logo'));
        // $grid->column('lat', __('Lat'));
        // $grid->column('lng', __('Lng'));
        // $grid->column('footer_image', __('Footer image'));
        // $grid->column('footer_link', __('Footer link'));
        // $grid->column('footer_title', __('Footer title'));
        // $grid->column('deleted_at', __('Deleted at'));

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
        $show = new Show(Setting::findOrFail($id));

        $show->field('id', __('Id'));
        // $show->field('logo', __('Logo'));
        // $show->field('lat', __('Lat'));
        // $show->field('lng', __('Lng'));
        // $show->field('footer_image', __('Footer image'));
        // $show->field('footer_link', __('Footer link'));
        // $show->field('footer_title', __('Footer title'));
        // $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form($type = 'create',$settingsId = '')
    {
        // dd($type);
        $form = new Form(new Setting);

        $form->tab('Basic Info',function($form){

            $form->switch('spare_parts_flag', __('Spare Parts Activation'))->default(1);
            $form->switch('maintain_flag', __('Maintenance schedule Activation'))->default(1);
            $form->switch('services_flag', __('Services center Activation'))->default(1);
            $form->image('foton_logo',__('Foton Logo'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :150x30');
            $form->image('amg_logo',__('AMG footer Logo'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :110x65');
            $form->image('footer_image',__('Foton Footer Logo'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :110x65');
            $form->image('services_main_img',__('Services Main Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :540x300');
            $form->image('contact_img',__('Contact Page Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :500x300');
            $form->file('e_brochure',__('e-brochure'))->uniqueName()->creationRules('nullable|max:51200|mimes:doc,docx,pdf')->updateRules('nullable|max:51200|mimes:doc,docx,pdf')->help('Optional <br/><i class="fa fa-info-circle"></i> Max Size:50 M <br/><i class="fa fa-info-circle"></i> Ext: doc, docx, pdf');
            // $form->url('footer_link', __('Footer Link'))->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be URL');
            // $form->text('footer_title', __('Footer Title'))->rules('nullable|max:255')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->textarea('map')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be embeded code ');

        })->tab('Translations',function($form){

            $form->hasMany('settingtranslations','Translations', function (Form\NestedForm $form) {
                $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
                $form->text('address')->rules('nullable|max:255')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->text('currency')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->textarea('seo_description')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->textarea('services_main_desc', 'Services Main Description')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> Must be string');
            });

        })->tab('Receive email',function($form){

            $form->email('contact_mail', __('Contact Email'))->rules('nullable|email|max:191')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 191 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->email('career_mail', __('Career Email'))->rules('nullable|email|max:191')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 191 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->email('drive_mail', __('Test Drive Email'))->rules('nullable|email|max:191')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 191 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            $form->email('contact_drive_to_email', __('Contact Form Drive to Email'))->rules('nullable|email|max:191')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 191 characters <br/><i class="fa fa-info-circle"></i> Must be string');

        })->tab('Social Media',function($form){

            $form->hasMany('socialmedia','Social Media', function (Form\NestedForm $form) {
                $form->icon('icon')->rules('required')->help('Required <br/><i class="fa fa-info-circle"></i> For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>');
                $form->url('link')->rules('required|max:255')->help('required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be URL');
                $form->text('title')->rules('nullable|max:255')->help('Optional <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
            });

        })->tab('Contacts',function($form){

            $form->hasMany('contacts','Contacts', function (Form\NestedForm $form) {
                $form->select('field')->options(['phone' => 'Phone', 'callCenter' => 'Call Center',])->rules('required')->help('Required');
                $form->mobile('phone')->rules('required')->help('Required')->options(['mask' => '']);
            });

        })->tab('Home HighLights',function($form){

            $form->hasMany('homehighlights','Home HighLights', function (Form\NestedForm $form) {
                $form->select('order')->options(['1' => '1st', '2' => '2nd', '3' => '3rd', '4' => '4th', '5' => '5th'])->rules('required')->help('Required');
                $form->image('image',__('Image'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/> <i class="fa fa-info-circle"></i> (Big Image)  width x hight :  675x400  <br/> <i class="fa fa-info-circle"></i> (Small Image) width x hight : 450x225');
                $form->text('en_title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->text('en_description')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->text('ar_title')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->text('ar_description')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be string');
                $form->url('link')->rules('required|max:255')->help('required <br/><i class="fa fa-info-circle"></i> Max of 255 characters <br/><i class="fa fa-info-circle"></i> Must be URL');
            });

        })->tab('Home Sections Description',function($form){

            $form->hasMany('homesectiondescriptions','Home Sections Description', function (Form\NestedForm $form) {
                $form->select('section')->options(['products' => 'products', 'offers' => 'offers', 'highlights' => 'highlights', 'news' => 'news', 'events' => 'events'])->rules('required')->help('Required');
                $form->text('en_description')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters');
                $form->text('ar_description')->rules('required|max:255')->help('Required <br/><i class="fa fa-info-circle"></i> Max of 255 characters');
            });

        });

        $form->tools(function (Form\Tools $tools) {

            // Disable `List` btn.
            $tools->disableList();

            // Disable `Delete` btn.
            $tools->disableDelete();

            // Disable `Veiw` btn.
            $tools->disableView();
        });

        $form->footer(function ($footer) {
            // disable reset btn
            $footer->disableReset();

            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();

        });

        if($type == 'create'){
            $form->setAction('/admin/settings/store');
        }else {
            $form->setAction('/admin/settings/update/'.$settingsId);
        }

        $form->saved(function (Form $form) {
            admin_success('Saved successfully.');
            return back();
        });

        return $form;
    }
}
