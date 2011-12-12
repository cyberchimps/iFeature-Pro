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
}
