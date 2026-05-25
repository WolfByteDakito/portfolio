<?php

class MentionsLegalesController extends Controller
{
    public function index(): void
    {
        $this->render('mentions-legales', [
            'currentPage' => 'mentions-legales',
            'pageTitle'   => 'Mentions légales - Alexis Mottner',
        ]);
    }
}
