<?php

use App\Http\Controllers\Api\LocaleController;
use App\Http\Controllers\Api\ParseCvController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\OTPAPIController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\JobOfferController;
use App\Http\Controllers\Api\MatchingController;
use App\Http\Controllers\Api\ClientSiteController;
use App\Http\Controllers\Api\EvaluationController;
use App\Http\Controllers\Api\EvaluateursController;
use App\Http\Controllers\Api\ProfessionsController;
use App\Http\Controllers\Api\ActivityAreaController;
use App\Http\Controllers\Api\ClientFilialeController;
use App\Http\Controllers\Api\ClientFinanceController;
use App\Http\Controllers\Api\TechnicalTestController;
use App\Http\Controllers\Api\DiplomaOptionsController;
use App\Http\Controllers\Api\TrackingApplicationController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\Api\MeetingController;
use App\Http\Controllers\Api\FilialeController;
use App\Http\Controllers\Api\AgenceController;
use App\Http\Controllers\Api\CompaignController;
use App\Http\Controllers\Api\CompanieController;
use App\Http\Controllers\Api\EmailTemplateController;
use App\Http\Controllers\Api\GoogleController;
use App\Http\Controllers\Api\SocialiteController;
use App\Http\Controllers\Api\TeamsController;
use App\Http\Controllers\Api\ZoomController;
use App\Http\Controllers\Api\CompetenceTechniqueController;
use App\Http\Controllers\Api\CompetenceLinguistiqueController;
use App\Http\Controllers\Api\CompetencePersonnelleController;
use App\Http\Controllers\Api\PersonalityTestController;
use App\Models\Profile;
use App\Http\Controllers\Api\AccountDetailController;
use App\Http\Controllers\Api\CandidatePortal\ProfileCandidateController;
use App\Http\Controllers\Api\CandidatePortal\JobOfferCandidateController;
use App\Http\Controllers\Api\CandidatePortal\MatchingCandidateController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProfileFoldersController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RecruitmentCostController;
use App\Http\Controllers\Api\ClientPortal\TrackingApplicationClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'locale'], function () {

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('api.logout');

Route::post('/otp/send', [OTPAPIController::class, 'sendOTP'])->name('api.otp.send');
Route::post('/otp/verify', [OTPAPIController::class, 'verifyOTP'])->name('api.otp.verify');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cv-upload', [ProfileController::class, 'uploadCV']);

Route::middleware("web")->get('/set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');


// Client Create
//Route::middleware(['auth:sanctum'])->prefix('/clients')->group(function () {
//    Route::get('/', [ClientController::class, 'index'])->name('client.listing.data');
//    Route::post('/store', [ClientController::class, 'store'])->name('api.client.create');
//});
//Route::middleware(['auth:sanctum'])->group(function () {
//    Route::post('/clients', [ClientController::class, 'store'])->name('api.client.create');
//    Route::get('/listing', [ClientController::class, 'index'])->name('client.listing.data');
//    Route::post('/clients', [ClientController::class, 'store'])->name('api.client.create');
//});

Route::middleware(['auth:sanctum'])->prefix('/clients')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('client.listing.data');
    Route::post('/client-finances', [ClientFinanceController::class, 'store'])->name('api.client.finance.create');
    Route::post('/client-finances/edit/{id?}', [ClientFinanceController::class, 'update'])->name('api.client.finance.edit');
    Route::post('/store', [ClientController::class, 'store'])->name('api.client.store');
    Route::post('/edit/{id}', [ClientController::class, 'update'])->name('api.client.edit');
    Route::delete('/delete/{id}', [ClientController::class, 'destroy'])->name('api.client.delete');
    Route::post('/client-filiales', [ClientFilialeController::class, 'store'])->name('api.client.filiale.create');
    Route::post('/client-filiales/edit', [ClientFilialeController::class, 'update'])->name('api.client.filiale.edit');
    Route::delete('/client-filiales/delete/{filialeId}', [ClientFilialeController::class, 'destroy'])->name('api.client.filiale.delete');
    Route::post('/client-sites', [ClientSiteController::class, 'store'])->name('api.client.site.create');
    Route::post('/client-sites/edit', [ClientSiteController::class, 'update'])->name('api.client.site.edit');
    Route::delete('/client-sites/delete/{siteId}', [ClientSiteController::class, 'destroy'])->name('api.client.site.delete');
    Route::post('/create/account', [ClientController::class, 'storeAccountUser'])->name('api.client.account.user.store');

});

Route::middleware(['auth:sanctum'])->prefix('/setting')->group(function () {
    Route::prefix('/activity-areas')->group(function () {
        Route::delete('/destroy/{id}', [ActivityAreaController::class, 'destroy'])->name('api.activityarea.destroy');
        Route::get('/', [ActivityAreaController::class, 'index'])->name('api.activityarea.listing');
        Route::get('/view/{activityArea}', [ActivityAreaController::class, 'show'])->name('api.activityarea.view');
        Route::post('/', [ActivityAreaController::class, 'store'])->name('api.activityarea.store');
        Route::put('{id}', [ActivityAreaController::class, 'update']);
    });
    Route::prefix('/professions')->group(function () {
        Route::get('/', [ProfessionsController::class, 'index'])->name('api.professions.listing');
        Route::post('/', [ProfessionsController::class, 'store'])->name('api.professions.store');
        Route::get('/{profession}', [ProfessionsController::class, 'show'])->name('api.professions.view');
        Route::put('/{profession}', [ProfessionsController::class, 'update'])->name('api.professions.update');
        Route::delete('/{profession}', [ProfessionsController::class, 'destroy'])->name('api.professions.destroy');
    });
    Route::prefix('/diploma-options')->group(function () {
        Route::get('/', [DiplomaOptionsController::class, 'index'])->name('api.diplomaoptions.listing');
        Route::post('/', [DiplomaOptionsController::class, 'store'])->name('api.diplomaoptions.store');
        Route::get('/{diplomaoption}', [DiplomaOptionsController::class, 'show'])->name('api.diplomaoptions.view');
        Route::put('/{diplomaoption}', [DiplomaOptionsController::class, 'update'])->name('api.diplomaoptions.update');
        Route::delete('/{diplomaoption}', [DiplomaOptionsController::class, 'destroy'])->name('api.diplomaoptions.destroy');
    });
});
// Route::middleware(['auth'])->prefix('/profiles')->group(function () {
//     Route::post('/save-form1', [StoreProfileController::class, 'store_general_info'])->name('profile.storeGeneralInfo');
// });
// Route::get('/data', [ProfileController::class, 'main_index']);

Route::middleware(['auth:sanctum'])->prefix('/profiles')->group(function () {
    Route::get('/data/{id}', [ProfileController::class, 'index'])->name('profile.listing.data');
    Route::post('/data/custom', [ProfileController::class, 'custom'])->name('profile.custom.listing.data');
    Route::get('/chart-data', [ProfileController::class, 'getChartData'])->name('profile.listing.chart.ata');
    Route::get('/persentage-charts', [ProfileController::class, 'getStats'])->name('profile.listing.persentage-chart.data');
    Route::get('/persentage-changes', [ProfileController::class, 'getChartsStats'])->name('profile.listing.change-chart.data');
    Route::get('/main-data', [ProfileController::class, 'main_index'])->name('profile.main-listing.data');
    Route::get('/lang-skills/{id}', [ProfileController::class, 'getLangSkills'])->name('profile-lang-skills.data');
    Route::post('/store/informations', [ProfileController::class, 'store_information'])->name('profile.store.informations');
    Route::post('/store/formations', [ProfileController::class, 'store_formation'])->name('profile.store.formations');
    Route::post('/store/certifications', [ProfileController::class, 'store_certification'])->name('profile.store.certifications');
    Route::post('/store/experiences', [ProfileController::class, 'store_experience'])->name('profile.store.experiences');
    Route::post('/store/skills', [ProfileController::class, 'store_skill'])->name('profile.store.skills');
    Route::post('/store/languages', [ProfileController::class, 'store_language'])->name('profile.store.languages');
    Route::post('/store/recommandations', [ProfileController::class, 'store_recommandation'])->name('profile.store.recommandations');
    Route::post('/store/cover-letters', [ProfileController::class, 'store_cover_letter'])->name('profile.store.cover-letters');
    Route::post('/store/attentes', [ProfileController::class, 'store_attentes'])->name('profile.store.attentes');
    Route::post('/addtovivier', [ProfileController::class, 'addToVivier'])->name('profile.addToVivier');

    Route::post('/update/informations', [ProfileController::class, 'update_information'])->name('profile.update.informations');
    Route::post('/update/formations', [ProfileController::class, 'update_formation'])->name('profile.update.formations');
    Route::post('/update/certifications', [ProfileController::class, 'update_certification'])->name('profile.update.certifications');
    Route::post('/update/experiences', [ProfileController::class, 'update_experience'])->name('profile.update.experiences');
    Route::post('/update/skills', [ProfileController::class, 'update_skill'])->name('profile.update.skills');
    Route::post('/update/languages', [ProfileController::class, 'update_language'])->name('profile.update.languages');
    Route::post('/update/recommandations', [ProfileController::class, 'update_recommandation'])->name('profile.update.recommandations');
    Route::post('/update/cover-letters', [ProfileController::class, 'update_cover_letter'])->name('profile.update.cover-letters');
    Route::post('/update/attentes', [ProfileController::class, 'update_attentes'])->name('profile.update.attentes');

    Route::post('/activate/{id}', [ProfileController::class, 'activate'])->name('profiles.activate');
    Route::post('/deactivate/{id}', [ProfileController::class, 'deactivate'])->name('profiles.deactivate');
    Route::post('/qualify/{id}', [ProfileController::class, 'qualify'])->name('profiles.qualify');
    Route::post('/disqualify/{id}', [ProfileController::class, 'disqualify'])->name('profiles.disqualify');


    Route::get('/delete/profile/{id}', [ProfileController::class, 'delete_profile'])->name('profile.delete.profile');
    Route::get('/delete/formations/{id}', [ProfileController::class, 'delete_formation'])->name('profile.delete.formations');
    Route::get('/delete/certifications/{id}', [ProfileController::class, 'delete_certification'])->name('profile.delete.certifications');
    Route::get('/delete/experiences/{id}', [ProfileController::class, 'delete_experience'])->name('profile.delete.experiences');
    Route::get('/delete/skills/{id}', [ProfileController::class, 'delete_skill'])->name('profile.delete.skills');
    Route::get('/delete/languages/{id}', [ProfileController::class, 'delete_language'])->name('profile.delete.languages');
    Route::get('/delete/recommandations/{id}', [ProfileController::class, 'delete_recommandation'])->name('profile.delete.recommandations');
    Route::get('/delete/cover-letters/{id}', [ProfileController::class, 'delete_cover_letter'])->name('profile.delete.cover-letters');

    Route::post('/parse-cv', [ParseCvController::class, 'parse']);

    Route::post('/change-avatar', [ProfileController::class, 'changeAvatar'])->name('profile.changeAvatar');
    Route::post('/change-cover', [ProfileController::class, 'ChangeCover'])->name('profile.changeCover');
    Route::get('/vivierTalent', [ProfileController::class, 'index_vivier'])->name('profile.listing.vivierTalent');


    Route::post('/upload-cover-letter', [ProfileController::class, 'uploadCoverLetter'])->name('profile.uploadCoverLetter');
    Route::post('/upload-cv', [ProfileController::class, 'uploadCv'])->name('profile.uploadCv');
    Route::post('/upload-video', [ProfileController::class, 'uploadVideo'])->name('profile.uploadVideo');
    Route::get('/get-language-skills', [ProfileController::class, 'getLanguageSkills'])->name("profile.getLanguageSkills");
    // dossier vivier talent
    Route::post('/profiles/{profile}/assign-talent-folder', [ProfileController::class, 'assignToTalentFolder']);
    Route::get('/folders/{id}/subfolders', [ProfileController::class, 'subfolders'])->name('api.folders.subfolders');
});

Route::middleware(['auth:sanctum'])->prefix('/candidate-portal/profiles')->group(function () {
    Route::get('/data/{id}', [ProfileCandidateController::class, 'index'])->name('candidate-portal.profile.listing.data');
    Route::get('/chart-data', [ProfileCandidateController::class, 'getChartData'])->name('candidate-portal.profile.listing.chart.ata');
    Route::get('/persentage-charts', [ProfileCandidateController::class, 'getStats'])->name('candidate-portal.profile.listing.persentage-chart.data');
    Route::get('/persentage-changes', [ProfileCandidateController::class, 'getChartsStats'])->name('candidate-portal.profile.listing.change-chart.data');
    Route::get('/main-data', [ProfileCandidateController::class, 'main_index'])->name('candidate-portal.profile.main-listing.data');
    Route::get('/lang-skills/{id}', [ProfileCandidateController::class, 'getLangSkills'])->name('candidate-portal.profile-lang-skills.data');
    Route::post('/store/informations', [ProfileCandidateController::class, 'store_information'])->name('candidate-portal.profile.store.informations');
    Route::post('/store/formations', [ProfileCandidateController::class, 'store_formation'])->name('candidate-portal.profile.store.formations');
    Route::post('/store/certifications', [ProfileCandidateController::class, 'store_certification'])->name('candidate-portal.profile.store.certifications');
    Route::post('/store/experiences', [ProfileCandidateController::class, 'store_experience'])->name('candidate-portal.profile.store.experiences');
    Route::post('/store/skills', [ProfileCandidateController::class, 'store_skill'])->name('candidate-portal.profile.store.skills');
    Route::post('/store/languages', [ProfileCandidateController::class, 'store_language'])->name('candidate-portal.profile.store.languages');
    Route::post('/store/recommandations', [ProfileCandidateController::class, 'store_recommandation'])->name('candidate-portal.profile.store.recommandations');
    Route::post('/store/cover-letters', [ProfileCandidateController::class, 'store_cover_letter'])->name('candidate-portal.profile.store.cover-letters');
    Route::post('/store/attentes', [ProfileCandidateController::class, 'store_attentes'])->name('candidate-portal.profile.store.attentes');
    Route::post('/addtovivier', [ProfileCandidateController::class, 'addToVivier'])->name('candidate-portal.profile.addToVivier');

    Route::post('/update/informations', [ProfileCandidateController::class, 'update_information'])->name('candidate-portal.profile.update.informations');
    Route::post('/update/formations', [ProfileCandidateController::class, 'update_formation'])->name('candidate-portal.profile.update.formations');
    Route::post('/update/certifications', [ProfileCandidateController::class, 'update_certification'])->name('candidate-portal.profile.update.certifications');
    Route::post('/update/experiences', [ProfileCandidateController::class, 'update_experience'])->name('candidate-portal.profile.update.experiences');
    Route::post('/update/skills', [ProfileCandidateController::class, 'update_skill'])->name('candidate-portal.profile.update.skills');
    Route::post('/update/languages', [ProfileCandidateController::class, 'update_language'])->name('candidate-portal.profile.update.languages');
    Route::post('/update/recommandations', [ProfileCandidateController::class, 'update_recommandation'])->name('candidate-portal.profile.update.recommandations');
    Route::post('/update/cover-letters', [ProfileCandidateController::class, 'update_cover_letter'])->name('candidate-portal.profile.update.cover-letters');
    Route::post('/update/attentes', [ProfileCandidateController::class, 'update_attentes'])->name('candidate-portal.profile.update.attentes');

    Route::post('/activate/{id}', [ProfileCandidateController::class, 'activate'])->name('candidate-portal.profiles.activate');
    Route::post('/deactivate/{id}', [ProfileCandidateController::class, 'deactivate'])->name('candidate-portal.profiles.deactivate');
    Route::post('/qualify/{id}', [ProfileCandidateController::class, 'qualify'])->name('candidate-portal.profiles.qualify');
    Route::post('/disqualify/{id}', [ProfileCandidateController::class, 'disqualify'])->name('candidate-portal.profiles.disqualify');


    Route::get('/delete/profile/{id}', [ProfileCandidateController::class, 'delete_profile'])->name('candidate-portal.profile.delete.profile');
    Route::get('/delete/formations/{id}', [ProfileCandidateController::class, 'delete_formation'])->name('candidate-portal.profile.delete.formations');
    Route::get('/delete/certifications/{id}', [ProfileCandidateController::class, 'delete_certification'])->name('candidate-portal.profile.delete.certifications');
    Route::get('/delete/experiences/{id}', [ProfileCandidateController::class, 'delete_experience'])->name('candidate-portal.profile.delete.experiences');
    Route::get('/delete/skills/{id}', [ProfileCandidateController::class, 'delete_skill'])->name('candidate-portal.profile.delete.skills');
    Route::get('/delete/languages/{id}', [ProfileCandidateController::class, 'delete_language'])->name('candidate-portal.profile.delete.languages');
    Route::get('/delete/recommandations/{id}', [ProfileCandidateController::class, 'delete_recommandation'])->name('candidate-portal.profile.delete.recommandations');
    Route::get('/delete/cover-letters/{id}', [ProfileCandidateController::class, 'delete_cover_letter'])->name('candidate-portal.profile.delete.cover-letters');

    Route::post('/parse-cv', [ParseCvController::class, 'parse']);

    Route::post('/change-avatar', [ProfileCandidateController::class, 'changeAvatar'])->name('candidate-portal.profile.changeAvatar');
    Route::post('/change-cover', [ProfileCandidateController::class, 'ChangeCover'])->name('candidate-portal.profile.changeCover');
    Route::get('/vivierTalent', [ProfileCandidateController::class, 'index_vivier'])->name('candidate-portal.profile.listing.vivierTalent');

    Route::post('/upload-cover-letter', [ProfileCandidateController::class, 'uploadCoverLetter'])->name('candidate-portal.profile.uploadCoverLetter');
    Route::post('/upload-cv', [ProfileCandidateController::class, 'uploadCv'])->name('candidate-portal.profile.uploadCv');
    Route::post('/upload-video', [ProfileCandidateController::class, 'uploadVideo'])->name('candidate-portal.profile.uploadVideo');
    Route::get('/get-language-skills', [ProfileCandidateController::class, 'getLanguageSkills'])->name("candidate-portal.profile.getLanguageSkills");
});

Route::middleware(['auth:sanctum'])->prefix('/events')->group(function () {
    Route::get('/listing', [EventsController::class, 'listing'])->name('events.listing.data');
            Route::post('/generate-email-content', [EventsController::class, 'generateEmailContent']);
    Route::post('/get-participant', [EventsController::class, 'getParticipantNames'])->name('events.participant.data');
    Route::get('/{id}/edit', [EventsController::class, 'edit'])->name('events.edit');
    Route::get('/get-emails', [EventsController::class, 'getEmails'])->name('events.getEmails');
    Route::post('/store', [EventsController::class, 'store'])->name('events.store');
    Route::post('/update', [EventsController::class, 'update'])->name('events.update');
    Route::get('/{id}/toggle-favorite', [EventsController::class, 'toggleFavorite'])->name('events.favorite');
    Route::get('/{id}/delete', [EventsController::class, 'delete'])->name('events.delete');
});

Route::middleware(['auth:sanctum'])->prefix('/missions')->group(function () {
    Route::get('/listing', [JobOfferController::class, 'index'])->name('jobOffer.listing.data');
    Route::post('/storeJobOffer', [JobOfferController::class, 'storeJobOffer'])->name('jobOffer.storeJobOffer');
    Route::put('/updateJobOffer/{id}', [JobOfferController::class, 'updateJobOffer'])->name('updateJobOffer.update');
    Route::delete('/delete_jobOffer/{id}', [JobOfferController::class, 'destroy'])->name('delete_jobOffer.destroy');
    Route::post('/changeStatus/{id}/{status}', [JobOfferController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/joboffershistory', [JobOfferController::class, 'jobOfferHistoryDataTable'])->name('jobOffer.data.history');
});

Route::middleware(['auth:sanctum'])->prefix('/evaluators')->group(function () {
    Route::get('/', [EvaluateursController::class, 'index'])->name('api.evaluator.client.listing.data');
    Route::get('/listing', [EvaluateursController::class, 'evaluator_index'])->name('api.evaluator.listing.data');
     Route::get('/{id}', [EvaluateursController::class, 'show']);

    Route::post('/store', [EvaluateursController::class, 'store'])->name('api.evaluator.create');
    Route::post('/edit/{evaluatorId?}', [EvaluateursController::class, 'update'])->name('api.evaluator.edit');
    Route::delete('/{evaluatorId}', [EvaluateursController::class, 'deleteEvaluator'])->name('api.evaluator.delete');
    Route::delete('/{evaluatorId}/evaluation-types/{evaluationTypeId}', [EvaluateursController::class, 'api.evaluator.valuationType.delete']);
});

Route::middleware(['auth:sanctum'])->prefix('/evaluations')->group(function () {
    Route::get('/', [EvaluationController::class, 'index'])->name('api.evaluation.listing');
    Route::post('/store', [EvaluationController::class, 'store'])->name('api.evaluation.create');
    Route::post('/update', [EvaluationController::class, 'update'])->name('api.evaluation.edit');
});

// Matching API
Route::middleware(['auth:sanctum'])->prefix('/matching')->group(function () {
    Route::get('/', [MatchingController::class, 'index'])->name('api.matching.data');
    Route::get('/{profileId}/{jobOfferId}', [MatchingController::class, 'matchOne']);
    Route::post('/add-to-shortlist', [MatchingController::class, 'addToShortlist'])->name('add.to.shortlist');
    Route::post('/shortlist/toggle', [MatchingController::class, 'toggleShortlist'])->name('shortlist.toggle');
});

Route::middleware(['auth:sanctum'])->prefix('/candidates')->group(function () {
    Route::get('/listing-candidates', [TechnicalTestController::class, 'listingCandidate'])->name('api.candidates.listing.data');
    Route::post('/store-candidate', [TechnicalTestController::class, 'storeCandidate'])->name('api.candidate.store');
    Route::post('/update-candidate/{id}', [TechnicalTestController::class, 'updateCandidate'])->name('api.candidate.update');
    Route::delete('/destroy', [TechnicalTestController::class, 'destroyCandidate'])->name('api.candidate.destroy');
});

Route::middleware(['auth:sanctum'])->prefix('/test-techniques')->group(function () {
    Route::get('/listing', [TechnicalTestController::class, 'listingTests'])->name('api.testsTechniques.listing.data');
});

// ATS API
// Route::middleware(['auth:sanctum'])->prefix('/ats')->group(function () {
//     Route::get('/', [TrackingApplicationController::class, 'index'])->name('api.ats.data');
// });



Route::middleware(['auth:sanctum'])->prefix('/candidates')->group(function () {
    Route::get('/listing-candidates', [TechnicalTestController::class, 'listingCandidate'])->name('api.candidates.listing.data');
    Route::post('/store-candidate', [TechnicalTestController::class, 'storeCandidate'])->name('api.candidate.store');
    Route::post('/update-candidate/{id}', [TechnicalTestController::class, 'updateCandidate'])->name('api.candidate.update');
    Route::delete('/destroy', [TechnicalTestController::class, 'destroyCandidate'])->name('api.candidate.destroy');
});

Route::middleware(['auth:sanctum'])->prefix('/test-techniques')->group(function () {
    Route::get('/listing', [TechnicalTestController::class, 'listingTests'])->name('api.testsTechniques.listing.data');
    Route::post('/create', [TechnicalTestController::class, 'storeTechnicalTest'])->name('api.testsTechniques.store.data');
    Route::post('/edit/{id}', [TechnicalTestController::class, 'editTechnicalTest'])->name('api.testsTechniques.edit.data');
    Route::delete('/delete', [TechnicalTestController::class, 'destroyTechnicalTest'])->name('api.testsTechniques.destroy');


    Route::post('/fetch-tests', [TechnicalTestController::class, 'fetchTests'])->name('api.testsTechniques.fetch');
    Route::post('/fetch-tests-manual', [TechnicalTestController::class, 'fetchTestsManual'])->name('api.testsTechniques.manual.fetch');
    Route::post('/test-techniques-get-details', [TechnicalTestController::class, 'testTechniquesGetDetails'])->name('api.testsTechniques.getDetails');

    // Route Listing Tests Results
    Route::get('/listing-tests-results', [TechnicalTestController::class, 'listingTestsResults'])->name('api.testsTechniques.listing.results');
    Route::get('/listing-all-tests-results', [TechnicalTestController::class, 'listingAllTestsResults'])->name('api.testsTechniques.listing.all.results');

    // Route Create Test Result
    Route::post('/create-test-result', [TechnicalTestController::class, 'createTestResult'])->name('api.testsTechniques.createTestResult');


    // Route Invite Test to candidate
    Route::post('/invite-test-candidate', [TechnicalTestController::class, 'inviteTestToCandidate'])->name('api.testsTechniques.inviteTestToCandidate');
    Route::post('/assign-test-candidate', [TechnicalTestController::class, 'assignTestToCandidate'])->name('api.testsTechniques.assignTestToCandidate');
    Route::post('/send-invitation-test-candidate', [TechnicalTestController::class, 'sendInvitation'])->name('api.testsTechniques.sendInvitation');
    Route::delete('/delete-test-result/{id}', [TechnicalTestController::class, 'deleteTestResult'])->name('api.testsTechniques.deleteTestResult');
    Route::post('/submit', [TechnicalTestController::class, 'submitTest'])->name('api.testsTechniques.submit');

    Route::get("/getResultTestCandidate", [TechnicalTestController::class, 'getResultTestCandidate'])->name('api.testsTechniques.getResultTestCandidate');
});
Route::post('tracking-applications/{id}/update-status', [TrackingApplicationController::class, 'updateStatus']);


Route::middleware(['auth:sanctum'])->prefix('/ats')->group(function () {
    Route::get('/', [TrackingApplicationController::class, 'index'])->name('api.ats.data');
    Route::get('/load-more', [TrackingApplicationController::class, 'loadMore'])->name('api.ats.load-more');
    Route::get('/tracking-applications/filter-kanban', [TrackingApplicationController::class, 'filterKanban'])->name('api.ats.filter.kanban');
    Route::post('tracking-applications/{id}/update-status', [TrackingApplicationController::class, 'updateStatus'])->name('api.ats.update.status');
    Route::get('/get-profiles', [TrackingApplicationController::class, 'getProfiles'])->name('api.ats.getProfiles');
    Route::post('/job-offers/close', [TrackingApplicationController::class, 'close'])->name('jobOffers.close');
});

//    Route::post('tracking-applications/{id}/update-status', [TrackingApplicationController::class, 'updateStatus']);

// Settings
Route::middleware('auth:sanctum')->patch('/settings/security', [SettingController::class, 'update'])->name('api.security-settings.update');

// Filiale
Route::middleware(['auth:sanctum'])->prefix('/filiales')->group(function () {
    Route::get('/', [FilialeController::class, 'index'])->name('api.filiale.listing');
    Route::get('/view/{id}', [FilialeController::class, 'show'])->name('api.filiale.view');
    Route::post('/store', [FilialeController::class, 'store'])->name('api.filiale.store');
    Route::delete('/destroy/{filiale}', [FilialeController::class, 'destroy'])->name('api.filiale.destroy');
    Route::put('/update/{filiale}', [FilialeController::class, 'update'])->name('api.filiale.update');
});

//Agences
Route::middleware(['auth:sanctum'])->prefix('/agences')->group(function () {
    Route::get('/', [AgenceController::class, 'index'])->name('api.agence.listing');
    Route::post('/store', [AgenceController::class, 'store'])->name('api.agence.store');
    Route::delete('/destroy/{agence}', [AgenceController::class, 'destroy'])->name('api.agence.destroy');
    Route::get('/view/{id}', [AgenceController::class, 'show'])->name('api.agence.view');
    Route::put('/update/{agence}', [AgenceController::class, 'update'])->name('api.agence.update');
});

//Entreprises
Route::middleware(['auth:sanctum'])->prefix('/entreprises')->group(function () {
    Route::put('/update/{id}', [CompanieController::class, 'update'])->name('api.companie.update');
    Route::get('/', [CompanieController::class, 'index'])->name('api.companie.listing');
});

//Competence Technique
Route::middleware(['auth:sanctum'])->prefix('/profile-folders')->group(function () {
    Route::get('/', [ProfileFoldersController::class, 'index'])->name('api.profile-folders.listing');
    Route::post('/store', [ProfileFoldersController::class, 'store'])->name('api.profile-folders.store');
    Route::get('/view/{id}', [ProfileFoldersController::class, 'show'])->name('api.profile-folders.view');
    Route::delete('/destroy/{folder}', [ProfileFoldersController::class, 'destroy'])->name('api.profile-folders.destroy');
    Route::put('/update/{folder}', [ProfileFoldersController::class, 'update'])->name('api.profile-folders.update');
});

//Competence Technique
Route::middleware(['auth:sanctum'])->prefix('/competences-technique')->group(function () {
    Route::get('/', [CompetenceTechniqueController::class, 'index'])->name('api.technique.listing');
    Route::post('/store', [CompetenceTechniqueController::class, 'store'])->name('api.technique.store');
    Route::get('/view/{id}', [CompetenceTechniqueController::class, 'show'])->name('api.technique.view');
    Route::delete('/destroy/{tech}', [CompetenceTechniqueController::class, 'destroy'])->name('api.technique.destroy');
    Route::put('/update/{tech}', [CompetenceTechniqueController::class, 'update'])->name('api.technique.update');
});
//Competence Linguistique
Route::middleware(['auth:sanctum'])->prefix('/competences-linguistique')->group(function () {
    Route::get('/', [CompetenceLinguistiqueController::class, 'index'])->name('api.linguistique.listing');
    Route::post('/store', [CompetenceLinguistiqueController::class, 'store'])->name('api.linguistique.store');
    Route::put('/update/{lang}', [CompetenceLinguistiqueController::class, 'update'])->name('api.linguistique.update');
    Route::delete('/destroy/{lang}', [CompetenceLinguistiqueController::class, 'destroy'])->name('api.linguistique.destroy');
    Route::get('/view/{id}', [CompetenceLinguistiqueController::class, 'show'])->name('api.linguistique.view');
});

//Competence Personnelle
Route::middleware(['auth:sanctum'])->prefix('/competences-personnelle')->group(function () {
    Route::get('/', [CompetencePersonnelleController::class, 'index'])->name('api.personnelle.listing');
    Route::post('/store', [CompetencePersonnelleController::class, 'store'])->name('api.personnelle.store');
    Route::get('/view/{id}', [CompetencePersonnelleController::class, 'show'])->name('api.personnelle.view');
    Route::delete('/destroy/{perso}', [CompetencePersonnelleController::class, 'destroy'])->name('api.personnelle.destroy');
    Route::put('/update/{perso}', [CompetencePersonnelleController::class, 'update'])->name('api.personnelle.update');
});

Route::middleware('auth:sanctum')->patch('/settings/security', [SettingController::class, 'update'])
    ->name('api.security-settings.update');


// Email
Route::middleware(['auth:sanctum'])->prefix('/email-templates')->group(function () {
    Route::get('/', [EmailTemplateController::class, 'index']);
    Route::get('/{id}', [EmailTemplateController::class, 'show']);
    Route::get('/{id}', [EmailTemplateController::class, 'show']);
    Route::post('/store', [EmailTemplateController::class, 'store'])->name('emailTemplates.store');
    Route::put('/{id}/update', [EmailTemplateController::class, 'update'])->name('emailTemplates.update');
    Route::delete('/{id}/delete', [EmailTemplateController::class, 'destroy'])->name('emailTemplates.destroy');
});


Route::group(['middleware' => 'auth'], function () {
    $namespace = 'socialite';
    Route::any($namespace, [
        'uses' => SocialiteController::class . '@redirect',
        'as' => 'get.socialite'
    ]);
    Route::get("$namespace/callback", [
        'uses' => SocialiteController::class . '@callbacks',
        'as' => 'get.socialite.callback',
    ]);
    Route::get("$namespace/logout/google", [
        'uses' => SocialiteController::class . '@logoutGoogle',
        'as' => 'get.socialite.logout.google',
    ]);

    Route::any("$namespace/outlook", [
        'uses' => SocialiteController::class . '@redirectOutlook',
        'as' => 'get.socialite.outlook'
    ]);
    Route::get("$namespace/callback/outlook", [
        'uses' => SocialiteController::class . '@callbacksOutlook',
        'as' => 'get.socialite.callback.outlook',
    ]);

    Route::middleware(['auth:sanctum'])->prefix('/test-personnalite')->group(function () {
        Route::post('/modele-predictif/create', [PersonalityTestController::class, 'createPredictiveModel'])->name('api.personalityTest.predictiveModel.create');
        Route::get('/modele-predictif/listing', [PersonalityTestController::class, 'listingPredictiveModels'])->name('api.personalityTest.predictiveModel.listing');
        Route::get('/modele-predictif/validate', [PersonalityTestController::class, 'validatePredictiveModel'])->name('api.personalityTest.predictiveModel.validate');

        Route::get('/candidats/listing', [PersonalityTestController::class, 'listingCondidats'])->name('api.personalityTest.candidats.listing');
        Route::post('/candidats/invite', [PersonalityTestController::class, 'inviteCondidats'])->name('api.personalityTest.candidats.invite');
        Route::get('/candidats/get-matching-with-predictive-models', [PersonalityTestController::class, 'getCondidatMatchingWithPredictiveModels'])->name('api.personalityTest.candidats.matching_with_predictive_models');

        Route::post('/campaign/listing', [CompaignController::class, 'listing'])->name('api.personalityTest.campaign.listing');
        Route::post('/campaign/create', [CompaignController::class, 'create'])->name('api.personalityTest.campaign.create');
        Route::post('/campaign/update', [CompaignController::class, 'update'])->name('api.personalityTest.campaign.update');
        Route::post('/campaign/add_to_campaign', [CompaignController::class, 'add_to_campaign'])->name('api.personalityTest.campaign.add_to_campaign');
    });
});

// Account Detail
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::put('user/update/', [AccountDetailController::class, 'updateAccountDetails'])->name('api.post.user.update');
    Route::post('account/change-password', [AccountDetailController::class, 'changePassword'])->name('post.Account.ChangePassword');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/listing', [JobOfferCandidateController::class, 'index'])->name('jobOffercandidate.listing.data');
    Route::get('/listingMatching', [MatchingCandidateController::class, 'indexMatching'])->name('matchingcandidate.listing.data');
    Route::post('/jobOffer.apply/{id}', [JobOfferCandidateController::class, 'apply'])->name('jobOffer.apply');
});
// Crud Users
Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'users'], function () {
    Route::get('/listing', [UserController::class, 'index'])->name('api.users.listing');
    Route::post('/store', [UserController::class, 'store'])->name('api.users.create');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('api.users.update');
});

Route::middleware(['auth', 'otp'])->prefix('/permission')->group(function () {
    Route::post('/updateRolePermissions', [RolePermissionController::class, 'changeRolePermission'])->name('setting.change.role-permission');
    Route::get('/getRolesPermissions', [RolePermissionController::class, 'getRolesPermissions'])->name('setting.get.role-permission');

    //RapportsFinanciersController
    Route::middleware(['auth', 'otp'])->prefix('/recruitmentCost')->group(function () {
        Route::get('/', [RecruitmentCostController::class, 'listing'])->name('api.recruitmentCost.listing');
        Route::post('/store', [RecruitmentCostController::class, 'store'])->name('api.recruitmentCost.store');
        Route::delete('/destroy/{id}', [RecruitmentCostController::class, 'destroy'])->name('api.recruitmentCost.destroy');
        Route::put('/update/{id}', [RecruitmentCostController::class, 'update'])->name('api.recruitmentCost.update');
    });

    // Dashboard
    Route::middleware(['auth:sanctum'])->prefix('/dashboard')->group(function () {
        Route::get('/completudeCvs', [DashboardController::class, 'completudeCvs'])->name('dashboard.completudeCvs');
        Route::get('/obsolescence', [DashboardController::class, 'obsolescence'])->name('dashboard.obsolescence');
        Route::get('/reussite', [DashboardController::class, 'reussite'])->name('dashboard.reussite');
        Route::get('/embauche', [DashboardController::class, 'embauche'])->name('dashboard.embauche');
        Route::get('/jobOffersByActivityArea', [DashboardController::class, 'jobOffersByActivityArea'])->name('dashboard.jobOffersByActivityArea');
        Route::get('/jobOffersByRegion', [DashboardController::class, 'jobOffersByRegion'])->name('dashboard.jobOffersByRegion');
        Route::get('/jobOffersByPost', [DashboardController::class, 'jobOffersByPost'])->name('dashboard.jobOffersByPost');
        Route::get('/sourceData', [DashboardController::class, 'sourceData'])->name('dashboard.sourceData');
        Route::get('/Cvtheque-Match', [DashboardController::class, 'getCvthequeMatch'])->name('dashboard.getCvthequeMatch');
        Route::get('/vivier-Match', [DashboardController::class, 'getVivierMatch'])->name('dashboard.getVivierMatch');
        Route::get('/candidate-entretien', [DashboardController::class, 'getcandidate'])->name('dashboard.getcandidate');
        Route::get('/diversite', [DashboardController::class, 'getdiversite'])->name('dashboard.getdiversite');
    });
});

// Portal Candidat
Route::middleware(['auth:sanctum'])->prefix('/client-portal')->group(function () {
    Route::get('/ats', [TrackingApplicationClientController::class, 'index'])->name('candidate-portal.api.ats.dataclient-portal');
    Route::get('/tracking-applications/filter-kanban', [TrackingApplicationClientController::class, 'filterKanban'])->name('candidate-portal.api.ats.filter.kanban');
    Route::post('tracking-applications/{id}/update-status', [TrackingApplicationClientController::class, 'updateStatus'])->name('candidate-portal.api.ats.update.status');
    Route::get('/get-profiles', [TrackingApplicationClientController::class, 'getProfiles'])->name('candidate-portal.api.ats.getProfiles');
    Route::post('/job-offers/close', [TrackingApplicationController::class, 'close'])->name('candidate.jobOffers.close');
    Route::get('/joboffershistory', [JobOfferController::class, 'jobOfferHistoryClientPortal'])->name('client-portail.jobOffer.data.history');
    Route::get('/jobOffers/listing', [JobOfferController::class, 'listingClientPortal'])->name('client-portail.jobOffer.listing.data');
});
});