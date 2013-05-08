<?php

class Mapper
{
    public $textAnalysis = 'YahooTextAnalysis';

    /**
     * Convert content to ZENRA
     * @param   string $content
     * @return  string $content
     */
    public function strip($content)
    {
        try {
            $verbs = call_user_func(array($this->textAnalysis, 'extract_verbs'), $content);
        } catch (RuntimeException $e) {
            return $content;
        }

        if (empty($verbs)) return $content;
        $replace = self::replacement($verbs);
        return str_replace($verbs, $replace, $content);
    }

    private static function replacement($verbs)
    {
        $zenra = MapperConfig::ZENRA_TEXT;
        return array_map(function ($v) use ($zenra) { return $zenra . $v; }, $verbs);
    }
}

/* End of file Mapper.php */

