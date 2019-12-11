<?php

namespace Phalcon\Init\BackOffice\Controllers\Web;

use Phalcon\Init\BackOffice\Models\Users;
use Phalcon\Mvc\Controller;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class BackOfficeController extends Controller
{
    public function indexAction()
    {
        echo "BO";
        // $this->view->pick('dashboard/index');
    }
    public function sendVCAccAction($id_user)
    {
        $user = new Users();
        $user = Users::findFirst([
            'conditions' => 'id_user = ?1',
            'bind'       => [
                1 => $id_user
            ]
        ]);

        $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
            ->setUsername($this->config->smtp['username'])
            ->setPassword($this->config->smtp['password']);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $body = 'Hello, <p>Verification Code <span style="color:red;"><a href="http://project.local/pbkk-fasma/getmail?vc=' . $user->verifcode . '">Click Here</a></span>.</p>';

        $message = (new Swift_Message('Email Through Swift Mailer'))
            ->setFrom(['finalpbkk@gmail.com' => 'Final PBKK'])
            ->setTo([$user->email])
            ->setBody($body)
            ->setContentType('text/html');

        // Send the message
        $mailer->send($message);
    }

    public function getVCAccAction()
    {
        $verifcode = $this->request->get('vc');
        $user = new Users();
        $user = Users::findFirst([
            'conditions' => 'verifcode = ?1',
            'bind'       => [
                1 => $verifcode
            ]
        ]);
        var_dump($user->verifcode, $verifcode);
        if ($user->verifcode === $verifcode) {
            $user->setUserstatus(1);
            $user->update();
            return $this->response->redirect('/login');
        } else {
            // return $this->dispacther->forward(
            //     [
            //         'controller'    => 'showerror',
            //         'action'        => 'show404',
            //     ]
            // );
            echo "gak iso";
        }
        exit;
    }
}
