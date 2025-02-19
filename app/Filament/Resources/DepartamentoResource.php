<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartamentoResource\Pages;
use App\Filament\Resources\DepartamentoResource\RelationManagers;
use App\Models\Departamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartamentoResource extends Resource
{
    protected static ?string $model = Departamento::class;

    protected static ?string $navigationGroup = 'Negocio';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('empresa_id')
                    ->label('Empresa')
                    ->relationship('empresa', 'nombre_empresa')
                    ->required(),
                Forms\Components\TextInput::make('nombre_departamento')
                    ->label('Nombre Departamento')
                    ->maxLength(100)
                    ->required()
                    ->debounce(500)
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (!empty($state)) {
                            $set('descripcion_departamento', "Trabajadores que pertenecen en $state.");
                        } else {
                            $set('descripcion_departamento', null);
                        }
                    }),
                Forms\Components\Textarea::make('descripcion_departamento')
                    ->label('Descripción Departamento')
                    ->nullable(),
                Forms\Components\Toggle::make('estado_departamento')
                    ->label('Estado Departamento')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('empresa.nombre_empresa')
                    ->label('Empresa')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nombre_departamento')
                    ->label('Nombre Departamento')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('descripcion_departamento')
                    ->label('Descripción Departamento')
                    ->limit(50),

                Tables\Columns\IconColumn::make('estado_departamento')
                    ->label('Estado Departamento')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('Estado')
                    ->query(fn(Builder $query): Builder => $query->where('estado_departamento', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartamentos::route('/'),
            'create' => Pages\CreateDepartamento::route('/create'),
            'edit' => Pages\EditDepartamento::route('/{record}/edit'),
        ];
    }
}
