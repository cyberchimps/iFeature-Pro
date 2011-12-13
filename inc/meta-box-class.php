<?php

class CyberChimps_Metabox {
	function __construct($id, $title, $options) {
		$this->id = $id;
		$this->title = $title;
		$this->options = $options;

		$this->fields = array();
	}

	function tab($title) {
		$this->add(array('title' => $title, 'type' => 'tab'));
		return $this;
	}

	function add($options) {
		$this->fields[] = $options;
	}

	function end() {
		$tabs = array();
		foreach($this->fields as $field) {
			if($field['type'] === 'tab') {
				$tabs[] = array('title' => $field['title'], 'fields' => array());
			} else {
				$tabs[count($tabs) - 1]['fields'][] = $field;
			}
		}

		$final = array (
			'id' => $this->id,
			'title' => $this->title,
			'pages' => $this->options['pages'],
			'tabs' => $tabs
		);

		new RW_Meta_Box_Taxonomy($final);
	}

	/**
	 * Helper Functions
	 */
	function image($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'image', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function text($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'text', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function checkbox($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'checkbox', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function sliderhelp($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'sliderhelp', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function reorder($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'reorder', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function select($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'select', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function section_order($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'section_order', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function pagehelp($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'pagehelp', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function textarea($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'textarea', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function color($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'color', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}

	function image_select($id, $name, $desc, $options = array()) {
		$this->add($options + array('type' => 'image_select', 'id' => $id, 'name' => $name, 'desc' => $desc));
		return $this;
	}
}
