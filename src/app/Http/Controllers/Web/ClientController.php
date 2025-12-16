<?php

namespace App\Http\Controllers\Web;

use App\Enums\JobOffer\StatusJobOfferEnum;
use App\Exports\ClientsAndSitesExport;

use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\ClientSite;
use App\Models\Profession;
use App\Models\ActivityArea;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ClientFiliale;
use App\Models\ClientFinance;
use App\Models\EvaluationType;
use App\Enums\Client\TaxRegimeEnum;
use App\Http\Controllers\Controller;
use App\Enums\Client\JuridicalFormEnum;
use App\Models\Evaluator;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{

    protected $client;

    /**
     * Crée une nouvelle instance du contrôleur.
     * Injection du modèle Client et application des middlewares
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        // $this->middleware('permission:client-access');
        $this->middleware('permission:client-create')->only(['create']);
        $this->middleware('permission:client-listing')->only(['listing']);
        $this->middleware('permission:client-listing-update')->only(['update']);
        $this->middleware('permission:client-lisitng-detail')->only(['detail']);

        $this->middleware('permission:client-portal-access')->only(['clientPortail']);

    }

    //
    public function listing()
    {
        $countries = Country::all();
        $cities = City::with('country')->get();
        $clients = Client::All();
        $clientSite = ClientSite::All();
        $activityArea = ActivityArea::All();
        $statusJobOfferEnum = StatusJobOfferEnum::getAll();

        return view('client.listing', compact('countries', 'cities', 'clients', 'clientSite', 'activityArea', 'statusJobOfferEnum'));
    }

    public function create()
    {
        $legalForms = JuridicalFormEnum::getAll();
        $taxRegimes = TaxRegimeEnum::getAll();
        $countries = Country::all();
        $cities = City::with('region', 'region.country')->get();
        $activities = ActivityArea::all();

        $lastClientId = Client::latest('id')->value('id') + 1;

        $professions = Profession::orderBy('label', 'asc')->get();
        $types_evaluations = EvaluationType::get();

        return view('client.create', compact('legalForms', 'taxRegimes', 'countries', 'cities', 'activities', 'lastClientId', 'professions', 'types_evaluations'));
    }


    public function edit(int $id)
    {
        $client = Client::findOrfail($id);
        $clientFinance = ClientFinance::where('client_id', $client->id)->first();
        $clientSites = ClientSite::where('client_id', $client->id)->get();
        $clientFiliales = ClientFiliale::where('client_id', $client->id)->get();

        $legalForms = JuridicalFormEnum::getAll();
        $taxRegimes = TaxRegimeEnum::getAll();
        $countries = Country::all();
        $cities = City::with('region', 'region.country')->get();
        $activities = ActivityArea::all();
        $professions = Profession::orderBy('label', 'asc')->get();
        $types_evaluations = EvaluationType::get();

        $evaluators = Evaluator::where('client_id', $id)->with('typeCoefficients')->get();
        $adminUser = User::where('client_id', $id)->first();
        if(isset($adminUser) && !empty($adminUser->name)) {
            $fullName = isset($adminUser) ? explode(' ', $adminUser->name, 2) : null;
            $adminUser->first_name = isset($fullName) ? $fullName[0] : null;
            $adminUser->last_name = isset($fullName) ? $fullName[1] : null;
        }

        return view('client.edit', compact('client', 'clientFinance', 'clientFiliales', 'clientSites', 'legalForms', 'taxRegimes', 'countries', 'cities',
            'activities', 'professions', 'types_evaluations', 'evaluators', 'adminUser'));
    }

    public function view(int $id)
    {
        $client = Client::findOrfail($id);
        $client->legalForm = isset($client->juridical_form) ? JuridicalFormEnum::getValue($client->juridical_form) : '--';
        $client->taxRegime = isset($client->tax_regime) ? TaxRegimeEnum::getValue($client->tax_regime) : '--';
        $client->activity_area = isset($client->activity_area_id) ? ActivityArea::find($client->activity_area_id)->label : '--';
        $client->cityName = isset($client->city_id) ? City::find($client->city_id)->name : '--';
        $client->country = isset($client->city_id) ? Country::find($client->city->region->country_id)->name : '--';
        $clientFinance = ClientFinance::where('client_id', $client->id)->first();
        if ($clientFinance) {
            $clientFinance->city = isset($clientFinance->city_id) ? City::find($clientFinance->city_id)->name : '--';
            $clientFinance->country = isset($clientFinance->country_id) ? Country::find($clientFinance->country_id)->name : '--';
        }

        $clientSites = ClientSite::where('client_id', $client->id)->get();
        $clientFiliales = ClientFiliale::where('client_id', $client->id)->get();

        foreach ($clientFiliales as $filiale) {
            $filiale->city = isset($filiale->city_id) ? City::find($filiale->city_id)->name : '--';
            $filiale->country = isset($filiale->country_id) ? Country::find($filiale->country_id)->name : '--';
            $filiale->legalForm = isset($filiale->juridical_form) ? JuridicalFormEnum::getValue($filiale->juridical_form) : '--';
            $filiale->taxRegime = isset($filiale->tax_regime) ? TaxRegimeEnum::getValue($filiale->tax_regime) : '--';
            $filiale->activity_area = isset($filiale->activity_area_id) ? ActivityArea::find($filiale->activity_area_id)->label : '--';
        }

        foreach ($clientSites as $site) {
            $site->city = isset($site->city_id) ? City::find($site->city_id)->name : '--';
        }


        $legalForms = JuridicalFormEnum::getAll();
        $taxRegimes = TaxRegimeEnum::getAll();
        $countries = Country::all();
        $cities = City::all();
        $activities = ActivityArea::all();
        $types_evaluations = EvaluationType::get();

        $evaluators = Evaluator::where('client_id', $client->id)->with('typeCoefficients')->get();

        $adminUser = User::where('client_id', $client->id)->first();

        return view('client.view', compact('client', 'clientFinance', 'clientFiliales', 'clientSites', 'legalForms', 'taxRegimes', 'countries', 'cities', 'activities', 'types_evaluations', 'evaluators',
        'adminUser'));
    }

    public function invoiceClient()
    {
        return view('client.invoice.view');
    }

    public function invoiceDashboard()
    {
        return view('client.invoice.dashbaord');
    }



    public function clientPortail()
    {
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->first();
        $clientFinance = isset($client) ? ClientFinance::where('client_id', $client->id)->first() : null;
        $clientSites = isset($client) ? ClientSite::where('client_id', $client->id)->get() : null;
        $clientFiliales = isset($client) ? ClientFiliale::where('client_id', $client->id)->get() : null;

        $legalForms = JuridicalFormEnum::getAll();
        $taxRegimes = TaxRegimeEnum::getAll();
        $countries = Country::all();
        $cities = City::all();
        $activities = ActivityArea::all();
        $professions = Profession::orderBy('label', 'asc')->get();
        $types_evaluations = EvaluationType::get();

        $evaluators = isset($client) ? Evaluator::where('client_id', $client->id)->with('typeCoefficients')->get() : null;

        return view('client_portal.organisation.gestion-clients', compact('client', 'clientFinance', 'clientSites', 'clientFiliales', 'legalForms', 'taxRegimes', 'countries', 'cities', 'activities', 'professions', 'types_evaluations', 'evaluators'));
    }

    public function ExcelClients(Request $request)
    {
        $type = $request->query('type');

        if ($type === 'excel') {
            return Excel::download(new ClientsAndSitesExport, 'Clients.xlsx');
        } elseif ($type === 'csv') {
            return Excel::download(new ClientsAndSitesExport, 'Clients.csv', \Maatwebsite\Excel\Excel::CSV);
        }
    }
}
