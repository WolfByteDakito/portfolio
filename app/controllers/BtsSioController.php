<?php
require_once APP_PATH . '/models/Competence.php';

class BtsSioController extends Controller
{
    public function index(): void
    {
        $this->render('bts-sio', [
            'currentPage' => 'bts-sio',
            'pageTitle'   => 'BTS SIO - Alexis Mottner',
            'blocs'       => Competence::blocs(),
        ]);
    }
}
