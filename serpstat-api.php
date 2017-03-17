<?php
/**
* Main SerpStat API
*/
class SerpStat
{
    private $token;
    public $opt;
    public $option = [
        'url'       => 'http://api.serpstat.com/',
        'version'   => 'v3',
        'se'        => 'g_us',
        /*
        Поисковые системы, параметр $se
            g_ua  - Google Украина
            g_ru  - Google Россия
            g_by  - Google Беларусь
            g_bg  - Google Болгария
            g_lv  - Google Латвия
            g_lt  - Google Литва
            g_us  - Google США
            g_uk  - Google Великобритания
            g_ca  - Google Канада
            g_au  - Google Австралия
            g_za  - Google Южная Африка
            g_kz  - Google Казахстан
            y_187 - Yandex Украина
            y_213 - Yandex Москва
            y_2   - Yandex Санкт-Петербург
        */

        'sort'      => '', // поле по которому нужно выполнить сортировку
        'order'     => '', // asc - по возрастанию, desc -  по убыванию
        'page_size' => 100, // количество результатов на страницу (по умолчанию 100, максимум 1000)
        'page'      => 1, // номер страницы (по умолчанию 1-я страница)
    ];

    function __construct($getToken, $getOption = array())
    {
        $this->token = $getToken;
        $this->opt = array_merge($this->option, $getOption);
        $this->url = $this->opt['url'].$this->opt['version'].'/';
    }

    private function toASCII($value = '')
    {
        return urlencode($value);
    }

    private function getSE($se = '')
    {
        if (empty($se)) return $se = $this->opt['se'];
        else return $se;
    }

    public function domain_info($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$query.'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function domain_history($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$query.'&se='.$se.'&token='.$this->token.'&sort=date&order=desc';
        return json_decode(file_get_contents($url));
    }
    public function domain_keywords($query = '', $se = '', $filtr = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$query.'&se='.$se.'&token='.$this->token.'&'.$filtr;
        return json_decode(file_get_contents($url));
    }
    public function domain_urls($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$query.'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function domains_intersection($query = '', $se = '')
    {
        //return false; // Надо разобраться с ошибкой
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$query.'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function domains_uniq_keywords($query = '', $minus_domain='', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$query.'&minus_domain='.$minus_domain.'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }

    public function url_keywords($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function url_competitors($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function url_missing_keywords($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }

    public function keywords($query = '', $se = '', $filtr = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token.'&'.$filtr;
        return json_decode(file_get_contents($url));
    }
    public function keyword_info($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function ad_keywords($query = '', $se = '', $filtr = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token.'&'.$filtr;
        return json_decode(file_get_contents($url));
    }

    public function suggestions($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function related_keywords($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function keyword_top($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function competitors($query = '', $se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?query='.$this->toASCII($query).'&se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
    public function stats($se = '')
    {
        $se = $this->getSE($se);
        $url = $this->url.__FUNCTION__.'?se='.$se.'&token='.$this->token;
        return json_decode(file_get_contents($url));
    }
}
?>