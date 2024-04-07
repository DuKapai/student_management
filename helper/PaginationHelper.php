<?php
if(!function_exists('createLink')){
    function createLink($data = []){
        // tao duong link phan trang cho tung chuc nang cua he thong
        /*
            $data la 1 mang du lieu
            [
                'c' => 'department',
                'm' => 'index',
                'page' => '{page}',
                'search' => $keyword
            ]
        */
        $linkPage = '';
        foreach($data as $key => $value){
            $linkPage .= empty($linkPage) ? "?{$key}={$value}" : "&{$key}={$value}";
        }
        return APP_ROOT_PATH . $linkPage;
        // index.php?c=department&m=index&page={page}&search=
    }
}

// tao ham phan trang
if(!function_exists('pagination')){
    function pagination($link, $totalItems, $page = 1, $limit = 2){
        // $link : duong link can phan trang lay tu ham createLink
        // $totalItems : tong so dong du lieu can phan trang
        // $page : trang hien tai nguoi dung dang xem du lieu
        // $limit : so dong du lieu can xem tren 1 trang
        // trong MySQL - SQL Server co tu khoa LIMIT start, rows
        // start : vi tri dong du lieu lay trong database (dong dau tien bat dau tu 0)
        // rows : so dong du lieu muon lay ra la bao nhieu
        // di tinh tong so trang 
        $totalPage = ceil($totalItems / $limit);
        // ceil : lam tron so trong php (lam tron so len)
        // gioi han lai $page
        if($page < 1 || $totalPage == 0){
            $page = 1;
        } elseif($page > $totalPage) {
            $page = $totalPage;
        }
        $start = $totalPage == 0 ? 0 : (($page - 1) * $limit);

        // di xay dung template phan trang bang bootstrap
        $htmlPage = '';
        $htmlPage .= '<nav>';
        $htmlPage .= '<ul class="pagination">';
        // xu ly button previous: quay ve trang truoc do
        if($page > 1){
            $htmlPage .= '<li class="page-item">';
            $htmlPage .= '<a style="color: green;" href="'.str_replace('{page}', $page-1, $link).'" class="page-link">Previous</a>';
            $htmlPage .= '</li>';
        }
        // xu ly cac trang
        for($i = 1; $i <= $totalPage; $i++){
            if($i == $page){
                //thong bao cho nguoi dung biet dang o trang nao
                $htmlPage .= '<li class="page-item active" aria-current="page">';
                $htmlPage .= '<a style="background-color: green;" class="page-link">'.$page.'</a>';
                $htmlPage .= '</li>';
            } else {
                // cac trang khac
                $htmlPage .= '<li class="page-item">';
                $htmlPage .= '<a style="color: green;" href="'.str_replace('{page}', $i, $link).'" class="page-link">'.$i.'</a>';
                $htmlPage .= '</li>';
            }
        }
        // xu ly button next: sang trang tiep theo
        if($page < $totalPage){
            $htmlPage .= '<li class="page-item">';
            $htmlPage .= '<a style="color: green;" class="page-link" href="'.str_replace('{page}', $page+1, $link).'">Next</a>';
            $htmlPage .= '</li>';
        }
        $htmlPage .= '</ul>';
        $htmlPage .= '</nav>';

        return [
            'start' => $start,
            'htmlPage' => $htmlPage
        ];
    }
}