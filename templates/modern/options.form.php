<?php

class formModernTemplateOptions extends cmsForm {

    public function init() {

        return array(

            array(
                'type' => 'fieldset',
                'title' => LANG_PAGE_LOGO,
                'childs' => array(
                    new fieldImage('logo', array(
                        'options' => array(
                            'sizes' => array('small', 'original')
                        )
                    )),
                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_DEFAULT_THEME_COPYRIGHT,
                'childs' => array(

                    new fieldString('owner_name', array(
                        'title' => LANG_TITLE
                    )),

                    new fieldString('owner_url', array(
                        'title' => LANG_DEFAULT_THEME_COPYRIGHT_URL,
                        'hint' => LANG_DEFAULT_THEME_COPYRIGHT_URL_HINT
                    )),

                    new fieldString('owner_year', array(
                        'title' => LANG_DEFAULT_THEME_COPYRIGHT_YEAR,
                        'hint' => LANG_DEFAULT_THEME_COPYRIGHT_YEAR_HINT
                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_ADMIN_CONTROLLER,
                'childs' => array(

                    new fieldCheckbox('disable_help_anim', array(
                        'title' => LANG_DEFAULT_THEME_DISABLE_HELP_ANIM,
                        'default' => 0
                    ))

                )
            )

        );

    }

}
