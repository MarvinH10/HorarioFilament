<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoContratoResource\Pages;
use App\Filament\Resources\TipoContratoResource\RelationManagers;
use App\Models\TipoContrato;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoContratoResource extends Resource
{
    protected static ?string $model = TipoContrato::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Documentación';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_tipo_contrato')
                    ->label('Nombre Tipo Contrato')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Toggle::make('estado_tipo_contrato')
                    ->label('Estado Tipo Contrato')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_tipo_contrato')
                    ->label('Nombre Tipo Contrato')
                    ->searchable(),
                Tables\Columns\IconColumn::make('estado_tipo_contrato')
                    ->label('Estado Tipo Contrato')
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
                    ->query(fn(Builder $query): Builder => $query->where('estado_tipo_contrato', true)),
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
            'index' => Pages\ListTipoContratos::route('/'),
            'create' => Pages\CreateTipoContrato::route('/create'),
            'edit' => Pages\EditTipoContrato::route('/{record}/edit'),
        ];
    }
}
