<?php


namespace App\PageBuilder\Addons\ContactArea;


use App\FormBuilder;
use App\Helpers\FormBuilderCustom;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Repeater;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\Helpers\RepeaterField;
use App\PageBuilder\Helpers\Traits\RepeaterHelper;
use App\PageBuilder\PageBuilderBase;

class ContactAreaStyleOne extends PageBuilderBase
{
    use RepeaterHelper;
    /**
     * preview_image
     * this method must have to implement by all widget to show a preview image at admin panel so that user know about the design which he want to use
     * @since 1.0.0
     * */
    public function preview_image()
    {
        return 'contact-area/01.png';
    }

    /**
     * widget_title
     * this method must have to implement by all widget to register widget title
     * @since 1.0.0
     * */
    public function addon_title()
    {
        return __('Contact Area: 01');
    }

    /**
     * admin_render
     * this method must have to implement by all widget to render admin panel widget content
     * @since 1.0.0
     * */
    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'title',
            'label' => __('Title'),
            'value' => $widget_saved_values['title'] ?? null,
        ]);

        $output .= Repeater::get([
            'multi_lang' => false,
            'settings' => $widget_saved_values,
            'id' => 'contact_page_contact_info_01',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'title',
                    'label' => __('Title')
                ],
                [
                    'type' => RepeaterField::TEXTAREA,
                    'name' => 'description',
                    'label' => __('Details'),
                    'info' => __('new line count as a separate text')
                ],
                [
                    'type' => RepeaterField::ICON_PICKER,
                    'name' => 'icon',
                    'label' => __('Icon')
                ]
            ]
        ]);
        $output .= Text::get([
            'name' => 'form_title',
            'label' => __('Form Title'),
            'value' => $widget_saved_values['form_title'] ?? null,
        ]);
        $output .= Select::get([
           'name' => 'custom_form_id',
           'label' => __('Custom Form'),
           'placeholder' => __('Select form'),
           'options' => FormBuilder::all()->pluck('title','id')->toArray(),
           'value' =>   $widget_saved_values['custom_form_id'] ?? []
        ]);
        $output .= Slider::get([
            'name' => 'padding_top',
            'label' => __('Padding Top'),
            'value' => $widget_saved_values['padding_top'] ?? 120,
            'max' => 500,
        ]);
        $output .= Slider::get([
            'name' => 'padding_bottom',
            'label' => __('Padding Bottom'),
            'value' => $widget_saved_values['padding_bottom'] ?? 120,
            'max' => 500,
        ]);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    /**
     * frontend_render
     * this method must have to implement by all widget to render frontend widget content
     * @since 1.0.0
     * */
    public function frontend_render(): string
    {
        $all_settings = $this->get_settings();
        $section_data = [
            'title' => SanitizeInput::esc_html($this->setting_item('title')),
            'form_title' => SanitizeInput::esc_html($this->setting_item('form_title')),
            'custom_form_id' => SanitizeInput::esc_html($this->setting_item('custom_form_id')),
            'padding_top' => SanitizeInput::esc_html($this->setting_item('padding_top')),
            'padding_bottom' => SanitizeInput::esc_html($this->setting_item('padding_bottom')),
        ];

        return $this->renderBlade('contact.contact_area_style_one', $section_data);
    }
}
