<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContratoResource\Pages;
use App\Filament\Resources\ContratoResource\RelationManagers;
use App\Models\Contrato;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContratoResource extends Resource
{
    protected static ?string $model = Contrato::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('empleado_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('empresa_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tipo_contrato_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('max_hora_semanales_contrato')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('fecha_inicio_contrato')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin_contrato'),
                Forms\Components\TextInput::make('motivo_cambio_contrato')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ruta_documento_contrato')
                    ->maxLength(255),
                Forms\Components\Toggle::make('estado_contrato')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('empleado_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('empresa_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_contrato_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_hora_semanales_contrato')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_inicio_contrato')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin_contrato')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('motivo_cambio_contrato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ruta_documento_contrato')
                    ->searchable(),
                Tables\Columns\IconColumn::make('estado_contrato')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListContratos::route('/'),
            'create' => Pages\CreateContrato::route('/create'),
            'edit' => Pages\EditContrato::route('/{record}/edit'),
        ];
    }
}
