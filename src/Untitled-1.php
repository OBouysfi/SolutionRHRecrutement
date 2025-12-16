//    public function handle()
//    {
//        $aujourdHui = Carbon::today()->format('Y-m-d');
//
//        // Récupérer les relances pour aujourd'hui
//        $relances = RelanceAffectation::whereDate('relance_date', $aujourdHui)
//            ->where('status', false)
//            ->get();
//
//        foreach ($relances as $relance) {
//            if ($relance->candidat_id) {
//                $candidat = User::find($relance->candidat_id);
//                if ($candidat) {
//                    // Récupérer le modèle d'email
//                    $emailTemplate = Email::where('title', 'relance_affectation')->first();
//
//                    if ($emailTemplate) {
//                        // Définir la condition basée sur le nombre de relances
//                        $nombre_relances = count($relances) ?? 0;
//
//                        $texte_relance = $nombre_relances == 1
//                            ? 'Ceci est un premier rappel.'
//                            : "Il s’agit de notre {$nombre_relances}ème relance.";
//
//                        // Remplacer les variables dynamiques dans le template
//                        $content = str_replace(
//                            ['{{nom_candidat}}', '{{nom_test}}', '{{nombre_relances}}', '{{texte_relance}}', '{{lien_test}}', '{{date_limite}}', '{{contact_support}}', '{{nom_entreprise}}'],
//                            [
//                                $candidat->last_name . ' ' . $candidat->first_name,
//                                $relance->nom_test ?? 'Test',
//                                $nombre_relances,
//                                $texte_relance,
//                                $relance->lien_test ?? '#',
//                                $relance->date_limite ?? $aujourdHui,
//                                config('app.contact_support'),
//                                config('app.name')
//                            ],
//                            $emailTemplate->content
//                        );
//
//                        // Envoyer l'email
//                        Mail::to($candidat->email)->send(new RelanceAffectationMail($content, $emailTemplate->subject));
//
//                        // Mettre à jour le statut de la relance
//                        $relance->update(['status' => true]);
//
//                        // Mettre à jour la dernière relance dans la table affectations
//                        if ($relance->affectation_id) {
//                            Affectation::where('id', $relance->affectation_id)
//                                ->update(['derniere_relance_date' => $aujourdHui]);
//                        }
//                    }
//                }
//            }
//        }
//
//        $this->info('Notifications envoyées avec succès.');
//    }
