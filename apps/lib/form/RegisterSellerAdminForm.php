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
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;



class RegisterSellerAdminForm extends Form
{
    public function initialize()
    {
        /**
         * Name
         */
        $name = new Text('name', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Nama"
        ]);

        // form name field validation
        $name->addValidators([
            new PresenceOf(['message' => 'Nama harus diisi']),
            new UniquenessValidator(['message' => 'Nama sudah terdaftar']),
        ]);

        /**
         * Username
         */
        $username = new Text('username', [
            "class" => "form-control",
            // "required" => true,
            "autofocus" => true,
            "placeholder" => "Username"
        ]);

        // form username field validation
        $username->addValidators([
            new PresenceOf(['message' => 'Username harus diisi']),
            new UniquenessValidator(['message' => 'Username sudah terdaftar']),
        ]);

        /**
         * email
         */
        $email = new Text('email', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Email"
        ]);

        // form email field validation
        $email->addValidators([
            new PresenceOf(['message' => 'Email harus diisi']),
            new UniquenessValidator(['message' => 'Email sudah terdaftar']),
            new Email(['message' => 'Email harus sesuai format example@gmail.com']),
        ]);

        /**
         * New Password
         */
        $password = new Password('password', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Password"
        ]);
        $password->addValidators([
            new PresenceOf(['message' => 'Password harus diisi']),
            new StringLength(['min' => 5, 'message' => 'Password terlalu pendek, harap melebihi 5 karakter']),
            new Confirmation(['with' => 'password_confirm', 'message' => 'Password tidak sama']),
        ]);
        /**
         * Confirm Password
         */
        $passwordNewConfirm = new Password('password_confirm', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Confirm Password"
        ]);
        $passwordNewConfirm->addValidators([
            new PresenceOf(['message' => 'Konfirmasi password harus diisi']),
        ]);

        $this->add($name);
        $this->add($username);
        $this->add($email);
    }
}
