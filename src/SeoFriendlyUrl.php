<?php

namespace omegachien\SeoFriendlyUrl;

class SeoFriendlyUrl
{
    public static function generate($input, $replace = '-', $remove_words = true, $words_array = array())
    {
        if (empty($words_array)) {
            $words_array = array('a', 'and', 'the', 'an', 'it', 'is', 'with', 'can', 'of', 'why', 'not');
        }

        $return = trim(preg_replace('/ +/', ' ', preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($input))));

        if ($remove_words) {
            $return = static::removeWords($return, $replace, $words_array);
        }

        return str_replace(' ', $replace, $return);
    }

    /**
     * Takes an input, scrubs unnecessary words
     *
     * @param $input
     * @param $replace
     * @param array $words_array
     * @param bool $unique_words
     * @return string
     */
    public static function removeWords($input, $replace, $words_array = array(), $unique_words = true)
    {
        $input_array = explode(' ', $input);

        $return = array();
        foreach ($input_array as $word) {
            if ( ! in_array($word, $words_array) && ($unique_words ? ! in_array($word, $return) : true)) {
                $return[] = $word;
            }
        }

        return implode($replace, $return);
    }
}