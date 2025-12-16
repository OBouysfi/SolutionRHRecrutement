<?php

namespace App\Services;

use App\Models\Experience;
use App\Models\Formation;
use App\Models\JobOfferExperience;
use App\Models\JobOfferFormation;
use App\Models\MatchingDetail;
use App\Models\MobilityOption;
use App\Models\MobilityOptionType;
use App\Models\Profile;
use App\Models\JobOffer;
use App\Models\Matching;
use DateTime;
use Exception;

class MatchingService
{
    /**
     * Calcule un score global entre un profil et une offre,
     * en comparant leurs skills (quel que soit le skill_type).
     *
     * @return Matching l’instance match persistée
     */

    /**
     * Calcule un score global pour les compétences (skills) entre un profil et une offre.
     *
     * @param Profile $profile
     * @param JobOffer $jobOffer
     * @return float Le score de correspondance basé sur les compétences (de 0.0 à 1.0)
     */
    public function calculateSkillsMatching(Profile $profile, JobOffer $jobOffer): array
    {
        $jobSkills = $jobOffer->skills;
        $profileSkills = $profile->skills;

        $totalScore = 0;
        $totalSkills = 0;

        $detailedScores = [];

        foreach ($jobSkills as $jobSkill) {
            $profileSkill = $profileSkills->firstWhere('id', $jobSkill->id);

            if ($profileSkill) {
                $profileLevel = $profileSkill->pivot->level;
                $jobLevel = $jobSkill->pivot->level;

                $profileSkillWeight = $profileSkill->pivot->weight;
                $jobSkillWeight = $jobSkill->pivot->weight;

                $profileScale = $this->convertLevelToScore($profileSkillWeight);
                $jobScale = $this->convertLevelToScore($jobSkillWeight);

                $profileScore = $profileLevel > 0 ? ($profileLevel - ($profileLevel * (1 - $profileScale))) / $profileLevel : 0;
                $jobScore = $jobLevel > 0 ? ($jobLevel - ($jobLevel * (1 - $jobScale))) / $jobLevel : 0;

                $skillMatchScore = $profileLevel > $jobLevel
                    ? 1
                    : ($profileLevel * $profileScore * $profileLevel) / ($jobLevel * $jobScore * $jobLevel);

                $skillMatchScore = $skillMatchScore > 1 ? 1 : $skillMatchScore;

                $totalScore += $skillMatchScore;
                $totalSkills += 1;

                $detailedScores[] = [
                    'skill_id' => $jobSkill->id,
                    'profile_score' => $profileScore,
                    'job_offer_score' => $jobScore,
                    'skill_match_score' => $skillMatchScore,
                ];
            }
        }


        $averageMatchScore = $totalSkills ? $totalScore / $totalSkills : 0;

        return [
            'overall_score' => round($averageMatchScore, 2),
            'detailed_scores' => $detailedScores,
        ];
    }

    /**
     * Calcule un score de correspondance spécifique à la mobilité.
     *
     * @param Profile $profile
     * @param JobOffer $jobOffer
     * @return float Le score de mobilité (de 0.0 à 1.0)
     */
    public function calculateMobilityMatching(Profile $profile, JobOffer $jobOffer): array
    {
        $criteriaGroups = [
            'mobilite_geographique' => [2, 3, 4, 5],
            'mode_de_travail' => [7, 8, 9],
            'temps_de_travail' => [11, 12],
            'availability' => [14, 15]
        ];

        $globalScores = [];
        $detailedScores = [];

        foreach ($criteriaGroups as $globalCriteria => $subCriteriaIds) {
            $groupScore = 0;
            $subCriteriaCount = count($subCriteriaIds);
            foreach ($subCriteriaIds as $subCriteriaId) {
                $score = $this->calculateMatchScore($profile->id, $jobOffer->id, $subCriteriaId);
                $detailedScores[] = [
                    'related_id' => $subCriteriaId,
                    'type' => MobilityOptionType::firstWhere('id', $subCriteriaId)->slug,
                    'score' => $score,
                ];

                $groupScore += $score;
            }

            $globalGroupScore = $subCriteriaCount > 0 ? round($groupScore / $subCriteriaCount, 2) : 0;

            $globalScores[$globalCriteria] = $globalGroupScore;
        }

        $overallScore = round(array_sum($globalScores) / count($globalScores), 2);

        return [
            'overall_score' => $overallScore,
            'global_scores' => $globalScores,
            'detailed_scores' => $detailedScores,
        ];


    }


    /**
     * Calcule et stocke le score global entre un profil et une offre en combinant Skills et Mobility.
     *
     * @param Profile $profile
     * @param JobOffer $jobOffer
     * @return Matching L’objet match persisté
     */
    public function matchProfileToJobOffer(Profile $profile, JobOffer $jobOffer): ?Matching
    {


        $skillsScore = $this->calculateSkillsMatching($profile, $jobOffer);
        $mobilityScore = $this->calculateMobilityMatching($profile, $jobOffer);

        $additionalCriteriaScore = $this->calculateAdditionalCriteriaScore($profile, $jobOffer);
        $formationScore = $this->calculateFormationMatchingScore($profile, $jobOffer);
        $experienceScore = $this->calculateExperienceMatchingScore($profile, $jobOffer);

        $globalRatio = ($skillsScore['overall_score'] + $mobilityScore['overall_score'] + $additionalCriteriaScore + $formationScore + $experienceScore) / 5;
        $globalRatio = min(1, max(0, $globalRatio));

        // dd($formationScore, $experienceScore, $globalRatio);
        if ($globalRatio === 0) {
            return null;
        }

        $match = Matching::updateOrCreate(
            [
                'job_offer_id' => $jobOffer->id,
                'profile_id' => $profile->id,
            ],
            [
                'ratio' => $globalRatio,
            ]
        );


        $this->storeMatchingDetails($match->id, $skillsScore['detailed_scores']);
        $this->storeMobilityMatchingDetails($match->id, $mobilityScore['detailed_scores'], $mobilityScore['global_scores']);
        $this->storeAdditionalCriteriaDetails($match->id, $profile, $jobOffer);
        $this->storeFormationMatchingDetails($match->id, $formationScore);
        $this->storeExperienceMatchingDetails($match->id, $experienceScore);

        return $match;
    }

    public function storeMatchingDetails(int $matchId, array $detailedScores): void
    {


        foreach ($detailedScores as $score) {
            MatchingDetail::updateOrCreate([
                'match_id' => $matchId,
                'skill_id' => $score['skill_id'],
                ],
                [
                'profile_score' => $score['profile_score'],
                'job_offer_score' => $score['job_offer_score'],
                'skill_match_score' => $score['skill_match_score'],
            ]);
        }
    }

    public function storeMobilityMatchingDetails(int $matchId, array $detailedScores, array $globalScores): void {

        foreach($detailedScores as $score){
            MatchingDetail::updateOrCreate([
                'match_id' => $matchId,
                'type' => $score['type']
            ],
                [
                'skill_match_score' => $score['score'],
                'related_id' => $score['related_id'],
                'profile_score' => 0,
                'job_offer_score' => 0,
            ]);
        }

        foreach($globalScores as $key => $score){
            MatchingDetail::updateOrCreate([
                'match_id' => $matchId,
                'type' => $key
            ],
                [
                'skill_match_score' => $score,
                'related_id' => null,
                'profile_score' => 0,
                'job_offer_score' => 0,
            ]);
        }
    }

    /**
     * Convertit un niveau (1..5) en un ratio (0.2..1.0)
     * 1 => 20%, 2 => 40%, etc.
     */
    private function convertLevelToScore(int $level): float
    {
        return match ($level) {
            1 => 0.2,
            2 => 0.4,
            3 => 0.6,
            4 => 0.8,
            5 => 1.0,
            default => 0.0
        };
    }

    /**
     * Calcul des scores spécifiques pour les rubriques supplémentaires : profession, contrat, secteur, taille.
     *
     * @param Profile $profile
     * @param JobOffer $jobOffer
     * @return float Score final pour les rubriques supplémentaires
     */
    private function calculateAdditionalCriteriaScore(Profile $profile, JobOffer $jobOffer): float
    {
        $totalScore = 0;
        $totalWeight = 4;

        if ($profile->profession_id == $jobOffer->profession_id) {
            $totalScore += 1;
        }

        if ($profile->contract_type == $jobOffer->contract_type_id) {
            $totalScore += 1;
        }

        if ($profile->activity_area_id == $jobOffer->activity_area_id) {
            $totalScore += 1;
        }

        $salaryMatching = $this->calculateSalaryMatchingScore($profile, $jobOffer);
        $salaryScore = $salaryMatching['overall_score'];


        $totalScore += $salaryScore;



        return $totalScore / $totalWeight;
    }

    protected function storeAdditionalCriteriaDetails(int $matchId, Profile $profile, JobOffer $jobOffer): void
    {
        $matchingDetails = [];

        $matchingDetails[] = [
            'match_id' => $matchId,
            'type' => 'profession',
            'related_id' => null,
            'profile_score' => 0,
            'job_offer_score' => 0,
            'skill_match_score' => $profile->profession_id == $jobOffer->profession_id ? 1 : 0,
        ];

        $matchingDetails[] = [
            'match_id' => $matchId,
            'type' => 'contract_type',
            'related_id' => null,
            'profile_score' => 0,
            'job_offer_score' => 0,
            'skill_match_score' => $profile->contract_type == $jobOffer->contract_type_id ? 1 : 0,
        ];

        $matchingDetails[] = [
            'match_id' => $matchId,
            'type' => 'activity_area',
            'related_id' => null,
            'profile_score' => 0,
            'job_offer_score' => 0,
            'skill_match_score' => $profile->activity_area_id == $jobOffer->activity_area_id ? 1 : 0,
        ];

        $matchingDetails[] = [
            'match_id' => $matchId,
            'type' => 'salary',
            'related_id' => null,
            'profile_score'=> 0,
            'job_offer_score'=> 0,
            'skill_match_score'=> $this->calculateSalaryMatchingScore($profile, $jobOffer)['overall_score'],
        ];

        foreach ($matchingDetails as $detail) {
            $existingDetail = MatchingDetail::where('match_id', $detail['match_id'])
                ->where('type', $detail['type'])
                ->first();

            if ($existingDetail) {
                $existingDetail->update($detail);
            } else {
                MatchingDetail::create($detail);
            }
        }
    }


    public function calculateSalaryMatchingScore(Profile $profile, JobOffer $jobOffer): array
    {
        $profileMinSalary = $profile->min_expected_salary;
        $profileMaxSalary = $profile->max_expected_salary;

        $jobSalary = $jobOffer->salaryExpectation;

        if (!$profileMinSalary || !$profileMaxSalary || !$jobSalary) {
            return [
                'overall_score' => 0,
                'details' => 'Missing data for salary comparison',
            ];
        }

        $jobMinSalary = $jobSalary->min_salary;
        $jobMaxSalary = $jobSalary->max_salary;

        $overlap = $this->calculateSalaryOverlap($profileMinSalary, $profileMaxSalary, $jobMinSalary, $jobMaxSalary);

        $overallScore = $overlap['percentage'];

        return [
            'overall_score' => round($overallScore, 2),
            'details' => $overlap['details'],
        ];
    }

    /**
     * Calcule le chevauchement (overlap) entre deux plages salariales.
     *
     * @param float $profileMinSalary
     * @param float $profileMaxSalary
     * @param float $jobMinSalary
     * @param float $jobMaxSalary
     * @return array Un tableau contenant le pourcentage d'overlap et des détails
     */
    private function calculateSalaryOverlap(
        float $profileMinSalary,
        float $profileMaxSalary,
        float $jobMinSalary,
        float $jobMaxSalary
    ): array {
        $intersectionStart = max($profileMinSalary, $jobMinSalary);
        $intersectionEnd = min($profileMaxSalary, $jobMaxSalary);

        if ($intersectionStart > $intersectionEnd) {
            return [
                'percentage' => 0,
                'details' => 'No overlap between salary ranges',
            ];
        }

        $intersectionWidth = $intersectionEnd - $intersectionStart;
        $profileRangeWidth = $profileMaxSalary - $profileMinSalary;

        $overlapPercentage = $intersectionWidth / $profileRangeWidth;

        return [
            'percentage' => $overlapPercentage,
            'details' => [
                'intersection_start' => $intersectionStart,
                'intersection_end' => $intersectionEnd,
                'profile_min_salary' => $profileMinSalary,
                'profile_max_salary' => $profileMaxSalary,
                'job_min_salary' => $jobMinSalary,
                'job_max_salary' => $jobMaxSalary,
            ],
        ];
    }

    /**
     * Calcule le score pour une rubrique de mobilité (géographique, mode de travail, etc.).
     *
     * @param int $profileId
     * @param int $jobOfferId
     * @param string $parentSlug
     * @return float
     */

    private function calculateMatchScore(int $profileId, int $jobOfferId, int $slug): float
    {
        $mobilityType = MobilityOptionType::where('id', $slug)->first();
        $matchScore = 0;
        if (!$mobilityType) {
            throw new Exception("Le slug '{$slug}' est introuvable dans MobilityOptionType.");
        }

        $profileOption = MobilityOption::where('mobility_option_type_id', $mobilityType->id)
            ->where('profile_id', $profileId)
            ->where('is_active', true)
            ->first();


        $jobOption = MobilityOption::where('mobility_option_type_id', $mobilityType->id)
            ->where('job_offer_id', $jobOfferId)
            ->where('is_active', true)
            ->first();

        $profileWeight = $profileOption->weight ?? 0;
        $jobWeight = $jobOption->weight ?? 0;


        if ($profileWeight === 0 || $jobWeight === 0) {
            return 0.0;
        }



        if (in_array($mobilityType->id, [2, 3, 4, 5, 9])) {
            $matchScore = ($profileWeight >= $jobWeight) ? 1 : 0;
        } if (in_array($mobilityType->id, [7, 8, 11, 12, 14, 15])) {
            $matchScore = $profileWeight / ($jobWeight > 0 ? $jobWeight : 1);
        }


        $matchScore = $matchScore > 1 ? 1 : $matchScore;
        return $matchScore;
    }


    public function calculateFormationMatchingScore(Profile $profile, JobOffer $jobOffer): float
    {
        $profileFormations = Formation::where('profile_id', $profile->id)->get();

        $offerFormations = JobOfferFormation::where('job_offer_id', $jobOffer->id)->get();

        $totalScore = 0;

        foreach ($offerFormations as $offer) {
            $bestMatch = 0;

            foreach ($profileFormations as $profileFormation) {
                if (
                    $profileFormation->diploma_id === $offer->diploma_id &&
                    $profileFormation->option_id === $offer->option_id
                ) {
                    $weightDiploma = $offer->weight_formation / 100;
                    $weightOption = $offer->weight_option / 100;

                    $matchScore = (1 * $weightDiploma) * (1 * $weightOption);

                    $bestMatch = max($bestMatch, $matchScore);

                }
            }

            $totalScore += $bestMatch;
        }

        $normalizedScore = count($offerFormations) > 0 ? ($totalScore / count($offerFormations)) : 0;
        return round($normalizedScore, 2);
    }

    public function calculateExperienceMatchingScore(Profile $profile, JobOffer $jobOffer): float
    {
        // Récupérer les expériences du profil
        $profileExperiences = Experience::where('profile_id', $profile->id)->get();

        // Récupérer les expériences requises de l'offre
        $offerExperiences = JobOfferExperience::where('job_offer_id', $jobOffer->id)->get();

        $totalMatches = 0;

        foreach ($offerExperiences as $offerExperience) {
            foreach ($profileExperiences as $profileExperience) {
                // Vérifier si les professions correspondent
                if ($profileExperience->profession_id === $offerExperience->profession_id) {
                    $totalMatches++;
                    break; // Passer à l'expérience suivante de l'offre (une correspondance suffit)
                }
            }
        }

        // Calcul du score normalisé
        $normalizedScore = count($offerExperiences) > 0 ? ($totalMatches / count($offerExperiences)) : 0;

        return round($normalizedScore, 2);
    }
    public function storeFormationMatchingDetails(int $matchId, float $formationScore): void{
        MatchingDetail::updateOrCreate([
            'match_id' => $matchId,
            'type' => 'formation',
            ],
            [
            'related_id' => null,
            'profile_score' => 0,
            'job_offer_score' => 0,
            'skill_match_score' => $formationScore,
        ]);
    }

    public function storeExperienceMatchingDetails(int $matchId, float $experienceScore): void{
        MatchingDetail::updateOrCreate([
            'match_id' => $matchId,
            'type' => 'experience',
            ],
            [
            'related_id' => null,
            'profile_score' => 0,
            'job_offer_score' => 0,
            'skill_match_score' => $experienceScore,
        ]);
    }

}
