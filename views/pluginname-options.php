<?php

if(!class_exists('PUGINNAME_options_config')) {
	class PLUGINNAME_options_config extends PLUGINNAME_options {

		public $setup, $sections, $settings, $subpages;

		public function __construct() {
			$this->do_setup();
			$this->create_sections();
			$this->create_settings();

			add_action('show_section_secondary', array($this, 'secondary_display'), 10, 2);
			add_action('enqueue_scripts_'.PN_PLUGIN_SLUG, array($this, 'enqueue_scripts'));

			add_action('init', array($this, 'initialize'));

		}

		public function enqueue_scripts() {

		}

		private function do_setup() {
			$this->setup = array(
				 'project_name' => PN_PLUGIN_NAME,
				 'project_slug' => PN_PLUGIN_SLUG,
				 'menu'         => null,
				 'page_title'   => sprintf(__('%s Settings', 'sb'), PN_PLUGIN_NAME),
				 'menu_title'   => PN_PLUGIN_NAME,
				 'capability'   => 'manage_options',
				 'option_group' => 'PLUGINNAME_options',
				 'slug'         => PN_PLUGIN_SLUG.'-settings',
				 'page_icon'	=> 'tools'
			);
		}

		private function create_sections() {

			$this->subpages["first-page"] = array(
													'menu'          => 'plugin-name-settings',
													'page_title'	=> 'First Page Settings',
													'menu_title'	=> 'First Page',
													'capability'	=> 'manage_options',
												);

			$this->subpages["second-page"] = array(
												'menu'          => 'plugin-name-settings',
												'page_title'	=> 'Second Page Settings',
												'menu_title'	=> 'Second Page',
												'capability'	=> 'manage_options'
											);

			$this->sections['plugin-name-settings']['main'] = __('General Settings');
			$this->sections['plugin-name-settings']['reset'] = __('Reset to Defaults');
			$this->sections['first-page']['additional'] = __('Additional Settings');
			$this->sections['second-page']['secondary'] = __('Second Page Tab');

			//$this->sections['general'] = __('General Settings');
			//$this->sections['additional'] = __('Additional Settings');

		}

		private function create_settings() {

			$this->settings['text_field_one'] = array(
					'title'   => __('Text field one'),
					'desc'    => __('Text field description.'),
					'std'     => 'Text field default',
					'type'    => 'text',
					'section' => 'additional'
			);

			$this->settings['password_two'] = array(
				'title'   => __('Password'),
				'desc'    => __('Please create a password.'),
				'type'    => 'password',
				'section' => 'additional'
			);

			$this->settings['text_area_one'] = array(
					'title'   => __('Text area'),
					'desc'    => __('Text field description.'),
					'std'     => 'Text field default',
					'type'    => 'textarea',
					'section' => 'additional'
			);

			$this->settings['phone_number'] = array(
					'title'   => __('Phone number'),
					'desc'    => __('Phone number description.'),
					'std'     => '',
					'type'    => 'text',
					'format'  => 'phone',
					'section' => 'additional'
			);

			$this->settings['heading_one'] = array(
					'title'   => __('Heading title'),
					'desc'    => __('Header description'),
					'type'    => 'heading',
					'section' => 'additional'
			);

			$this->settings['checkbox_one'] = array(
					'title'   => __('Checkbox'),
					'desc'    => __('Checkbox description'),
					'std'     => 0,
					'type'    => 'checkbox',
					'section' => 'additional'
			);

			$this->settings['radio_one'] = array(
					'title'   => __('Radio'),
					'desc'    => __('Radio description'),
					'std'     => 'three',
					'type'    => 'radio',
					'section' => 'additional',
					'choices' => array(
								'one'	=> 'One',
								'two'	=> 'Two',
								'three' => 'Three'
							 )
			);

			$this->settings['number_one'] = array(
					'title'   => __('Number field'),
					'desc'    => __('Number field description'),
					'std'     => 5,
					'type'    => 'number',
					'section' => 'additional',
					'min'	  => 3
			);

			$this->settings['select_one'] = array(
					'title'   => __('Select'),
					'desc'    => __('Select description'),
					'std'     => 'two',
					'type'    => 'select',
					'section' => 'additional',
					'choices' => array(
								'one'	    => 'One',
								'two'	    => 'Two',
								'three'     => 'Three',
								'four'      => 'Four',
								'five'      => 'Five',
								'six'       => 'Six',
								'seven'     => 'Seven',
								'eight'     => 'Eight',
								'nine'      => 'Nine',
								'ten'       => 'Ten',
								'eleven'    => 'Eleven',
								'twelve'    => 'Twelve',
					            'apple'     => 'Apple'
							 )
			);

			$this->settings['select_two'] = array(
				'title'   => __('Multi Select'),
				'desc'    => __('Select description'),
				'std'     => 'two',
				'type'    => 'multi_select',
				'section' => 'additional',
				'choices' => array(
					'one'	    => 'One',
					'two'	    => 'Two',
					'three'     => 'Three',
					'four'      => 'Four',
					'five'      => 'Five',
					'six'       => 'Six',
					'seven'     => 'Seven',
					'eight'     => 'Eight',
					'nine'      => 'Nine',
					'ten'       => 'Ten',
					'eleven'    => 'Eleven',
					'twelve'    => 'Twelve',
					'apple'     => 'Apple'
				)
			);

			$this->settings['password_one'] = array(
					'title'   => __('Password'),
					'desc'    => __('Please enter a password'),
					'type'    => 'password'
			);

			$this->settings['code_editor'] = array(
					'title'   => __('Code editor'),
					'desc'    => __('Code editor description'),
					'type'    => 'code',
					'section' => 'additional',
					'theme'	  => 'dark'
			);

			$this->settings['font_picker'] = array(
					'title'   	=> __('Font picker'),
					'desc'    	=> __('Pick a font'),
					'type'		=> 'subfields',
					'section'	=> 'additional',
					'subfields'	=> array(
									'size'	=> array(
										'type'	=> 'font_size',
										'std'	=> 24,
										'min'	=> 16,
										'max'	=> 72
									),
									'font'	=> array(
										'type'	=> 'font_face',
										'std'	=> 'Lato'
									),
									'font_weight'	=> array(
										'type'	=> 'font_weight',
										'std'	=> '500'
									),
									'font_style'	=> array(
										'type'	=> 'font_style',
										'std'	=> 'normal'
									),
									'color'	=> array(
										'type'	=> 'color',
										'std'	=> '#000000'
									)
					)
			);

			$this->settings['location'] = array(
					'title'   	=> __('Location'),
					'desc'    	=> __('Where do you live'),
					'type'		=> 'subfields',
					'section'	=> 'additional',
					'subfields'	=> array(
									'city'	=> array(
										'type'	=> 'text',
										'std' 	=> 'Address'
									),
									'state'	=> array(
										'type'	=> 'state',
										'country' => 'US',
										'std'	=> 'CA'
									),
									'country'	=> array(
										'type'	=> 'country',
										'std'	=> 'US'
									),
									'zip'	=> array(
										'type'	=> 'text',
										'format'=> 'zip',
										'std' 	=> 'ZIP Code'
									)
					)
			);

			$this->settings['slider'] = array(
					'title'   => __('Slider'),
					'desc'    => __('Select a number with a slider'),
					'std'	  => 20,
					'type'    => 'slider',
					'min'	  => 0,
					'max'     => 70,
					'section' => 'additional',
			);

			$this->settings['datetime'] = array(
					'title'   	=> __('Day'),
					'desc'    	=> __('Pick a day and time'),
					'type'		=> 'subfields',
					'section'	=> 'additional',
					'subfields'	=> array(
									'date'	=> array(
										'type'	=> 'date',
										'std' 	=> 'today',
										'format'=> 'm/d/y'
									),
									'time'	=> array(
										'type'	=> 'time'
									)
					)
			);

			$this->settings['file'] = array(
					'title'   => __('File'),
					'desc'    => __('Upload a file'),
					'type'    => 'file',
					'width'   => 250,
					'height'  => 150,
					'section' => 'additional'
			);

			$this->settings['reset_options'] = array(
					'title'   => __('Reset'),
					'desc'    => __('Check this box and click "Save Changes" below to reset all options to their defaults.'),
					'std'     => 0,
					'type'    => 'reset',
					'section' => 'reset'
			);

		}



		public function secondary_display($slug, $settings) {
			echo "This page overrides the default output for <b>" . $slug . "</b> and allows the user to create their own output code.";
		}

		public function initialize() {
			parent::__construct($this->setup, $this->settings, $this->sections, $this->subpages);
		}

	}
}
if(class_exists('PLUGINNAME_options_config')) {
	$PLUGINNAME_options = new PLUGINNAME_options_config();
}
