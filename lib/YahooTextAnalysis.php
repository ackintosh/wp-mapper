<?php

class YahooTextAnalysis
{
    private function __construct(){}

    public static function extract_verbs($content)
    {
        $query_array = array(
            'appid'     => MapperConfig::YAHOO_APP_ID,
            'sentence'  => $content,
            'results'   => 'ma',
            'filter'    => 10,
        );
        $query = http_build_query($query_array);
        $result_xml = @simplexml_load_file(MapperConfig::YAHOO_API_URL . '?' . $query);

        if ($result_xml === false) throw new RuntimeException();

        $verbs = array();
        foreach ($result_xml->ma_result->word_list->word as $w) { $verbs[] = $w->surface; }
        return $verbs;
    }

}

/* End of file YahooTextAnalysis.php */

