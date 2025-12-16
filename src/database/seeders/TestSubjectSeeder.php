<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSubjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 5, 'label' => 'Excel 2010'],
            ['id' => 16, 'label' => 'Excel 2016'],
            ['id' => 17, 'label' => 'Word 2016'],
            ['id' => 18, 'label' => 'PowerPoint 2016'],
            ['id' => 36, 'label' => 'Outlook 2016'],
            ['id' => 57, 'label' => 'Excel 2019'],
            ['id' => 58, 'label' => 'PowerPoint 2019'],
            ['id' => 59, 'label' => 'Word 2019'],
            ['id' => 61, 'label' => 'WordPress'],
            ['id' => 101, 'label' => 'Python 3'],
            ['id' => 103, 'label' => 'PHP'],
            ['id' => 104, 'label' => 'Java'],
            ['id' => 105, 'label' => 'HTML'],
            ['id' => 108, 'label' => 'C#'],
            ['id' => 208, 'label' => 'Outlook 2013'],
            ['id' => 217, 'label' => 'DigComp'],
            ['id' => 227, 'label' => 'InDesign'],
            ['id' => 228, 'label' => 'Grammaire et orthographe françaises'],
            ['id' => 230, 'label' => 'AutoCAD'],
            ['id' => 231, 'label' => 'Illustrator'],
            ['id' => 232, 'label' => 'Angular'],
            ['id' => 242, 'label' => 'Saisie de données'],
            ['id' => 270, 'label' => 'VBA Excel 2019'],
            ['id' => 277, 'label' => 'Google Sheets'],
            ['id' => 279, 'label' => 'Google Docs'],
            ['id' => 281, 'label' => 'LibreOffice Calc (FR)'],
            ['id' => 287, 'label' => 'LibreOffice Impress 7.0'],
            ['id' => 288, 'label' => 'LibreOffice Writer 7.0'],
            ['id' => 293, 'label' => 'Secrétariat'],
            ['id' => 294, 'label' => 'Adobe Photoshop 2021'],
            ['id' => 295, 'label' => 'Plateforme Collaborative Microsoft 365'],
            ['id' => 297, 'label' => 'SQL'],
            ['id' => 298, 'label' => 'Cybersécurité'],
            ['id' => 299, 'label' => 'Revit Architecture'],
            ['id' => 300, 'label' => 'Salesforce'],
            ['id' => 302, 'label' => 'ReactJS'],
            ['id' => 305, 'label' => 'Google Slides'],
            ['id' => 319, 'label' => 'JavaScript'],
            ['id' => 325, 'label' => 'Access 2019'],
            ['id' => 326, 'label' => 'Comptabilité et Finance'],
            ['id' => 327, 'label' => 'Mathématiques'],
            ['id' => 328, 'label' => 'Sécurité, hygiène et postures'],
            ['id' => 334, 'label' => 'Excel Microsoft 365'],
            ['id' => 336, 'label' => 'Gestion de l\'environnement Windows'],
            ['id' => 338, 'label' => 'Secrétariat médical'],
            ['id' => 339, 'label' => 'Cobol'],
            ['id' => 342, 'label' => 'Développeur Web'],
            ['id' => 343, 'label' => 'Teams'],
            ['id' => 344, 'label' => 'OneDrive'],
            ['id' => 345, 'label' => 'SharePoint'],
            ['id' => 347, 'label' => 'Tests psychotechniques'],
            ['id' => 349, 'label' => 'Power BI'],
            ['id' => 350, 'label' => 'Service Client'],
            ['id' => 353, 'label' => 'Français langue étrangère'],
            ['id' => 358, 'label' => 'Word Microsoft 365'],
            ['id' => 366, 'label' => 'IA Act'],
        ];

        $uniqueData = collect($data)->unique(function ($item) {
            return $item['id'] . $item['label'];
        })->toArray();

        DB::table('test_subjects')->insert($uniqueData);
    }
}
