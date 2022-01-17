<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'cnpj' => mt_rand(10000000000000, 99999999999999),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'uf' => $this->faker->randomElement([
'AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA',
'PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC',
'SP','SE','TO']),
            'email' => $this->faker->email(),
            'phone' => mt_rand(10000000000, 99999999999),
            'user_id'   => User::factory()->create()->id
        ];
    }
}