<?php

class HomeController extends Controller
{
    public function index(): void
    {
        // CV
        $cvPath = ROOT_PATH . '/public/assets/documents/' . DOCUMENTS['cv'];

        // Photo (dépose-la dans /public/assets/images/ — accepte f1_portfolio.* ou photo.*)
        $photoCandidates = [
            'f1_portfolio.png', 'f1_portfolio.jpg', 'f1_portfolio.jpeg', 'f1_portfolio.webp',
            'photo.jpg', 'photo.jpeg', 'photo.png', 'photo.webp', 'photo.svg',
        ];
        $photoFichier    = null;
        foreach ($photoCandidates as $candidate) {
            if (file_exists(ROOT_PATH . '/public/assets/images/' . $candidate)) {
                $photoFichier = $candidate;
                break;
            }
        }

        $this->render('home', [
            'currentPage'      => 'accueil',
            'pageTitle'        => 'Accueil - Alexis Mottner | Portfolio',
            'cvDisponible'     => file_exists($cvPath),
            'cvUrl'            => ASSETS_URL . 'documents/' . DOCUMENTS['cv'],
            'photoDisponible'  => $photoFichier !== null,
            'photoUrl'         => $photoFichier ? ASSETS_URL . 'images/' . $photoFichier : '',
        ]);
    }
}
