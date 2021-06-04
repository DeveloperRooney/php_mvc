<?php

class APP__ArticleController {
    private APP__ArticleService $articleService;

    public function __construct() {
        global $App__articleService;
        $this->articleService = $App__articleService;
    }

    
}