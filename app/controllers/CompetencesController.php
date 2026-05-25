<?php
// Ancienne page « Compétences » : son contenu a été fusionné dans /bts-sio.
// On redirige proprement pour éviter les liens cassés.

class CompetencesController extends Controller
{
    public function index(): void
    {
        header('Location: ' . BASE_URL . '?page=bts-sio#competences', true, 301);
        exit;
    }
}
