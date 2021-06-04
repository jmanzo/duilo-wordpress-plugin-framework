<?php
/**
 * @package DuiloFramework
 */

namespace Inc\Api;

use \Inc\Controller;

class AdminCallbacks extends Controller
{
	protected $field_id;

	protected $field_value;

	protected $field_class;

	protected $field_placeholder;

	protected $menu_slug;

    public function adminSection()
	{
		echo 'Check this beautiful section!';
	}

	/**
     * Set data fields on every class instance to modular and optimization
     * @return avoid
     */
	public function setDataFields( array $args )
	{
		$this->menu_slug = $this->plugin_slug;
		$this->field_id = $args['label_for'];
		$this->field_value = isset( get_option( $this->menu_slug )[$this->field_id] ) ? get_option( $this->menu_slug )[$this->field_id] : '';
		$this->field_class = isset( $args['class'] ) ? $args['class'] : '';
		$this->field_placeholder = ( isset( $args['placeholder'] ) ? 'placeholder="' . $args['placeholder'] . '"' : '' );
	}

	/**
     * Toggle Field for admin form UI
     * @return string Toggle styled field
     */
	public function uiToggleField( array $args )
	{
		$this->setDataFields( $args );

		$checked = ( $this->field_value !== '' ) ? 'checked' : '';
		
		echo '<div class="'. $this->field_class .'"><input type="checkbox" id="' . $this->field_id . '" name="' . $this->menu_slug . '[' . $this->field_id . ']' . '" value="1" ' . $checked . ' /><label for="'. $this->field_id .'"><div></div></label></div>';
	}

	/**
     * Checkbox field for admin form UI
     * @return string Checkbox styled field
     */
	public function checkboxField( array $args )
	{
		$this->setDataFields( $args );

		$checked = ( $this->field_value !== '' ) ? 'checked' : '';
		
		echo '<input type="checkbox" id="' . $this->field_id . '" name="' . $this->menu_slug . '[' . $this->field_id . ']' . '" value="1" class="' . $this->field_class . '" ' . $checked . ' />';
	}

	/**
     * Radio field for admin form UI
     * @return string Radio styled field
     */
	public function radioField( array $args )
	{
		$this->setDataFields( $args );

		if ( ! empty( $args['options'] ) ) {
			echo '<div class="' . $this->field_class . '">';

			foreach( $args['options'] as $key => $value ) {
				$checked = ( $this->field_value == $key ) ? 'checked' : '';
				
				echo $value . ' ';
				echo '<input type="radio" name="' . $this->menu_slug . '[' . $this->field_id . ']' . '" value="' . $key . '" ' . $checked . ' /> ';
				
			}

			echo '</div>';
		}
		
	}

	/**
     * Text field for admin form UI
     * @return string Text styled field
     */
	public function textField( array $args )
	{
		$this->setDataFields( $args );

		echo '<input type="text" id="' . $this->field_id . '" class="' . $this->field_class . '" name="' . $this->menu_slug . '[' . $this->field_id . ']' . '" value="' . $this->field_value . '" ' . $this->field_placeholder . ' />';
	}

	/**
     * Textarea field for admin form UI
     * @return string Textarea styled field
     */
	public function textareaField( array $args )
	{
		$this->setDataFields( $args );

		echo '<textarea id="' . $this->field_id . '" name="' . $this->menu_slug . '[' . $this->field_id . ']' . '" rows="4" ' . $this->field_placeholder . '>' . $this->field_value . '</textarea>';
	}

	/**
     * Dropdown field for admin form UI
     * @return string Dropdown styled field
     */
	public function dropdownField( array $args )
	{
		$this->setDataFields( $args );

		echo '<select name="' . $this->menu_slug . '[' . $this->field_id . ']' . '" id="' . $this->field_id . '" class="' . $this->field_class . '">';

			echo '<option value="">Select an option</option>';

			if ( ! empty( $args['options'] ) ) {
				foreach( $args['options'] as $key => $value ) {
					$selected = ( $this->field_value === $key ) ? ' selected="selected"' : '';
					echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
				}
			}

		echo '</select>';
	}
}