<?php

namespace App\Admin\Controllers;

use App\Models\PageSetting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PageSettingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Page Settings';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PageSetting);

        $grid->column('id', __('Id'));
        $grid->column('page', __('Page'))->display(function($page){
            if($page == 'offers'){
                return 'Offers';
            }elseif ($page == 'services') {
                return 'Services';
            }elseif ($page == 'afterSale') {
                return 'After Sale';
            }elseif ($page == 'contact') {
                return 'Contact Us';
            }elseif ($page == 'aboutAmg') {
                return 'About Us AMG';
            }elseif ($page == 'aboutFoton') {
                return 'About Us Foton';
            }elseif ($page == 'aboutTvd') {
                return 'About Us TVD';
            }elseif ($page == 'news') {
                return 'News';
            }elseif ($page == 'videoGallary') {
                return 'Video Gallary';
            }elseif ($page == 'imageGallary') {
                return 'Image Gallary';
            }elseif ($page == 'events') {
                return 'Events';
            }elseif ($page == 'showrooms') {
                return 'AMG Showrooms';
            }elseif ($page == 'dealers') {
                return 'Dealers';
            }elseif ($page == 'testDrive') {
                return 'Test Drive';
            }
        });
        $grid->pagesettingtranslations('Description')->display(function($translations){
            if(count($translations) != 0){
                foreach ($translations as $translation) {
                    if($translation['locale'] == 'en'){
                        return $translation['description'];
                    }
                }
                return $translation['description'];
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
        $show = new Show(PageSetting::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('page', __('Page'))->as(function($page){
            if($page == 'offers'){
                return 'Offers';
            }elseif ($page == 'services') {
                return 'Services';
            }elseif ($page == 'afterSale') {
                return 'After Sale';
            }elseif ($page == 'contact') {
                return 'Contact Us';
            }elseif ($page == 'aboutAmg') {
                return 'About Us AMG';
            }elseif ($page == 'aboutFoton') {
                return 'About Us Foton';
            }elseif ($page == 'aboutTvd') {
                return 'About Us TVD';
            }elseif ($page == 'news') {
                return 'News';
            }elseif ($page == 'videoGallary') {
                return 'Video Gallary';
            }elseif ($page == 'imageGallary') {
                return 'Image Gallary';
            }elseif ($page == 'events') {
                return 'Events';
            }elseif ($page == 'showrooms') {
                return 'AMG Showrooms';
            }elseif ($page == 'dealers') {
                return 'Dealers';
            }elseif ($page == 'testDrive') {
                return 'Test Drive';
            }
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->pagesettingtranslations('Translations', function ($translation) {
            $translation->locale();
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
        $form = new Form(new PageSetting);


        $form->select('page', __('Page'))->options(['offers' => 'Offers', 'services' => 'Services', 'afterSale' => 'After Sale', 'contact' => 'Contact Us', 'aboutAmg' => 'About Us AMG', 'aboutFoton' => 'About Us Foton', 'aboutTvd' => 'About Us TVD', 'news' => 'News', 'videoGallary' => 'Video Gallary', 'imageGallary' => 'Image Gallary', 'events' => 'Events', 'showrooms' => 'AMG Showrooms', 'dealers' => 'Dealers', 'testDrive' => 'Test Drive'])->rules('required')->help('Required');
        $form->image('image',__('Cover'))->uniqueName()->creationRules('required|max:10240|mimes:jpg,png,jpeg')->updateRules('nullable|max:10240|mimes:jpg,png,jpeg')->help('Requried <br/><i class="fa fa-info-circle"></i> Max Size:10 M <br/><i class="fa fa-info-circle"></i> Ext: jpg, png, jpeg <br/><i class="fa fa-info-circle"></i> width x hight :1300x500');
        $form->hasMany('pagesettingtranslations','Translations', function (Form\NestedForm $form) {
            $form->select('locale')->options(['en' => 'English', 'ar' => 'Arabic'])->rules('required')->help('Required');
            $form->textarea('description')->rules('nullable')->help('Optional <br/><i class="fa fa-info-circle"></i> Must be string');
        });

        return $form;
    }
}
