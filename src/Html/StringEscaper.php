<?php

namespace Html;

trait StringEscaper
{
    /**
     * Méthode de la classe WebPage. Cette méthdoe retourne la chaîne de caractère en ayant protéger les caractères spéciaux pouvant dégrader la page Web.
     * @param string $string
     * @return string
     */
    public function escapeString(string $string=null): string
    {
        if ($string!=null) {
            $res = htmlspecialchars($string, ENT_HTML5 | ENT_QUOTES);
        } else {
            $res="";
        }
        return $res;
    }

    public function stripTagsAndTrim(string $text): string
    {
        $res=strip_tags($text);
        if ($res==null) {
            $res="";
        }
        return $res;
    }
}
