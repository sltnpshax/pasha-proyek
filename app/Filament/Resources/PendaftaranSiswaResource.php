<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranSiswaResource\Pages;
use App\Models\PendaftaranSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PendaftaranSiswaResource extends Resource
{
    protected static ?string $model = PendaftaranSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Data Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pendaftaran Siswa')
                    ->description('Isi data calon siswa dengan lengkap.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nisn')
                                    ->label('NISN')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('nama_lengkap')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->maxLength(255),

                                Select::make('jenis_kelamin')
                                    ->label('Jenis Kelamin')
                                    ->options([
                                        'Laki-laki' => 'Laki-laki',
                                        'Perempuan' => 'Perempuan',
                                    ])
                                    ->required(),

                                TextInput::make('asal_sekolah')
                                    ->label('Asal Sekolah')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('alamat')
                                    ->label('Alamat')
                                    ->required()
                                    ->columnSpanFull(),

                                FileUpload::make('foto')
                                    ->label('Foto Siswa')
                                    ->image()
                                    ->disk('s3')
                                    ->directory('uploads')
                                    ->visibility('public')
                                    ->required(),

                                Select::make('status')
                                    ->label('Status Pendaftaran')
                                    ->options([
                                        'pending' => 'Pending',
                                        'diterima' => 'Diterima',
                                        'ditolak' => 'Ditolak',
                                    ])
                                    ->default('pending')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->disk('s3')
                    ->visibility('public'),

                TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable(),

                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_kelamin')
                    ->label('JK'),

                TextColumn::make('asal_sekolah')
                    ->label('Asal Sekolah')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Tanggal Daftar')
                    ->sortable(),

                SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->selectablePlaceholder(false),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),

                    BulkAction::make('terimaSiswa')
                        ->label('Set Diterima')
                        ->icon('heroicon-m-check-circle')
                        ->color('success')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'diterima'])),

                    BulkAction::make('tolakSiswa')
                        ->label('Set Ditolak')
                        ->icon('heroicon-m-x-circle')
                        ->color('danger')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'ditolak'])),
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
            'index' => Pages\ListPendaftaranSiswas::route('/'),
            'create' => Pages\CreatePendaftaranSiswa::route('/create'),
            'edit' => Pages\EditPendaftaranSiswa::route('/{record}/edit'),
        ];
    }
}
