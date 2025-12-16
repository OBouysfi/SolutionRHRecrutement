<?php

namespace App\Http\Controllers\Web\ClientPortal;

use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Exports\PortalClientJobOffreExport;
use App\Http\Controllers\Controller;
use App\Mail\ShareListingJobOffrePortalClientEmail;
use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\Diploma;
use App\Models\JobOffer;
use App\Models\Level;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class JobOfferController extends Controller
{
    protected $jobOffer;

    /**
     * Crée une nouvelle instance du contrôleur.
     * Injection du modèle JobOffer et application des middlewares
     */
    public function __construct(JobOffer $jobOffer)
    {

    }

    public function listing()
    {
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->first();

        // Initialiser une collection vide par défaut si aucun client
        $JobOffers = collect();

        // Si un client est trouvé, récupérer ses offres d'emploi
        if ($client) {
            $JobOffers = JobOffer::with(['client', 'city', 'diplomas', 'jobOfferExperience'])
                ->where('client_id', $client->id)
                ->latest()
                ->paginate(20);
        }

        $niveaux = Level::get();
        $diplomas = Diploma::get();
        $countries = Country::get();
        $posts = Profession::get();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $status_jobOffres = StatusJobOfferEnum::getAll();


        return view('client_portal.jobOffer.listing', compact('countries', 'cities', 'posts', 'clients', 'diplomas', 'status_jobOffres', 'JobOffers'));
    }


    public function getJobOffersHistory()
    {
        $countries = Country::get();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $status_jobOffres = StatusJobOfferEnum::getAll();
        return view('client_portal.jobOffer.history', compact('countries', 'cities', 'clients', 'status_jobOffres'));
    }

    public function jobOfferPreview()
    {
        $niveaux = Level::get();
        $diplomas = Diploma::get();
        $countries = Country::get();
        $posts = Profession::get();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $status_jobOffres = StatusJobOfferEnum::getAll();

        return view('client_portal.jobOffer.preview', compact('countries', 'cities', 'posts', 'clients', 'diplomas', 'status_jobOffres'));
    }

        /**
     * sendShareEmail ( JobOffre )
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendShareEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|string',
            'subject' => 'nullable|string',
            'message' => 'nullable|string',
            'page_url' => 'required|url',
        ]);

        $data = [
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'page_url' => $request->input('page_url'),
        ];

        // Envoyer l'email
        // Mail::to(explode(',', $request->input('to')))
        //     ->cc(explode(',', $request->input('cc')))
        //     ->send(new ShareListingJobOffreEmail($data));

        $toEmails = array_filter(array_map('trim', explode(',', $request->input('to'))));
        $ccEmails = $request->filled('cc') ? array_filter(array_map('trim', explode(',', $request->input('cc')))) : [];

        $mail = Mail::to($toEmails);

        if (!empty($ccEmails)) {
            $mail->cc($ccEmails);
        }

        $mail->send(new ShareListingJobOffrePortalClientEmail($data));



        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Lien partagé avec succès !');
    }

    public function export_excel_client_portal_jobOffre(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new PortalClientJobOffreExport, 'JobOffre.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new PortalClientJobOffreExport, 'JobOffre.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}
