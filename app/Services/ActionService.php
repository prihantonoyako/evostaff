<?php

namespace App\Services;

class ActionService
{

    /**
     * @param string $pageNavigation value are "index" || "create" || "show" || "update" 
     * @return array The URL navigation array
     */
    public function getUrlNavigation(string $pageNavigation): array {
        $data = [
            'urlHome' => '/',
            'urlLogout' => '/logout',
        ];

        if($pageNavigation == 'show' || $pageNavigation == 'update' || $pageNavigation == 'create') {
            $url = request()->url();
            $path = parse_url($url, PHP_URL_PATH);
            $segments = explode('/', $path);
            $segmentsCtr = count($segments);
            $segmentMainCtr = $segmentsCtr - 2;
            if($pageNavigation == 'update') {
                $segmentMainCtr--;
            }
            
            $urlMain = '';
            for($i = 1; $i <= $segmentMainCtr; $i++) {
                $urlMain = $urlMain.'/'.$segments[$i];
            }

            $data['urlMain'] = $urlMain;
            if($pageNavigation == 'show') {
                $data['urlUpdate'] = $urlMain.'/update/'.end($segments);
            } elseif ($pageNavigation == 'update') {
                $data['urlUpdate'] = $urlMain.'/update/'.end($segments);
            } elseif ($pageNavigation == "create") {
                $data['urlCreate'] = $urlMain;
            }
        }

        return $data;
    }

     /**
     * @param void
     * @return string The action string 'create' or 'update'
     */
    public function getUrlRequest(): string {
        $url = request()->url();
        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', $path);
        if(end($segments) == 'create') {
            return 'create';
        }

        return 'update';
    }
}