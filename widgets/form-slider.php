<?php

/**
 * Form Slider Widgets Addon for EQ
 */

namespace EQELEMENTOR\ElementorWidgets\Widgets;

use Elementor\Widget_Base;

class form_slider extends Widget_Base
{
  public function get_name()
  {
    return 'eq-form-slider-widget';
  }

  public function get_title()
  {
    return __('EQ Form Slider');
  }

  public function get_icon()
  {
    return 'eicon-elementor';
  }

  public function get_categories()
  {
    return ['eq-elementor', 'basic'];
  }

  public function register_controls()
  {
    $this->start_controls_section(
      'content',
      [
        'label' => __('Content', 'eqelementor'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'gallery',
      [
        'label' => __('Gallery', 'eqelementor'),
        'type' => \Elementor\Controls_Manager::GALLERY,
        'show_label' => 'false',
        'default' => [],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $formgallery = $settings['gallery'];
    $current = 0;
?>

    <div class="w-full relative eq-form-slider-widget h-[286px] md:rounded-none rounded-[8px] md:h-[691px]">
      <?php foreach ($formgallery as $index => $image) :
        $current++;
      ?>
        <div class="w-full h-full eq-ciel-form-gallery-item transition-opacity duration-300 ease-in-out absolute top-0 z-0 <?php if ($current == 1) : echo 'opacity-100';
                                                                                                                            else : echo 'opacity-0';
                                                                                                                            endif; ?>">

          <img src="<?php echo esc_url($image['url']); ?>" alt="Gallery Image Item" class="w-full !h-full object-cover">
        </div>

      <?php
      endforeach; ?>

      <div class="w-full flex items-end justify-end absolute bottom-[30px] right-[30px] z-2">
        <div class="eq-cielform-slider-nav-area flex items-center justify-center border border-[#FFFFFF66] rounded-[500px] w-[136px] h-[136px] group transition-all duration-300 ease-in-out hover:bg-white bg-transparent text-white hover:text-[#123FA1] cursor-pointer right-0">

          <span class="eqform-prev-gallery-button transition-transform duration-300 ease-in-out translate-x-0 hover:-translate-x-[5px]">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.8333 9.91671L12.75 17L19.8333 24.0834" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>


          <span class="eqform-next-gallery-button transition-transform duration-300 ease-in-out translate-x-0 hover:translate-x-[5px]">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.1667 24.0833L21.25 17L14.1667 9.91663" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
        </div>
      </div>
    </div>
<?php
  }
}
