<?php

namespace Database\Seeders;

use App\Models\Code;
use App\Models\User;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création de quelques utilisateurs de type 'host'
        $hosts = User::factory()->count(3)->create(['type' => 'host']);

        // Pour chaque hôte, créer 5 codes
        foreach ($hosts as $host) {
            for ($i = 0; $i < 5; $i++) {
                Code::create([
                    'code' => \Str::random(10), // Génère un code aléatoire
                    'consumed_at' => null,      // Code non consommé
                    'host_id' => $host->id,     // Associe le code à l'hôte
                    'guest_id' => null,         // Pas d'invité assigné pour le moment
                ]);
            }
        }
    }
}
