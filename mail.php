<?php
    
    require_once 'tcpdf/tcpdf.php';
    
    function generateUserListPDF($users){
        $pdf = new TCPDF(
            PDF_PAGE_ORIENTATION,
            PDF_UNIT,
            PDF_PAGE_FORMAT,
            true,
            'UTF-8',
            false
        );
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('CHIEMO WANDJI');
        $pdf->SetTitle('Liste des Utilisateurs');
        $pdf->SetSubject('Liste des Utilisateurs');
        $pdf->SetKeywords('utilisateurs, liste');
        
        $pdf->AddPage();
        
        $content = '';
        
        foreach ($users as $user) {
            $content .= 'Nom: ' . $user['nom'] . '<br>';
            $content .= 'Adresse e-mail: ' . $user['email'] . '<br><br>';
        }
        
        // Écrire le contenu dans le PDF
        $pdf->writeHTML($content, true, false, true, false, '');
        
        // Retourner le PDF en tant que chaîne de caractères
        return $pdf->Output('', 'S');
    }
    // Adresse e-mail de l'utilisateur destinataire
    $destinataire = 'Wapalu2004@gmail.com';

// Liste des utilisateurs (exemple)
    $users = [
        ['nom' => 'John Doe', 'email' => 'patricewandji2004@example.com'],
        ['nom' => 'Jane Smitzh', 'email' => 'chiemo.patrice21@myiuc.com'],
        // ...
    ];

// Générer le PDF avec la liste des utilisateurs
    $pdfContent = generateUserListPDF($users);

// Envoyer l'e-mail avec le fichier PDF en pièce jointe
    $subject = 'Liste des Utilisateurs';
    $message = 'Veuillez trouver ci-joint la liste des utilisateurs.';
    $from = 'Wapalu2004@gmail.com';

// Séparateur de ligne pour les e-mails
    $separator = md5(time());

// En-têtes de l'e-mail
    $headers = "From: $from" . PHP_EOL;
    $headers .= "Reply-To: $from" . PHP_EOL;
    $headers .= "MIME-Version: 1.0" . PHP_EOL;
    $headers .= "Content-Type: multipart/mixed; boundary=\"$separator\"" . PHP_EOL;

// Corps de l'e-mail
    $body = "--$separator" . PHP_EOL;
    $body .= "Content-Type: text/plain; charset=UTF-8" . PHP_EOL;
    $body .= "Content-Transfer-Encoding: 7bit" . PHP_EOL;
    $body .= PHP_EOL . $message . PHP_EOL;
    $body .= "--$separator" . PHP_EOL;
    $body .= "Content-Type: application/pdf; name=\"liste_utilisateurs.pdf\"" . PHP_EOL;
    $body .= "Content-Transfer-Encoding: base64" . PHP_EOL;
    $body .= "Content-Disposition: attachment" . PHP_EOL;
    $body .= PHP_EOL . chunk_split(base64_encode($pdfContent)) . PHP_EOL;
    $body .= "--$separator--";

// Envoyer l'e-mail
    if (mail($destinataire, $subject, $body, $headers)) {
        echo 'L\'e-mail a été envoyé avec succès.';
    } else {
        echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
    }
    