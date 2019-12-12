<?php

namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\File;
// Validation
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\File as FileValidator;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;



class Blog extends Form
{
    public function initialize()
    {
        $title = new Text('title', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Judul"
        ]);

        // form judul field validation
        $title->addValidators([
            new PresenceOf(['message' => 'Judul harus diisi']),
        ]);

        $blogdesc = new TextArea('blogdesc', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Deskripsi"
        ]);

        $blogdesc->addValidators([
            new PresenceOf(['message' => 'Judul harus diisi']),
        ]);

        $file = new File('blogimg', []);

        $file->addValidators([new FileValidator([
            "maxSize"              => "1M",
            "messageSize"          => ":field exceeds the max filesize (:max)",
            "allowedTypes"         => [
                "image/jpeg",
                "image/png",
                "image/jpg",
            ],
            "messageType"          => "Allowed file types are :types",
            "maxResolution"        => "1050x690",
            "messageMaxResolution" => "Max resolution of :field is :max",
        ])]);

        $this->add($file);
        $this->add($blogdesc);
        $this->add($title);
    }
}
