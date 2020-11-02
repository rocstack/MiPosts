<?php
    class Pages extends Controller {
        public function __construct() {}

        public function index() {

            if(isLoggedIn()) {
                redirect('posts');
            }

            $data = [
                'title' => 'MiPosts',
                'description' => 'Simple social network website.'
            ];
            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About',
                'description' => 'Share posts with other users.'
            ];
            $this->view('pages/about', $data);
        }
    }