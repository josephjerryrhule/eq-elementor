<?php

/**
 * Slider Widget Addon for EQ
 * 
 * @package eqelementor
 */

namespace EQELEMENTOR\ElementorWidgets\Widgets;

use Elementor\Widget_Base;

class slider extends Widget_Base
{

  public function get_name()
  {
    return 'eq-slider-widget';
  }

  public function get_title()
  {
    return __('EQ Slider');
  }

  public function get_icon()
  {
    return 'eicon-elementor';
  }

  public function get_categories()
  {
    return ['eq-elementor', 'basic'];
  }

  /*  public function get_style_depends(){
    wp_register_style('eq-elementor-style', plugins_url('scss/eq-style.css', __FILE__));

    return ['eq-elementor-style'];
  } */

  public function get_script_depends()
  {
    wp_register_script('eq-elementor-script', plugins_url('js/eq-script.js', __FILE__));
    wp_register_script('eq-tailwind', 'https://cdn.tailwindcss.com');

    return ['eq-elementor-script', 'eq-tailwind'];
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
      'title',
      [
        'label' => __('Title', 'eqelementor'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => __('Add Title Here', 'eqlementor'),
        'default' => __('Add Title Here', 'eqlementor'),
      ]
    );

    $this->add_control(
      'subtitle',
      [
        'label' => __('Subtitle', 'eqelementor'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => __('Add Subtitle Here', 'eqlementor'),
        'default' => __('Add Subtitle Here', 'eqlementor'),
      ]
    );

    $this->add_control(
      'description',
      [
        'label' => __('Description', 'eqelementor'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => __('Add Description Here', 'eqlementor'),
        'default' => __('Add Description Here', 'eqlementor'),
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
    $title = $settings['title'];
    $subtitle = $settings['subtitle'];
    $description = $settings['description'];
    $gallery = $settings['gallery'];
?>
    <script>
      tailwind.config = {
        theme: {
          //Screen sizes
          screens: {
            xs: '300px',
            ss: '620px',
            sm: '768px',
            md: '1024px',
            lg: '1440px',
            xl: '1650px',
            xxl: '1920px',
          },
        }
      }
    </script>
    <div class="w-full min-h-screen relative">
      <div class="w-full h-full">
        <div class="w-full h-full bg-[#00000066] absolute top-0 z-[1] p-[205px_20px_39px] md:p-[309px_20px_66px_40px] flex flex-col justify-end">

          <div class="w-full text-white relative overflow-x-clip font-bold before:content-[''] before:w-[8%] before:absolute before:h-[1px] before:left-0 before:top-[86px] before:bg-[#FFFFFF66] after:content-[''] after:w-[60%] after:absolute after:top-[86px] after:h-[1px] after:bg-[#FFFFFF66] after:right-[100px]" id="eq-ciel-title-area">
            <div class="eq-ciel-title-area-texts pl-[160px]">
              <h1 class="text-[114px] leading-[153.9px] -tracking-[0.3px]">
                <?php echo __($title, 'eqelementor'); ?>
              </h1>
              <h2 class="text-[80px] leading-[108px] font-extralight -tracking-[0.3px]">
                <?php echo __($subtitle, 'eqelementor'); ?>
              </h2>
            </div>

            <div class="eq-ciel-slider-nav-area flex items-center justify-center border border-[#FFFFFF66] rounded-[500px] w-[136px] h-[136px] group transition-all duration-300 ease-in-out hover:bg-white bg-transparent text-white hover:text-[#123FA1] cursor-pointer absolute top-[18px] right-0">

              <span class="eq-prev-nav transition-transform duration-300 ease-in-out translate-x-0 hover:-translate-x-[5px]">
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.8333 9.91671L12.75 17L19.8333 24.0834" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>


              <span class="eq-next-nav transition-transform duration-300 ease-in-out translate-x-0 hover:translate-x-[5px]">
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.1667 24.0833L21.25 17L14.1667 9.91663" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
            </div>
          </div>

          <div class="w-full description-area md:pt-[234px] md:pl-[417px] md:pr-5" id="eq-ciel-description-area">
            <div class="max-w-full md:max-w-[410px] text-white text-base font-medium leading-[21.6px] pb-[79px]">
              <p>
                <?php echo __($description, 'eqelementor'); ?>
              </p>
            </div>

            <div class="w-full hidden md:flex items-center justify-end gap-[13px]">

              <a href="#facebook">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="20" cy="20" r="20" fill="white" fill-opacity="0.2" />
                  <path d="M21.1325 27.23V20.2942H23.4723L23.8201 17.5786H21.1325V15.8489C21.1325 15.0652 21.3508 14.5287 22.4755 14.5287H23.9005V12.1076C23.2072 12.0333 22.5102 11.9974 21.8129 12.0001C19.7446 12.0001 18.3246 13.2627 18.3246 15.5806V17.5735H16V20.2891H18.3297V27.23H21.1325Z" fill="white" />
                </svg>
              </a>

              <a href="#instagram">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="20" cy="20" r="20" fill="white" fill-opacity="0.2" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.961 16.53H21.441V18.2634C21.9423 17.2664 23.2278 16.3707 25.159 16.3707C28.8611 16.3707 29.74 18.3552 29.74 21.9964V28.74H25.992V22.8257C25.992 20.7521 25.4907 19.5827 24.2145 19.5827C22.4445 19.5827 21.709 20.843 21.709 22.8247V28.74H17.961V16.53ZM11.5341 28.5807H15.2821V16.3707H11.5341V28.5807ZM15.819 12.3894C15.8191 12.7035 15.7568 13.0145 15.6357 13.3044C15.5146 13.5943 15.337 13.8572 15.1134 14.0778C14.6603 14.5282 14.0469 14.7802 13.4081 14.7787C12.7704 14.7783 12.1584 14.5268 11.7046 14.0788C11.4818 13.8574 11.3049 13.5942 11.184 13.3043C11.0631 13.0144 11.0005 12.7035 11 12.3894C11 11.755 11.253 11.1478 11.7056 10.6999C12.159 10.2513 12.7712 9.99972 13.409 10C14.0481 10 14.6609 10.2521 15.1134 10.6999C15.5651 11.1478 15.819 11.755 15.819 12.3894Z" fill="white" />
                </svg>
              </a>
            </div>
          </div>

        </div>
        <?php foreach ($gallery as $index => $image) :
        ?>
          <div class="w-full h-full absolute top-0 z-0 eq-ciel-gallery-item transition-opacity duration-300 ease-in-out <?php if ($index == 0) : echo 'opacity-100';
                                                                                                                        else : echo 'opacity-0';
                                                                                                                        endif; ?>">
            <img src="<?php echo esc_url($image['url']); ?>" alt="Gallery Image Item" class="w-full !h-full object-cover">
          </div>
        <?php
        endforeach; ?>
      </div>
    </div>
<?php
  }
}