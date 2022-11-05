<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait TextTrait {
    /**
     * text propriety
     *
     * @param Str $text
     * @param $path
     * @return string
     */

    public function shorter($input, $length) {
        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        if(!$last_space) $last_space = $length;
        $trimmed_text = substr($input, 0, $last_space);

        //add ellipses (...)
        $trimmed_text .= '...';

        return $trimmed_text;
    }

    public function uppercase($text) {
        return strtoupper($text);
    }

    public function slug_url(Str $text) {
        return Str::slug($text);
    }

    public function create_token() {
        return uniqid('', 60);
    }

    public function clean_phone($tel) {
        return preg_replace('/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/','\1 \2 \3 \4 \5',$tel);
    }
}
