<?php

use App\Http\Controllers\Api\LocaleController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Web\ChatbootController;
use App\Http\Controllers\Web\ChatVisio\ChatController as VisioChatController;
use App\Http\Controllers\Web\ChatVisio\VideoCallController;
use App\Http\Controllers\Web\ChatVisio\WebRTCController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Api\ZoomController;
use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Api\TeamsController;
use App\Http\Controllers\Api\GoogleController;
use App\Http\Controllers\Web\AgenceController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\EventsController;
use App\Http\Controllers\Api\ParseCvController;
use App\Http\Controllers\Web\FilialeController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\SettingController;
use App\Http\Controllers\Auth\PasswordResetMail;
use App\Http\Controllers\Web\CompaignController;
use App\Http\Controllers\Web\CompanieController;
use App\Http\Controllers\Web\JobOfferController;
use App\Http\Controllers\Web\MatchingController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\Web\EvaluationController;
use App\Http\Controllers\Auth\EmailCheckController;
use App\Http\Controllers\Web\ActivityLogController;
use App\Http\Controllers\Web\EvaluateursController;
use App\Http\Controllers\Web\ProfessionsController;
use App\Http\Controllers\Web\ActivityAreaController;
use App\Http\Controllers\Web\EmailTemplateController;
use App\Http\Controllers\Web\TechnicalTestController;
use App\Http\Controllers\Auth\AccountDetailController;
use App\Http\Controllers\Auth\PasswordEntryController;
use App\Http\Controllers\Web\ApiIntegrationController;
use App\Http\Controllers\Web\DiplomaOptionsController;
use App\Http\Controllers\Web\ProfileFoldersController;
use App\Http\Controllers\Web\PersonalityTestController;
use App\Http\Controllers\Web\RecruitmentCostController;
use App\Http\Controllers\Web\CompetenceTechniqueController;
use App\Http\Controllers\Web\TrackingApplicationController;
use App\Http\Controllers\Web\CompetencePersonnelleController;
use App\Http\Controllers\Web\CompetenceLinguistiqueController;
use App\Http\Controllers\Web\CandidatePortal\ProfileCandidateController;
use App\Http\Controllers\Web\CandidatePortal\JobOfferCandidateController;
use App\Http\Controllers\Web\CandidatePortal\MatchingCandidateController;
use App\Http\Controllers\Web\CandidatePortal\StaffingCandidateController;
use App\Http\Controllers\Web\CandidatePortal\TechnicalTestCandidateController;
use App\Http\Controllers\Web\CandidatePortal\PersonalityTestCandidateController;
use App\Http\Controllers\Web\ClientPortal\JobOfferController as ClientPortalJobOfferController;
use App\Http\Controllers\Web\ClientPortal\TrackingApplicationClientController;
use App\Http\Controllers\Api\PersonalityTestController as ApiPersonalityTestController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\RecommendationFormController;
use App\Http\Controllers\RecommendationLinkController;

Route::group(['middleware' => 'locale'], function () {

// Route::get('/set-locale/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'fr', 'ar', 'zh', 'pt', 'es'])) {
//         session(['locale' => $locale]);
//         app()->setLocale($locale);
//     }
//     return redirect()->back();
// })->name('set-locale');

// Route::get('/set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');
// Route::get('/set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');
// Route::get('set-locale/{locale}', function ($locale) {
//     if (in_array($locale, array_keys(config('laravellocalization.supportedLocales')))) {
//         session(['locale' => $locale]);
//         app()->setLocale($locale);
//     }
//     return redirect()->back();
// })->name('set-locale');

// In your controller or route
// public function setLocale($locale)
// {
//     if (in_array($locale, ['fr', 'en', 'ar', 'es', 'pt'])) {
//         app()->setLocale($locale);
//         session()->put('locale', $locale);
        
//         // For mcamara compatibility
//         \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale($locale);
        
//         return redirect()->back();
//     }
//     abort(400);
// }


// Redirection par défaut vers le dashboard si connecté
// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });


// Route::group(
//     ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
//     function () {

Broadcast::routes();

Route::middleware(['web'])->group(function () {
// Étape 1 : Vérification de l'email
Route::get('/login', [EmailCheckController::class, 'showForm'])->name('login-email-form');
Route::post('/login', [EmailCheckController::class, 'checkEmail'])->name('login-email-check');

Route::get('/', function () {
    return redirect()->route("login-email-check");
});


// Étape 2 : Vérification du mot de passe
Route::get('/login/password', [PasswordEntryController::class, 'showForm'])->name('login-password-form');
Route::post('/login/password', [PasswordEntryController::class, 'login'])->name('login-password');

//Reset Password
Route::get('/forget-password', [PasswordEntryController::class, 'forget'])->name('password-forget');
Route::get('/reset-password', [PasswordEntryController::class, 'reset'])->name('reset-password');
// Route::match(['get', 'post'], '/password/update', [PasswordEntryController::class, 'update'])->name('password.update');
Route::post('/password/update', [PasswordEntryController::class, 'update'])->name('password.update');
// Route::match(['get', 'post'], 'password/forget', [PasswordEntryController::class, 'sendResetLink'])->name('password.forget');
Route::post('password/forget', [PasswordEntryController::class, 'sendResetLink'])->name('password.forget');



// Étape 3 : Vérification OTP
Route::get('/otp', [OTPController::class, 'showForm'])->name('otp-form');
Route::post('/otp/send', [OTPController::class, 'sendOTP'])->name('otp-send');
Route::get('/otp/resend', [OTPController::class, 'ResendOTP'])->name('otp-resend');
Route::post('/otp/verify', [OTPController::class, 'verifyOTP'])->name('otp-verify');

// l'authentification SSO
Route::get('/login/sso', [App\Http\Controllers\Auth\SSOController::class, 'redirectToProvider'])
    ->name('login.sso');

// gérer le callback du fournisseur SSO
Route::get('/login/sso/callback', [App\Http\Controllers\Auth\SSOController::class, 'handleProviderCallback'])
    ->name('login.sso.callback');

// Dashboard
Route::middleware(['auth', 'otp'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboard');
});

// Profile
Route::middleware(['auth', 'otp'])->prefix('/profiles')->group(function () {
    Route::get('/listing', [ProfileController::class, 'listing'])->name('profile.listing');
    Route::get('/view/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/viewProfile/{id}', [ProfileController::class, 'showProfile'])->name('profile.viewProfile');
    Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/cvPreview', [ProfileController::class, 'preview'])->name('profile.inc.cvPreview');
    Route::get('/export', [ProfileController::class, 'exportExcel'])->name('export');
    Route::get('/export/cvtheque', [ProfileController::class, 'ExcelCVtheque'])->name('exportCVtheque');
    Route::post('/send-share-email', [ProfileController::class, 'sendShareEmail'])->name('send.share.email');
    Route::post('/send-vivier-talent-email', [ProfileController::class, 'sendShareVivierTalentEmail'])->name('send.vt.email');
    Route::post('/talent-folders', [ProfileController::class, 'storeTalentFolder'])->name('talent-folders.store');
});

// Calendrier
Route::middleware(['auth', 'otp'])->prefix('/events')->group(function () {
    Route::get('/listing', [EventsController::class, 'listing'])->name('events.listing');
    Route::get('/', [EventsController::class, 'create'])->name('events.create');
});

// Vivier Talents

Route::middleware(['auth', 'otp'])->prefix('/vivierTalents')->group(function () {
    Route::get('/', [ProfileController::class, 'vivierTalent'])->name('vivierTalent.listing');
    Route::get('/Preview', [ProfileController::class, 'vivierpreview'])->name('vivierTalent.preview');
});

// Client

Route::middleware(['auth', 'otp'])->prefix('/clients')->group(function () {
    Route::get('/', [ClientController::class, 'listing'])->name('client.listing');
    Route::get('/create', [ClientController::class, 'create'])->name('client.create');
    Route::get('/{id}', [ClientController::class, 'view'])->name('client.view');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit.show');
    Route::get('/export/clients', [ClientController::class, 'ExcelClients'])->name('exportClients');

    Route::get('/facturation-tab', [ClientController::class, 'invoiceClient'])->name('client.invoice.view');
    Route::get('/dashboard', [ClientController::class, 'invoiceDashboard'])->name('client.invoice.dashboard');
});


// Missions

Route::middleware(['auth', 'otp'])->prefix('/missions')->group(function () {
    Route::get('/', [JobOfferController::class, 'listing'])->name('jobOffer.listing');
    Route::get('/create', [JobOfferController::class, 'create'])->name('jobOffer.create');
    Route::get('/{id}/edit', [JobOfferController::class, 'edit'])->name('jobOffer.edit');
    Route::get('/get-skills-by-category/{categoryId}/', [JobOfferController::class, 'getSkillsByCategory']);
    Route::get('/indicators', [JobOfferController::class, 'indicators'])->name('jobOffer.indicators');
    Route::get('/indicators/detail/chart', [JobOfferController::class, 'getChartData'])->name('indicators.chart_detail');
    Route::get('/{id}/show', [JobOfferController::class, 'show'])->name('jobOffer.show');
    Route::get('/history', [JobOfferController::class, 'getJobOffersHistory'])->name('jobOffer.history');
    Route::get('/preview-history', [JobOfferController::class, 'previewHistory'])->name('jobOffer.previewHistory');
    Route::get('/export-job-offers', [JobOfferController::class, 'exportJobOffers'])->name('export.job.offers');

    Route::get('/Preview', [JobOfferController::class, 'jobOfferPreview'])->name('jobOffer.preview');
    Route::post('/send-share-email', [JobOfferController::class, 'sendShareEmail'])->name('send.share.email');
    Route::get('/export_excel_jobOffre', [JobOfferController::class, 'export_excel_jobOffre'])->name('export_excel_jobOffre');

    // Route pour récupérer les évaluateurs d'un client
    Route::get('/clients/{client}/evaluators', [JobOfferController::class, 'getClientEvaluators']);
});


Route::middleware(['auth', 'otp'])->prefix('/evaluation')->group(function () {
    Route::get('/profile/{profile}/joboffer/{jobOffer}/preview', [EvaluationController::class, 'preview'])->name('detail.evaluator.preview');

});
// Matching
Route::middleware(['auth', 'otp'])->prefix('/matching')->group(function () {
    Route::get('/', [MatchingController::class, 'listing'])->name('matching.listing');
    Route::get('/{profileId}/{jobOfferId}', [MatchingController::class, 'matchOne']);
    Route::get('/detail/{match}/profile/{profile}/joboffer/{jobOffer}', [MatchingController::class, 'view'])->withoutScopedBindings()->name('matching.detail');
    Route::get('/preview', [MatchingController::class, 'preview'])->name('matching.preview');
    Route::get('/export', [MatchingController::class, 'export'])->name('matching.export');
    Route::get('/detail/{match}/profile/{profile}/joboffer/{jobOffer}/preview', [MatchingController::class, 'detailMatchingPreview'])->name('detail.matching.preview');
    Route::get('/profile/{profile}/cover-letter', [MatchingController::class, 'coverLetter'])->name('detail.matching.cover.letter.preview');
    Route::get('/profile/{profile}/cv', [MatchingController::class, 'showCV'])->name('detail.matching.cv.preview');
    Route::get('/profile/{profile}/download-cv', [MatchingController::class, 'generatePDF'])->name('detail.matching.cv.download');
    Route::get('/profile/{id}/print', [MatchingController::class, 'print'])->name('profile.cv.print');


});


// ATS
Route::middleware(['auth', 'otp'])->prefix('/ats')->group(function () {
    Route::get('/', [TrackingApplicationController::class, 'listing'])->name('ats.listing');
    Route::post('/send-email', [TrackingApplicationController::class, 'sendEmail'])->name('send.email');
});

// Test Technique
Route::middleware(['auth', 'otp'])->prefix('/test-technique')->group(function () {
    Route::get('/', [TechnicalTestController::class, 'listingTest'])->name('technicalTest.listingTest');
    Route::get('/test', [TechnicalTestController::class, 'listingCandidate'])->name('technicalTest.test.candidate');
    Route::get('/create-test', [TechnicalTestController::class, 'createTest'])->name('technicalTest.create.test');
    Route::get('/edit-test/{id}', [TechnicalTestController::class, 'editTest'])->name('technicalTest.edit.test');
    Route::get('/preview-test/{id}', [TechnicalTestController::class, 'previewTest'])->name('technicalTest.preview.test');
    Route::get('/create-candidat-test', [TechnicalTestController::class, 'createCandidate'])->name('technicalTest.create.candidate');
    Route::get('/edit-candidat-test/{id}', [TechnicalTestController::class, 'editCandidate'])->name('technicalTest.edit.candidate');
    Route::get('/fiche-candidat-test/{id}', [TechnicalTestController::class, 'sheet'])->name('technicalTest.sheet');
    Route::get('/fiche-candidat-test-detail/{resultId}/{testId}/{candidateId}', [TechnicalTestController::class, 'sheetDetail'])->name('technicalTest.sheet.detail');
    Route::get('/start-test/{testId}/{candidateId}', [TechnicalTestController::class, 'startTest'])->name('technicalTest.test.start');
    Route::get('/resultats', [TechnicalTestController::class, 'result'])->name('technicalTest.result');
});

// Test Personnalité
Route::middleware(['auth', 'otp'])->prefix('/test-personnalite')->group(function () {
    // Route::get('/', [PersonalityTestController::class, 'listingTest'])->name('technicalTest.listingTest');
    Route::get('/candidats', [PersonalityTestController::class, 'listingCandidate'])->name('personalityTest.test.candidate');
    Route::get('/resultats', [PersonalityTestController::class, 'result'])->name('personalityTest.result');
    Route::get('/modele-predictif/create', [PersonalityTestController::class, 'createPredictiveModel'])->name('personalityTest.predictiveModel.create');
    Route::get('/campaign', [PersonalityTestController::class, 'campaign'])->name('personalityTest.campaign');
    Route::get('/inviter-contacts', [PersonalityTestController::class, 'inviteContact'])->name('personalityTest.inviteContact');
    Route::get('/fiche-candidat-test-personnalite', [PersonalityTestController::class, 'sheet'])->name('personalityTest.sheet');


    Route::get('/modele-predictif/listing', [PersonalityTestController::class, 'listingPredictiveModel'])->name('personalityTest.predictiveModel.listing');

    Route::get('/campaign/listing', [CompaignController::class, 'index'])->name('personalityTest.campaign.listing');
    Route::get('/campaign/create', [CompaignController::class, 'create'])->name('personalityTest.campaign.create');
    Route::get('/campaign/add_to_campaign', [CompaignController::class, 'add_to_campaign'])->name('personalityTest.campaign.add_to_campaign');

    Route::get('/candidat/details', [PersonalityTestController::class, 'getCandidateDetails'])->name('personalityTest.candidate.details');
});

// Paramètre
Route::middleware(['auth', 'otp'])->prefix('/setting')->group(function () {
    Route::get('/personnalisation', [SettingController::class, 'personnalisation'])->name('setting.personnalisation');
    Route::get('/activityArea', [ActivityAreaController::class, 'listing'])->name('setting.activityAreas.listing');
    Route::get('activity_areas/{id}/edit', [ActivityAreaController::class, 'edit']);
    Route::get('professions/{id}/edit', [ProfessionsController::class, 'edit']);
    Route::get('diplomaoptions/{id}/edit', [DiplomaOptionsController::class, 'edit']);
    Route::get('/professions', [ProfessionsController::class, 'listing'])->name('setting.professions.listing');
    Route::get('/diplomaoptions', [DiplomaOptionsController::class, 'listing'])->name('setting.diplomaoptions.listing');
    Route::get('/backup', [SettingController::class, 'sauvegarde'])->name('setting.backup');
    Route::get('/notification', [SettingController::class, 'notification'])->name('setting.notification');
    Route::get('/export', [ProfessionsController::class, 'exportExcel'])->name('export');
    Route::get('/security', [SettingController::class, 'index'])->name('settings.security');
    Route::post('/security', [SettingController::class, 'update'])->name('settings.security.update');
    Route::put('/session', [SettingController::class, 'updateSession'])->name('settings.session.update');
    Route::get('/session', function () {
        return redirect()->route('settings.security');
    });
    Route::put('/password', [SettingController::class, 'updatePasswordSettings'])->name('settings.password.update');
    Route::put('/files', [SettingController::class, 'updateFileSettings'])->name('settings.files.update');
    Route::get('/export', [DiplomaOptionsController::class, 'exportExcel'])->name('diploma.export');
    Route::get('/professionsexport', [ProfessionsController::class, 'exportprofession'])->name('profession.export');
    Route::get('/activityAreaexport', [ActivityAreaController::class, 'exportactivityArea'])->name('activityArea.export');
});



// Evaluateurs
Route::middleware(['auth', 'otp'])->prefix('/evaluateurs')->group(function () {
    Route::get('/create', [EvaluateursController::class, 'create'])->name('evaluators.create');
    Route::get('/listing', [EvaluateursController::class, 'listing'])->name('evaluators.listing');
    Route::get('/edit/{evaluatorId}', [EvaluateursController::class, 'edit'])->name('evaluator.edit.show');
    Route::get('/{evaluatorId}', [EvaluateursController::class, 'view'])->name('evaluator.view');
});


// Filiale
Route::middleware(['auth', 'otp'])->prefix('/filiales')->group(function () {
    Route::get('/', [FilialeController::class, 'listing'])->name('filiale.listing');
    Route::get('/export', [FilialeController::class, 'exportfiliale'])->name('filiale.export');
    Route::get('/{id}/edit', [FilialeController::class, 'edit']);
});

// Agence
Route::middleware(['auth', 'otp'])->prefix('/agences')->group(function () {
    Route::get('/', [AgenceController::class, 'listing'])->name('agence.listing');
    Route::get('/export', [AgenceController::class, 'exportagence'])->name('agence.export');
    Route::get('/{id}/edit', [AgenceController::class, 'edit']);
});

//Companie
Route::middleware(['auth', 'otp'])->prefix('/entreprises')->group(function () {
    Route::get('/', [CompanieController::class, 'listing'])->name('companie.listing');
    Route::get('/{id}/edit', [CompanieController::class, 'edit']);
});

// Email Params
Route::middleware(['auth', 'otp'])->prefix('/email-templates')->group(function () {
    Route::get('/', [EmailTemplateController::class, 'index'])->name('setting.email_params');
    Route::get('/{id}', [EmailTemplateController::class, 'show']);
    Route::patch('/{id}/toggle', [EmailTemplateController::class, 'toggle'])->name('email-templates.toggle');
});


//Support
Route::middleware(['auth', 'otp'])->prefix('/supports')->group(function () {
    Route::get('/', [SupportController::class, 'index'])->name('support.index');
    Route::post('/support', [SupportController::class, 'store'])->name('support.store');
});


//Competence Technique
Route::middleware(['auth', 'otp'])->prefix('/profile-folders')->group(function () {
    Route::get('/', [ProfileFoldersController::class, 'listing'])->name('profile-folders.listing');
    Route::get('/{id}/edit', [ProfileFoldersController::class, 'edit']);
    Route::get('/export', [ProfileFoldersController::class, 'export'])->name('profile-folders.export');
});

//Competence Technique
Route::middleware(['auth', 'otp'])->prefix('/competences-techniques')->group(function () {
    Route::get('/', [CompetenceTechniqueController::class, 'listing'])->name('comptechnique.listing');
    Route::get('/{id}/edit', [CompetenceTechniqueController::class, 'edit']);
    Route::get('/export', [CompetenceTechniqueController::class, 'exportcomptech'])->name('comptechnique.export');
});

//Competence Linguistique
Route::middleware(['auth', 'otp'])->prefix('/competences-linguistiques')->group(function () {
    Route::get('/', [CompetenceLinguistiqueController::class, 'listing'])->name('complinguistique.listing');
    Route::get('/{id}/edit', [CompetenceLinguistiqueController::class, 'edit']);
    Route::get('/export', [CompetenceLinguistiqueController::class, 'exportcomplang'])->name('complinguistique.export');
});

//Competences Personnelles
Route::middleware(['auth', 'otp'])->prefix('/competences-personnelles')->group(function () {
    Route::get('/', [CompetencePersonnelleController::class, 'listing'])->name('personnelle.listing');
    Route::get('/{id}/edit', [CompetencePersonnelleController::class, 'edit']);
    Route::get('/export', [CompetencePersonnelleController::class, 'exportcomperso'])->name('personnelle.export');
});

Route::get('/redirect-google', [GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('/callback-google', [GoogleController::class, 'handleGoogleCallback'])->name('googleCallback');
Route::get('/create-google-meet', [GoogleController::class, 'createGoogleMeet'])->name('createGoogleMeet');

Route::get('/redirect-ms', [TeamsController::class, 'redirectToMicrosoft'])->name('teams.redirect');
Route::get('/callback-ms', [TeamsController::class, 'handleMicrosoftCallback'])->name('teams.callback');
Route::get('/create-ms-meet', [TeamsController::class, 'createTeamsMeeting'])->name('teams.create-meeting');

Route::get('/redirect-zoom', [ZoomController::class, 'redirectToZoom'])->name('zoom.redirect');
Route::get('/callback-zoom', [ZoomController::class, 'handleZoomCallback'])->name('zoom.callback');
Route::get('/create-zoom-meet', [ZoomController::class, 'createMeeting'])->name('zoom.create-meeting');

Route::post('/api/personnal-test/test-done', [ApiPersonalityTestController::class, 'update'])->name('api.personalityTest.test_done');


Route::post('/parse-cv', [ParseCvController::class, 'testPars'])->name('test_pars');
Route::get('/test/view', [ParseCvController::class, 'testView']);


// API Intégration
Route::prefix('setting/apis')->group(function () {
    Route::get('/', [ApiIntegrationController::class, 'index'])->name('setting.apis.index');
    Route::get('/api/{id}/detail', [ApiIntegrationController::class, 'show'])->name('api.detail');
    Route::post('/toggle', [ApiIntegrationController::class, 'toggleStatus'])->name('api.toggle');
    Route::post('/store', [ApiIntegrationController::class, 'store'])->name('api.store');
});

// Route::middleware(['auth', 'otp'])->group(function () {
//     Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
//     Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
//     Route::get('/chat/users', function () {
//         return response()->json(\App\Models\User::where('id', '!=', auth()->id())->get());
//     })->name('chat.users');
//     Route::get('/chat/messages/{receiver_id}', [ChatController::class, 'getMessages'])->name('chat.messages');
//     Route::get('/chat/last-message/{user_id}', [ChatController::class, 'getLastMessage']);
// });


Route::middleware(['auth'])->group(callback: function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/users', [ChatController::class, 'getUsers'])->name('chat.users');
    Route::get('/chat/messages/{receiver_id}', [ChatController::class, 'getMessages'])->name('chat.messages');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/last-message/{user_id}', [ChatController::class, 'getLastMessage'])->name('chat.last-message');
});

// Account Detail
Route::middleware(['auth', 'otp'])->group(function () {
    Route::get('/account', [AccountDetailController::class, 'index'])->name('get.Account.Detail');
});
// Log Activity
Route::middleware(['auth', 'otp'])->group(function () {
    Route::get('/activity-logs', [ActivityLogController::class, 'listing'])->name('activity-logs.index');
});


// Potail Candidat ( Candidat )

Route::middleware(['auth', 'otp'])->prefix('/candidate-portal')->group(function () {
    Route::get('/profiles', [ProfileCandidateController::class, 'listing'])->name('candidate-portal.profiles.listing');
    Route::get('/profiles/create', [ProfileCandidateController::class, 'create'])->name('candidate-portal.profiles.create');
    Route::get('/profiles/edit', [ProfileCandidateController::class, 'edit'])->name('candidate-portal.profile.edit');
    Route::get('/offres-emplois', [JobOfferCandidateController::class, 'listing'])->name('candidate-portal.jobOffer');
    Route::get('/matching', [MatchingCandidateController::class, 'listing'])->name('candidate-portal.matching');
    Route::get('/profile/{profile}/cover-letter', [MatchingCandidateController::class, 'coverLetter'])->name('candidate-portal.detail.matching.cover.letter.preview');
    Route::get('/profile/{profile}/cv', [MatchingCandidateController::class, 'showCV'])->name('candidate-portal.detail.matching.cv.preview');
    Route::get('/profile/{id}/print', [MatchingCandidateController::class, 'print'])->name('candidate-portal.profile.cv.print');
    Route::get('/fiche-candidat-test', [TechnicalTestCandidateController::class, 'listing'])->name('candidate-portal.fiche-candidat-test');
    Route::get('/show-personality-test-result', [PersonalityTestCandidateController::class, 'showPersonalityTestResult'])->name('candidate-portal.show-personality-test-result');
    Route::get('/presences', [StaffingCandidateController::class, 'presence'])->name('candidate-portal.staffing.presences');
});

// Potail Client ( Client )

Route::middleware(['auth', 'otp'])->prefix('/client-portal')->group(function () {
    Route::get('/organisation', [ClientController::class, 'clientPortail'])->name('client-portal.organisation');
    Route::get('/ats', [TrackingApplicationClientController::class, 'listing'])->name('candidate-portal.ats');
    Route::get('/missions', [ClientPortalJobOfferController::class, 'listing'])->name('client-portal.jobOffer.listing');
    Route::get('/missions/history', [ClientPortalJobOfferController::class, 'getJobOffersHistory'])->name('client-portal.jobOffer.history');

    Route::get('/Preview', [ClientPortalJobOfferController::class, 'jobOfferPreview'])->name('client-portal.jobOffer.preview');
    Route::post('/send-share-email', [ClientPortalJobOfferController::class, 'sendShareEmail'])->name('send.share.email');
    Route::get('/export_excel_client_portal_jobOffre', [ClientPortalJobOfferController::class, 'export_excel_client_portal_jobOffre'])->name('export_excel_client_portal_jobOffre');
});

    Route::get('/hr-assistant', [ChatbootController::class, 'chatboot'])->name('chatboot');


// ROLES & PERMISSIONS

Route::middleware(['auth', 'otp'])->group(function () {
    Route::resource('roles', RoleController::class);
});
Route::middleware(['auth', 'otp'])->prefix('/permission')->group(function () {
    Route::get('/assignRole', [RolePermissionController::class, 'assignRoleView'])->name('assignRoleView');
    Route::post('/assignRoleAction', [RolePermissionController::class, 'assignRole'])->name('assignRole');
    Route::get('/', [RolePermissionController::class, 'listing'])->name('setting.permission');
    Route::get('/roles/{role}/permission-ids', [RoleController::class, 'permissionIds']);
    Route::get('/rolePermissions', [RoleController::class, 'getRolePermissions'])->name('setting.role-permission');
    Route::post('/updateRolePermissions', [RoleController::class, 'toggleRolePermission'])->name('setting.update.role-permission');
    Route::post('/createRole', [RolePermissionController::class, 'createRole'])->name('role.store');
    Route::post('/updateRole', [RolePermissionController::class, 'updateRole'])->name('role.update');
    Route::delete('/deleteRole/{id}', [RolePermissionController::class, 'deleteRole'])->name('role.delete');
    Route::get('/get-actions', [RolePermissionController::class, 'getActions']);
    Route::post('/storeRolesPermissions', [RolePermissionController::class, 'storeRolesPermissions'])->name('storeRolesPermissions');
    Route::post('/rolesPermissionsDetach', [RolePermissionController::class, 'detachPermission'])->name('rolesPermissionsDetach');
});

// Crud Users
Route::middleware(['auth', 'otp'])->prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.listing');
    Route::get('password/reset/{token}', [PasswordResetMail::class, 'showResetForm'])->name('users.password.reset');
    Route::post('/password/reset', [PasswordResetMail::class, 'reset'])->name('users.password.update');
});
//RapportsFinanciersController
// <<<<<<< HEAD
// Route::middleware(['auth', 'otp'])->prefix('/RapportsFinanciers')->group(function () {
//     Route::get('/', [RapportsFinanciersController::class, 'listing'])->name('rapportFinance.listing');
// =======
Route::middleware(['auth','otp'])->prefix('/recruitmentCost')->group(function () {
    Route::get('/', [RecruitmentCostController::class, 'listing'])->name('rapportFinance.listing');
});

//Recommendation
Route::get('/recommendation/{token}', [RecommendationFormController::class, 'showForm'])->name('recommendation.form');
Route::post('/send-recommendation-link', [RecommendationLinkController::class, 'sendRecommendationLink'])->name('recommendation.send');
Route::post('/recommandation/form/{token}', [RecommendationFormController::class, 'storeRecommandationPublic'])->name('recommandation.form.store');


Route::middleware('auth')->group(function () {
Route::get('/video-call', [VideoCallController::class, 'index'])->name('video-call');
Route::post('/signal-offer', [VideoCallController::class, 'signalOffer']);
Route::post('/signal-answer', [VideoCallController::class, 'signalAnswer']);
Route::post('/signal-ice-candidate', [VideoCallController::class, 'signalIceCandidate']);
Route::post('/end-call', [VideoCallController::class, 'endCall']);
});
});
});