<?php

function a($name, $parameters = null, $title = null, $attributes = array(), $icon = null) {
	
}

function sortLink($model, $field, $title) {	
	$parameters = array(
		'sort'		=> $field, 
		'direction' => Input::get('direction') === 'asc' ? 'desc' : 'asc',
	);
	
	if (method_exists($model, 'getCurrentPage')) {
		$parameters['page'] = $model->getCurrentPage();
	}
	
	$route = route(Route::getCurrentRoute()->getName(), $parameters);
	
	$icon = '';
	
	if (Input::get('sort') === $field) {
		switch (Input::get('direction')) {
			case 'asc':
				$icon = 'glyphicon glyphicon-sort-by-alphabet';
				break;
			case 'desc':
				$icon = 'glyphicon glyphicon-sort-by-alphabet-alt';
				break;
		}
	}
	
	$link = '<a href="' . $route . '">' .
			$title . 
			($icon ? ' <span class="' . $icon . '"></span>' : '') .
			'</a>';
	
	return $link;
}

function activeLabel($value) {
	return '<span class="label label-' . ($value ? 'success">Yes' : 'danger">No' ) . '</span>';
}

function implodeIn($pre, $post, $array, $separator = '') {
	return $pre . implode($post . $separator . $pre, (array) $array) . $post;
}