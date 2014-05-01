<?php

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $actsAs = [
        'HasNo.HasNo',
        'Cakeplus.ValidationPatterns',
        'Cakeplus.ValidationErrorI18n',
        'Cakeplus.AddValidationRule',
        'Yav.AdditionalValidationRules',
        'Yav.AdditionalValidationPatterns',
        'Yasd.SoftDeletable',
        'Multivalidatable.Multivalidatable',
        'Search.Searchable',
    ];

    public $validation_patterns = [
    ];

    /**
     * beforeValidate
     *
     */
    public function beforeValidate($options = array()){
        $errorMessages = Hash::merge(
            $this->getValidationMessages(),
            [
                'customCheck' => __('Validation Error: customCheck'),
            ]);
        parent::beforeValidate($options);
        $this->setValidationPatterns();
        $this->setErrorMessageI18n($errorMessages, false);
        $this->replaceValidationErrorMessagesI18n();
    }
}
