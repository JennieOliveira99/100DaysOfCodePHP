<?php

namespace app\traits;

use core\Twig;

trait View
{
    private function twig()
    {
        $twig = new Twig;

        $loadTwig = $twig->loadTwig();

        $twig->loadExtensions();

        $twig->loadFunctions();

        return $loadTwig;
    }

    public function view($data, $view)
    {
        $template = $this->twig()->load(str_replace('.', '/', $view) . '.html');

        return $template->display($data);
    }
}
