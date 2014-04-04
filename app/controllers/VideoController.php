<?php

class VideoController extends BaseController {

	public function details($type, $slug) {
		$video = Video::findBySlug($slug);
		echo '<p>Name : ' . $video->name . '</p>';
		exit;
	}

}