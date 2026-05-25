<?php

class ContactController extends Controller
{
    public function index(): void
    {
        $errors  = [];
        $success = false;
        $old     = ['nom' => '', 'email' => '', 'message' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old['nom']     = trim($_POST['nom']     ?? '');
            $old['email']   = trim($_POST['email']   ?? '');
            $old['message'] = trim($_POST['message'] ?? '');

            // Validation
            if ($old['nom'] === '' || mb_strlen($old['nom']) < 2) {
                $errors[] = 'Le nom doit contenir au moins 2 caractères.';
            }
            if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse email n\'est pas valide.';
            }
            if (mb_strlen($old['message']) < 10) {
                $errors[] = 'Le message doit contenir au moins 10 caractères.';
            }

            if (empty($errors)) {
                // À MODIFIER : ici tu peux remplacer par un vrai envoi mail (mail() ou PHPMailer)
                // ou stocker en BDD via PDO. Pour l'instant on simule juste le succès.
                //
                // Exemple d'envoi mail :
                //   mail(CANDIDAT['email'], 'Contact portfolio', $old['message'], 'From: ' . $old['email']);
                //
                // Exemple BDD :
                //   $stmt = db()->prepare('INSERT INTO contacts (nom, email, message, date) VALUES (?, ?, ?, NOW())');
                //   $stmt->execute([$old['nom'], $old['email'], $old['message']]);

                $success = true;
                $old = ['nom' => '', 'email' => '', 'message' => ''];
            }
        }

        $this->render('contact', [
            'currentPage' => 'contact',
            'pageTitle'   => 'Contact - Alexis Mottner',
            'errors'      => $errors,
            'success'     => $success,
            'old'         => $old,
        ]);
    }
}
