<?php

namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
// Validation
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\File;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;



class Kategori extends Form
{
    public function initialize()
    {
        /**
         * kategori
         */
        $kategori = new Text('kategori', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "kategori"
        ]);

        // form kategori field validation
        $kategori->addValidators([
            new PresenceOf(['message' => 'Kategori harus diisi']),
            new UniquenessValidator(['message' => 'Kategori sudah terdaftar']),
        ]);

        // $file = new File('icon', [null]);

        // $file->addValidator(new File([
        //     "maxSize"              => "1M",
        //     "messageSize"          => ":field exceeds the max filesize (:max)",
        //     "allowedTypes"         => [
        //         "image/jpeg",
        //         "image/png",
        //         "image/jpg",
        //     ],
        //     "messageType"          => "Allowed file types are :types",
        //     "maxResolution"        => "800x600",
        //     "messageMaxResolution" => "Max resolution of :field is :max",
        // ]));

        // $this->add($file);
        $this->add($kategori);
    }
}
