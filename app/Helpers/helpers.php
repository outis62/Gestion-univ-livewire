<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $dtime = Carbon::parse($date)->format('d/m/Y');
        return $dtime;
    }
}

if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

if (!function_exists('getRoleText')) {
    function getRoleText($role)
    {
        switch ($role) {
            case 'handler-admin':
                return 'Administrateur';
            case 'agent-admin':
                return 'Agent administrateur';
            case 'handler-op':
                return 'Responsable cooperative paysane';
            case 'agent-op':
                return 'Agent cooperative paysane';
            case 'prospect':
                return 'Prospection';
            default:
                return ucfirst($role);
        }
    }

    if (!function_exists('checkHeaderExcel')) {
        function checkHeaderExcel($header, $tableau)
        {
            $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            $errorMessages = [];
            foreach ($tableau as $key => $value) {
                if (isset($header[$key])) {
                    if ($header[$key] != $value) {
                        $errorMessages[] = "La colonne " . $alphabet[$key] . " doit être " . $value;
                    }
                } else {
                    $errorMessages[] = "La colonne " . $alphabet[$key] . " doit être " . $value . " ou verifier  la feuille excel est activée";
                }
                return $errorMessages;
            }
        }
    }

    if (!function_exists('columnsValueValidate')) {
        function columnsValueValidate($validation, $data, $existRule = [])
        {
            foreach ($data as $key => $value) {
                if (count($existRule ?? []) > 0) {
                    $validation[$existRule[0]] = array_merge($validation[$existRule[0]], [
                        Rule::exists($existRule[1], $existRule[2]),
                    ]);
                }
                $validator = Validator::make($value, $validation);
                if ($validator->fails()) {
                    $handlerMessages = $validator->errors()->getMessages();
                    $handlerMessages = array_map(function ($item) {
                        return $item[0];
                    }, $handlerMessages);
                    return [
                        'position' => $key,
                        'messages' => $handlerMessages,
                    ];
                }
            }
            return [];
        }
    }

    if (!function_exists('formatMontant')) {
        function formatMontant($montant_du)
        {
            if ($montant_du) {
                $montant = number_format($montant_du, 0, ',', ' ');
                return $montant;
            } else {
                return 0;
            }
            // $montant = number_format($montant_du, 3, ',', ' ');
        }
    }
}
