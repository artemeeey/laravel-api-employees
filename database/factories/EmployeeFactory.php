<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'patronymic' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'birthday' => $this->faker->date(),
            'position' => $this->faker->randomElement(["Супервайзер", "Продавец", "Консультант"]),
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
