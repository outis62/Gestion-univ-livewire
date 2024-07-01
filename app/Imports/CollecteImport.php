<?php

namespace App\Imports;

use App\Models\MoyenStockage;
use App\Models\Speculation;
use App\Models\UniteMesure;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CollecteImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    protected $collectes = [];
    protected $operationPaysaneId;
    private $currentLine = 1;
    public function __construct()
    {
        $this->operationPaysaneId = auth()->user()->operation_paysane_id;
    }

    public function bindValue(\PhpOffice\PhpSpreadsheet\Cell\Cell $cell, $value)
    {

        if (is_string($value) && preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $value)) {
            $formattedDate = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            return $formattedDate;
        }
        return $value;
    }
    private function closestMatch($input, $array)
    {
        $shortest = -1;
        foreach ($array as $word) {
            $lev = levenshtein($input, $word);
            if ($lev == 0) {
                return $word;
            }
            if ($lev <= $shortest || $shortest < 0) {
                $closest = $word;
                $shortest = $lev;
            }
        }
        return $closest;
    }

    public function model(array $row)
    {
        $this->currentLine++;
        $expectedColumns = [
            'date_debut', 'date_fin', 'superficie', 'rendement', 'quantite',
            'speculation', 'moyen_de_stockage', 'unite_mesure',
        ];

        $errorMessages = checkHeaderExcel($expectedColumns, array_keys($row));
        if (!empty($errorMessages)) {
            throw new \Exception(implode(', ', $errorMessages));
        }

        $validationRules = [
            'date_debut' => ['required'],
            'date_fin' => ['required'],
            'superficie' => ['required', 'numeric'],
            'rendement' => ['required', 'numeric'],
            'quantite' => ['required', 'numeric'],
            'speculation' => ['required', 'exists:speculations,nom'],
            'moyen_de_stockage' => ['required', 'exists:moyen_stockages,libelle'],
            'unite_mesure' => ['required', 'exists:unite_mesures,libelle'],
        ];

        // Validation des valeurs des colonnes
        $validationErrors = columnsValueValidate($validationRules, [$row]);
        if (!empty($validationErrors)) {
            $errorMessage = implode(', ', $validationErrors['messages']) . " ligne {$this->currentLine}";
            throw new \Exception($errorMessage);
        }

        try {
            $dateDebut = Date::excelToDateTimeObject($row['date_debut'])->format('Y-m-d');
            $dateFin = Date::excelToDateTimeObject($row['date_fin'])->format('Y-m-d');
        } catch (\Exception $e) {
            throw new \Exception('Erreur lors de la conversion de la date Excel : ' . $e->getMessage());
        }

        $speculation = Speculation::where('nom', $row['speculation'])->firstOrFail();
        $moyenStockage = MoyenStockage::where('libelle', $row['moyen_de_stockage'])->firstOrFail();
        $uniteMesure = UniteMesure::where('libelle', $row['unite_mesure'])->firstOrFail();

        $collecteData = [
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'superficie' => $row['superficie'],
            'rendement_production' => $row['rendement'],
            'quantite' => $row['quantite'],
            'speculation_id' => $speculation->id,
            'moyen_stockage_id' => $moyenStockage->id,
            'operation_paysane_id' => $this->operationPaysaneId,
            'unite_mesure_id' => $uniteMesure->id,
        ];

        $this->collectes[] = $collecteData;
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ';',
            'enclosure' => '"',
            'line_ending' => "\r\n",
            'use_bom' => true,
            'excel_compatibility' => false,
            'excel_library' => 'PhpSpreadsheet',
            'heading_row' => false,
            'date_format' => 'd/m/Y',
        ];
    }

    public function getCollectes()
    {
        return $this->collectes;
    }
}
