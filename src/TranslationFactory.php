<?php

namespace Robertjamroz\Zoo;

use Laminas\I18n\Translator\Translator;

abstract class TranslationFactory {

    public static function getFactory(string $lang = 'pl'){
        $translator = new Translator();
        $translator->addTranslationFilePattern('phparray', __DIR__ . '/../languages', '%s.php');
        $translator->setLocale($lang);
        return $translator;
    }
}

