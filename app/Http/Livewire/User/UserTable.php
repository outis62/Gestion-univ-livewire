<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{
    public $viewRoute;
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'asc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make("Nom", "nom")
                ->searchable(),
            Column::make("Prenom", "prenom")
                ->searchable(),
            Column::make("Email", "email")
                ->searchable(),
            Column::make("Adresse", "adresse")
                ->searchable()
                ->format(function ($value) {
                    return $value ? $value : '---';
                }),
            Column::make("Role", "role")
                ->searchable()
                ->format(function ($value) {
                    return getRoleText($value);
                }),
            Column::make("Statut", "statut")
                ->format(function ($value) {
                    return $value ?
                    '<span class="badge badge-soft-success">Actif</span>' :
                    '<span class="badge badge-soft-danger">Bloquer</span>';
                })
                ->html(),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('partials.table-action')
                        ->with(['viewLink' => route($this->viewRoute['link'], $row)])
                )->html(),
        ];
    }

    public function builder(): EloquentBuilder
    {
        $userConnect = Auth::user();
        switch ($userConnect->role) {
            case 'handler-admin':
                $roles = ['handler-admin', 'agent-admin'];
                break;
            case 'handler-op':
                $roles = ['handler-op', 'agent-op'];
                break;

            default:
                $roles = [];
                break;
        }

        return User::query()->whereIn('role', $roles)->latest('updated_at');
    }
}