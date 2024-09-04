<?php

namespace App\Filament\Resources;

use App\Enum\TipoUsuario;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralLabel = 'Usuários';
    protected static ?string $label = 'Usuário';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\Section::make()->schema([
                  Forms\Components\Grid::make()->columns([
                      'sm' => 1,
                      'lg' => 2
                  ])->schema([
                      Forms\Components\TextInput::make('name')
                          ->label('Nome')
                          ->required()
                          ->maxLength(255),
                      Forms\Components\TextInput::make('email')
                          ->email()
                          ->required()
                          ->maxLength(255),
                      Forms\Components\TextInput::make('password')
                          ->password()
                          ->required()
                          ->maxLength(255),
                      Forms\Components\TextInput::make('telefone')
                          ->tel()
                          ->maxLength(255),
                      Forms\Components\Select::make('tipo_usuario')
                          ->label('Tipo Usuário')
                          ->required()
                          ->native(false)
                          ->options(TipoUsuario::class),
                  ])
              ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_usuario')
                    ->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
